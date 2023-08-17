<?php
    require_once('views/web/layouts/default.php');
?>
<?php startblock('title') ?>
Danh mục
<?php endblock() ?>

<?php startblock('body_attr')?>
id="product-sidebar-left" class="product-grid-sidebar-left"
<?php endblock() ?>

<?php startblock('content') ?>
<div class="main-content">
    <div id="wrapper-site">
        <div id="content-wrapper" class="full-width">
            <div id="main">
                <div class="page-home">
                    <!-- breadcrumb -->
                    <nav class="breadcrumb-bg">
                        <div class="container no-index">
                            <div class="breadcrumb">
                                <ol>
                                    <li>
                                        <a href="<?=url('')?>">
                                            <span>Trang chủ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?=url('danh-muc/' . $category['id'])?>">
                                            <span><?=$category['title']?></span>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </nav>

                    <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="sidebar-3 sidebar-collection col-lg-3 col-md-4 col-sm-4">

                                    <!-- category menu -->
                                    <?php include('views/web/layouts/includes/_category_menu.php')  ?>

                                    <!-- best seller -->
                                    <div class="sidebar-block d-none">
                                        <div class="title-block">Catalog</div>
                                        <div class="tiva-filter-price new-item-content sidebar-block">
                                            <h3 class="title-product">By Price</h3>
                                            <div id="block_price_filter" class="block">
                                                <div class="block-content">
                                                    <div id="slider-range" class="tiva-filter">
                                                        <div class="filter-itemprice-filter">
                                                            <div class="layout-slider">
                                                                <input id="price-filter" name="price" value="0;100" />
                                                            </div>
                                                            <div class="layout-slider-settings"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sidebar-block by-color">
                                            <h3 class="title-product">By Color</h3>
                                            <div>
                                                <span class="left">
                                                    <label class="color-item1"></label>
                                                    <a href="#">
                                                        <span>Blue
                                                            <span>(30)</span>
                                                        </span>
                                                    </a>
                                                </span>
                                                <span class="right">
                                                    <label class="color-item2"></label>
                                                    <a href="#">
                                                        <span>Green
                                                            <span>(30)</span>
                                                        </span>
                                                    </a>
                                                </span>
                                            </div>
                                            <div>
                                                <span class="left">
                                                    <label class="color-item3"></label>
                                                    <a href="#">
                                                        <span>Yellow
                                                            <span>(30)</span>
                                                        </span>
                                                    </a>
                                                </span>
                                                <span class="right">
                                                    <label class="color-item4"></label>
                                                    <a href="#">
                                                        <span>Brown
                                                            <span>(30)</span>
                                                        </span>
                                                    </a>
                                                </span>

                                            </div>
                                            <div>
                                                <span class="left">
                                                    <label class="color-item5"></label>
                                                    <a href="#">
                                                        <span>Pink
                                                            <span>(30)</span>
                                                        </span>
                                                    </a>
                                                </span>
                                                <span class="right">
                                                    <label class="color-item6"></label>
                                                    <a href="#">
                                                        <span>Red
                                                            <span>(30)</span>
                                                        </span>
                                                    </a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-8 col-lg-9 col-md-8 product-container">
                                    <h1><?= $category['title'] ?></h1>
                                    <div class="js-product-list-top firt nav-top">
                                        <div class="d-flex justify-content-around row">
                                            <div class="col col-xs-12">
                                                <ul class="nav nav-tabs">
                                                    <li>
                                                        <a href="#grid" data-toggle="tab"
                                                            class="active show fa fa-th-large"></a>
                                                    </li>
                                                    <li>
                                                        <a href="#list" data-toggle="tab" class="fa fa-list-ul"></a>
                                                    </li>
                                                </ul>
                                                <div class="hidden-sm-down total-products">
                                                    <p><?= count($products) ?> sản phẩm được hiển thị</p>
                                                </div>
                                            </div>
                                            <div class="col col-xs-12">
                                                <div
                                                    class="d-flex sort-by-row justify-content-lg-end justify-content-md-end">
                                                    <div class="products-sort-order dropdown">
                                                        <select class="select-title" onchange="handleFilter(this)">
                                                            <option value="">Lọc theo</option>
                                                            <option value="name-asc">Tên, A to Z</option>
                                                            <option value="name-desc">Tên, Z to A</option>
                                                            <option value="price-asc">Giá, thấp tới cao</option>
                                                            <option value="price-desc">Giá, cao tới thấp</option>
                                                            <option value="avg_rating-asc">Đánh giá, thấp tới cao</option>
                                                            <option value="avg_rating-desc">Đánh giá, cao tới thấp</option>
                                                        </select>
                                                        <script>
                                                            let params = new URLSearchParams(window.location.search)
                                                            if (params.get('sort_by')) {
                                                                document.querySelector('.select-title').value = params.get('sort_by')
                                                            }
                                                            function handleFilter(el) {
                                                                var value = el.options[el.selectedIndex].value
                                                                if (value) {
                                                                    window.location.href = window.location.origin + window.location.pathname + '?sort_by=' + value
                                                                } else {
                                                                    window.location.href = window.location.origin + window.location.pathname
                                                                }
                                                            }
                                                        </script>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content product-items">
                                        <div id="grid" class="related tab-pane fade in active show">
                                            <div class="row">
                                                <?php foreach($products as $grid_product): ?>
                                                <div class="item text-center col-md-4">
                                                    <div
                                                        class="product-miniature js-product-miniature item-one first-item">
                                                        <div class="thumbnail-container border">
                                                            <a href="<?= url('san-pham/'.$grid_product['id']) ?>">
                                                                <img class="img-fluid image-cover"
                                                                    src="<?= asset('storage/products/'.$grid_product['thumbnail']) ?>" alt="img">
                                                                <img class="img-fluid image-secondary"
                                                                    src="<?= asset('storage/products/'.$grid_product['thumbnail']) ?>" alt="img">
                                                            </a>
                                                            <div class="highlighted-informations">
                                                                <?php
                                                                    require_once 'config/color.php';
                                                                    if ($grid_product['colors']):
                                                                ?>
                                                                    <div class="variant-links">
                                                                        <?php
                                                                            foreach(explode(',', $grid_product['colors']) as $item_color_type):
                                                                                $item_color = getColor($item_color_type);
                                                                        ?>
                                                                        <a href="#" class="color" style="background-color: <?= $item_color['hex'] ?>;" title="<?= $item_color['label'] ?>"></a>
                                                                        <?php endforeach ?>
                                                                    </div>
                                                                <?php endif ?>
                                                            </div>
                                                        </div>
                                                        <div class="product-description">
                                                            <div class="product-groups">
                                                                <div class="product-title">
                                                                    <a href="<?= url('san-pham/'.$grid_product['id']) ?>"><?= $grid_product['name'] ?></a>
                                                                </div>
                                                                <div class="rating">
                                                                    <div class="star-content">
                                                                        <?php for ($i = 1; $i < 6; $i++): ?>
                                                                        <div class="star <?= $i <= round($grid_product['avg_rating']) ? 'active' : '' ?>"></div>
                                                                        <?php endfor ?>
                                                                    </div>
                                                                </div>
                                                                <div class="product-group-price">
                                                                    <div class="product-price-and-shipping">
                                                                        <span class="price"><?= number_format($grid_product['price']) ?> đ</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="product-buttons d-flex justify-content-center">
                                                                <form action="javascript:void(0)" method="get" class="formAddToCart">
                                                                    <a class="add-to-cart" href="<?= $grid_product['quantity'] == 0 ? 'javascript:void(0)' : url('cart/add', ['product_id' => $grid_product['id'].($grid_product['colors'] ? '_'.explode(',', $grid_product['colors'])[0] : ''), 'quantity' => 1]) ?>">
                                                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                                    </a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                        <div id="list" class="related tab-pane fade">
                                            <div class="row">
                                                <?php foreach ($products as $list_product):  ?>
                                                <div class="item col-md-12">
                                                    <div class="product-miniature item-one first-item">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="thumbnail-container border">
                                                                    <a href="<?= url('san-pham/'.$list_product['id']) ?>">
                                                                        <img class="img-fluid image-cover"
                                                                            src="<?= asset('storage/products/'.$list_product['thumbnail']) ?>" alt="img">
                                                                        <img class="img-fluid image-secondary"
                                                                            src="<?= asset('storage/products/'.$list_product['thumbnail']) ?>" alt="img">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="product-description">
                                                                    <div class="product-groups">
                                                                        <div class="product-title">
                                                                            <a href="<?= url('san-pham/'.$list_product['id']) ?>"><?= $list_product['name'] ?></a>
                                                                            <?php if ($list_product['quantity'] > 0): ?>
                                                                                <span class="info-stock">
                                                                                    <i class="fa fa-check-square-o"
                                                                                        aria-hidden="true"></i>
                                                                                    Còn hàng
                                                                                </span>
                                                                            <?php else: ?>
                                                                                <span class="info-stock uncheck" style="color: red;">
                                                                                    <i class="fa fa fa-times" aria-hidden="true"></i>
                                                                                    Hết hàng
                                                                                </span>
                                                                            <?php endif ?>
                                                                        </div>
                                                                        <div class="rating">
                                                                            <div class="star-content">
                                                                                <?php for ($i = 1; $i < 6; $i++): ?>
                                                                                <div class="star <?= $i <= round($list_product['avg_rating']) ? 'active' : '' ?>"></div>
                                                                                <?php endfor ?>
                                                                            </div>
                                                                        </div>
                                                                        <div class="product-group-price">
                                                                            <div class="product-price-and-shipping">
                                                                                <span class="price"><?= number_format($list_product['price']) ?> đ</span>
                                                                            </div>
                                                                        </div>
                                                                        <div class="discription">
                                                                            <?= $list_product['description'] ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-buttons d-flex">
                                                                        <form action="javascript:void(0)" method="get" class="formAddToCart">
                                                                            <a 
                                                                                class="add-to-cart" href="<?= $list_product['quantity'] == 0 ? 'javascript:void(0)' : url('cart/add', ['product_id' => $list_product['id'].($list_product['colors'] ? '_'.explode(',', $list_product['colors'])[0] : ''), 'quantity' => 1]) ?>"
                                                                                data-button-action="add-to-cart">
                                                                                <i class="fa fa-shopping-cart"aria-hidden="true"></i>
                                                                                Thêm vào giỏ hàng
                                                                            </a>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- pagination -->
                                    <div class="pagination">
                                        <div class="js-product-list-top ">
                                            <div class="d-flex justify-content-around row">
                                                <div class="showing col col-xs-12">
                                                    <span>Hiển thị <?= count($products) ?> trên tổng số <?= $pagination_total_record ?> sản phẩm</span>
                                                </div>
                                                <div class="page-list col col-xs-12">
                                                    <?= $pagination ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- end col-md-9-1 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock() ?>