<div class="container mt-5">
    <h1 class="text-center mb-3">Réservez votre Pack Découverte</h1>

    <h2><?= htmlspecialchars($discoveryPack['name']) ?></h2>
    <p><?= htmlspecialchars($discoveryPack['description']) ?></p>

    <form method="POST" action="index.php?controller=ReservationController&task=addDiscoveryPackReservation">
        <input type="hidden" name="discovery_pack_id" value="<?= $discoveryPack['ID'] ?>">
        <div class="mb-3">
            <label for="date" class="form-label">Sélectionnez une date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="hour" class="form-label">Sélectionnez une heure</label>
            <input type="time" class="form-control" id="hour" name="hour" required>
        </div>
        <button type="submit" class="btn btn-primary">Réserver le Pack</button>
    </form>
</div>