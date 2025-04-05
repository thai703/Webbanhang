<?php include 'app/views/shares/header.php'; ?>
<?php require_once('app/helpers/SessionHelper.php'); SessionHelper::start(); ?>

<div class="container py-5">
    <h1 class="text-center mb-5">
        <i class="fas fa-box-open me-2"></i>Danh sách các sản phẩm
    </h1>

    <!-- Promotional Banner -->
    <div class="promo-banner mb-5">
        <div class="banner-wrapper">
            <img src="https://cdnv2.tgdd.vn/mwg-static/common/Campaign/4f/cd/4fcd865b279c7eb103a6138c9813a446.png" 
                 alt="Promotional Banner" 
                 class="banner-image">
        </div>
    </div>

    <div class="product-list">
        <div class="row g-3">
            <?php foreach ($products as $product): ?>
            <div class="col-6 col-md-3">
                <div class="product-card">
                    <?php if ($product->image): ?>
                        <div class="product-img">
                            <img src="/webbanhang/<?php echo $product->image; ?>" alt="Product Image">
                        </div>
                    <?php endif; ?>
                    <div class="product-info">
                        <h3 class="product-name">
                            <a href="/webbanhang/Product/show/<?php echo $product->id; ?>">
                                <?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                            </a>
                        </h3>
                        <div class="product-price">
                            <strong><?php echo number_format($product->price, 0, ',', '.'); ?>₫</strong>
                        </div>
                        <div class="product-desc">
                            <?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?>
                        </div>
                        <div class="product-actions">
                            <?php if (SessionHelper::isAdmin()): ?>
                                <a href="/webbanhang/Product/edit/<?php echo $product->id; ?>" class="btn-edit">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <a href="/webbanhang/Product/delete/<?php echo $product->id; ?>" 
                                   class="btn-delete" 
                                   onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?');">
                                    <i class="fas fa-trash"></i> Xóa
                                </a>
                            <?php elseif (SessionHelper::isLoggedIn()): ?>
                                <button onclick="addToCart(<?php echo $product->id; ?>)" class="btn-cart">
                                    <i class="fas fa-shopping-cart"></i> Thêm vào giỏ
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if (SessionHelper::isAdmin()): ?>
        <div class="col-md-12 text-center mt-4">
            <a href="/webbanhang/Product/add" class="btn btn-success btn-lg">
                <i class="fas fa-plus me-2"></i>Thêm sản phẩm mới
            </a>
        </div>
    <?php endif; ?>
</div>

