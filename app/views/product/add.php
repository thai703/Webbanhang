<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center mb-4 text-primary">Thêm sản phẩm mới</h2>
    
    <?php if (!empty($errors)): ?>
    <div class="alert alert-danger shadow-sm">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form method="POST" action="/webbanhang/Product/save" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label for="name" class="font-weight-bold text-dark">Tên sản phẩm:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="description" class="font-weight-bold text-dark">Mô tả:</label>
                    <textarea id="description" name="description" class="form-control" rows="4" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="price" class="font-weight-bold text-dark">Giá:</label>
                    <input type="number" id="price" name="price" class="form-control" step="0.01" required>
                </div>
                
                <div class="form-group">
                    <label for="category_id" class="font-weight-bold text-dark">Danh mục:</label>
                    <select id="category_id" name="category_id" class="form-control custom-select" required>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>"><?php echo htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8'); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="image" class="font-weight-bold text-dark">Hình ảnh:</label>
                    <input type="file" id="image" name="image" class="form-control-file">
                </div>
                
                <button type="submit" class="btn btn-success btn-lg btn-block">Thêm sản phẩm</button>
                
                <a href="/webbanhang/Product/" class="btn btn-secondary btn-lg btn-block mt-2">Quay lại danh sách sản phẩm</a>
            </form>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>

<style>
    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .form-control:focus, .custom-select:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>