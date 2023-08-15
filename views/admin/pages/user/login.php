<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <base href="BASE_PATH">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="web/images/favicon.webp" type="image/png" />
    <title>
        Đăng nhập quản trị viên
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
    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1528458909336-e7a0adfed0a5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8Y2xvdGh8ZW58MHx8MHx8&w=1000&q=80');">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header pb-0">
                                <h4 class="font-weight-bolder text-center">Đăng nhập</h4>
                                <span class="text-danger" id="error-msg"></span>
                            </div>
                            <div class="card-body pt-0">
                                <form role="form" class="text-start" autocomplete="off" method="post" action="admin/auth/handleLogin">
                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="rememberMe" checked>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Ghi nhớ</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Đăng nhập</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="web/assets/js/jquery-2.2.1.min.js"></script>
    <script src="public/admin/assets/js/core/popper.min.js"></script>
    <script src="public/admin/assets/js/core/bootstrap.min.js"></script>
    <script src="public/admin/assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="public/admin/assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="admin/js/toastr.min.js"></script>

    <script>
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="public/admin/assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
