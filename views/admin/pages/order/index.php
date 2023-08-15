<?php 
    require_once('views/admin/layouts/default.php');
    require_once('config/order_status.php');
?>
<?php startblock('title') ?>
    Quản lý đơn hàng
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Quản lý đơn hàng</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tên người đặt</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">SĐT người đặt</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tổng hoá đơn</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Loại thanh toán</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Trạng thái</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Thời gian đặt hàng</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($orders as $order): ?>
                                    <tr>
                                        <td style="padding-left: 20px">
                                            <?= $order['id'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $order['name'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $order['phone'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= number_format($order['total']) ?>đ
                                        </td>
                                        <td class="text-center">
                                            <?= $order['pay_method'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= getOrderStatus($order['status'])['label'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= dateFromStr($order['created_at'], "d/m/Y H:i:s") ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="admin/order/detail/<?= $order['id'] ?>" type="button" class="btn btn-sm mb-0 btn-info" >
                                                Chi tiết
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
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
        let active = 1 -e.getAttribute('data-active')
        window.location.href = `<?= url('admin/product/status') ?>?id=${id}&active=${active}`
    }
</script>
<?php endblock() ?>