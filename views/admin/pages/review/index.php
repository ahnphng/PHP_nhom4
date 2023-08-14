<?php
require_once('views/admin/layouts/default.php');
?>
<?php startblock('title') ?>
Quản lý review
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Quản lý review</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Người dùng</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Nội dung</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Sao</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Trạng thái</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đánh giá</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($reviews as $review) : ?>
                                    <tr>
                                        <td style="padding-left: 20px">
                                            <?= $review['product_name'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $review['user_name'] ?>
                                        </td>
                                        <td class="text-xs text-center">
                                            <span class="see_description" style="cursor: pointer" onclick="openModal('#review_content_<?= $review['id'] ?>')">Nhấn để xem</span>
                                            <div class="modal fade" id="review_content_<?= $review['id'] ?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Nội dung</h4>
                                                            <button type="button" class="close" onclick="closeModal('#review_content_<?= $review['id'] ?>')">
                                                                ×
                                                            </button>
                                                        </div>
                                                        <div class="modal-body modal-description">
                                                            <?= ($review['content']) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?= $review['rating'] ?>
                                        </td>
                                        <td class="text-center">
                                            <input name="status" type="checkbox" <?= $review['active'] == 1 ? 'checked' : '' ?> data-active="<?= $review['active'] ?>" data-id="<?= $review['id'] ?>" data-product-id="<?= $review['product_id'] ?>" onclick="changeStatus(this)">
                                        </td>
                                        <td>
                                            <?= dateFromStr($review['created_at'], "d/m/Y H:i:s") ?>
                                        </td>
                                        <td class="align-middle">
                                            <a href="admin/review/delete?id=<?= $review['id'] ?>" onclick="return confirm('Bạn có muốn xoá đánh giá này không ?')" type="button" class="btn btn-sm mb-0 btn-danger">
                                                Xoá
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (count($reviews) == 0) : ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="5">Không tìm thấy đánh giá</td>
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

<?php startblock('script') ?>
<script>
    function changeStatus(e) {
        let id = e.getAttribute('data-id')
        let active = 1 - e.getAttribute('data-active')
        let product_id = e.getAttribute('data-product-id')
        window.location.href = `<?= url('admin/review/status') ?>?id=${id}&active=${active}&product_id=${product_id}`
    }
</script>
<?php endblock() ?>