<!DOCTYPE html>
<html>
<head>
    <title>Cập nhật sản phẩm</title>
    <style>
        /* Thêm CSS của bạn vào đây */
    </style>
</head>
<body>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <h6 class="text-white text-capitalize ps-3">Cập nhật sản phẩm</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <form role="form" class="text-start p-4" autocomplete="off" method="post" action="admin/product/handleUpdate?id=PRODUCT_ID" enctype="multipart/form-data">
                            <label>Tên sản phẩm <span class="text-danger">*</span></label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="text" name="name" placeholder="Tiêu đề" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <label>Danh mục<span class="text-danger">*</span></label>
                            <div class="input-group input-group-outline mb-3">
                                <select name="category_id" class="form-control">
                                    <option value="">Chọn danh mục</option>
                                    <!-- Lặp qua danh sách danh mục -->
                                    <option value="CATEGORY_ID">Tên danh mục</option>
                                    <!-- Kết thúc lặp -->
                                </select>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <div class="form-check" style="padding-left: 0px">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" name="active">
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
                                        <!-- Lặp qua danh sách màu -->
                                        <div>
                                            <input type="checkbox" class="form-check-input input-color" id="color_TYPE" data-type="TYPE" onclick="checkColor()">
                                            <label class="form-check-label" style="font-weight:600; color: HEX_COLOR" for="color_TYPE">Tên màu</label>
                                        </div>
                                        <!-- Kết thúc lặp -->
                                    </div>
                                </div>
                                <script>
                                    // Đặt các hàm JavaScript ở đây
                                </script>
                            </div>
                            <label>Giá<span class="text-danger">*</span></label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="number" name="price" placeholder="Giá" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <label>Số lượng <span class="text-danger">*</span></label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="number" min="0" name="quantity" placeholder="Số lượng" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <label>Mô tả</label>
                            <div class="input-group input-group-outline mb-3">
                                <textarea id="description" name="description" placeholder="Mô tả sản phẩm" class="form-control"></textarea>
                            </div>
                            <label>Chọn ảnh</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="file" name="thumbnail" class="form-control">
                                <div class="invalid-feedback"></div>
                            </div>
                            <img src="public/storage/products/PRODUCT_THUMBNAIL" id="img-preview" alt="" style="width:50%">
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
