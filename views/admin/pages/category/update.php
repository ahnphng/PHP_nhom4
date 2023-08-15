<?php 
    require_once('views/admin/layouts/default.php');
    if (Flash::has('errors')) {
        $errors = Flash::get('errors');
    }
?>
<?php startblock('title') ?>
    Cập nhật danh mục
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Cập nhật danh mục</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form role="form" class="text-start p-4" autocomplete="off" method="post" action="<?= url('admin/category/handleUpdate?id='.$category['id']) ?>" enctype="multipart/form-data">
                        <label>Tiêu đề <span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="title" placeholder="Tiêu đề" class="form-control <?= isset($errors['title']) ? 'is-invalid' : '' ?>" value="<?= isset($errors['form_data']) ? $errors['form_data']['title'] : $category['title'] ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['title']) ? $errors['title'] : '' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check ml-2">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" name="active" <?= isset($errors['form_data']['active']) ? 'checked' : ($category['active'] == 1 ? 'checked' : '') ?>>
                                <label class="form-check-label" for="exampleCheck2">Active</label>
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