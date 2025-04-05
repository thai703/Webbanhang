<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center">Chỉnh sửa danh mục</h2>
    <form method="POST" action="/webbanhang/category/edit/<?= $category->id ?>">
        <div class="form-group">
            <label for="name">Tên danh mục</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= $category->name ?>" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea class="form-control" id="description" name="description" required><?= $category->description ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="/webbanhang/category" class="btn btn-secondary">Quay lại danh sách</a>
    </form>
</div>

<?php include 'app/views/shares/footer.php'; ?>
