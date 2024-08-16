<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= htmlspecialchars($discoveryPack['image']) ?>" alt="<?= htmlspecialchars($discoveryPack['name']) ?>" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h1 class="mb-4"><?= htmlspecialchars($discoveryPack['name']) ?></h1>
            <p class="lead"><strong>Price:</strong> $<?= number_format($discoveryPack['price'], 2) ?></p>
            <p><strong>Duration:</strong> <?= htmlspecialchars($discoveryPack['duration']) ?> minutes</p>
            <p><?= nl2br(htmlspecialchars($discoveryPack['description'])) ?></p>
            <a href="index.php?controller=DiscoveryPackController&task=index" class="btn btn-primary">Back to Packs</a>
            <form method="POST" action="index.php?controller=ReservationController&task=addDiscoveryPackToCart">
                <input type="hidden" name="discovery_pack_id" value="<?= $discoveryPack['ID'] ?>">
                <div class="mb-3">
                    <label for="date" class="form-label">Select Date:</label>
                    <input type="date" id="date" name="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="hour" class="form-label">Select Time:</label>
                    <input type="time" id="hour" name="hour" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success">Reserve this Pack</button>
            </form>
        </div>
    </div>
</div>