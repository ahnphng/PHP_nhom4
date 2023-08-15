<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <base href="BASE_PATH">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="web/images/favicon.webp" type="image/png" />
    <title>
        Cập nhật người dùng
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="public/admin/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="public/admin/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="public/admin/assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
    <link href="admin/assets/css/toastr.min.css" type="text/css" rel="stylesheet">
</head>

<body class="bg-gray-200">
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
                        <form role="form" class="text-start p-4" autocomplete="off" method="post" action="admin/user/handleUpdate?id=<?= $user['id'] ?>">
                            <label class="form-label">Tên</label>
                            <div class="input-group input-group-outline my-3">
                                <input type="text" name="name" class="form-control is-invalid" value="">
                                <div class="invalid-feedback">
                                    
                                </div>
                            </div>
                            <label class="form-label">Email</label>
                            <div class="input-group input-group-outline my-3">
                                <input disabled type="email" name="email" class="form-control" value="">
                            </div>
                            <label class="form-label">Mật khẩu</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="hidden" name="oldPassword" value="">
                                <input type="password" name="password" class="form-control is-invalid">
                                <div class="invalid-feedback">
                                    
                                </div>
                            </div>
                            <label class="form-label">Nhập lại mật khẩu</label>
                            <div class="input-group input-group-outline mb-3">
                                <input type="password" name="password_confirmation" class="form-control is-invalid">
                                <div class="invalid-feedback">
                                    
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
    <script src="web/assets/js/jquery-2.2.1.min.js"></script>
    <script src="public/admin/assets/js/core/popper.min.js"></script>
    <script src="public/admin/assets/js/core/bootstrap.min.js"></script>
    <script src="public/admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="public/admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="admin/js/toastr.min.js"></script>

    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

        // Mã JavaScript tương ứng với thông báo sẽ được giữ nguyên ở đây
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="public/admin/assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
