<div class="container mt-5">
    <h1 class="text-center mb-3">Our Shooting Discovery Packs</h1>
    <h2 class="text-center text-muted mb-5">Explore our different packages</h2>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
        <?php foreach ($discoveryPacks as $pack) : ?>
            <div class="col">
                <div class="card h-100">
                    <img src="<?= $pack['image'] ?>" class="card-img-top" alt="<?= htmlspecialchars($pack['name']) ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($pack['name']) ?></h5>
                        <p class="card-text"><strong>Price:</strong> $<?= number_format($pack['price'], 2) ?></p>
                        <p class="card-text"><strong>Duration:</strong> <?= htmlspecialchars($pack['duration']) ?> minutes</p>
                        <a href="index.php?controller=DiscoveryPackController&task=show&id=<?= htmlspecialchars($pack['ID']) ?>" class="btn btn-primary mt-3">Details</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>