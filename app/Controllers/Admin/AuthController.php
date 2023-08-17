<?php 

require('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/AuthRequest.php');
require_once('app/Models/Admin.php');
require_once('core/Flash.php');
require_once('core/Auth.php');
class AuthController extends BackendController
{
    public function login() 
    {   
        if (Auth::loggedIn('admin')) {
            return redirect('admin/dashboard');
        }
        // require('views/admin/pages/user/login.php');
        return $this->view("pages/user/login.php");

    }

    public function handleLogin() 
    {
        $request = new AuthRequest();
        $errors = $request->validateLogin($_POST);
        if (!empty($errors)) {
            return redirect('admin/auth/login');
        }
        $admin_model = new Admin();
        $data = $_POST;
        $check_auth = $admin_model->first($data);
        if (!$check_auth) {
            Flash::set('errors', ['wrong_email_password' => 'Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại!']);
            Flash::set('error', 'Tài khoản hoặc mật khẩu không chính xác, vui lòng nhập lại!');
            return redirect('admin/auth/login');
        } else {
            $remember = isset($_POST['rememberMe']) ? true : false;
            Auth::setUser('admin', $check_auth, $remember);
            Flash::set('success', 'Đăng nhập thành công!');
            return redirect('admin/category');
        }
    }
    public function logout()
    {
        Auth::logout('admin');
        return redirect('admin/auth/login');
    }

}