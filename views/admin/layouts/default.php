<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo BASE_PATH ?>">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?= asset('storage/cozy_logo.png') ?>" type="image/png" />
    <title>
    Cozy Home | <?php defineblock('title') ?>
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="<?= asset('admin/assets/css/nucleo-icons.css') ?>" rel="stylesheet" />
    <link href="<?= asset('admin/assets/css/nucleo-svg.css') ?>" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= asset('admin/assets/css/material-dashboard.css') ?>" rel="stylesheet" />
    <link href="<?= asset('admin/assets/css/main.css') ?>" rel="stylesheet" />
    <link href="<?= asset('admin/assets/css/toastr.min.css') ?>" type="text/css" rel="stylesheet">
</head>

<body class="g-sidenav-show  bg-gray-200">
    <?php include('views/admin/layouts/includes/_aside.php') ?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php include('views/admin/layouts/includes/_nav.php') ?>
        <!-- End Navbar -->
        <?php defineblock('content') ?>
    </main>
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="material-icons py-2">settings</i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Tuỳ chỉnh giao diện</h5>
                    <!-- <p>See our dashboard options.</p> -->
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Màu Sidebar</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Loại Sidenav</h6>
                    <p class="text-sm">Chọn 1 trong 3 loại dưới đây.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-dark px-3 mb-2 active" data-class="bg-gradient-dark" onclick="sidebarType(this)">Tối</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-transparent" onclick="sidebarType(this)">Trong suốt</button>
                    <button class="btn bg-gradient-dark px-3 mb-2 ms-2" data-class="bg-white" onclick="sidebarType(this)">Sáng</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="mt-3 d-flex">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed" onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-3">
                <div class="mt-2 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <div class="w-100 text-center">
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?= asset('admin/assets/js/core/popper.min.js') ?>"></script>
    <script src="<?= asset('admin/assets/js/core/bootstrap.min.js') ?>"></script>
    <script src="<?= asset('admin/assets/js/plugins/perfect-scrollbar.min.js') ?>"></script>
    <script src="<?= asset('admin/assets/js/plugins/smooth-scrollbar.min.js') ?>"></script>
    <script src="<?= asset('admin/assets/js/material-dashboard.js') ?>"></script>
    <script src="<?= asset('admin/assets/js/toastr.min.js') ?>"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script>
        document.querySelectorAll('.nav-link').forEach(e => {
            if (window.location.pathname.includes(e.getAttribute("href"))) {
                e.classList.add('active')
                e.classList.add('bg-gradient-primary')
            }
            // if (window.location.pathname.split("/").splice(2).join("/") == e.getAttribute("href")) {
            //     e.classList.add('active')
            //     e.classList.add('bg-gradient-primary')
            // }
        })

        function openModal(target) {
            let modal = document.querySelector(target)
            modal.classList.add('show')
            modal.style.display = 'block'
            modal.querySelector('.modal-content').style.boxShadow = '0px 0px 0px 1000px #42424a42'
        }

        function closeModal(target = '') {
            if (target != '') {
                let modal = document.querySelector(target)
                modal.classList.remove('show')
                modal.style.display = 'none'
            } else {
                let modal = document.querySelector("div[class='modal fade show']")
                if (modal) {
                    modal.classList.remove('show')
                    modal.style.display = 'none'
                }
            }
        }

        document.querySelector('body').onclick = function(e) {
            let accepts = ['btn-link', 'modal-content', 'modal-header', 'modal-body', 'img-thumbnail', 'modal-title', 'see_description']
            let check = true
            accepts.forEach(item => {
                if (e.target.className.includes(item)) {
                    check = false
                }
            })
            if (check) {
                closeModal()
            }
        }


        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#img-preview').attr('src', e.target.result).show();
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $('input[type=file]').change(function() {
            readURL(this);
        });
        <?php if (Flash::has('success')) : ?>
            toastr.success('<?= Flash::get('success') ?>', 'Thông báo!')
        <?php endif ?>

        <?php if (Flash::has('error')) : ?>
            toastr.error('<?= Flash::get('error') ?>', 'Thông báo!')
        <?php endif ?>
        sidebarColor('danger');
        // darkMode(2);
    </script>
    <?php defineblock('script') ?>
</body>

</html>