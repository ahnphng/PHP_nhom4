<?php 
require_once('app/Requests/BaseRequest.php');

class ReviewRequest extends BaseRequest 
{
    public function validateStatus($data) {
        if (!isset($data['id'])) {
            $this->errors['id'] = "Thiếu id";
        }
        if (!isset($data['active'])) {
            $this->errors['active'] = "Thiếu active";
        }
        return $this->errors;
    }
}
