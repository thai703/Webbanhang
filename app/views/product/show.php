<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="product-image-card">
                <?php if (!empty($product->image)): ?>
                    <img src="/webbanhang/<?php echo htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'); ?>" alt="Product Image" class="product-image">
                <?php else: ?>
                    <div class="no-image">
                        <i class="fas fa-image"></i>
                        <p>Không có ảnh sản phẩm</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="col-md-6 mb-4">
            <div class="product-info-card">
                <div class="category-badge mb-3">
                    <i class="fas fa-tag me-1"></i>
                    <?php 
                        if (!empty($product->category_name)) {
                            echo htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8');
                        } else {
                            echo '<span class="text-muted">Chưa có danh mục</span>';
                        }
                    ?>
                </div>
                <h1 class="product-title"><?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></h1>
                <div class="price-tag mb-4">
                    <i class="fas fa-coins me-1"></i>
                    <?php echo number_format($product->price, 0, ',', '.'); ?> đ
                </div>
                
                <div class="product-description mb-4">
                    <h5 class="section-title">
                        <i class="fas fa-info-circle me-2"></i>Mô tả sản phẩm
                    </h5>
                    <div class="description-content">
                        <?php echo nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')); ?>
                    </div>
                </div>
                
                <div class="product-actions">
                    <button onclick="addToCart(<?php echo $product->id; ?>)" class="btn btn-primary btn-lg w-100 mb-3">
                        <i class="fas fa-shopping-cart me-2"></i>Thêm vào giỏ hàng
                    </button>
                    <a href="/webbanhang/Product" class="btn btn-outline-secondary btn-lg w-100">
                        <i class="fas fa-arrow-left me-2"></i> Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
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
        --text-color: #333;
        --text-muted: #666;
    }

    body {
        background-color: #f5f5f5;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .product-image-card {
        background: white;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 30px;
        transition: all 0.3s ease;
    }

    .product-image-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .product-image {
        max-width: 100%;
        max-height: 600px;
        width: auto;
        height: auto;
        display: block;
        margin: 0 auto;
        transition: all 0.3s ease;
    }

    .product-image-card:hover .product-image {
        transform: scale(1.02);
    }

    .no-image {
        text-align: center;
        padding: 60px;
        color: #ccc;
        background: var(--secondary-color);
        border-radius: 15px;
        width: 100%;
    }

    .no-image i {
        font-size: 64px;
        margin-bottom: 20px;
    }

    .no-image p {
        font-size: 1.1rem;
        margin: 0;
    }

    .product-info-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .category-badge {
        background-color: var(--secondary-color);
        color: var(--text-muted);
        padding: 10px 20px;
        border-radius: 25px;
        font-size: 0.9rem;
        display: inline-block;
        margin-bottom: 20px;
        transition: all 0.3s ease;
    }

    .category-badge:hover {
        background-color: var(--primary-color);
        color: white;
    }

    .product-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--text-color);
        margin-bottom: 25px;
        line-height: 1.2;
    }

    .price-tag {
        background-color: var(--accent-color);
        color: white;
        padding: 15px 30px;
        border-radius: 30px;
        font-size: 1.5rem;
        font-weight: 600;
        display: inline-block;
        margin-bottom: 30px;
        box-shadow: 0 5px 15px rgba(255,107,107,0.3);
    }

    .section-title {
        color: var(--primary-color);
        font-size: 1.3rem;
        font-weight: 600;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
    }

    .section-title i {
        font-size: 1.4rem;
        margin-right: 10px;
    }

    .description-content {
        color: var(--text-muted);
        line-height: 1.8;
        font-size: 1.1rem;
        background: var(--secondary-color);
        padding: 20px;
        border-radius: 15px;
        margin-bottom: 0;
    }

    .product-actions {
        margin-top: auto;
    }

    .btn {
        border-radius: 30px;
        padding: 15px 30px;
        font-weight: 500;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border: none;
        box-shadow: 0 5px 15px rgba(74,144,226,0.3);
    }

    .btn-primary:hover {
        background-color: #357abd;
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(74,144,226,0.4);
    }

    .btn-outline-secondary {
        border-color: var(--text-muted);
        color: var(--text-muted);
    }

    .btn-outline-secondary:hover {
        background-color: var(--text-muted);
        color: white;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .product-image {
            max-height: 400px;
        }
        
        .product-title {
            font-size: 2rem;
        }

        .product-info-card {
            padding: 30px 20px;
        }

        .price-tag {
            font-size: 1.3rem;
            padding: 12px 25px;
        }

        .btn {
            padding: 12px 25px;
            font-size: 1rem;
        }
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