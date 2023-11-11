<?php if (!empty($_SESSION['errors'])): ?>
    <?php echo '<p class="msg"> ' . nl2br($_SESSION['errors']) . ' </p>'; ?>
    <?php unset($_SESSION['errors']); ?>
<?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Название</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Описание</label>
        <input type="text" name="content" class="form-control" id="content">
    </div>
    <div class="mb-3">
        <label for="count" class="form-label">Количество в день</label>
        <input type="text" name="count" class="form-control" id="count">
    </div>
    <button type="submit" class="btn btn-primary">Создать задачу</button>
</form>