<!-- Toast Notification -->
<div class="toast-container position-fixed" style="top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
    <div id="cartToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-success text-white">
            <i class="fas fa-shopping-cart mr-2"></i>
            <strong class="mr-auto">Thông báo</strong>
            <button type="button" class="ml-2 mb-1 close text-white" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body bg-white" id="cartMessage"></div>
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
        background-color: var(--product-price-color, #e83a45);
        color: white;
        padding: 8px 15px;
        border-radius: 20px;
        font-weight: 600;
        display: inline-block;
        font: 14px/18px Arial,Helvetica,sans-serif;
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
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
    }

    .btn-primary:hover {
        background-color: #357abd;
        transform: translateY(-2px);
    }

    .btn-outline-primary {
        border-color: var(--primary-color);
        color: var(--primary-color);
    }

    .btn-outline-primary:hover {
        background-color: var(--primary-color);
        color: white;
        transform: translateY(-2px);
    }

    h1 {
        color: var(--primary-color);
        font-weight: 600;
    }

    .toast {
        min-width: 300px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.2);
        border: none;
        border-radius: 15px;
        overflow: hidden;
        opacity: 0;
        transform: translateY(20px);
        transition: all 0.3s ease;
    }

    .toast.show {
        opacity: 1;
        transform: translateY(0);
    }

    .toast.hide {
        opacity: 0;
        transform: translateY(20px);
    }

    .toast-header {
        border-bottom: none;
        padding: 15px 20px;
        background: linear-gradient(45deg, #28a745, #20c997);
    }

    .toast-body {
        padding: 20px;
        font-size: 1.1rem;
        color: #333;
        position: relative;
        overflow: hidden;
    }

    .toast-body::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #28a745, #20c997);
        transform: scaleX(1);
        transition: transform 2s linear;
    }

    .toast.hide .toast-body::after {
        transform: scaleX(0);
    }

    .close {
        opacity: 1;
        text-shadow: none;
        transition: all 0.2s ease;
    }

    .close:hover {
        opacity: 0.8;
        transform: rotate(90deg);
    }

    @keyframes slideIn {
        from {
            transform: translateY(20px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    @keyframes slideOut {
        from {
            transform: translateY(0);
            opacity: 1;
        }
        to {
            transform: translateY(20px);
            opacity: 0;
        }
    }

    .promo-banner {
        position: relative;
        width: 100%;
        margin-bottom: 30px;
        overflow: hidden;
        -webkit-transform: translate3d(0,0,0);
    }

    .banner-wrapper {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .banner-image {
        width: 100%;
        height: auto;
        display: block;
        max-width: 100%;
        margin: 0 auto;
    }

    /* Cập nhật style chung cho trang */
    body {
        font: 14px/18px Arial,Helvetica,sans-serif;
        color: #333;
        -webkit-tap-highlight-color: transparent;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .container {
        position: relative;
        overflow: hidden;
    }

    .product-list {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
    }

    .row.g-3 {
        --bs-gutter-x: 0;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin: 0;
        background: #FED100; /* Màu vàng nền */
        border-radius: 10px;
        padding: 1px; /* Tạo viền vàng mỏng */
    }

    .col-6.col-md-3 {
        padding: 1px;
    }

    .product-card {
        background: #fff;
        height: 100%;
        position: relative;
        display: flex;
        flex-direction: column;
        padding: 10px;
    }

    .product-img {
        text-align: center;
        margin-bottom: 15px;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fff;
        padding: 10px;
    }

    .product-img img {
        max-width: 100%;
        max-height: 100%;
        object-fit: contain;
    }

    .product-info {
        flex: 1;
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-size: 14px;
        line-height: 20px;
        margin-bottom: 5px;
        height: 40px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-name a {
        color: #333;
        text-decoration: none;
    }

    .product-price {
        color: #e03232;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .product-desc {
        font-size: 12px;
        color: #666;
        margin-bottom: 10px;
        height: 36px;
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
    }

    .product-actions {
        display: flex;
        gap: 10px;
        margin-top: auto;
    }

    .btn-cart, .btn-edit, .btn-delete {
        padding: 8px 15px;
        border-radius: 5px;
        border: none;
        font-size: 13px;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 5px;
        text-decoration: none;
        transition: all .2s ease;
        width: 100%;
        justify-content: center;
    }

    .btn-cart {
        background: #fdd835;
        color: #333;
    }

    .btn-cart:hover {
        background: #fbc02d;
    }

    .btn-edit {
        background: #4caf50;
        color: white;
    }

    .btn-edit:hover {
        background: #43a047;
    }

    .btn-delete {
        background: #f44336;
        color: white;
    }

    .btn-delete:hover {
        background: #e53935;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .product-img {
            height: 150px;
        }
        
        .product-name {
            font-size: 13px;
            height: 36px;
        }
        
        .product-price {
            font-size: 14px;
        }
        
        .btn-cart, .btn-edit, .btn-delete {
            padding: 6px 12px;
            font-size: 12px;
        }
    }
</style>

<script>
function addToCart(productId) {
    fetch(`/webbanhang/Product/addToCart/${productId}`)
        .then(response => response.json())
        .then(data => {
            $('#cartMessage').text(data.message);
            const toast = $('#cartToast');
            
            // Reset animation
            toast.removeClass('show hide');
            void toast[0].offsetWidth; // Trigger reflow
            
            // Show toast with animation
            toast.addClass('show');
            
            // Hide toast after delay
            setTimeout(() => {
                toast.removeClass('show').addClass('hide');
            }, 2000);
            
            // Cập nhật số lượng trong giỏ hàng trên header
            if (data.success) {
                const cartCount = document.getElementById('header-cart-count');
                if (cartCount) {
                    cartCount.textContent = `(${data.cartCount})`;
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            $('#cartMessage').text('Có lỗi xảy ra khi thêm vào giỏ hàng.');
            const toast = $('#cartToast');
            
            // Reset animation
            toast.removeClass('show hide');
            void toast[0].offsetWidth; // Trigger reflow
            
            // Show toast with animation
            toast.addClass('show');
            
            // Hide toast after delay
            setTimeout(() => {
                toast.removeClass('show').addClass('hide');
            }, 2000);
        });
}
</script>

<?php include 'app/views/shares/footer.php'; ?>