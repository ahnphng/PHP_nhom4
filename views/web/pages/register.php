<?php
require_once 'views/web/layouts/default.php';
if (Flash::has('register_errors')) {
    $errors = Flash::get('register_errors');
}
?>
<?php startblock('title')?>
Đăng nhập
<?php endblock()?>

<?php startblock('body_attr')?>
class="user-register blog"
<?php endblock() ?>

<?php startblock('content')?>
<!-- main content -->
<div class="main-content">
    <div class="wrap-banner">
        <!-- breadcrumb -->
        <nav class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">
                    <ol>
                        <li>
                            <a href="<?= url('') ?>">
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span>Đăng ký</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </nav>
    </div>

    <!-- main -->
    <div id="wrapper-site">
        <div class="container">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                    <div id="main">
                        <div id="content" class="page-content">
                            <div class="register-form text-center">
                                <h1 class="text-center title-page">Tạo tài khoản</h1>
                                <form action="<?= url('user/handleRegister') ?>" id="customer-form" class="js-customer-form" method="post">
                                    <div>
                                        <div class="form-group">
                                            <div>
                                                <input class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" name="name" type="text" placeholder="Họ và tên" value="<?= isset($errors['form_data']) ? $errors['form_data']['name'] : '' ?>">
                                                <div class="invalid-feedback">
                                                    <?= isset($errors['name']) ? $errors['name'] : '' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <input class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" type="email" placeholder="Email" value="<?= isset($errors['form_data']) ? $errors['form_data']['email'] : '' ?>">
                                                <div class="invalid-feedback">
                                                    <?= isset($errors['email']) ? $errors['email'] : '' ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <div class="input-group js-parent-focus">
                                                    <input class="form-control js-child-focus js-visible-password <?= isset($errors['password']) ? 'is-invalid' : '' ?>" name="password" type="password" placeholder="Mật khẩu">
                                                    <div class="invalid-feedback">
                                                        <?= isset($errors['password']) ? $errors['password'] : '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div>
                                                <div class="input-group js-parent-focus">
                                                    <input class="form-control js-child-focus js-visible-password <?= isset($errors['password_confirmation']) ? 'is-invalid' : '' ?>" name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu">
                                                    <div class="invalid-feedback">
                                                        <?= isset($errors['password_confirmation']) ? $errors['password_confirmation'] : '' ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                        <div>
                                            <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                                Đăng ký
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock()?>