<!DOCTYPE html>
<html>
<head>
    <title>Quản lý sản phẩm</title>
    <style>
        .modal-description {
            white-space: normal;
            text-align: left;
        }
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
                                <h6 class="text-white text-capitalize ps-3">Quản lý sản phẩm</h6>
                                <a class="btn btn-success mx-3" href="admin/product/create">Thêm mới</a>
                            </div>
                            <form method="GET">
                                <div class="input-group input-group-outline ps-3 d-flex" style="width: 30%">
                                    <input type="text" name="s" placeholder="Tìm kiếm theo tiêu đề" class="form-control bg-white">
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
                                    <!-- Loop through products -->
                                    <tr>
                                        <td style="padding-left: 20px"><!-- Product ID --></td>
                                        <td>
                                            <img onclick="openModal('#product_image_')" src="storage/products" class="img-thumbnail" style="width: 50px">
                                            <div class="modal fade" id="product_image_" tabindex="-1" role="dialog">
                                                <!-- Modal content here -->
                                            </div>
                                        </td>
                                        <td class="text-center"><!-- Product Name --></td>
                                        <td class="text-xs text-center">
                                            <span class="see_description" style="cursor: pointer" onclick="openModal('#product_desc_')">Nhấn để xem</span>
                                            <div class="modal fade" id="product_desc_" tabindex="-1" role="dialog">
                                                <!-- Modal content here -->
                                            </div>
                                        </td>
                                        <td class="text-xs text-center"><!-- Product Price --></td>
                                        <td class="text-xs text-center"><!-- Product Quantity --></td>
                                        <td class="text-xs text-center"><!-- Category Title --></td>
                                        <td class="text-xs text-center">
                                            <input name="status" type="checkbox">
                                        </td>
                                        <td class="align-middle">
                                            <a href="admin/product/update?id=" type="button" class="btn btn-sm mb-0 btn-info" >
                                                Cập nhật
                                            </a>
                                            <a href="admin/product/delete?id=" onclick="return confirm('Bạn có muốn xoá sản phẩm này không ?')"  type="button" class="btn btn-sm mb-0 btn-danger" >
                                                Xoá
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- End loop -->
                                    <tr>
                                        <td></td>
                                        <td colspan="5">Không tìm thấy sản phẩm</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <!-- Pagination -->
            </div>
        </div>
    </div>
    <script>
        function changeStatus(e) {
            let id = e.getAttribute('data-id');
            let active = 1 - e.getAttribute('data-active');
            window.location.href = 'url("admin/product/status")?id=' + id + '&active=' + active;
        }
    </script>
</body>
</html>
