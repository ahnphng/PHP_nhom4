<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/UserRequest.php');
require_once('app/Models/Admin.php');
require_once('core/Flash.php');
require_once('core/Auth.php');
class UserController extends BackendController
{
    public function __construct()
    {
        parent::__construct ();
        $this->middleware->handle();
    }

    public function index() 
    {   
        $user_model = new Admin();
        $users = $user_model->all();
        return $this->view("/pages/user/index.php", ['users' => $users]);
    }

    public function create()
    {
        return $this->view("pages/user/create.php");
    }

    public function update()
    {
        if (isset($_GET['id'])) {
            $user_model = new Admin();
            $user = $user_model->find($_GET['id']);
            if ($user) {
                return $this->view("/pages/user/update.php", ['user' => $user]);
            }
        }
        return redirect('admin/user');
    }

    public function handleCreate()
    {
        $request = new UserRequest();
        $errors = $request->validateCreateBackend($_POST);
        if (empty($errors)) {
            $user_model = new Admin();
            $data = $_POST;
            $data['password'] = md5($data['password']);
            if ($user_model->create($data)) {
                Flash::set('success', 'Tạo người dùng thành công!');
                return redirect('admin/user');
            }
        }
        $errors['form_data'] = $_POST;
        Flash::set('errors', $errors);
        return back();

    }

    public function handleUpdate()
    {
        if (isset($_GET['id'])) {
            $request = new UserRequest();
            $errors = $request->validateUpdateBackend($_POST);
            if (empty($errors)) {
                $user_model = new Admin();
                $data = $_POST;
                if (!empty($data['password'])) {
                    $data['password'] = md5($data['password']);
                } else {
                    $data['password'] = $data['oldPassword'];
                }
                $data['updated_at'] = date('Y-m-d H:i:s');
                if ($user_model->update($data, $_GET['id'])) {
                    Flash::set('success', 'Cập nhật người dùng thành công!');
                    return redirect('admin/user');
                }
            }
            $errors['form_data'] = $_POST;
            Flash::set('errors', $errors);
            return back();
        }
        return redirect('admin/user');
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            if (Auth::getUser('admin')['id'] == $_GET['id']) {
                return redirect('admin/user');
            } else {
                $user_model = new Admin();
                if ($user_model->delete($_GET['id'])) {
                    Flash::set('success', 'Xoá người dùng thành công!');
                    return redirect('admin/user');
                }
            }
        };
    }

}