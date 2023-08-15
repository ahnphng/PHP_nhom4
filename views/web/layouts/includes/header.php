<header>
    <!-- header left mobie -->
    <div class="header-mobile d-md-none">
        <div class="mobile hidden-md-up text-xs-center d-flex align-items-center justify-content-around">
            <!-- menu left -->
            <div id="mobile_mainmenu" class="item-mobile-top">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </div>

            <!-- logo -->
            <div class="mobile-logo">
                <a href="#">
                    <img class="logo-mobile img-fluid" src="your-image-path-here"
                        alt="Prestashop_Furnitica">
                </a>
            </div>

            <!-- menu right -->
            <div class="mobile-menutop" data-target="#mobile-pagemenu">
                <i class="zmdi zmdi-more"></i>
            </div>
        </div>

        <!-- search -->
        <div id="mobile_search" class="d-flex">
            <div id="mobile_search_content">
                <form method="get" action="#">

                    <input type="text" name="s" value="" placeholder="Search">
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="desktop_cart">
                <div class="blockcart block-cart cart-preview tiva-toggle">
                    <div class="header-cart tiva-toggle-btn">
                        <span class="cart-products-count">1</span>
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    </div>
                    <div class="dropdown-content">
                        <div class="cart-content">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="product-image">
                                            <a href="product-detail.html">
                                                <img src="web/img/product/5.jpg" alt="Product">
                                            </a>
                                        </td>
                                        <td>
                                            <div class="product-name">
                                                <a href="product-detail.html">Organic Strawberry Fruits</a>
                                            </div>
                                            <div>
                                                2 x
                                                <span class="product-price">£28.98</span>
                                            </div>
                                        </td>
                                        <td class="action">
                                            <a class="remove" href="#">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr class="total">
                                        <td colspan="2">Total:</td>
                                        <td>£92.96</td>
                                    </tr>

                                    <tr>
                                        <td colspan="3" class="d-flex justify-content-center">
                                            <div class="cart-button d-flex justify-content-center">
                                                <a href="product-cart.html" title="View Cart">View Cart</a>
                                                <a href="product-checkout.html" title="Checkout">Checkout</a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header desktop -->
    <div class="header-top d-xs-none">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-sm-2 col-md-2 d-flex align-items-center">
                    <div id="logo">
                        <a href="#">
                            <img src="storage/CozyHome.png" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>

                <!-- menu -->
                <div class="col-sm-5 col-md-5 align-items-center justify-content-center navbar-expand-md main-menu">
                <div class="menu navbar collapse navbar-collapse">
                    <ul class="menu-top navbar-nav">
                        <li>
                            <a href="#" class="parent">Trang chủ</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)" class="parent">Danh mục</a>
                            <div class="dropdown-menu">
                                <ul>
                                    <li class="item">
                                        <a href="your-category-url-1" title="Category 1">Category 1</a>
                                    </li>
                                    <li class="item">
                                        <a href="your-category-url-2" title="Category 2">Category 2</a>
                                    </li>
                                    <!-- Repeat for other categories -->
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="your-contact-url" class="parent">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                </div>

                <!-- search and acount -->
                <div class="col-sm-5 col-md-5 d-flex align-items-center justify-content-end" id="search_widget">
                <form method="get" action="your-search-url">
                    <span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span>
                    <input type="text" name="s" placeholder="Tìm kiếm" class="ui-autocomplete-input" value="your-search-value" autocomplete="off" required>
                    <button type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

                    <div id="block_myaccount_infos" class="hidden-sm-down dropdown">
                        <div class="myaccount-title ">
                            <a href="#acount" data-toggle="collapse" class="acount d-flex align-items-center">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="mx-2">Tài khoản</span>
                                <i class="fa fa-angle-down ml-1" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div id="acount" class="collapse">
                            <div class="account-list-content">
                                <!-- <div>
                                    <a class="login" href="user-acount.html" rel="nofollow"
                                        title="Log in to your customer account">
                                        <i class="fa fa-cog"></i>
                                        <span>My Account</span>
                                    </a>
                                </div> -->
                                <div>
                                    <a class="check-out" href="user/orders" rel="nofollow" title="Đơn hàng">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                        <span>Đơn hàng</span>
                                    </a>
                                </div>
                                <div>
                                    <a class="login" href="user/logout" rel="nofollow"
                                        title="Đăng xuất">
                                        <i class="fa fa-sign-in"></i>
                                        <span>Đăng xuất</span>
                                    </a>
                                </div>
                                <!-- <div class="link_wishlist">
                                    <a href="user-wishlist.html" title="My Wishlists">
                                        <i class="fa fa-heart"></i>
                                        <span>My Wishlists</span>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <div>
                            <a href="your-register-url">Đăng ký</a> /<br>
                            <a href="your-login-url">Đăng nhập</a>
                        </div>

                    </div>
                    <div class="desktop_cart" style="margin-left: 22.5pt">
                        <div class="blockcart block-cart cart-preview tiva-toggle">
                            <!-- Replace this part with the actual cart content -->
                            <div class="header-cart tiva-toggle-btn">
                                <span class="cart-products-count"><!-- Put the cart count here --></span>
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            </div>
                            <div class="dropdown-content">
                                <div class="cart-content">
                                    <table>
                                        <tbody>
                                            <!-- Loop through cart items here -->
                                            <tr>
                                                <td class="product-image">
                                                    <a href="product-link"><!-- Put the product image here --></a>
                                                </td>
                                                <td>
                                                    <div class="product-name">
                                                        <a href="product-link"><!-- Put the product name here --></a>
                                                    </div>
                                                    <div>Màu sắc: <!-- Put the color here --></div>
                                                    <div>
                                                        <!-- Put the quantity and price here -->
                                                    </div>
                                                </td>
                                                <td class="action">
                                                    <a class="remove" href="remove-link"><!-- Put the remove link here --></a>
                                                </td>
                                            </tr>
                                            <!-- Repeat for all cart items -->
                                            <tr class="total">
                                                <td colspan="2">Tổng:</td>
                                                <td><!-- Put the total price here --></td>
                                            </tr>
                                            <tr>
                                                <td colspan="3" class="d-flex justify-content-center">
                                                    <div class="cart-button">
                                                        <a href="cart-link" title="Xem giỏ hàng">Xem giỏ hàng</a>
                                                        <a href="checkout-link" title="Thanh toán">Thanh toán</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- End of cart content -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>