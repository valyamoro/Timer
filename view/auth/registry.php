<?php if(!empty($_SESSION['errors'])): ?>
    <?php echo '<p class="msg"> ' . nl2br($_SESSION['errors']) . ' </p>'; ?>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>
<form action="" method="POST">
    <div class="mb-3">
        <label for="name" class="form-label">Username</label>
        <label for="name"></label><input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password">
    </div>
    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control" id="confirm_password">
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>