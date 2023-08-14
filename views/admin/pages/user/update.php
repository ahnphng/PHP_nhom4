<?php 
    require_once('views/admin/layouts/default.php');
    if (Flash::has('errors')) {
        $errors = Flash::get('errors');
    }
?>
<?php startblock('title') ?>
    Cập nhật người dùng
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Cập nhật người dùng</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form role="form" class="text-start p-4" autocomplete="off" method="post" action="<?= url('admin/user/handleUpdate?id='. $user['id']) ?>">
                        <label class="form-label">Tên</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="name" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= isset($errors['form_data']['name']) ? $errors['form_data']['name'] : $user['name'] ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['name']) ? $errors['name'] : '' ?>
                            </div>
                        </div>
                        <label class="form-label">Email</label>
                        <div class="input-group input-group-outline my-3">
                            <input disabled type="email" name="email" class="form-control" value="<?= $user['email'] ?>">
                        </div>
                        <label class="form-label">Mật khẩu</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="hidden" name="oldPassword" value="<?= $user['password'] ?>">
                            <input type="password" name="password" class="form-control  <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['password']) ? $errors['password'] : '' ?>
                            </div>
                        </div>
                        <label class="form-label">Nhập lại mật khẩu</label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password_confirmation" class="form-control <?= isset($errors['password_confirmation']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['password_confirmation']) ? $errors['password_confirmation'] : '' ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>