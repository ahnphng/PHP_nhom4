<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    data-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <h6 class="font-weight-bolder mb-0">Xin chào, <?= Auth::getUser('admin')['email'] ?></h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center px-3">
                    <a href="<?= url('') ?>" class="nav-link text-body p-0">
                        Ghé thăm trang bán hàng
                    </a>
                </li>
                
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <a href="<?= url('admin/auth/logout') ?>" class="nav-link text-body font-weight-bold px-0 d-flex">
                        <i class="material-icons opacity-10" style="margin-right: 10px;">login</i>
                        <span class="d-sm-inline d-none">Đăng xuất</span>
                    </a>
                </li>
                <!-- <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</nav>