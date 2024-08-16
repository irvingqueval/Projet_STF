<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STF - <?= $pageTitle ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/index.php?controller=HomeController">STF</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/index.php?controller=HomeController">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?controller=WeaponRentalController&task=index">Weapon Rental</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?controller=DiscoveryPackController&task=index">Discovery Pack</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php?controller=ReservationController&task=viewHistory">Reservation History</a>
                    </li>

                    <?php if (isset($_SESSION['user_id'])): ?>
                        <?php if ($_SESSION['is_admin']): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="/index.php?controller=AdminPanelController&task=index">Administration panel</a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php?controller=ReservationController&task=viewCart">
                                <img src="/assets/logo/cart.webp" alt="Cart" width="30" height="30">
                            </a>
                        </li>
                        <li class="nav-item">
                            <span class="navbar-text me-2">
                                <?= htmlspecialchars($_SESSION['email']) ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php?controller=AuthentificationController&task=logout">
                                <img src="/assets/logo/logout.webp" alt="Logout" width="30" height="30">
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php?controller=AuthentificationController&task=login">
                                <img src="/assets/logo/login.webp" alt="Login" width="30" height="30">
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </nav>

    <?= $pageContent ?>

    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p>&copy; 2023 Société de Tir de Farmoutier. All rights reserved.</p>
        </div>
    </footer>

    <script src="/assets/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>