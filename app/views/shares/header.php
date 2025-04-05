<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Online</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style>
        .fixed-header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(90deg, #1a237e, #0d47a1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: bold;
            color: white !important;
            font-size: 1.5rem;
            transition: all 0.3s;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        .navbar-brand:hover {
            color: #ffd700 !important;
            transform: translateY(-2px);
        }

        .nav-link {
            color: white !important;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            white-space: nowrap;
            margin: 0 5px;
            cursor: pointer;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            color: #ffd700 !important;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        body {
            padding-top: 70px;
            background: #f4f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .main-container {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
        }

        .product-image {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s;
        }

        .product-image:hover {
            transform: scale(1.1);
        }

        .cart-icon {
            margin-right: 5px;
        }

        /* Thêm style cho thanh tìm kiếm */
        .search-form {
            position: relative;
            max-width: 400px;
            margin: 0 auto;
        }

        .search-input {
            border-radius: 20px;
            padding-left: 40px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            background: rgba(255, 255, 255, 0.15);
            color: white;
            transition: all 0.3s;
            font-weight: 500;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.8);
        }

        .search-input:focus {
            background: rgba(255, 255, 255, 0.25);
            border-color: rgba(255, 255, 255, 0.5);
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.1);
            color: white;
        }

        .search-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(255, 255, 255, 0.8);
        }

        /* Style cho banner slider */
        .banner-section {
            margin-top: 20px;
            margin-bottom: 30px;
            position: relative;
        }

        .swiper {
            width: 100%;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .swiper-slide {
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #f8f9fa;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            padding: 10px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            color: white !important;
            background: rgba(0, 0, 0, 0.5);
            width: 40px !important;
            height: 40px !important;
            border-radius: 50%;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 20px !important;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: rgba(0, 0, 0, 0.8);
        }

        /* Hiển thị nút điều hướng khi hover vào banner */
        .banner-section:hover .swiper-button-next,
        .banner-section:hover .swiper-button-prev {
            opacity: 1;
        }

        .navbar-nav {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
        }

        .navbar-nav .nav-item {
            margin: 0 5px;
        }

        @media (max-width: 991px) {
            .navbar-nav {
                flex-wrap: wrap;
            }
            
            .navbar-nav .nav-item {
                width: 100%;
                margin: 5px 0;
            }
            
            .nav-link {
                padding: 10px 20px;
            }
        }

        .account-bar {
            background: #fff;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
            margin-bottom: 20px;
        }

        .account-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .user-dropdown {
            position: relative;
            display: inline-block;
        }

        .user-dropdown-menu {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            min-width: 200px;
            display: none;
            z-index: 9999;
            margin-top: 5px;
            border: 1px solid #eee;
        }

        .user-dropdown:hover .user-dropdown-menu {
            display: block !important;
        }

        .nav-item.user-dropdown:hover .user-dropdown-menu {
            display: block !important;
        }

        .user-dropdown-item {
            padding: 12px 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #333;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 14px;
            white-space: nowrap;
        }

        .user-dropdown-item:first-child {
            border-radius: 8px 8px 0 0;
        }

        .user-dropdown-item:last-child {
            border-radius: 0 0 8px 8px;
        }

        .user-dropdown-item:hover {
            background: #f5f5f5;
            color: #2196F3;
            text-decoration: none;
        }

        .user-dropdown-item.logout {
            color: #e53935;
            border-top: 1px solid #eee;
        }

        .user-dropdown-item.logout:hover {
            background: #ffebee;
            text-decoration: none;
        }

        .admin-badge {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            margin-left: 5px;
            vertical-align: middle;
        }

        .account-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .account-link {
            color: #333;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 14px;
            padding: 5px 10px;
            border-radius: 5px;
            transition: all 0.2s ease;
        }

        .account-link:hover {
            background: #f5f5f5;
            color: #2196F3;
        }

        .account-link.logout {
            color: #e53935;
        }

        .account-link.logout:hover {
            background: #ffebee;
        }

        @media (max-width: 768px) {
            .account-actions {
                gap: 10px;
            }

            .account-link {
                font-size: 13px;
                padding: 5px;
            }
        }

        .dropdown-menu {
            border: none;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border-radius: 8px;
            padding: 8px 0;
        }

        .dropdown-item {
            padding: 8px 20px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
            color: #2196F3;
        }

        .dropdown-item.text-danger {
            color: #dc3545 !important;
        }

        .dropdown-item.text-danger:hover {
            background: #ffebee;
        }

        .dropdown-divider {
            margin: 8px 0;
            border-top: 1px solid #eee;
        }

        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        /* Dropdown and Admin Badge Styles */
        .nav-item.dropdown {
            position: relative;
        }

        .nav-item.dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 5px;
            color: white !important;
            padding: 10px 15px;
            border-radius: 5px;
            transition: all 0.3s;
            font-weight: 500;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
            white-space: nowrap;
            margin: 0 5px;
            cursor: pointer;
        }

        .nav-item.dropdown .dropdown-toggle:hover {
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
            color: #ffd700 !important;
        }

        .nav-item.dropdown .dropdown-menu {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background: white;
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 8px 0;
            margin-top: 5px;
            z-index: 9999;
            min-width: 200px;
        }

        .nav-item.dropdown:hover .dropdown-menu {
            display: block !important;
        }

        .nav-item.dropdown .dropdown-item {
            padding: 8px 20px;
            color: #333;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: all 0.2s ease;
            white-space: nowrap;
            font-size: 14px;
            text-decoration: none;
        }

        .nav-item.dropdown .dropdown-item:hover {
            background: #f8f9fa;
            color: #2196F3;
        }

        .nav-item.dropdown .dropdown-item.text-danger {
            color: #dc3545 !important;
        }

        .nav-item.dropdown .dropdown-item.text-danger:hover {
            background: #ffebee;
        }

        .nav-item.dropdown .dropdown-divider {
            margin: 8px 0;
            border-top: 1px solid #eee;
        }

        .nav-item.dropdown .admin-badge {
            display: inline-block;
            background: #4CAF50;
            color: white;
            padding: 2px 8px;
            border-radius: 12px;
            font-size: 12px;
            margin-left: 5px;
            vertical-align: middle;
            font-weight: 500;
        }

        /* Mobile Responsive */
        @media (max-width: 991px) {
            .nav-item.dropdown .dropdown-menu {
                position: static;
                float: none;
                width: 100%;
                margin-top: 0;
                box-shadow: none;
                border: 1px solid #eee;
            }
            
            .nav-item.dropdown .admin-badge {
                display: inline-block;
                margin-left: 5px;
            }

            .nav-item.dropdown .dropdown-toggle {
                padding: 10px 20px;
            }
        }

        /* Remove only duplicate styles */
        .user-dropdown,
        .user-dropdown-menu,
        .user-dropdown-item,
        .account-actions,
        .account-link,
        .account-bar,
        .account-info {
            display: none !important;
        }
    </style>
