<div class="container mt-5">
    <h2>Modify weapon</h2>

    <form method="POST" action="/index.php?controller=AdminPanelController&task=editWeapon&id=<?= $weapon['ID'] ?>" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($weapon['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="brand" class="form-label">Brand</label>
            <input type="text" class="form-control" id="brand" name="brand" value="<?= htmlspecialchars($weapon['brand']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="caliber" class="form-label">Caliber</label>
            <input type="text" class="form-control" id="caliber" name="caliber" value="<?= htmlspecialchars($weapon['caliber']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($weapon['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Current image</label>
            <img src="<?= htmlspecialchars($weapon['image']) ?>" alt="Image actuelle" class="img-fluid mb-3">
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <input type="hidden" name="current_image" value="<?= htmlspecialchars($weapon['image']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Modify</button>
        <a href="/index.php?controller=AdminPanelController&task=index" class="btn btn-secondary">Cancel</a>
    </form>
</div>
