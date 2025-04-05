<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center">Danh sách danh mục</h2>
    <a href="/webbanhang/category/create" class="btn btn-primary mb-3">Thêm danh mục</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= $category->id ?></td>
                    <td><?= $category->name ?></td>
                    <td><?= $category->description ?></td>
                    <td>
                        <a href="/webbanhang/category/edit/<?= $category->id ?>" class="btn btn-warning">Sửa</a>
                        <a href="/webbanhang/category/delete/<?= $category->id ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'app/views/shares/footer.php'; ?>