</head>
<body>
    <?php require_once('app/helpers/SessionHelper.php'); SessionHelper::start(); ?>
    
    <nav class="navbar navbar-expand-lg navbar-light fixed-header">
        <div class="container">
            <a class="navbar-brand" href="/webbanhang/Product/">
                <i class="fas fa-shopping-bag me-2"></i> Shop Online
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form action="/webbanhang/search" method="GET" class="form-inline search-form my-2 my-lg-0 mx-auto">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" name="keyword" class="form-control search-input" placeholder="Tìm kiếm sản phẩm..." value="<?php echo htmlspecialchars($_GET['keyword'] ?? ''); ?>">
                </form>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/webbanhang/Product/">Danh sách sản phẩm</a>
                    </li>
                    <?php if(isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/add">Thêm sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/category/">Quản lý Kho hàng</a>
                        </li>
                    <?php endif; ?>
                    <?php if(SessionHelper::isLoggedIn()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/Product/cart">
                                <i class="fas fa-shopping-cart cart-icon"></i> Giỏ hàng 
                                <span id="header-cart-count">
                                    <?php if (!empty($_SESSION['cart'])): ?>
                                        (<?= array_sum(array_column($_SESSION['cart'], 'quantity')) ?>)
                                    <?php endif; ?>
                                </span>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user"></i> 
                                <?php echo $_SESSION['username']; ?>
                                <?php if(SessionHelper::isAdmin()): ?>
                                    <span class="admin-badge">Admin</span>
                                <?php endif; ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <?php if(SessionHelper::isAdmin()): ?>
                                    <a class="dropdown-item" href="/webbanhang/Product/add">
                                        <i class="fas fa-plus"></i> Thêm sản phẩm
                                    </a>
                                    <a class="dropdown-item" href="/webbanhang/category/">
                                        <i class="fas fa-boxes"></i> Quản lý kho
                                    </a>
                                    <div class="dropdown-divider"></div>
                                <?php endif; ?>
                                <a class="dropdown-item text-danger" href="/webbanhang/account/logout">
                                    <i class="fas fa-sign-out-alt"></i> Đăng xuất
                                </a>
                            </div>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/account/login"><i class="fas fa-sign-in-alt"></i> Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/webbanhang/account/register"><i class="fas fa-user-plus"></i> Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Banner Slider -->
    <div class="banner-section">
        <div class="swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="/webbanhang/uploads/banner.jpg" alt="Banner">
                </div>
                <div class="swiper-slide">
                    <img src="/webbanhang/uploads/banner1.jpg" alt="Banner 1">
                </div>
                <div class="swiper-slide">
                    <img src="/webbanhang/uploads/banner2.jpg" alt="Banner 2">
                </div>
                <div class="swiper-slide">
                    <img src="/webbanhang/uploads/banner3.jpg" alt="Banner 3">
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>

    <!-- Các file JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>