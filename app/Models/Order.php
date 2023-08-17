<?php 

require_once('app/Models/Model.php');

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = ['id', 'user_id', 'email', 'name', 'phone', 'address', 'total', 'status', 'pay_method', 'created_at', 'updated_at', 'confirmed_at', 'shipped_at', 'delivered_at', 'cancelled_at'];

    protected $primaryKey = 'id';

    public function all()
    {
        $sql = "SELECT * FROM `orders` ORDER BY created_at DESC";
        return $this->getAll($sql);
    }

    public function listByUserId($id) {
        $sql = "SELECT * FROM `orders` WHERE user_id = $id ORDER BY created_at DESC";
        return $this->getAll($sql);
    }

    public function details($id)
    {
        $sql = "SELECT order_details.*, products.name as 'product_name', products.thumbnail as 'product_thumbnail'  FROM `order_details` INNER JOIN products ON products.id = order_details.product_id WHERE order_details.order_id = $id";
        return $this->getAll($sql);
    }
}
