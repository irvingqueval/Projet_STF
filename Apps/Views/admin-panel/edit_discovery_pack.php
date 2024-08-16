<div class="container mt-5">
    <h2>Modify the discovery pack</h2>

    <form method="POST" action="/index.php?controller=AdminPanelController&task=editDiscoveryPack&id=<?= $pack['ID'] ?>" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($pack['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" value="<?= htmlspecialchars($pack['price']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?= htmlspecialchars($pack['description']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" value="<?= htmlspecialchars($pack['duration']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Current image</label>
            <img src="<?= htmlspecialchars($pack['image']) ?>" alt="Image actuelle" class="img-fluid mb-3">
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            <input type="hidden" name="current_image" value="<?= htmlspecialchars($pack['image']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Modify</button>
        <a href="/index.php?controller=AdminPanelController&task=index" class="btn btn-secondary">Cancel</a>
    </form>
</div>