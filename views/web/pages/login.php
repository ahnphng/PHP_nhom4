<?php
require_once 'views/web/layouts/default.php';
?>
<?php startblock('title')?>
Đăng nhập
<?php endblock()?>

<?php startblock('body_attr')?>
class="user-login blog"
<?php endblock() ?>

<?php startblock('content')?>
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
                                    <span>Đăng nhập</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
            </nav>
        </div>
        <!-- main -->
        <div id="wrapper-site">
            <div id="content-wrapper" class="full-width">
                <div id="main">
                    <div class="container">
                        <h1 class="text-center title-page">Đăng nhập</h1>
                        <div class="login-form">
                            <form id="customer-form" action="<?= url('user/handleLogin') ?>" method="post">
                                <div>
                                    <input type="hidden" name="back" value="my-account">
                                    <div class="form-group no-gutters">
                                        <input class="form-control" name="email" type="email" placeholder="Email">
                                    </div>
                                    <div class="form-group no-gutters">
                                        <div class="input-group js-parent-focus">
                                            <input class="form-control js-child-focus js-visible-password" name="password" type="password" value="" placeholder="Mật khẩu">
                                        </div>
                                    </div>
                                    <!-- <div class="no-gutters text-center">
                                        <div class="forgot-password">
                                            <a href="user-reset-password.html" rel="nofollow">
                                                Forgot your password?
                                            </a>
                                        </div>
                                    </div> -->
                                </div>
                                <div class="clearfix">
                                    <div class="text-center no-gutters">
                                        <input type="hidden" name="submitLogin" value="1">
                                        <button class="btn btn-primary" data-link-action="sign-in" type="submit">
                                            Đăng nhập
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
<?php endblock()?>