<?php
require_once('app/Requests/BaseRequest.php');
require_once('app/Models/Admin.php');

class UserRequest extends BaseRequest
{
    public function validateCreateBackend($data)
    {
        if (empty($data['email'])) {
            $this->errors['email'] = 'Email không được để trống';
        } else {
            $user_model = new Admin();
            $emailExists = $user_model->emailExists($data);
            if ($emailExists) {
                $this->errors['email'] = 'Email đã được sử dụng';
            }
        }

        if (empty($data['password'])) {
            $this->errors['password'] = 'Mật khẩu không được để trống';
        }

        if (empty($data['password_confirmation'])) {
            $this->errors['password_confirmation'] = 'Xác nhận mật khẩu không được để trống';
        }

        if (!empty($data['password']) && !empty($data['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
            $this->errors['password_confirmation'] = 'Nhập lại mật khẩu không chính xác';
        }

        return $this->errors;
    }

    public function validateCreateFrontend($data)
    {

        if (empty($data['name'])) {
            $this->errors['name'] = 'Tên không được để trống';
        }

        if (empty($data['email'])) {
            $this->errors['email'] = 'Email không được để trống';
        } else {
            $user_model = new User();
            $emailExists = $user_model->emailExists($data);
            if ($emailExists) {
                $this->errors['email'] = 'Email đã được sử dụng';
            }
        }

        if (empty($data['password'])) {
            $this->errors['password'] = 'Mật khẩu không được để trống';
        }

        if (empty($data['password_confirmation'])) {
            $this->errors['password_confirmation'] = 'Xác nhận mật khẩu không được để trống';
        }

        if (!empty($data['password']) && !empty($data['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
            $this->errors['password_confirmation'] = 'Nhập lại mật khẩu không chính xác';
        }

        return $this->errors;
    }

    public function validateUpdateBackend($data)
    {
        if (empty($data['name'])) {
            $this->errors['name'] = 'Tên không được để trống';
        }

        if (!empty($data['password']) && empty($data['password_confirmation'])) {
            $this->errors['password_confirmation'] = 'Xác nhận mật khẩu không được để trống';
        }

        if (!empty($data['password']) && !empty($data['password_confirmation']) && $data['password'] != $data['password_confirmation']) {
            $this->errors['password_confirmation'] = 'Nhập lại mật khẩu không chính xác';
        }
        return $this->errors;
    }

    public function validateUpdateInfoFrontend($data)
    {
        if (empty($data['id'])) {
            $this->errors['id'] = 'ID không được để trống';
        }

        if (empty($data['name'])) {
            $this->errors['name'] = 'Tên không được để trống';
        }

        if (empty($data['phone'])) {
            $this->errors['phone'] = 'SĐT không được để trống';
        }

        if (empty($data['address'])) {
            $this->errors['address'] = 'Địa chỉ không được để trống';
        }
        return $this->errors;
    }

    public function validateChangePasswordFrontend($data)
    {
        if (empty($data['id'])) {
            $this->errors['id'] = 'ID không được để trống';
        }

        if (empty($data['email'])) {
            $this->errors['email'] = 'Email không được để trống';
        }

        if (empty($data['password'])) {
            $this->errors['password'] = 'Mật khẩu không được để trống';
        }

        if (empty($data['newPassword'])) {
            $this->errors['newPassword'] = 'Mật khẩu mới không được để trống';
        }

        if (empty($data['cNewPassword'])) {
            $this->errors['cNewPassword'] = 'Xác nhận mật khẩu mới không được để trống';
        }

        return $this->errors;
    }
}
