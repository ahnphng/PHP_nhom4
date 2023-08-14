<?php 
    require_once('views/admin/layouts/default.php');
    if (Flash::has('errors')) {
        $errors = Flash::get('errors');
    }
?>
<?php startblock('title') ?>
    Thêm mới người dùng 
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Thêm mới người dùng</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form role="form" class="text-start p-4" autocomplete="off" method="post" action="<?= url('admin/user/handleCreate') ?>">
                        <label class="form-label">Tên</label>
                        <div class="input-group input-group-outline my-3">
                            <input type="text" name="name" class="form-control" value="<?= isset($errors['form_data']['name']) ? $errors['form_data']['name'] : '' ?>">
                        </div>
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline my-3">
                            <input type="email" name="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" value="<?= isset($errors['form_data']['email']) ? $errors['form_data']['email'] : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['email']) ? $errors['email'] : '' ?>
                            </div>
                        </div>
                        <label class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password" class="form-control  <?= isset($errors['password']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['password']) ? $errors['password'] : '' ?>
                            </div>
                        </div>
                        <label class="form-label">Nhập lại mật khẩu <span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="password" name="password_confirmation" class="form-control <?= isset($errors['password_confirmation']) ? 'is-invalid' : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['password_confirmation']) ? $errors['password_confirmation'] : '' ?>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>