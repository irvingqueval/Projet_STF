<div class="container mt-5">
    <h2>Add a new discovery pack</h2>

    <form method="POST" action="/index.php?controller=AdminPanelController&task=addDiscoveryPack" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image (Upload)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
        <a href="/index.php?controller=AdminPanelController&task=index" class="btn btn-secondary">Cancel</a>
    </form>
</div>