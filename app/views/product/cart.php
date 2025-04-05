<?php include 'app/views/shares/header.php'; ?>

<div class="container py-4">
    <h1 class="text-center mb-4">
        <i class="fas fa-shopping-cart"></i> Giỏ hàng của bạn
    </h1>

    <?php if (!empty($cart)): ?>
        <div class="cart-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart-items">
                        <?php 
                        $total = 0;
                        foreach ($cart as $id => $item): 
                            $item_total = $item['price'] * $item['quantity'];
                            $total += $item_total;
                        ?>
                            <div class="cart-item">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <?php if (!empty($item['image'])): ?>
                                            <img src="/webbanhang/<?php echo htmlspecialchars($item['image']); ?>" 
                                                 alt="<?php echo htmlspecialchars($item['name']); ?>" 
                                                 class="product-image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-4">
                                        <h3 class="product-name"><?php echo htmlspecialchars($item['name']); ?></h3>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="price"><?php echo number_format($item['price']); ?> ₫</div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="quantity-controls">
                                            <button onclick="updateQuantity(<?php echo $id; ?>, 'decrease')" 
                                                    class="btn-quantity">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <span id="quantity-<?php echo $id; ?>" 
                                                  class="quantity-display">
                                                <?php echo $item['quantity']; ?>
                                            </span>
                                            <button onclick="updateQuantity(<?php echo $id; ?>, 'increase')" 
                                                    class="btn-quantity">
                                                <i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="item-total">
                                            <span id="item-total-<?php echo $id; ?>">
                                                <?php echo number_format($item_total); ?>
                                            </span> ₫
                                        </div>
                                        <a href="/webbanhang/Product/removeFromCart/<?php echo $id; ?>" 
                                           class="btn-remove"
                                           onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-summary">
                        <h3>Tổng giỏ hàng</h3>
                        <div class="summary-item">
                            <span>Tạm tính:</span>
                            <span id="cart-total"><?php echo number_format($total); ?> ₫</span>
                        </div>
                        <div class="summary-item total">
                            <span>Tổng cộng:</span>
                            <span id="final-total"><?php echo number_format($total); ?> ₫</span>
                        </div>
                        <div class="cart-actions">
                            <a href="/webbanhang/Product/checkout" class="btn-checkout">
                                <i class="fas fa-credit-card"></i> Thanh toán
                            </a>
                            <a href="/webbanhang/Product" class="btn-continue">
                                <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
                            </a>
                            <a href="/webbanhang/Product/clearCart" 
                               class="btn-clear"
                               onclick="return confirm('Bạn có chắc muốn xóa toàn bộ giỏ hàng?');">
                                <i class="fas fa-trash"></i> Xóa giỏ hàng
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="empty-cart">
            <i class="fas fa-shopping-cart fa-3x"></i>
            <p>Giỏ hàng của bạn đang trống</p>
            <a href="/webbanhang/Product" class="btn-continue">
                <i class="fas fa-arrow-left"></i> Tiếp tục mua sắm
            </a>
        </div>
    <?php endif; ?>
</div>

