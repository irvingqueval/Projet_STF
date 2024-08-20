<?php

namespace Apps\Controllers;

class ReservationController extends Controller
{
    protected $discoveryPackModel;
    protected $weaponModel;
    protected $weaponRentalModel;

    public function __construct()
    {
        $this->discoveryPackModel = new \Apps\Models\DiscoveryPackReservation();
        $this->weaponModel = new \Apps\Models\WeaponReservation();
        $this->weaponRentalModel = new \Apps\Models\WeaponRental();
    }

    // Add a gun reservation to the cart
    public function addToCart()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=AuthentificationController&task=login');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $userModel = new \Apps\Models\User();
        $user = $userModel->findOne($userId);

        // Check if the user is a member
        if ($user['is_member'] == 0) {
            // Redirect the user to the information page for non-members
            header('Location: index.php?controller=ReservationController&task=nonMemberInfo');
            exit();
        }

        $weaponId = $_POST['weapon_id'] ?? null;
        $date = $_POST['date'] ?? null;
        $hour = $_POST['hour'] ?? null;

        if (!$weaponId || !$date || !$hour) {
            die('Invalid reservation data.');
        }

        $weapon = $this->weaponRentalModel->findOne($weaponId);
        if (!$weapon) {
            die('Weapon not found.');
        }

        $_SESSION['cart']['weapons'][] = [
            'weapon_id' => $weaponId,
            'weapon_name' => $weapon['name'],
            'weapon_caliber' => $weapon['caliber'],
            'date' => $date,
            'hour' => $hour,
            'price' => 5.00,
        ];

