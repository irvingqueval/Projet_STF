<div class="container mt-5">
    <h1 class="text-center mb-3">Our Weapon Rental</h1>
    <h2 class="text-center text-muted mb-5">Only for members</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <?php foreach ($weapons as $weapon) : ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $weapon['image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($weapon['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($weapon['name']) ?></h5>
                        <p class="card-text"><strong>Brand:</strong> <?= htmlspecialchars($weapon['brand']) ?></p>
                        <p class="card-text"><strong>Caliber:</strong> <?= htmlspecialchars($weapon['caliber']) ?></p>
                        <a href="index.php?controller=WeaponRentalController&task=show&id=<?= htmlspecialchars($weapon['ID']) ?>" class="btn btn-primary mt-3">Détail</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
