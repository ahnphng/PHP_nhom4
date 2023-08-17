<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/ReviewRequest.php');
require_once('app/Models/Review.php');
require_once('app/Models/Product.php');
require_once('core/Flash.php');
class ReviewController extends BackendController
{
    public function __construct()
    {
        parent::__construct ();
        $this->middleware->handle();
    }

    public function index() 
    {   
        $review_model = new Review();
        $reviews = $review_model->pagination(5);
        return $this->view("pages/review/index.php", $reviews);
    }

    public function status()
    {
        $request = new ReviewRequest();
        $errors = $request->validateStatus($_GET);
        if (empty($errors)) {
            $review_model = new Review();
            $review_model->updateStatus($_GET);
            $product_id = $_GET['product_id'];
            $review_model = new Review;
            $avg_review = round($review_model->getAvgReview($product_id));
            $product_model = new Product;
            $product_model->update([
                'avg_rating' => $avg_review
            ],$product_id);
            Flash::set('success', 'Cập nhật đánh giá thành công!');
        }
        return redirect('admin/review');
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $review_model = new Review();
            if ($review_model->delete($id)) {
                Flash::set('success', 'Xoá đánh giá thành công!');
                redirect('admin/review');
            }
        };
    }

}