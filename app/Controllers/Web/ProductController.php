<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Category.php');
require_once('app/Models/Product.php');
require_once('app/Models/Review.php');


class ProductController extends WebController
{

    public function index()
    {
        if (isset($_POST['submitReview'])) {
            if (!Auth::loggedIn('user')) {
                Flash::set('error', 'Vui lòng đăng nhập để đánh giá sản phẩm');
                return back();
            }
            $data = $_POST;
            $data['user_id'] = Auth::getUser('user')['id'];
            $review_model = new Review;
            $review_model->create($data);
            Flash::set('success', 'Gửi đánh giá thành công, vui lòng đợi quản trị viên duyệt');
            return redirect('san-pham/'.$_POST['product_id']);
        }
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $product_model = new Product();
            $category_model = new Category();
            $product = $product_model->find($_GET['id']);
            if (!$product) {
                return redirect('');
            }
            $category = $category_model->find($product['category_id']);
            $relative_products = $product_model->relative($product['category_id'], $product['id'], 3);

            $review_model = new Review;
            $reviews = $review_model->listActiveByProductId($product['id']);
            return $this->view('pages/product.php', ['product' => $product, 'relative_products' => $relative_products, 'category' => $category, 'reviews' => $reviews]);
        } else {
            return redirect('');
        }
    }

    public function search() {
        if (!isset($_GET['s'])) {
            return redirect('');
        }
        $s = $_GET['s'];
        $category_model = new Category();
        $categories = $category_model->all();
        $product_model = new Product();
        $products = $product_model->paginationSearchWeb(12, $s);
        return $this->view('pages/search.php', array_merge(['categories' => $categories], $products));
    }
}
