<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header" style="border: 7px solid #344767">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 bg-white" href="<?= url('admin') ?>" target="_blank">
            <img src="<?= asset('storage/CozyHome.png') ?>" class="navbar-brand-img h-100" alt="main_logo">
            <!-- <span class="ms-1 font-weight-bold text-white">CozyHome Furniture Store</span> -->
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="admin/dashboard">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            <li class="nav-item">
                <a class="nav-link text-white " href="admin/category">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý danh mục</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="admin/product">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">receipt_long</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý sản phẩm</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="admin/order">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý đơn hàng</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="admin/review">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý review</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin/user">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Quản lý tài khoản</span>
                </a>
            </li>
        </ul>
    </div>
</aside>