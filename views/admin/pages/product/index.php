<?php 
    require_once('views/admin/layouts/default.php');
?>
<?php startblock('title') ?>
    Quản lý sản phẩm
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Quản lý sản phẩm</h6>
                            <a class="btn btn-success mx-3" href="admin/product/create">Thêm mới</a>
                        </div>
                        <form method="GET">
                            <div class="input-group input-group-outline ps-3 d-flex" style="width: 30%">
                                <input type="text" name="s" placeholder="Tìm kiếm theo tiêu đề" class="form-control bg-white" value="<?= isset($_GET['s']) ? $_GET['s'] : '' ?>">
                                <button class="btn btn-info mb-0">Tìm kiếm</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ảnh</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tên sản phẩm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Mô tả</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Giá</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Số lượng</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Danh mục</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Active</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($products as $product): ?>
                                    <tr>
                                        <td style="padding-left: 20px">
                                            <?= $product['id'] ?>
                                        </td>
                                        <td>
                                            <img onclick="openModal('#product_image_<?= $product['id'] ?>')" src="<?= asset('storage/products/'.$product['thumbnail']) ?>" class="img-thumbnail" style="width: 50px">
                                            <div class="modal fade" id="product_image_<?= $product['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Thumbnail</h4>
                                                            <button type="button" class="close" onclick="closeModal('#product_image_<?= $product['id'] ?>')">
                                                                ×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="<?= asset('storage/products/'.$product['thumbnail']) ?>" class="img-thumbnail">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?= $product['name'] ?>
                                        </td>
                                        <td class="text-xs text-center">
                                            <span class="see_description" style="cursor: pointer" onclick="openModal('#product_desc_<?= $product['id'] ?>')">Nhấn để xem</span>
                                            <div class="modal fade" id="product_desc_<?= $product['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Mô tả</h4>
                                                            <button type="button" class="close" onclick="closeModal('#product_desc_<?= $product['id'] ?>')">
                                                                ×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body modal-description">
                                                            <?= utf8_decode($product['description']) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-xs text-center">
                                            <?= number_format($product['price']) ?>đ
                                        </td>
                                        <td class="text-xs text-center">
                                            <?= $product['quantity'] ?>
                                        </td>
                                        <td class="text-xs text-center">
                                            <?= $product['category_title'] ?>
                                        </td>
                                        <td class="text-xs text-center">
                                            <input name="status" type="checkbox" <?= $product['active'] == 1 ? 'checked' : '' ?> data-active="<?= $product['active'] ?>" data-id="<?= $product['id'] ?>" onclick="changeStatus(this)">
                                        </td>
                                        <td class="align-middle">
                                            <a href="admin/product/update?id=<?= $product['id'] ?>" type="button" class="btn btn-sm mb-0 btn-info" >
                                                Cập nhật
                                            </a>
                                            <a href="admin/product/delete?id=<?= $product['id'] ?>" onclick="return confirm('Bạn có muốn xoá sản phẩm này không ?')"  type="button" class="btn btn-sm mb-0 btn-danger" >
                                                Xoá
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (count($products) == 0): ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="5">Không tìm thấy sản phẩm</td>
                                    </tr>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div>
                <?= $pagination ?>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>

<?php startblock('style') ?>
<style>
    .modal-description {
        white-space: normal;
        text-align: left;
    }
</style>
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