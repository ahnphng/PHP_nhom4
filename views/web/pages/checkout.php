<?php
require_once 'views/web/layouts/default.php';
?>
<?php startblock('title')?>
Thanh toán
<?php endblock()?>

<?php startblock('body_attr')?>
class="product-checkout checkout-cart"
<?php endblock() ?>


<?php startblock('content')?>
<div id="checkout" class="main-content">
    <div class="wrap-banner">
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
                                <span>Thanh toán</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </nav>

        <!-- main -->
        <div id="wrapper-site">
            <div class="container">
                <div class="row">
                    <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                        <div id="main">
                            <div class="cart-grid row">
                                <div class="col-md-9 check-info">
                                    <form method="post" action="<?= url('checkout/create') ?>">
                                        <div class="checkout-personal-step">
                                            <h3 class="step-title h3 info">
                                                <span class="step-number">1</span>Thông tin khách hàng
                                            </h3>
                                        </div>
                                        <div class="content">
                                            <div class="tab-content">
                                                <div id="customer-form" class="js-customer-form">
                                                    <div>
                                                        <div class="form-group row">
                                                            <input class="form-control" name="name" type="text"
                                                                maxlength="50" placeholder="Họ và tên" required>
                                                        </div>
                                                        <div class="form-group row">
                                                            <input class="form-control" name="email" type="email"
                                                                maxlength="50" placeholder="Email" required>
                                                        </div>
                                                        <div class="form-group row">
                                                            <input class="form-control" name="phone" type="text"
                                                                maxlength="12" placeholder="Số điện thoại" required>
                                                        </div>
                                                        <div class="form-group row">
                                                            <input class="form-control" name="address" type="text"
                                                                maxlength="255" placeholder="Địa chỉ" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="checkout-personal-step">
                                            <h3 class="step-title h3 info">
                                                <span class="step-number">2</span>Hình thức thanh toán
                                            </h3>
                                        </div>
                                        <div class="content">
                                            <div class="tab-content">
                                                    <div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="pay_method" value="COD" id="flexRadioDefault1" checked>
                                                            <label class="form-check-label" for="flexRadioDefault1">
                                                                COD
                                                            </label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="pay_method" value="Banking" id="flexRadioDefault2">
                                                            <label class="form-check-label" for="flexRadioDefault2">
                                                                Banking
                                                            </label>
                                                        </div>
                                                    </div>
                                                <div class="clearfix">
                                                    <div class="row">
                                                        <button class="continue btn btn-primary pull-xs-right"
                                                            type="submit">
                                                            Continue
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="cart-grid-right col-xs-12 col-lg-3">
                                    <div class="cart-summary">
                                        <div class="cart-detailed-totals">
                                            <div class="cart-summary-products">
                                                <div class="summary-label">Có <?= count($cart) ?> sản phẩm trong giỏ
                                                    hàng</div>
                                            </div>
                                            <div class="cart-summary-line" id="cart-subtotal-products">
                                                <span class="label js-subtotal">
                                                    Tổng giá sản phẩm:
                                                </span>
                                                <span class="value"><?= number_format($total) ?> đ</span>
                                            </div>
                                            <div class="cart-summary-line" id="cart-subtotal-shipping">
                                                <span class="label">
                                                    Phí ship:
                                                </span>
                                                <span class="value">miễn phí</span>
                                                <div>
                                                    <small class="value"></small>
                                                </div>
                                            </div>
                                            <div class="cart-summary-line cart-total">
                                                <span class="label">Tổng:</span>
                                                <span class="value"><?= number_format($total) ?> đ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="block-reassurance">
                                        <ul>
                                            <li>
                                                <div class="block-reassurance-item">
                                                    <img src="<?= asset('web/img/product/check1.png') ?>"
                                                        alt="CHÍNH SÁCH BẢO MẬT (BẢO MẬT THÔNG TIN KHÁCH HÀNG)">
                                                    <span>CHÍNH SÁCH BẢO MẬT (BẢO MẬT THÔNG TIN KHÁCH HÀNG)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block-reassurance-item">
                                                    <img src="<?= asset('web/img/product/check2.png') ?>"
                                                        alt="CHÍNH SÁCH GIAO HÀNG (NHANH CHÓNG, AN TOÀN)">
                                                    <span>CHÍNH SÁCH GIAO HÀNG (NHANH CHÓNG, AN TOÀN)</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block-reassurance-item">
                                                    <img src="<?= asset('web/img/product/check3.png') ?>"
                                                        alt="CHÍNH SÁCH ĐỔI TRẢ (ĐỔI TRẢ MIỄN PHÍ TRONG 7 NGÀY)">
                                                    <span>CHÍNH SÁCH ĐỔI TRẢ (ĐỔI TRẢ MIỄN PHÍ TRONG 7 NGÀY)</span>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock()?>