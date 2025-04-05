<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <!-- Phần bộ lọc -->
    <div class="filter-section mb-4">
        <div class="row">
            <div class="col-md-6 mb-3">
                <form action="/webbanhang/search" method="GET" class="d-flex">
                    <input type="text" name="keyword" class="form-control me-2" placeholder="Nhập từ khóa tìm kiếm..." value="<?php echo htmlspecialchars($_GET['keyword'] ?? ''); ?>">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search me-2"></i>Tìm kiếm
                    </button>
                </form>
            </div>
            <div class="col-md-6">
                <form action="/webbanhang/search" method="GET" class="d-flex">
                    <select name="category_id" class="form-select me-2" onchange="this.form.submit()">
                        <option value="">Tất cả danh mục</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?php echo $category->id; ?>" <?php echo (isset($_GET['category_id']) && $_GET['category_id'] == $category->id) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($category->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="btn btn-secondary">
                        <i class="fas fa-filter me-2"></i>Lọc
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Phần hiển thị sản phẩm -->
    <div class="row">
        <?php if (empty($products)): ?>
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    Không tìm thấy sản phẩm nào phù hợp với tiêu chí tìm kiếm.
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($products as $product): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <?php if ($product->image): ?>
                            <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image" class="card-img-top">
                        <?php endif; ?>
                        <div class="card-body">
                            <div class="category-badge mb-2">
                                <i class="fas fa-tag me-1"></i>
                                <?php echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8'); ?>
                            </div>
                            <h5 class="card-title">
                                <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="text-dark text-decoration-none">
                                    <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                            <div class="price-tag mb-3">
                                <i class="fas fa-coins me-1"></i>
                                <?php echo number_format($product->price, 0, ',', '.'); ?> đ
                            </div>
                            
                            <div class="d-grid gap-2">
                                <?php if (SessionHelper::isAdmin()): ?>
                                    <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn btn-warning">
                                        <i class="fas fa-edit me-2"></i>Sửa
                                    </a>
                                    <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                        <i class="fas fa-trash me-2"></i>Xóa
                                    </a>
                                <?php elseif (SessionHelper::isLoggedIn()): ?>
                                    <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" class="btn btn-primary">
                                        <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ hàng
                                    </a>
                                <?php endif; ?>
                                <a href="/webbanhang/Product/show/<?php echo $product->id; ?>" class="btn btn-outline-primary">
                                    <i class="fas fa-eye me-2"></i>Xem chi tiết
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<style>
    :root {
        --primary-color: #4a90e2;
        --secondary-color: #f8f9fa;
        --accent-color: #ff6b6b;
    }

    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .filter-section {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .form-control, .form-select {
        border-radius: 25px;
        padding: 10px 20px;
        border: 2px solid #e0e0e0;
        transition: all 0.3s ease;
        height: 45px;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    }

    .card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        background: white;
        height: 100%;
        display: flex;
        flex-direction: column;
        max-width: 400px;
        margin: 0 auto;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .card-img-top {
        width: 100%;
        height: 250px;
        object-fit: contain;
        padding: 15px;
        background: #f8f9fa;
        transition: all 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }

    .card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 10px;
        height: 2.5em;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .card-text {
        color: #666;
        font-size: 0.9rem;
        line-height: 1.6;
        flex-grow: 1;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
    }

    .price-tag {
        background-color: var(--accent-color);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
    }

    .category-badge {
        background-color: var(--secondary-color);
        color: #666;
        padding: 5px 10px;
        border-radius: 15px;
        font-size: 0.8rem;
    }

    .btn {
        border-radius: 25px;
        padding: 10px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
        min-height: 45px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    .btn i {
        margin-right: 8px;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        min-width: 120px;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        min-width: 120px;
    }

    .btn-primary:hover {
        background-color: #357abd;
        transform: translateY(-2px);
    }

    .btn-secondary:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
    }

    .alert {
        border-radius: 10px;
        padding: 20px;
        margin: 20px 0;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?> 