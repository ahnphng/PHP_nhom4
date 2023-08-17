<?php

require_once 'app/Controllers/Web/WebController.php';
require_once 'core/Flash.php';
require_once 'core/Auth.php';
require_once 'app/Requests/UserRequest.php';
require_once 'app/Requests/AuthRequest.php';
require_once 'app/Models/User.php';
require_once 'app/Models/Order.php';
require_once 'app/Models/OrderDetail.php';

class AuthController extends WebController
{
    public function register()
    {
        return $this->view("pages/register.php", []);
    }

    public function login()
    {
        return $this->view("pages/login.php", []);
    }

    public function handleRegister()
    {
        $request = new UserRequest();
        $errors = $request->validateCreateFrontend($_POST);
        if (empty($errors)) {
            $user_model = new User();
            $data = $_POST;
            $data['password'] = md5($data['password']);
            if ($user = $user_model->create($data)) {
                Auth::setUser('user', $user);
                return redirect('');
            }
        }
        $errors['form_data'] = $_POST;
        Flash::set('register_errors', $errors);
        return back();
    }

    public function handleLogin()
    {
        $request = new AuthRequest();
        $errors = $request->validateLogin($_POST);
        if (empty($errors)) {
            $user_model = new User();
            $data = $_POST;
            $user = $user_model->first($data);
            if ($user) {
                Auth::setUser('user', $user);
                Flash::set('success', 'Đăng nhập thành công!');
                return redirect('');
            } else {
                Flash::set('errors', ['wrong_email_password' => 'Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại!']);
                Flash::set('error', 'Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại!');
            }
            return back();
        }
        $errors['form_data'] = $_POST;
        Flash::set('errors', $errors);
        return back();
    }
    public function logout()
    {
        Auth::logout('user');
        return redirect('');
    }

    public function orders() {
        if (!Auth::loggedIn('user')) {
            return back();
        }
        $user = Auth::getUser('user');
        $order_model = new Order;
        $orders = $order_model->listByUserId($user['id']);
        foreach ($orders as $key => $order) {
            $details = $order_model->details($order['id']);
            $orders[$key]['details'] = $details;
        }
        return $this->view("pages/order.php", ['orders' => $orders]);
    }
}