<style>
    .cart-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
        padding: 20px;
    }

    .cart-item {
        padding: 25px 20px;
        border-bottom: 1px solid #eee;
        transition: all 0.3s ease;
        margin-bottom: 10px;
    }

    .cart-item:hover {
        background: #f8f9fa;
    }

    .cart-item .row {
        margin: 0 -15px;
    }

    .cart-item .col-md-2,
    .cart-item .col-md-4 {
        padding: 0 15px;
    }

    .product-image {
        max-width: 100px;
        height: auto;
        border-radius: 8px;
        display: block;
    }

    .product-name {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin-bottom: 5px;
        line-height: 1.4;
    }

    .price {
        font-size: 15px;
        color: #666;
        white-space: nowrap;
    }

    .quantity-controls {
        display: flex;
        align-items: center;
        gap: 10px;
        justify-content: flex-start;
        margin: 10px 0;
    }

    .btn-quantity {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        border: none;
        background: #f0f0f0;
        color: #333;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s ease;
    }

    .btn-quantity:hover {
        background: #e0e0e0;
    }

    .quantity-display {
        font-size: 16px;
        font-weight: 600;
        min-width: 40px;
        text-align: center;
    }

    .item-total {
        font-size: 16px;
        font-weight: 600;
        color: #e53935;
        margin-bottom: 15px;
        white-space: nowrap;
    }

    .btn-remove {
        color: #dc3545;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.2s ease;
        display: inline-block;
        padding: 5px;
    }

    .btn-remove:hover {
        color: #c82333;
    }

    .cart-summary {
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        position: sticky;
        top: 20px;
    }

    .cart-summary h3 {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #333;
    }

    .summary-item {
        display: flex;
        justify-content: space-between;
        margin-bottom: 15px;
        font-size: 15px;
        color: #666;
        align-items: center;
    }

    .summary-item span {
        white-space: nowrap;
    }

    .summary-item.total {
        font-size: 18px;
        font-weight: 600;
        color: #333;
        border-top: 1px solid #ddd;
        padding-top: 15px;
        margin-top: 15px;
    }

    .cart-actions {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }

    .btn-checkout, .btn-continue, .btn-clear {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: none;
        font-weight: 600;
        text-align: center;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-checkout {
        background: #4CAF50;
        color: white;
    }

    .btn-checkout:hover {
        background: #43A047;
        color: white;
    }

    .btn-continue {
        background: #2196F3;
        color: white;
    }

    .btn-continue:hover {
        background: #1E88E5;
        color: white;
    }

    .btn-clear {
        background: #dc3545;
        color: white;
    }

    .btn-clear:hover {
        background: #c82333;
        color: white;
    }

    .empty-cart {
        text-align: center;
        padding: 50px 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }

    .empty-cart i {
        color: #ccc;
        margin-bottom: 20px;
    }

    .empty-cart p {
        font-size: 18px;
        color: #666;
        margin-bottom: 20px;
    }

    @media (max-width: 768px) {
        .cart-item .row {
            flex-direction: column;
            text-align: center;
        }

        .cart-item .col-md-2,
        .cart-item .col-md-4 {
            margin-bottom: 15px;
        }

        .product-image {
            margin: 0 auto;
        }

        .quantity-controls {
            justify-content: center;
        }

        .cart-summary {
            margin-top: 20px;
            position: static;
        }
    }
</style>

<script>
function updateQuantity(productId, action) {
    fetch('/webbanhang/Product/updateQuantity', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: `product_id=${productId}&action=${action}`
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Cập nhật số lượng
            document.getElementById(`quantity-${productId}`).textContent = data.quantity;
            
            // Cập nhật tổng tiền của sản phẩm
            document.getElementById(`item-total-${productId}`).textContent = 
                new Intl.NumberFormat('vi-VN').format(data.itemTotal);
            
            // Cập nhật tổng tiền giỏ hàng
            document.getElementById('cart-total').textContent = 
                new Intl.NumberFormat('vi-VN').format(data.total) + ' ₫';
            document.getElementById('final-total').textContent = 
                new Intl.NumberFormat('vi-VN').format(data.total) + ' ₫';
            
            // Cập nhật số lượng trong header
            const headerCartCount = document.getElementById('header-cart-count');
            if (headerCartCount) {
                let totalItems = 0;
                Object.values(data.cart).forEach(item => {
                    totalItems += item.quantity;
                });
                headerCartCount.textContent = `(${totalItems})`;
            }
        } else {
            alert(data.message || 'Có lỗi xảy ra khi cập nhật số lượng.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Có lỗi xảy ra khi cập nhật số lượng.');
    });
}
</script>

<?php include 'app/views/shares/footer.php'; ?>
