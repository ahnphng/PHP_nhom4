<!--Carousel Wrapper-->
<?php
require_once 'views/web/layouts/default.php';
?>
<?php startblock('title')?>
<?=isset($product) ? $product['name'] : 'Chi tiết sản phẩm'?>
<?php endblock()?>

<?php startblock('body_attr')?>
id="product-detail"
<?php endblock()?>


<?php startblock('content')?>
<div class="main-content">
    <div id="wrapper-site">
        <div id="content-wrapper">
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
                                    <li>
                                        <a href="javascript:void(0)">
                                            <span><?=$product['name']?></span>
                                        </a>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </nav>
                    <div class="container">
                        <div class="content">
                            <div class="row">
                                <div class="sidebar-3 sidebar-collection col-lg-3 col-md-3 col-sm-4">
                                    <!-- category -->
                                    <?php include('views/web/layouts/includes/_category_menu.php')  ?>
                                </div>
                                <div class="col-sm-8 col-lg-9 col-md-9">
                                    <div class="main-product-detail">
                                        <h2><?=$product['name']?></h2>
                                        <div class="product-single row">
                                            <div class="product-detail col-xs-12 col-md-5 col-sm-5">
                                                <div class="page-content" id="content">
                                                    <div class="images-container">
                                                        <div class="js-qv-mask mask tab-content border">
                                                            <div id="item1" class="tab-pane fade active in show">
                                                                <img src="<?=asset('storage/products/' . $product['thumbnail'])?>"
                                                                    alt="img">
                                                            </div>
                                                        </div>
                                                        <ul class="product-tab nav nav-tabs d-none d-flex1">
                                                            <li class="active col">
                                                                <a href="#item1" data-toggle="tab" aria-expanded="true"
                                                                    class="active show">
                                                                    <img src="<?=asset('storage/products/' . $product['thumbnail'])?>"
                                                                        alt="img">
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="modal fade" id="product-modal" role="dialog">
                                                            <div class="modal-dialog">
                                                                <!-- Modal content-->
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <div class="modal-body">
                                                                            <div class="product-detail">
                                                                                <div>
                                                                                    <div class="images-container">
                                                                                        <div
                                                                                            class="js-qv-mask mask tab-content">
                                                                                            <div id="modal-item1"
                                                                                                class="tab-pane fade active in show">
                                                                                                <img src="<?=asset('storage/products/' . $product['thumbnail'])?>"
                                                                                                    alt="img">
                                                                                            </div>
                                                                                        </div>
                                                                                        <ul
                                                                                            class="product-tab nav nav-tabs">
                                                                                            <li class="active">
                                                                                                <a href="#modal-item1"
                                                                                                    data-toggle="tab"
                                                                                                    class=" active show">
                                                                                                    <img src="<?=asset('storage/products/' . $product['thumbnail'])?>"
                                                                                                        alt="img">
                                                                                                </a>
                                                                                            </li>
                                                                                        </ul>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-info col-xs-12 col-md-7 col-sm-7">
                                                <div class="detail-description">
                                                    <div class="price-del">
                                                        <span class="price"><?=number_format($product['price'])?> Đ</span>
                                                        <span class="float-right">
                                                            <span class="availb">Trạng thái: </span>
                                                            <?php if ($product['quantity'] > 0): ?>
                                                            <span class="check">
                                                                <i class="fa fa-check-square-o" aria-hidden="true"></i>Còn hàng</span>
                                                            </span>
                                                            <?php else: ?>
                                                                <span class="uncheck" style="color: red;">
                                                                    <i class="fa fa fa-times" aria-hidden="true"></i>
                                                                    Hết hàng
                                                                </span>
                                                                </span>
                                                            <?php endif?>
                                                    </div>
                                                    <p class="description"></p>
                                                    <div class="option has-border d-lg-flex size-color">
                                                        <div class="colors">
                                                            <b class="title">Màu sắc: </b>
                                                            <?php
                                                                if (!$product['colors']):
                                                                    echo 'Mặc định';
                                                                    echo '<input type="hidden" id="product_color" value="">';
                                                                else:
                                                                    require_once 'config/color.php';
                                                                    echo '<input type="hidden" id="product_color" value="'. explode(',', $product['colors'])[0] .'">';
                                                                    $count = 1;
                                                                    foreach (explode(',', $product['colors']) as $color_type):
                                                                        $color = getColor($color_type)
                                                            ?>
                                                            <span class="choose-color" data-type="<?= $color['type'] ?>" data-label="<?= $color['label'] ?>" style="background-color: <?= $color['hex'] ?><?= $count != 1 ? ';border: 2px solid white' : '' ?>"></span>
                                                            <?php 
                                                                    $count ++;
                                                                    endforeach;
                                                                endif;
                                                            ?>
                                                        </div>
                                                        <script>
                                                            document.querySelectorAll('.choose-color').forEach((e) => {
                                                                e.addEventListener('click', function () {
                                                                    document.querySelectorAll('.choose-color').forEach((e) => { e.style.border = '2px solid white' } )
                                                                    let color = this
                                                                    color.style.border = 'none';
                                                                    document.getElementById('product_color').value = color.getAttribute('data-type')
                                                                })
                                                            })
                                                        </script>
                                                    </div>
                                                    <div class="has-border cart-area">
                                                        <div class="product-quantity">
                                                            <div class="qty">
                                                                <div class="input-group d-flex align-items-center">
                                                                    <div class="quantity">
                                                                        <span class="control-label">Số lượng: </span>
                                                                        <input type="number" min="1" max="<?= $product['quantity'] ?>" name="qty"
                                                                            id="quantity_wanted" value="<?= $product['quantity'] == 0 ? '0' : '1' ?>"
                                                                            class="input-group form-control"
                                                                            <?= $product['quantity'] == 0 ? 'disabled' : '' ?>
                                                                        >
                                                                        <span class="input-group-btn-vertical">
                                                                            <button
                                                                                id="btn-plus"
                                                                                class="btn btn-touchspin js-touchspin bootstrap-touchspin-up"
                                                                                type="button"
                                                                                <?= $product['quantity'] == 0 ? 'disabled' : '' ?>
                                                                            >
                                                                                +
                                                                            </button>
                                                                            <button
                                                                                id="btn-minus"
                                                                                class="btn  btn-touchspin js-touchspin bootstrap-touchspin-down"
                                                                                type="button"
                                                                                <?= $product['quantity'] == 0 ? 'disabled' : '' ?>
                                                                            >
                                                                                -
                                                                            </button>
                                                                        </span>
                                                                        <script type="text/javascript">
                                                                            document.getElementById('btn-minus').addEventListener('click', function() {
                                                                                let input = document.getElementById('quantity_wanted')
                                                                                let min = input.getAttribute('min')
                                                                                let new_value = parseInt(input.value) - 1
                                                                                if (new_value < parseInt(min)) {
                                                                                    new_value = parseInt(min)
                                                                                }
                                                                                input.value = new_value
                                                                            })
                                                                            document.getElementById('btn-plus').addEventListener('click', function() {
                                                                                let input = document.getElementById('quantity_wanted')
                                                                                let max = input.getAttribute('max')
                                                                                let new_value = parseInt(input.value) + 1
                                                                                if (new_value > parseInt(max)) {
                                                                                    new_value = parseInt(max)
                                                                                }
                                                                                input.value = new_value
                                                                            })
                                                                        </script>
                                                                    </div>
                                                                    <span class="add">
                                                                        <button
                                                                            class="btn btn-primary add-to-cart add-item"
                                                                            type="submit"
                                                                            <?= $product['quantity'] == 0 ? 'disabled' : '' ?>
                                                                        >
                                                                            <i class="fa fa-shopping-cart"
                                                                                aria-hidden="true"></i>
                                                                            <span>Thêm vào giỏ hàng</span>
                                                                        </button>
                                                                        <script>
                                                                            document.querySelector('.add-to-cart').addEventListener('click', function() {
                                                                                let color = document.getElementById('product_color').value
                                                                                let quantity = document.getElementById('quantity_wanted').value
                                                                                let product_id = '<?= $product['id'] ?>'
                                                                                window.location.href = `<?= url('cart/add') ?>?product_id=${product_id}_${color}&quantity=${quantity}`
                                                                            })
                                                                        </script>
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <p class="product-minimal-quantity">
                                                        </p>
                                                    </div>
                                                    <div class="rating-comment has-border d-flex">
                                                        <div class="review-description d-flex">
                                                            <span>Đánh giá :</span>
                                                            <div class="rating">
                                                                <div class="star-content">
                                                                    <?php for ($i = 1; $i < 6; $i++): ?>
                                                                    <div class="star <?= $i <= round($product['avg_rating']) ? 'active' : '' ?>"></div>
                                                                    <?php endfor ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="content mb-2">
                                                        <p>Danh mục :
                                                            <span class="content2">
                                                                <a href="<?= url('danh-muc/'. $category['id']) ?>"><?= $category['title'] ?></a>
                                                            </span>
                                                        </p>
                                                    </div>
                                                    <p class="description">Mô tả:</p>
                                                    <p class="description"> <?= $product['description'] ?></p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="review">
                                            <ul class="nav nav-tabs">
                                                <li>
                                                    <a data-toggle="tab" href="#review" class="active show">Đánh giá</a>
                                                </li>
                                                <li class="active">
                                                    <a data-toggle="tab" href="#description">Mô tả</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div id="review" class="tab-pane fade in active show">
                                                    <div class="spr-form">
                                                        <div class="user-comment">
                                                            <?php foreach ($reviews as $review): ?>
                                                            <div class="spr-review">
                                                                <div class="spr-review-header">
                                                                    <span class="spr-review-header-byline">
                                                                        <strong><?= $review['user_name'] ?></strong> -
                                                                        <span><?= dateFromStr($review['created_at'], 'd/m/Y') ?></span>
                                                                    </span>
                                                                    <div class="rating">
                                                                        <div class="star-content">
                                                                            <?php for ($i = 1; $i < 6; $i++): ?>
                                                                            <div class="star <?= $i <= intval($review['rating']) ? 'active' : '' ?>"></div>
                                                                            <?php endfor ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="spr-review-content">
                                                                    <p class="spr-review-content-body"><?= $review['content'] ?></p>
                                                                </div>
                                                            </div>
                                                            <?php endforeach ?>
                                                        </div>
                                                    </div>
                                                    <script>
                                                        function onSubmit() {
                                                            let check = false
                                                            document.querySelectorAll('input[name="rating"]').forEach((e) => {
                                                                if (e.checked) {
                                                                    check = true
                                                                }
                                                            })
                                                            if (!check) {
                                                                alert('Vui lòng đánh giá sao theo mức từ 1 đến 5')
                                                                document.querySelector('.ratings') && (document.querySelector('.ratings').style.border = '1px solid red')
                                                            }
                                                            return check
                                                        }
                                                    </script>
                                                    <form method="post" onsubmit="return onSubmit()" class="new-review-form">
                                                        <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                                        <h3 class="spr-form-title">Viết đánh giá</h3>
                                                        <?php if (Auth::loggedIn('user')): ?>
                                                        <fieldset>
                                                            <div class="spr-form-review-rating">
                                                                <label class="spr-form-label">Bạn đánh giá sản phẩm bao nhiêu sao?</label>
                                                                <fieldset class="ratings">
                                                                    <input type="radio" id="star5" name="rating"
                                                                        value="5" />
                                                                    <label class="full" for="star5"
                                                                        title="Awesome - 5 stars"></label>
                                                                    <input type="radio" id="star4half" name="rating"
                                                                        value="4 and a half" />
                                                                    <input type="radio" id="star4" name="rating"
                                                                        value="4" />
                                                                    <label class="full" for="star4"
                                                                        title="Pretty good - 4 stars"></label>
                                                                    <input type="radio" id="star3half" name="rating"
                                                                        value="3 and a half" />
                                                                    <input type="radio" id="star3" name="rating"
                                                                        value="3" />
                                                                    <label class="full" for="star3"
                                                                        title="Meh - 3 stars"></label>
                                                                    <input type="radio" id="star2half" name="rating"
                                                                        value="2 and a half" />
                                                                    <input type="radio" id="star2" name="rating"
                                                                        value="2" />
                                                                    <label class="full" for="star2"
                                                                        title="Kinda bad - 2 stars"></label>
                                                                    <input type="radio" id="star1half" name="rating"
                                                                        value="1 and a half" />
                                                                    <input type="radio" id="star1" name="rating"
                                                                        value="1" />
                                                                    <label class="full" for="star1"
                                                                        title="Sucks big time - 1 star"></label>
                                                                    <input type="radio" id="starhalf" name="rating"
                                                                        value="half" />
                                                                </fieldset>
                                                            </div>
                                                        </fieldset>
                                                        <fieldset>
                                                            <div class="spr-form-review-body">
                                                                <div class="spr-form-input">
                                                                    <textarea class="spr-form-input-textarea" rows="10" name="content"
                                                                        placeholder="Viết đánh giá của bạn ở đây" required></textarea>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="submit">
                                                            <input type="submit" name="submitReview" id="submitComment"
                                                                class="btn btn-default" value="Gửi đánh giá">
                                                        </div>
                                                        <?php else: ?>
                                                            <div>Vui lòng đăng nhập để đánh giá</div>
                                                        <?php endif ?>
                                                    </form>
                                                </div>
                                                <div id="description" class="tab-pane fade">
                                                        <?= $product['description'] ?>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="related">
                                            <div class="title-tab-content  text-center">
                                                <div class="title-product justify-content-start">
                                                    <h2>Sản phẩm liên quan</h2>
                                                </div>
                                            </div>
                                            <div class="tab-content">
                                                <div class="row">
                                                    <?php foreach($relative_products as $relative_product): ?>
                                                    <div class="item text-center col-md-4">
                                                        <div
                                                            class="product-miniature js-product-miniature item-one first-item">
                                                            <div class="thumbnail-container border border">
                                                                <a href="<?= url('san-pham/'.$relative_product['id']) ?>">
                                                                    <img class="img-fluid image-cover"
                                                                        src="<?= asset('storage/products/'.$relative_product['thumbnail']) ?>" alt="img">
                                                                    <img class="img-fluid image-secondary"
                                                                        src="<?= asset('storage/products/'.$relative_product['thumbnail']) ?>" alt="img">
                                                                </a>
                                                                <div class="highlighted-informations">
                                                                    <?php
                                                                        require_once 'config/color.php';
                                                                        if ($relative_product['colors']):
                                                                    ?>
                                                                        <div class="variant-links">
                                                                            <?php
                                                                                foreach(explode(',', $relative_product['colors']) as $item_color_type):
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
                                                                        <a href="<?= url('san-pham/'.$relative_product['name']) ?>"><?= $relative_product['name'] ?></a>
                                                                    </div>
                                                                    <div class="rating">
                                                                        <div class="star-content">
                                                                            <?php for ($i = 1; $i < 6; $i++): ?>
                                                                            <div class="star <?= $i <= round($relative_product['avg_rating']) ? 'active' : '' ?>"></div>
                                                                            <?php endfor ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="product-group-price">
                                                                        <div class="product-price-and-shipping">
                                                                            <span class="price"><?= number_format($relative_product['price']) ?> Đ</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div
                                                                    class="product-buttons d-flex justify-content-center">
                                                                    <form action="javascript:void(0)" method="get"
                                                                        class="formAddToCart">
                                                                        <a class="add-to-cart" href="<?= $relative_product['quantity'] == 0 ? 'javascript:void(0)' : url('cart/add', ['product_id' => $relative_product['id'].($relative_product['colors'] ? '_'.explode(',', $relative_product['colors'])[0] : ''), 'quantity' => 1]) ?>"
                                                                            data-button-action="add-to-cart">
                                                                            <i class="fa fa-shopping-cart"
                                                                                aria-hidden="true"></i>
                                                                        </a>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php endforeach ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endblock()?>

<?php startblock('script')?>

<?php endblock()?>