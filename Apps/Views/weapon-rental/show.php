<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= htmlspecialchars($weapon['image']) ?>" alt="<?= htmlspecialchars($weapon['name']) ?>" class="img-fluid rounded shadow">
        </div>
        <div class="col-md-6">
            <h1 class="mb-4"><?= htmlspecialchars($weapon['name']) ?></h1>
            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Brand:</strong> <?= htmlspecialchars($weapon['brand']) ?></li>
                <li class="list-group-item"><strong>Caliber:</strong> <?= htmlspecialchars($weapon['caliber']) ?></li>
            </ul>
            <p class="lead"><?= nl2br(htmlspecialchars($weapon['description'])) ?></p>
            <a href="/index.php?controller=WeaponRentalController&task=index" class="btn btn-primary">Back to Weapons List</a>
            <form method="POST" action="index.php?controller=ReservationController&task=addToCart" class="mt-4">
                <input type="hidden" name="weapon_id" value="<?= $weapon['ID'] ?>">
                <div class="mb-3">
                    <label for="date" class="form-label">Select a Date</label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>
                <div class="mb-3">
                    <label for="hour" class="form-label">Select a Time</label>
                    <input type="time" class="form-control" id="hour" name="hour" required>
                </div>
                <button type="submit" class="btn btn-success">Add to Cart</button>
            </form>
        </div>
    </div>
</div>