<?php 
    require_once('views/admin/layouts/default.php');
    require_once('config/color.php');
?>
<?php startblock('title') ?>
Chi tiết đơn hàng
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="mb-4">
        <div class="card">
            <div class="card-header pb-0">
                <h6 mb-0>Thông tin đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <table>
                            <tr>
                                <td class="text-bold">Tên người đặt:</td>
                                <td><?= $order['name'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-bold">SĐT người đặt:</td>
                                <td><?= $order['phone'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-bold">Địa chỉ:</td>
                                <td><?= $order['address'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr style="border: 1px solid grey;">
                <table>
                    <tr>
                        <td class="text-bold">Thời gian đặt đơn hàng: </td>
                        <td><?= dateFromStr($order['created_at'], "d/m/Y H:i:s") ?></td>
                    </tr>
                    <tr>
                        <td class="text-bold">Tổng hoá đơn:</td>
                        <td><?= number_format($order['total']) ?> đ</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Sản phẩm</h6>
                            <p class="text-sm mb-0">
                                <span class="font-weight-bold ms-1"><?= count($order_details) ?> </span>sản phẩm
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        Tên sản phẩm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                        Số lượng</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                        Màu sắc</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Giá 1 sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($order_details as $order_detail): ?>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1">
                                            <?= $order_detail['product_id'] ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <?= $order_detail['product_name'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $order_detail['quantity'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $order_detail['color'] ? getColor($order_detail['color'])['label'] : 'Mặc định' ?>
                                    </td>
                                    <td class="text-center">
                                        <?= number_format($order_detail['price']) ?> đ
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Trạng thái đơn hàng</h6>
                    <?php if ($order['delivered_at'] == null && $order['cancelled_at'] == null): ?>
                        <a class="btn btn-sm btn-danger" href="<?= url('admin/order/update', ['id' => $order['id'], 'status' => -1]) ?>" onclick="return confirm('Bạn chắc chắn muốn huỷ đơn hàng này không ?')">Huỷ đơn hàng</a>
                    <?php endif ?>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-success text-gradient">notifications</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn hàng được tạo thành công</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $order['created_at'] ?></p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-dark text-gradient">payments</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Xác nhận đơn hàng</h6>
                                <?php if ($order['confirmed_at'] == null): ?>
                                    <?php if ($order['cancelled_at'] != null): ?>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                    <?php elseif ($order['shipped_at'] == null): ?>
                                        <a href="<?= url('admin/order/update', ['id' => $order['id'], 'status' => 2]) ?>" class="btn btn-sm btn-primary mt-4" onclick="return confirm('Xác nhận đơn hàng này ?')">Xác nhận đơn hàng ngay</a>
                                    <?php endif ?>
                                <?php else: ?>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $order['confirmed_at'] ?></p>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-info text-gradient">shopping_cart</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn hàng bắt đầu giao</h6>
                                <?php if ($order['confirmed_at'] == null ): ?>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                <?php else: ?>
                                    <?php if ($order['shipped_at'] != null): ?>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $order['shipped_at'] ?></p>
                                    <?php elseif ($order['cancelled_at'] != null): ?>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                    <?php elseif ($order['shipped_at'] == null): ?>
                                        <a href="<?= url('admin/order/update', ['id' => $order['id'], 'status' => 3]) ?>" class="btn btn-sm btn-primary mt-4" onclick="return confirm('Xác nhận bắt đầu đơn hàng này ?')">Xác nhận bắt đầu giao đơn hàng</a>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-warning text-gradient">credit_card</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn hàng đã giao xong</h6>
                                <?php if ($order['shipped_at'] == null): ?>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                <?php else: ?>
                                    <?php if($order['delivered_at'] != null): ?>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $order['delivered_at'] ?></p>
                                    <?php elseif ($order['cancelled_at'] != null): ?>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                    <?php elseif ($order['delivered_at'] == null): ?>
                                        <a href="<?= url('admin/order/update', ['id' => $order['id'], 'status' => 4]) ?>" class="btn btn-sm btn-primary mt-4" onclick="return confirm('Xác nhận đã giao xong đơn hàng này ?')">Xác nhận đã giao xong giao đơn hàng</a>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                        </div>
                        <?php if ($order['cancelled_at'] != null): ?>
                            <div class="timeline-block timeline-block-end">
                                <span class="timeline-step">
                                    <i class="material-icons text-danger text-gradient">code</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn bị huỷ</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?= $order['cancelled_at'] ?></p>
                                </div>
                            </div>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('script') ?>
<script>
    function changeStatus(e) {
        let id = e.getAttribute('data-id')
        let active = 1 - e.getAttribute('data-active')
        window.location.href = `<?= url('admin/product/status') ?>?id=${id}&active=${active}`
    }
</script>
<?php endblock() ?>