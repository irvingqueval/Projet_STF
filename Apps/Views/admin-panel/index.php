<div class="container mt-5">
    <h1 class="mb-4">Administration panel</h1>

    <h2>Weapons</h2>
    <a href="/index.php?controller=AdminPanelController&task=addWeapon" class="btn btn-success mb-3">Add a new weapon</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Brand</th>
                <th>Caliber</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($weapons as $weapon): ?>
                <tr>
                    <td><?= htmlspecialchars($weapon['ID']) ?></td>
                    <td><?= htmlspecialchars($weapon['name']) ?></td>
                    <td><?= htmlspecialchars($weapon['brand']) ?></td>
                    <td><?= htmlspecialchars($weapon['caliber']) ?></td>
                    <td><?= htmlspecialchars($weapon['description']) ?></td>
                    <td><img src="<?= htmlspecialchars($weapon['image']) ?>" alt="<?= htmlspecialchars($weapon['name']) ?>" width="50" class="img-thumbnail"></td>
                    <td>
                        <a href="/index.php?controller=AdminPanelController&task=editWeapon&id=<?= $weapon['ID'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                        <a href="/index.php?controller=AdminPanelController&task=deleteWeapon&id=<?= $weapon['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette arme ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2 class="mt-5">Discovery Packs</h2>
    <a href="/index.php?controller=AdminPanelController&task=addDiscoveryPack" class="btn btn-success mb-3">Add a new discovery pack</a>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($discoveryPacks as $pack): ?>
                <tr>
                    <td><?= htmlspecialchars($pack['ID']) ?></td>
                    <td><?= htmlspecialchars($pack['name']) ?></td>
                    <td><?= htmlspecialchars($pack['price']) ?></td>
                    <td><?= htmlspecialchars($pack['description']) ?></td>
                    <td><?= htmlspecialchars($pack['duration']) ?></td>
                    <td><img src="<?= htmlspecialchars($pack['image']) ?>" alt="<?= htmlspecialchars($pack['name']) ?>" width="50" class="img-thumbnail"></td>
                    <td>
                        <a href="/index.php?controller=AdminPanelController&task=editDiscoveryPack&id=<?= $pack['ID'] ?>" class="btn btn-primary btn-sm">Modifier</a>
                        <a href="/index.php?controller=AdminPanelController&task=deleteDiscoveryPack&id=<?= $pack['ID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce pack ?');">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>