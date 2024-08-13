<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $discoveryPack['image'] ?>" class="img-fluid" alt="<?= htmlspecialchars($discoveryPack['name']) ?>">
        </div>
        <div class="col-md-6">
            <h1><?= htmlspecialchars($discoveryPack['name']) ?></h1>
            <p class="lead"><strong>Price:</strong> $<?= number_format($discoveryPack['price'], 2) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($discoveryPack['duration']) ?> minutes</p>
            <p><?= nl2br(htmlspecialchars($discoveryPack['description'])) ?></p>
            <a href="index.php?controller=DiscoveryPackController&task=index" class="btn btn-secondary mt-3">Back to Packs</a>
        </div>
    </div>
</div>