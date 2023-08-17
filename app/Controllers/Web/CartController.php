<?php

require_once 'app/Controllers/Web/WebController.php';
require_once 'app/Models/Product.php';
require_once 'app/Models/Category.php';
require_once('core/Flash.php');
require_once('app/Services/CartService.php');

class CartController extends WebController
{

    public function index()
    {
        $cart_service = new CartService;
        $cart = $cart_service->viewCart();
        if (!$cart) {
            return redirect('');
        }
        return $this->view('pages/cart.php', [ 'cart' => $cart ]);
    }

    public function add()
    {
        $cart = new CartService;
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'];
        $cart->addToCart($product_id, $quantity);
        Flash::set('success', 'Thêm sản phẩm vào giỏ hàng thành công!');
        return back();
    }

    public function edit()
    {
        $cart = new CartService;
        $product_id = $_GET['product_id'];
        $quantity = $_GET['quantity'];
        $cart->updateCart($product_id, $quantity);
        Flash::set('success', 'Cập nhật sản phẩm trong giỏ hàng thành công!');
        return back();
    }
}
