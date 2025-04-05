<?php include 'app/views/shares/header.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card shadow-lg border-0">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h2 class="fw-bold text-primary">Đăng ký tài khoản</h2>
                        <p class="text-muted">Tạo tài khoản mới để bắt đầu mua sắm</p>
                    </div>

                    <form action="/webbanhang/account/save" method="post">
                        <div class="form-floating mb-3">
                            <input type="text" name="username" class="form-control" id="username" placeholder="Tên đăng nhập" required>
                            <label for="username">Tên đăng nhập</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
                            <label for="email">Email</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="form-control" id="password" placeholder="Mật khẩu" required>
                            <label for="password">Mật khẩu</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Xác nhận mật khẩu" required>
                            <label for="confirm_password">Xác nhận mật khẩu</label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-user-plus me-2"></i>Đăng ký
                            </button>
                        </div>

                        <div class="text-center mt-4">
                            <p class="mb-0">Đã có tài khoản? 
                                <a href="/webbanhang/account/login" class="text-primary text-decoration-none">Đăng nhập</a>
                            </p>
                        </div>
                    </form>

                    <div class="text-center mt-4">
                        <p class="text-muted mb-3">Hoặc đăng ký với</p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#" class="btn btn-outline-primary rounded-circle p-3">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="btn btn-outline-danger rounded-circle p-3">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="#" class="btn btn-outline-info rounded-circle p-3">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    .card {
        border-radius: 15px;
        backdrop-filter: blur(10px);
        background: rgba(255, 255, 255, 0.95);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .form-floating {
        position: relative;
    }

    .form-control {
        border-radius: 10px;
        padding: 1rem 0.75rem;
        height: auto;
        border: 2px solid #e9ecef;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4a90e2;
        box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
    }

    .form-floating label {
        padding: 1rem 0.75rem;
        color: #6c757d;
    }

    .btn-primary {
        background: linear-gradient(45deg, #4a90e2, #357abd);
        border: none;
        border-radius: 10px;
        padding: 0.8rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(45deg, #357abd, #4a90e2);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 144, 226, 0.3);
    }

    .btn-outline-primary,
    .btn-outline-danger,
    .btn-outline-info {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover,
    .btn-outline-danger:hover,
    .btn-outline-info:hover {
        transform: translateY(-3px);
    }

    .text-primary {
        color: #4a90e2 !important;
    }

    .text-decoration-none:hover {
        text-decoration: underline !important;
    }
</style>

<?php include 'app/views/shares/footer.php'; ?>