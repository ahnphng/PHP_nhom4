<?php 
require_once('app/Models/Model.php');

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['id', 'user_id', 'product_id', 'rating', 'content', 'active', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';


    public function all()
    {
        $sql = "SELECT reviews.*, users.name as 'user_name' FROM `reviews` INNER JOIN users ON users.id = reviews.user_id";
        return $this->getAll($sql);
    }

    public function listActiveByProductId($product_id) {
        $sql = "SELECT reviews.*, users.name as 'user_name' FROM `reviews` INNER JOIN users ON users.id = reviews.user_id WHERE reviews.product_id = $product_id AND reviews.active = 1 order by reviews.created_at DESC";
        return $this->getAll($sql);
    }

    public function updateStatus($data)
    {
        $updated_at = date('Y-m-d H:i:s');
        $sql = "UPDATE reviews SET active='{$data['active']}' ,`updated_at`='$updated_at' WHERE `id`='{$data['id']}'";
        return $this->dbConnection->query($sql);
    }

    public function getAvgReview($product_id) {
        $sql = "SELECT AVG(rating) as 'avg' FROM `reviews` WHERE reviews.product_id = $product_id AND reviews.active = 1";
        return $this->getFirst($sql)['avg'];
    }

    public function pagination($limit)
    {   
        $sql_all_filter = "SELECT reviews.*, users.name as 'user_name', products.name as 'product_name', products.id as 'product_id' FROM `reviews`
            INNER JOIN users ON users.id = reviews.user_id
            INNER JOIN products ON products.id = reviews.product_id
        ";
        return $this->paginationBase($limit, $sql_all_filter);
    }

    public function paginationWeb($limit, $category_id = -1)
    {   
        $sql_all_filter = "SELECT products.* FROM `products` WHERE active = 1";
        if ($category_id > 0) {
            $sql_all_filter .= " AND category_id = '$category_id'";
        }
        if (isset($_GET['q'])) {
            $sql_all_filter .= " AND name like '%{$_GET['q']}%'";
        }
        if (isset($_GET['sort_by'])) {
            $filter = explode('-', $_GET['sort_by']);
            if (count($filter) == 2) {
                $sql_all_filter .= " ORDER BY {$filter[0]} {$filter[1]}";
            }
        }
        return $this->paginationBaseWeb($limit, $sql_all_filter);
    }

    public function paginationSearchWeb($limit, $search)
    {   
        $sql_all_filter = "SELECT * FROM `products` WHERE title like '%$search%'";
        if (isset($_GET['filter'])) {
            $filter = explode('-', $_GET['filter']);
            if (count($filter) == 2) {
                $sql_all_filter .= " ORDER BY {$filter[0]} {$filter[1]}";
            }
        }
        return $this->paginationBaseWeb($limit, $sql_all_filter);
    }


}
