<!--Carousel Wrapper-->
<?php
require_once 'views/web/layouts/default.php';
?>
<?php startblock('title')?>
Giỏ hàng
<?php endblock()?>

<?php startblock('body_attr')?>
class="product-cart checkout-cart blog"
<?php endblock()?>


<?php startblock('content')?>
<!-- main content -->
<div class="main-content" id="cart">
    <!-- main -->
    <div id="wrapper-site">
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
                                <span>Giỏ hàng</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div id="content-wrapper" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 onecol">
                    <section id="main">
                        <div class="cart-grid row">
                            <div class="col-md-9 col-xs-12 check-info">
                                <h1 class="title-page">Giỏ hàng</h1>
                                <div class="cart-container">
                                    <div class="cart-overview js-cart">
                                        <ul class="cart-items">
                                            <?php 
                                                $total = 0;
                                                foreach ($cart as $c_id => $c):
                                                $total_once = $c['quantity'] * $c['product-detail']['price'];
                                                $total += $total_once;
                                            ?>
                                            <li class="cart-item">
                                                <div class="product-line-grid row justify-content-between">
                                                    <!--  product left content: image-->
                                                    <div class="product-line-grid-left col-md-2">
                                                        <span class="product-image media-middle">
                                                            <a href="<?= url('san-pham/'.$c['product-detail']['id']) ?>">
                                                                <img class="img-fluid" src="<?= asset('storage/products/'.$c['product-detail']['thumbnail']) ?>" alt="<?= $c['product-detail']['name'] ?>">
                                                            </a>
                                                        </span>
                                                    </div>
                                                    <div class="product-line-grid-body col-md-6">
                                                        <div class="product-line-info">
                                                            <a class="label" href="<?= url('san-pham/'.$c['product-detail']['id']) ?>" data-id_customization="0"><?= $c['product-detail']['name'] ?></a>
                                                        </div>
                                                        <div>Màu sắc: <?= $c['color']['label'] ?></div>
                                                        <div class="product-line-info product-price">
                                                            <span class="value"><?= number_format($c['product-detail']['price']) ?> Đ</span>
                                                        </div>
                                                        <!-- <div class="product-line-info">
                                                            <span class="label-atrr">Color:</span>
                                                            <span class="value">Blue</span>
                                                        </div> -->
                                                    </div>
                                                    <div class="product-line-grid-right text-center product-line-actions col-md-4">
                                                        <div class="row">
                                                            <div class="col-md-5 col qty">
                                                                <div class="label">Số lượng:</div>
                                                                <div class="quantity">
                                                                    <input type="number" id="input_<?= $c_id ?>" min="1" max="<?= $c['product-detail']['quantity'] ?>" value="<?= $c['quantity'] ?>" class="input-group form-control" onchange="editCart(this, '<?= $c_id ?>')">
                                                                    <span class="input-group-btn-vertical">
                                                                        <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-up" type="button" onclick="plusItem('<?= $c_id ?>')">
                                                                            +
                                                                        </button>
                                                                        <button class="btn btn-touchspin js-touchspin bootstrap-touchspin-down" type="button" onclick="minusItem('<?= $c_id ?>')">
                                                                            -
                                                                        </button>
                                                                    </span>
                                                                    <script>
                                                                        function editCart(e, product_id) {
                                                                            let min = parseInt(e.getAttribute('min'))
                                                                            let max = parseInt(e.getAttribute('max'))
                                                                            let val = parseInt(e.value)
                                                                            if (val > max) {
                                                                                val = max
                                                                            }
                                                                            if (val < min) {
                                                                                val = min
                                                                            }
                                                                            window.location.href = `<?= url('cart/edit') ?>?product_id=${product_id}&quantity=${val}`
                                                                        }
                                                                        function plusItem(product_id) {
                                                                            let e = document.getElementById('input_' + product_id)
                                                                            let min = parseInt(e.getAttribute('min'))
                                                                            let max = parseInt(e.getAttribute('max'))
                                                                            let val = parseInt(e.value)
                                                                            val += 1
                                                                            if (val > max) {
                                                                                val = max
                                                                            }
                                                                            window.location.href = `<?= url('cart/edit') ?>?product_id=${product_id}&quantity=${val}`
                                                                        }
                                                                        function minusItem(product_id) {
                                                                            let e = document.getElementById('input_' + product_id)
                                                                            let min = parseInt(e.getAttribute('min'))
                                                                            let max = parseInt(e.getAttribute('max'))
                                                                            let val = parseInt(e.value)
                                                                            val -= 1
                                                                            if (val < min) {
                                                                                val = min
                                                                            }
                                                                            window.location.href = `<?= url('cart/edit') ?>?product_id=${product_id}&quantity=${val}`
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 col price">
                                                                <div class="label">Tổng:</div>
                                                                <div class="product-price total">
                                                                    <?= number_format($total_once) ?> đ
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col text-xs-right align-self-end">
                                                                <div class="cart-line-product-actions ">
                                                                    <a class="remove-from-cart" rel="nofollow" href="<?= url('cart/edit', ['product_id' => $c_id, 'quantity' => -1]) ?>" data-link-action="delete-from-cart" data-id-product="1">
                                                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                </div>
                                <a href="<?= url('checkout') ?>" class="continue btn btn-primary pull-xs-right">
                                    Thanh toán
                                </a>
                            </div>
                            <div class="cart-grid-right col-xs-12 col-lg-3">
                                <div class="cart-summary">
                                    <div class="cart-detailed-totals">
                                        <div class="cart-summary-products">
                                            <div class="summary-label">Có <?= count($cart) ?> sản phẩm trong giỏ hàng</div>
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
                                                <img src="<?= asset('web/img/product/check1.png') ?>" alt="CHÍNH SÁCH BẢO MẬT (BẢO MẬT THÔNG TIN KHÁCH HÀNG)">
                                                <span>CHÍNH SÁCH BẢO MẬT (BẢO MẬT THÔNG TIN KHÁCH HÀNG)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <img src="<?= asset('web/img/product/check2.png') ?>" alt="CHÍNH SÁCH GIAO HÀNG (NHANH CHÓNG, AN TOÀN)">
                                                <span>CHÍNH SÁCH GIAO HÀNG (NHANH CHÓNG, AN TOÀN)</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="block-reassurance-item">
                                                <img src="<?= asset('web/img/product/check3.png') ?>" alt="CHÍNH SÁCH ĐỔI TRẢ (ĐỔI TRẢ MIỄN PHÍ TRONG 7 NGÀY)">
                                                <span>CHÍNH SÁCH ĐỔI TRẢ (ĐỔI TRẢ MIỄN PHÍ TRONG 7 NGÀY)</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock()?>