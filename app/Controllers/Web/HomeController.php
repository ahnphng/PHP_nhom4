<?php
require_once 'app/Controllers/Web/WebController.php';
require_once 'app/Models/Product.php';
require_once 'app/Models/Category.php';
require_once('core/Flash.php');

class HomeController extends WebController
{
    public function index()
    {
        $propduct_model = new Product();
        $category_model = new Category;
        $categories = $category_model->active(3);
        $all_products = [];
        foreach ($categories as $index => $category) {
            $propducts = $propduct_model->home_news($category['id']);
            $categories[$index]['products'] = $propducts;
            $all_products = array_merge($all_products, $propducts);
        }
        return $this->view('pages/home.php', [ 'categories' => $categories, 'all_products' => $all_products ]);
    }
}
