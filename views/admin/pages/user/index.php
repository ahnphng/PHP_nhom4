<?php 
    require_once('views/admin/layouts/default.php');
?>
<?php startblock('title') ?>
    Quản lý người dùng
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Quản lý người dùng</h6>
                            <a class="btn btn-success mx-3" href="admin/user/create">Thêm mới</a>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày tạo</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($users as $user): ?>
                                    <tr>
                                        <td>
                                            <p class="text-xs font-weight-bold pt-2 px-3"><?= $user['id'] ?></p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $user['name'] ?></p>
                                        </td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?= $user['email'] ?></h6>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?= $user['created_at'] ?></p>
                                        </td>
                                        <td class="align-middle">
                                            <a href="admin/user/update?id=<?= $user['id'] ?>" type="button" class="btn btn-sm mb-0 btn-info" >
                                                Cập nhật
                                            </a>
                                            <a <?= Auth::getUser('admin')['id'] == $user['id'] ? 'href="javascript:void(0)" onclick="alert(\'Không thể xoá chính mình!\')"' : 'href="admin/user/delete?id='.$user['id'].'" onclick="return confirm(\'Bạn có muốn xoá người dùng này không ?\')"' ?>  type="button" class="btn btn-sm mb-0 btn-danger" >
                                                Xoá
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