<div class="container mt-5">
    <h1 class="text-center mb-3">Your Cart</h1>

    <h2>Discovery Pack Reservations</h2>
    <?php if (empty($discoveryPackReservations)): ?>
        <p>No discovery pack reservations in your cart.</p>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($discoveryPackReservations as $reservation): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span><?= htmlspecialchars($reservation['name']) ?> - <?= htmlspecialchars($reservation['date']) ?> at <?= htmlspecialchars($reservation['hour']) ?></span>
                    <span>$<?= htmlspecialchars($reservation['price'] ?? '0.00') ?></span>
                    <input type="hidden" class="reservation-price" value="<?= htmlspecialchars($reservation['price'] ?? '0.00') ?>">
                    <a href="index.php?controller=ReservationController&task=deleteReservation&id=<?= $reservation['discovery_pack_id'] ?>&type=discovery_pack" class="btn btn-danger btn-sm">Remove</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2 class="mt-4">Weapon Reservations</h2>
    <?php if (empty($weaponReservations)): ?>
        <p>No weapon reservations in your cart.</p>
    <?php else: ?>
        <form method="POST" action="index.php?controller=ReservationController&task=processCart">
            <ul class="list-group">
                <?php foreach ($weaponReservations as $reservation): ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><?= htmlspecialchars($reservation['weapon_name']) ?> - <?= htmlspecialchars($reservation['date']) ?> at <?= htmlspecialchars($reservation['hour']) ?></span>
                        <span>$<?= htmlspecialchars($reservation['price'] ?? '5.00') ?></span>
                        <input type="hidden" class="reservation-price" value="<?= htmlspecialchars($reservation['price'] ?? '5.00') ?>">

                        <?php if (isset($reservation['weapon_caliber'])): ?>
                            <?php
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

                            $caliber = $reservation['weapon_caliber'];
                            $ammoPrice = $ammoPrices[$caliber] ?? 0;
                            ?>

                            <?php if ($ammoPrice > 0): ?>
                                <div class="mt-3">
                                    <label for="ammo-quantity-<?= $reservation['weapon_id'] ?>" class="form-label"><?= htmlspecialchars($caliber) ?> Ammunition:</label>
                                    <input type="number" id="ammo-quantity-<?= $reservation['weapon_id'] ?>"
                                        name="ammo_quantity[<?= $reservation['weapon_id'] ?>]"
                                        class="form-control ammo-quantity"
                                        min="0" data-price="<?= $ammoPrice ?>" value="1">
                                    <small class="text-muted">Price per box: $<?= $ammoPrice ?></small>
                                </div>
                            <?php else: ?>
                                <p>No ammunition available for this caliber.</p>
                            <?php endif; ?>
                        <?php else: ?>
                            <p>Caliber not defined.</p>
                        <?php endif; ?>

                        <a href="index.php?controller=ReservationController&task=deleteReservation&id=<?= $reservation['weapon_id'] ?>&type=weapon" class="btn btn-danger btn-sm">Remove</a>
                    </li>
                <?php endforeach; ?>
            </ul>

            <div class="text-center mt-4">
                <h3>Total Price: <span id="total-price">$0.00</span></h3>
            </div>

            <button type="submit" class="btn btn-success mt-3">Confirm and Reserve</button>
        </form>
    <?php endif; ?>

    <p class="text-center mt-4">
        <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    </p>
</div>