<!DOCTYPE html>
<html>
<head>
    <title>Quản lý review</title>
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
                                    <!-- Thay thế vòng lặp dưới đây với dữ liệu từ PHP -->
                                    <tr>
                                        <td style="padding-left: 20px">
                                            Product Name
                                        </td>
                                        <td class="text-center">
                                            User Name
                                        </td>
                                        <td class="text-xs text-center">
                                            <span class="see_description" style="cursor: pointer">Nhấn để xem</span>
                                            <div class="modal fade" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Nội dung</h4>
                                                            <button type="button" class="close">×</button>
                                                        </div>
                                                        <div class="modal-body modal-description">
                                                            Content
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            Rating
                                        </td>
                                        <td class="text-center">
                                            <input name="status" type="checkbox" data-active="1" data-id="REVIEW_ID" data-product-id="PRODUCT_ID">
                                        </td>
                                        <td>
                                            Date
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" onclick="return confirm('Bạn có muốn xoá đánh giá này không ?')" type="button" class="btn btn-sm mb-0 btn-danger">
                                                Xoá
                                            </a>
                                        </td>
                                    </tr>
                                    <!-- Kết thúc vòng lặp -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- Thêm dấu chấm than và phần dữ liệu phân trang -->
    </div>
</body>
</html>
<script>
    // Thêm mã JavaScript của bạn ở đây
</script>
