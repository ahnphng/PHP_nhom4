<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Models/Order.php');
require_once('core/Flash.php');
require_once('core/Storage.php');
require_once('core/Auth.php');
class OrderController extends BackendController
{
    public function __construct()
    {
        parent::__construct ();
        $this->middleware->handle();
    }

    public function index() 
    {   
        $order_model = new Order();
        $orders = $order_model->all();
        return $this->view("pages/order/index.php", ['orders' => $orders]);
    }

    public function detail() 
    {   
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $order_model = new Order();
            $order = $order_model->find($_GET['id']);
            $order_details = $order_model->details($_GET['id']);
            return $this->view("pages/order/detail.php", ['order' => $order, 'order_details' => $order_details]);
        } else {
            return redirect('admin/order');
        }
    }

    public function update()
    {
        if (isset($_GET['id'], $_GET['status'])) {
            $order_model = new Order();
            $data = [];
            $data['status'] = $_GET['status'];
            $data['updated_at'] = date('Y-m-d H:i:s');
            $check = true;
            switch ($data['status']) {
                case 2:
                    $data['confirmed_at'] = date('Y-m-d H:i:s');
                    break;
                case 3:
                    $data['shipped_at'] = date('Y-m-d H:i:s');
                    break;
                case 4:
                    $data['delivered_at'] = date('Y-m-d H:i:s');
                    break;
                case -1:
                    $data['cancelled_at'] = date('Y-m-d H:i:s');
                    break;
                default:
                    $check = false;
            }
            if ($check) {
                Flash::set('success', 'Cập nhật trạng thái đơn hàng thành công!');
                $order_model->update($data, $_GET['id']);
            }
            return redirect('admin/order/detail', ['id' => $_GET['id']]);
        } else {
            return redirect('admin/order');
        }
    }

}