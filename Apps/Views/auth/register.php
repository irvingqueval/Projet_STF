<div class="container mt-5">
    <h1 class="text-center mb-3">Register</h1>

    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger">
            <?= htmlspecialchars($errorMessage) ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="index.php?controller=AuthentificationController&task=register">
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
        <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility('confirm_password')">Show</button>
            </div>
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" min="18" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>

    <p class="text-center mt-3">Already have an account? <a href="index.php?controller=AuthentificationController&task=login">Login here</a></p>
</div>