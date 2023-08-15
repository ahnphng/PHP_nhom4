<!--Carousel Wrapper-->
<?php
require_once 'views/web/layouts/default.php';
require_once 'config/color.php';
require_once 'config/order_status.php';
?>
<?php startblock('title') ?>
Đơn hàng của tôi
<?php endblock() ?>

<?php startblock('body_attr') ?>
class="user-wishlist blog"
<?php endblock() ?>


<?php startblock('content') ?>
<div class="main-content">
    <div class="wrap-banner">
        <!-- breadcrumb -->
        <nav class="breadcrumb-bg">
            <div class="container no-index">
                <div class="breadcrumb">
                    <ol>
                        <li>
                            <a href="<?= url('') ?>">
                                <span>Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span>
                                    Đơn hàng của tôi
                                </span>
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
                            <div id="mywishlist">
                                <h1 class="title-page">Đơn hàng của tôi</h1>
                                <div id="block-history" class="block-center">
                                    <table class="std table">
                                        <thead>
                                            <tr>
                                                <th class="first_item">STT</th>
                                                <th class="item mywishlist_first">Sản phẩm</th>
                                                <th class="item mywishlist_first">Tổng hoá đơn</th>
                                                <th class="item mywishlist_first">Thanh toán</th>
                                                <th class="item mywishlist_first">Trạng thái</th>
                                                <th class="item mywishlist_first">Ngày đặt</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; foreach ($orders as $order): ?>
                                            <tr id="wishlist_1">
                                                <td><?php echo $i; $i++; ?></td>
                                                <td>
                                                    <ul>
                                                        <?php foreach ($order['details'] as $detail): ?>
                                                            <li>Tên: <?= $detail['product_name'] ?>, Số lượng: <?= $detail['quantity'] ?>, Màu sắc: <?= $detail['color'] ? getColor($detail['color'])['label'] : 'Mặc định' ?></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                    
                                                </td>
                                                <td class="bold align_center">
                                                    <?= number_format($order['total']) ?> đ
                                                </td>
                                                <td><?= $order['pay_method'] ?></td>
                                                <td><?= getOrderStatus($order['status'])['label'] ?></td>
                                                <td><?= dateFromStr($order['created_at'], "d/m/Y H:i:s") ?></td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<?php endblock() ?>