        header('Location: index.php?controller=ReservationController&task=viewCart');
        exit();
    }

    // Add a discovery pack reservation to the basket
    public function addDiscoveryPackToCart()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=AuthentificationController&task=login');
            exit();
        }

        $discoveryPackId = $_POST['discovery_pack_id'] ?? null;
        $date = $_POST['date'] ?? null;
        $hour = $_POST['hour'] ?? null;

        if (!$discoveryPackId || !$date || !$hour) {
            die('Invalid reservation data.');
        }

        // Use the DiscoveryPack template to retrieve pack information
        $discoveryPackModel = new \Apps\Models\DiscoveryPack();
        $discoveryPack = $discoveryPackModel->findOne($discoveryPackId);

        if (!$discoveryPack) {
            die('Discovery Pack not found.');
        }

        // Add booking to the cart
        $_SESSION['cart']['discovery_packs'][] = [
            'discovery_pack_id' => $discoveryPackId,
            'name' => $discoveryPack['name'],
            'date' => $date,
            'hour' => $hour,
            'price' => $discoveryPack['price'],
        ];

        header('Location: index.php?controller=ReservationController&task=viewCart');
        exit();
    }

    // Show the cart
    public function viewCart()
    {
        $discoveryPackReservations = $_SESSION['cart']['discovery_packs'] ?? [];
        $weaponReservations = $_SESSION['cart']['weapons'] ?? [];

        \Apps\Libs\Renderer::render('reservation/cart', [
            'discoveryPackReservations' => $discoveryPackReservations,
            'weaponReservations' => $weaponReservations,
            'pageTitle' => 'Your Cart'
        ]);
    }

    // Process Discovery Pack reservations in the cart
    public function processDiscoveryPacks()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];

            // Process reservations for discovery packs
            if (isset($_SESSION['cart']['discovery_packs'])) {
                foreach ($_SESSION['cart']['discovery_packs'] as $reservation) {
                    $this->discoveryPackModel->createReservation(
                        $userId,
                        $reservation['discovery_pack_id'],
                        $reservation['date'],
                        $reservation['hour']
                    );
                }

                // Remove Discovery Packs from cart after reservation confirmation
                unset($_SESSION['cart']['discovery_packs']);
            }

            // Redirect to success page
            header('Location: index.php?controller=ReservationController&task=cartSuccess');
            exit();
        } else {
            echo "No POST data received.<br>";
        }
    }

    // Process Weapon reservations in the cart
    public function processWeapons()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_SESSION['user_id'];

            // Process reservations for weapons
            if (isset($_SESSION['cart']['weapons'])) {
                foreach ($_SESSION['cart']['weapons'] as $reservation) {
                    $weaponId = $reservation['weapon_id'];
                    $ammoBoxes = isset($_POST['ammo_quantity'][$weaponId]) ? intval($_POST['ammo_quantity'][$weaponId]) : 0;

                    $ammoPrice = $this->calculateAmmoPrice($reservation['weapon_caliber'], $ammoBoxes);
                    $totalPrice = $reservation['price'] + $ammoPrice;

                    // Insert reservation into database
                    $this->weaponModel->createReservation(
                        $userId,
                        $weaponId,
                        $reservation['date'],
                        $reservation['hour'],
                        $ammoBoxes,
                        $totalPrice
                    );
                }

                // Remove Weapons from cart after reservation confirmation
                unset($_SESSION['cart']['weapons']);
            }

            // Redirect to success page
            header('Location: index.php?controller=ReservationController&task=cartSuccess');
            exit();
        } else {
            echo "No POST data received.<br>";
        }
    }

    // Calculate ammunition prices based on caliber and number of boxes
    private function calculateAmmoPrice($caliber, $ammoBoxes)
    {
        $ammoPrices = [
            '9mm PARA' => 17,
            '.45 ACP' => 30,
            '.38 special' => 25,
            '.50 AE' => 67,
            '.500 SW' => 42,
            '.44 Rem Mag' => 48,
            '.223 Rem' => 29,
            '7,62x39' => 38,
        ];

        $pricePerBox = $ammoPrices[$caliber] ?? 0;

        return $ammoBoxes * $pricePerBox;
    }

    // Display success message after cart confirmation
    public function cartSuccess()
    {
        \Apps\Libs\Renderer::render('reservation/success', [
            'pageTitle' => 'Reservation Successful'
        ]);
    }

    // Remove a reservation from the cart
    public function deleteReservation()
    {
        $reservationId = $_GET['id'] ?? null;
        $type = $_GET['type'] ?? null;

        if (!$reservationId || !$type) {
            die('Invalid reservation ID or type.');
        }

        // Remove a reservation from the cart
        if ($type === 'weapon') {
            foreach ($_SESSION['cart']['weapons'] as $index => $reservation) {
                if ($reservation['weapon_id'] == $reservationId) {
                    unset($_SESSION['cart']['weapons'][$index]);
                    break;
                }
            }
        } elseif ($type === 'discovery_pack') {
            foreach ($_SESSION['cart']['discovery_packs'] as $index => $reservation) {
                if ($reservation['discovery_pack_id'] == $reservationId) {
                    unset($_SESSION['cart']['discovery_packs'][$index]);
                    break;
                }
            }
        }

        header('Location: index.php?controller=ReservationController&task=viewCart');
        exit();
    }

    // Display information page for non-members
    public function nonMemberInfo()
    {
        $pageTitle = "Membership Required";
        \Apps\Libs\Renderer::render('reservation/non_member_info', compact('pageTitle'));
    }

    public function viewHistory()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=AuthentificationController&task=login');
            exit();
        }

        $userId = $_SESSION['user_id'];
        $currentDate = date('Y-m-d H:i:s');

        // Retrieve past and future gun reservations
        $upcomingWeaponReservations = $this->weaponModel->findReservationsByUserAndDate($userId, $currentDate, 'future');
        $pastWeaponReservations = $this->weaponModel->findReservationsByUserAndDate($userId, $currentDate, 'past');

        // Retrieve past and future Discovery Pack reservations
        $upcomingDiscoveryPackReservations = $this->discoveryPackModel->findReservationsByUserAndDate($userId, $currentDate, 'future');
        $pastDiscoveryPackReservations = $this->discoveryPackModel->findReservationsByUserAndDate($userId, $currentDate, 'past');

        \Apps\Libs\Renderer::render('reservation/history', [
            'pageTitle' => 'Reservation History',
            'upcomingWeaponReservations' => $upcomingWeaponReservations,
            'pastWeaponReservations' => $pastWeaponReservations,
            'upcomingDiscoveryPackReservations' => $upcomingDiscoveryPackReservations,
            'pastDiscoveryPackReservations' => $pastDiscoveryPackReservations,
        ]);
    }
}
