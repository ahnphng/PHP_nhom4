<?php 

require_once('app/Models/Model.php');

class OrderDetail extends Model
{
    protected $table = 'order_details';

    protected $fillable = ['id', 'order_id', 'product_id', 'price', 'quantity', 'color', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    
}
