<?php

require_once 'app/Models/Model.php';

class User extends Model
{
    protected $table = 'users';

    protected $fillable = ['id', 'name', 'email', 'password', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public function first($data)
    {
        $email = $data['email'];
        $password = md5($data['password']);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        return $this->getFirst($sql);
    }

    public function all()
    {
        $sql = "SELECT * FROM users";
        return $this->getAll($sql);
    }

    public function emailExists($data)
    {
        $email = trim($data['email']);
        $sql = "SELECT * FROM users WHERE email = '$email'";
        return $this->getFirst($sql);
    }

}
