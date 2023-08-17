<?php

require_once('app/Controllers/Web/WebController.php');
require_once('app/Models/Category.php');
require_once('app/Models/Product.php');

class CategoryController extends WebController
{

    public function index()
    {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $category_model = new Category();
            $categories = $category_model->all();
            $category = $category_model->find($_GET['id']);
            if (!$category) {
                return redirect('');
            }
            $product_model = new Product();
            $products = $product_model->paginationWeb(12, $category['id']);
            return $this->view('pages/category.php', array_merge(['categories' => $categories, 'category' => $category], $products));
        } else {
            return redirect('');
        }
    }
}
