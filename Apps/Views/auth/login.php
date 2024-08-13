<div class="container mt-5">
    <h1 class="text-center mb-3">Login</h1>

    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=AuthentificationController&task=login">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password" name="password" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('password')">Show</button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <div class="text-center mt-4">
        <p>Don't have an account?</p>
        <a href="index.php?controller=AuthentificationController&task=register" class="btn btn-secondary">Register</a>
    </div>
</div>