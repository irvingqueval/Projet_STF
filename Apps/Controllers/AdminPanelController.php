<?php

namespace Apps\Controllers;

class AdminPanelController
{
    private $discoveryPackModel;
    private $weaponRentalModel;

    public function __construct()
    {
        $this->discoveryPackModel = new \Apps\Models\DiscoveryPack();
        $this->weaponRentalModel = new \Apps\Models\WeaponRental();
    }

    // Display list of weapons and discovery packs
    public function index()
    {
        $pageTitle = "Admin Panel - Dashboard";
        $weapons = $this->weaponRentalModel->findAll();
        $discoveryPacks = $this->discoveryPackModel->findAll();

        \Apps\Libs\Renderer::render('admin-panel/index', compact('weapons', 'discoveryPacks', 'pageTitle'));
    }

    // Add a new weapon
    public function addWeapon()
    {
        $pageTitle = "Admin Panel - Add a weapon";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Manage image upload
            $image = $_FILES['image'];
            $target_dir = __DIR__ . '/../../assets/images/';
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $image_name = basename($image['name']);
            $target_file = $target_dir . $image_name;
            $relative_path = '/assets/images/' . $image_name;

            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                $data['image'] = $relative_path;

                $this->weaponRentalModel->insert($data);

                \Apps\Libs\Renderer::render('admin-panel/success', [
                    'pageTitle' => 'Arme ajoutée',
                    'message' => "L'arme a été ajoutée avec succès.",
                    'redirectUrl' => '/index.php?controller=AdminPanelController&task=index'
                ]);
                return;
            } else {
                echo "Image download error.";
            }
        }

        \Apps\Libs\Renderer::render('admin-panel/add_weapon', compact('pageTitle'));
    }


    // Modification of an existing weapon
    public function editWeapon(int $id)
    {
        $pageTitle = "Admin Panel - Modifying a weapon";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Remove 'current_image' from data sent to database
            unset($data['current_image']);

            // Check if a new image is uploaded
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image'];
                $target_dir = __DIR__ . '/../../assets/images/';
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $image_name = basename($image['name']);
                $target_file = $target_dir . $image_name;
                $relative_path = '/assets/images/' . $image_name;

                if (move_uploaded_file($image['tmp_name'], $target_file)) {
                    $data['image'] = $relative_path;
                } else {
                    echo "Image download error.";
                    return;
                }
            } else {
                // If no new image is uploaded, keep current image
                $data['image'] = $_POST['current_image'];
            }

            $this->weaponRentalModel->update($id, $data);

            \Apps\Libs\Renderer::render('admin-panel/success', [
                'pageTitle' => 'Modified weapon',
                'message' => "The weapon has been successfully modified.",
                'redirectUrl' => '/index.php?controller=AdminPanelController&task=index'
            ]);
            return;
        }

        $weapon = $this->weaponRentalModel->findOne($id);
        \Apps\Libs\Renderer::render('admin-panel/edit_weapon', compact('weapon', 'pageTitle'));
    }



    // Deleting a weapon
    public function deleteWeapon(int $id)
    {
        $this->weaponRentalModel->delete($id);

        \Apps\Libs\Renderer::render('admin-panel/success', [
            'pageTitle' => 'Weapon deleted',
            'message' => "The weapon has been successfully suppressed.",
            'redirectUrl' => '/index.php?controller=AdminPanelController&task=index'
        ]);
    }

    // Addition of a new discovery pack
    public function addDiscoveryPack()
    {
        $pageTitle = "Admin Panel - Add a discovery pack";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Manage image upload
            $image = $_FILES['image'];
            $target_dir = __DIR__ . '/../../assets/images/';
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $image_name = basename($image['name']);
            $target_file = $target_dir . $image_name;
            $relative_path = '/assets/images/' . $image_name;

            if (move_uploaded_file($image['tmp_name'], $target_file)) {
                $data['image'] = $relative_path;

                $this->discoveryPackModel->insert($data);

                \Apps\Libs\Renderer::render('admin-panel/success', [
                    'pageTitle' => 'Discovery pack added',
                    'message' => "The discovery pack has been successfully added.",
                    'redirectUrl' => '/index.php?controller=AdminPanelController&task=index'
                ]);
                return;
            } else {
                echo "Image download error.";
            }
        }

        \Apps\Libs\Renderer::render('admin-panel/add_discovery_pack', compact('pageTitle'));
    }


    // Modification of an existing discovery pack
    public function editDiscoveryPack(int $id)
    {
        $pageTitle = "Admin Panel - Modifying a discovery pack";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST;

            // Remove 'current_image' from data sent to database
            unset($data['current_image']);

            // Check if a new image is uploaded
            if (!empty($_FILES['image']['name'])) {
                $image = $_FILES['image'];
                $target_dir = __DIR__ . '/../../assets/images/';
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }
                $image_name = basename($image['name']);
                $target_file = $target_dir . $image_name;
                $relative_path = '/assets/images/' . $image_name;

                if (move_uploaded_file($image['tmp_name'], $target_file)) {
                    $data['image'] = $relative_path;
                } else {
                    echo "Image download error.";
                    return;
                }
            } else {
                // If no new image is uploaded, keep current image
                $data['image'] = $_POST['current_image'];
            }

            $this->discoveryPackModel->update($id, $data);

            \Apps\Libs\Renderer::render('admin-panel/success', [
                'pageTitle' => 'Modified discovery pack',
                'message' => "The discovery pack has been successfully modified.",
                'redirectUrl' => '/index.php?controller=AdminPanelController&task=index'
            ]);
            return;
        }

        $pack = $this->discoveryPackModel->findOne($id);
        \Apps\Libs\Renderer::render('admin-panel/edit_discovery_pack', compact('pack', 'pageTitle'));
    }



    // Deleting a discovery pack
    public function deleteDiscoveryPack(int $id)
    {
        $this->discoveryPackModel->delete($id);

        \Apps\Libs\Renderer::render('admin-panel/success', [
            'pageTitle' => 'Discovery pack no longer available',
            'message' => "The discovery pack has been successfully removed.",
            'redirectUrl' => '/index.php?controller=AdminPanelController&task=index'
        ]);
    }
}
