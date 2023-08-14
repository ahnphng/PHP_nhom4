<?php 
    require_once('views/admin/layouts/default.php');
    if (Flash::has('errors')) {
        $errors = Flash::get('errors');
    }
?>
<?php startblock('title') ?>
    Thêm mới sản phẩm
<?php endblock() ?>

<?php startblock('content') ?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="text-white text-capitalize ps-3">Thêm mới sản phẩm</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form role="form" class="text-start p-4" autocomplete="off" method="post" action="<?= url('admin/product/handleCreate') ?>" enctype="multipart/form-data">
                        <label>Tên sản phẩm <span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="text" name="name" placeholder="Tiêu đề" class="form-control <?= isset($errors['name']) ? 'is-invalid' : '' ?>" value="<?= isset($errors['form_data']) ? $errors['form_data']['name'] : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['name']) ? $errors['name'] : '' ?>
                            </div>
                        </div>
                        <label>Danh mục<span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <select name="category_id" class="form-control <?= isset($errors['category_id']) ? 'is-invalid' : '' ?>">
                                <option value="">Chọn danh mục</option>
                                <?php foreach($categories as $category): ?>
                                    <option value="<?= $category['id'] ?>" <?= isset($errors['form_data']) && $errors['form_data']['category_id'] == $category['id'] ? 'selected' : '' ?>><?= $category['title'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errors['category_id']) ? $errors['category_id'] : '' ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check" style="padding-left: 0px">
                                <input type="checkbox" class="form-check-input" id="exampleCheck2" name="active" <?= isset($errors['form_data']['active']) ? 'checked' : '' ?>>
                                <label class="form-check-label" for="exampleCheck2">Active</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check" style="padding-left: 0px">
                                <input type="hidden" name="colors" value="">
                                <input type="checkbox" class="form-check-input" id="exampleCheck3" onclick="displayColor(this)">
                                <label class="form-check-label" for="exampleCheck3">Màu sắc</label>
                            </div>
                            <div id="div-color" style="display: none;">
                                <label for="">Chọn màu</label>
                                <div class="form-check">
                                    <?php
                                        require_once 'config/color.php';
                                        foreach (COLOR_PRODUCT as $color):
                                    ?>
                                    <div>
                                        <input type="checkbox" class="form-check-input input-color" id="color_<?= $color['type'] ?>" data-type="<?= $color['type'] ?>" onclick="checkColor()">
                                        <label class="form-check-label" style="font-weight:600; color: <?= $color['hex'] ?>" for="color_<?= $color['type'] ?>"><?= $color['label'] ?></label>
                                    </div>
                                    <?php endforeach ?>
                                </div>
                            </div>
                            <script>
                                function displayColor(e) {
                                    if (e.checked) {
                                        document.getElementById('div-color').style.display = 'block'
                                    } else {
                                        document.getElementById('div-color').style.display = 'none'
                                    }
                                }
                                function checkColor() {
                                    var color = []
                                    document.querySelectorAll('.input-color').forEach((e) => {
                                        if (e.checked) {
                                            color.push(e.getAttribute('data-type'))
                                        }
                                    })
                                    document.querySelector('input[name="colors"]').value = color.join(',')
                                }
                            </script>
                        </div>
                        <label>Giá<span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="number" name="price" placeholder="Giá" class="form-control <?= isset($errors['price']) ? 'is-invalid' : '' ?>" value="<?= isset($errors['form_data']) ? $errors['form_data']['price'] : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['price']) ? $errors['price'] : '' ?>
                            </div>
                        </div>
                        <label>Số lượng <span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="number" min="0" name="quantity" placeholder="Số lượng" class="form-control <?= isset($errors['quantity']) ? 'is-invalid' : '' ?>" value="<?= isset($errors['form_data']) ? $errors['form_data']['quantity'] : '' ?>">
                            <div class="invalid-feedback">
                                <?= isset($errors['quantity']) ? $errors['quantity'] : '' ?>
                            </div>
                        </div>
                        <label>Mô tả</label>
                        <div class="input-group input-group-outline mb-3">
                            <textarea id="description" name="description" placeholder="Mô tả sản phẩm" class="form-control"><?= isset($errors['form_data']) ? $errors['form_data']['description'] : '' ?></textarea>
                        </div>
                        <label>Chọn ảnh <span class="text-danger">*</span></label>
                        <div class="input-group input-group-outline mb-3">
                            <input type="file" name="thumbnail" class="form-control <?= isset($errors['thumbnail']) ? 'is-invalid' : '' ?>" accept="image/jpg, image/png, image/jpeg, image/webp">
                            <div class="invalid-feedback">
                                <?= isset($errors['thumbnail']) ? $errors['thumbnail'] : '' ?>
                            </div>
                        </div>
                        <img src="" id="img-preview" alt="" style="width:50%">
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

<?php startblock('script') ?>
    <script src="https://cdn.tiny.cloud/1/jpauit33owsfr7h0x7ye1so78ahiho5v9l5mbnrumsog4xhn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
        selector: '#description',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        entity_encoding : "raw",
        });
    </script>
<?php endblock() ?>