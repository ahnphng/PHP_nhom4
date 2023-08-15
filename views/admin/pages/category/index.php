<?php 
    require_once('views/admin/layouts/default.php');
?>
<?php startblock('title') ?>
    Quản lý danh mục
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Quản lý danh mục</h6>
                            <a class="btn btn-success mx-3" href="admin/category/create">Thêm mới</a>
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Tiêu đề</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày cập nhật</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">Active</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($categories as $category): ?>
                                    <tr>
                                        <td style="padding-left: 20px">
                                            <?= $category['id'] ?>
                                        </td>
                                        <td class="text-center">
                                            <?= $category['title'] ?>
                                        </td>
                                        <td>
                                            <?= dateFromStr($category['updated_at'], "d/m/Y H:i:s") ?>
                                        </td>
                                        <td class="text-center">
                                            <input name="status" type="checkbox" <?= $category['active'] == 1 ? 'checked' : '' ?> data-active="<?= $category['active'] ?>" data-id="<?= $category['id'] ?>" onclick="changeStatus(this)">
                                        </td>
                                        <td class="align-middle">
                                            <a href="admin/category/update?id=<?= $category['id'] ?>" type="button" class="btn btn-sm mb-0 btn-info" >
                                                Cập nhật
                                            </a>
                                            <a href="admin/category/delete?id=<?= $category['id'] ?>" onclick="return confirm('Bạn có muốn xoá danh mục này không ?')"  type="button" class="btn btn-sm mb-0 btn-danger" >
                                                Xoá
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                                <?php if (count($categories) == 0): ?>
                                    <tr>
                                        <td></td>
                                        <td colspan="5">Không tìm thấy danh mục</td>
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
        let active = 1 -e.getAttribute('data-active')
        window.location.href = `<?= url('admin/category/status') ?>?id=${id}&active=${active}`
    }
</script>
<?php endblock() ?>