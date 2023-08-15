<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết đơn hàng</title>
    <!-- Include your CSS and other meta tags here -->
</head>
<body>
    <div class="container-fluid py-4">
        <div class="mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h6 mb-0>Thông tin đơn hàng</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                    <div class="col-6">
                        <table>
                            <tr>
                                <td class="text-bold">Tên người đặt:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-bold">SĐT người đặt:</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="text-bold">Địa chỉ:</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr style="border: 1px solid grey;">
                <table>
                    <tr>
                        <td class="text-bold">Thời gian đặt đơn hàng: </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="text-bold">Tổng hoá đơn:</td>
                        <td> đ</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>Sản phẩm</h6>
                            <p class="text-sm mb-0">
                                <span class="font-weight-bold ms-1"></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                        Tên sản phẩm</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                        Số lượng</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2 text-center">
                                        Màu sắc</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Giá 1 sản phẩm</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="px-2 py-1">
                                        </div>
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                    <td class="text-center">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
                <div class="card-header pb-0">
                    <h6>Trạng thái đơn hàng</h6>
                        <a class="btn btn-sm btn-danger" href="" onclick="return confirm('Bạn chắc chắn muốn huỷ đơn hàng này không ?')">Huỷ đơn hàng</a>
                </div>
                <div class="card-body p-3">
                    <div class="timeline timeline-one-side">
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-success text-gradient">notifications</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn hàng được tạo thành công</h6>
                                <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-dark text-gradient">payments</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Xác nhận đơn hàng</h6>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                        <a href="admin/order/update" class="btn btn-sm btn-primary mt-4" onclick="return confirm('Xác nhận đơn hàng này ?')">Xác nhận đơn hàng ngay</a>
                               
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                                
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-info text-gradient">shopping_cart</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn hàng bắt đầu giao</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                        <a href="admin/order/update" class="btn btn-sm btn-primary mt-4" onclick="return confirm('Xác nhận bắt đầu đơn hàng này ?')">Xác nhận bắt đầu giao đơn hàng</a>
                                
                            </div>
                        </div>
                        <div class="timeline-block mb-3">
                            <span class="timeline-step">
                                <i class="material-icons text-warning text-gradient">credit_card</i>
                            </span>
                            <div class="timeline-content">
                                <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn hàng đã giao xong</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">---</p>
                                        <a href="admin/order/update" class="btn btn-sm btn-primary mt-4" onclick="return confirm('Xác nhận đã giao xong đơn hàng này ?')">Xác nhận đã giao xong giao đơn hàng</a>
                               
                            </div>
                        </div>
                            <div class="timeline-block timeline-block-end">
                                <span class="timeline-step">
                                    <i class="material-icons text-danger text-gradient">code</i>
                                </span>
                                <div class="timeline-content">
                                    <h6 class="text-dark text-sm font-weight-bold mb-0">Đơn bị huỷ</h6>
                                    <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"></p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script>
        function changeStatus(e) {
            let id = e.getAttribute('data-id')
            let active = 1 - e.getAttribute('data-active')
            window.location.href = `<?= url('admin/product/status') ?>?id=${id}&active=${active}`
        }
    </script>
</body>
</html>
