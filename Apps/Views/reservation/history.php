<div class="container mt-5">
    <h1 class="text-center mb-3">Reservation History</h1>

    <h2>Upcoming Reservations</h2>
    <h3>Weapons</h3>
    <?php if (empty($upcomingWeaponReservations)): ?>
        <p>No upcoming weapon reservations.</p>
    <?php else: ?>
        <ul class="list-group mb-4">
            <?php foreach ($upcomingWeaponReservations as $reservation): ?>
                <li class="list-group-item">
                    <?= htmlspecialchars($reservation['weapon_name']) ?> - <?= htmlspecialchars($reservation['date']) ?> at <?= htmlspecialchars($reservation['hour']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h3>Discovery Packs</h3>
    <?php if (empty($upcomingDiscoveryPackReservations)): ?>
        <p>No upcoming discovery pack reservations.</p>
    <?php else: ?>
        <ul class="list-group mb-4">
            <?php foreach ($upcomingDiscoveryPackReservations as $reservation): ?>
                <li class="list-group-item">
                    <?= htmlspecialchars($reservation['discovery_pack_name']) ?> - <?= htmlspecialchars($reservation['date']) ?> at <?= htmlspecialchars($reservation['hour']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2 class="mt-4">Past Reservations</h2>
    <h3>Weapons</h3>
    <?php if (empty($pastWeaponReservations)): ?>
        <p>No past weapon reservations.</p>
    <?php else: ?>
        <ul class="list-group mb-4">
            <?php foreach ($pastWeaponReservations as $reservation): ?>
                <li class="list-group-item">
                    <?= htmlspecialchars($reservation['weapon_name']) ?> - <?= htmlspecialchars($reservation['date']) ?> at <?= htmlspecialchars($reservation['hour']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h3>Discovery Packs</h3>
    <?php if (empty($pastDiscoveryPackReservations)): ?>
        <p>No past discovery pack reservations.</p>
    <?php else: ?>
        <ul class="list-group mb-4">
            <?php foreach ($pastDiscoveryPackReservations as $reservation): ?>
                <li class="list-group-item">
                    <?= htmlspecialchars($reservation['discovery_pack_name']) ?> - <?= htmlspecialchars($reservation['date']) ?> at <?= htmlspecialchars($reservation['hour']) ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>