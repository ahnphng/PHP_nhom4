<?php
require_once('app/Controllers/Web/WebController.php');
require_once('app/Services/CartService.php');
require_once('app/Requests/PaymentRequest.php');
require_once('app/Models/Order.php');
require_once('app/Models/OrderDetail.php');
require_once('core/Flash.php');
require_once('config/color.php');
class CheckoutController extends WebController
{

    public function index()
    {
        $cart_service = new CartService;
        $cart = $cart_service->viewCart();
        if (!$cart) {
            Flash::set('error', 'Hãy thêm sản phẩm vào giỏ hàng trước khi tiến hành thanh toán');
            return redirect('');
        }
        $total = 0;
        foreach ($cart as $c) {
            $total += $c['quantity'] * $c['product-detail']['price'];
        }
        return $this->view('pages/checkout.php', ['total' => $total, 'cart' => $cart]);
    }

    public function create()
    {
        if (!Auth::loggedIn('user')) {
            return back();
        }
        $user = Auth::getUser('user');
        $data = $_POST;
        $data['user_id'] = $user['id'];
        $total = 0;

        $cart_service = new CartService;
        $cart = $cart_service->viewCart();
        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['product-detail']['price'];
        }
        $data['total'] = $total;

        

        $order_modal = new Order();
        if ($order_data = $order_modal->create($data)) {
            $order_detail_modal = new OrderDetail();
            foreach ($cart as $key => $item) {
                $id = $key;
                $color = '';
                if (str_contains($key, '_')) {
                    $id = explode('_', $key)[0];
                    $color = getColor(explode('_', $key)[1])['type'];
                }
                $detail = [];
                $detail['order_id'] = $order_data['id'];
                $detail['product_id'] = $id;
                $detail['quantity'] = $item['quantity'];
                $detail['price'] = $item['product-detail']['price'];
                $detail['color'] = $color;
                $order_detail_modal->create($detail);
            }
            $cart_service->deleteCart();
            Flash::set('success', 'Bạn đã đặt hàng thành công');
            return redirect('');
        }
    }
}
