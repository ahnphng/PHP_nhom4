<?php 

require_once('app/Models/Model.php');

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = ['id', 'category_id', 'active', 'name', 'description', 'quantity', 'price', 'thumbnail', 'colors', 'avg_rating' ,'created_at', 'updated_at'];

    protected $primaryKey = 'id';


    public function all()
    {
        $sql = "SELECT products.*, categories.title as 'category_title' FROM `products` INNER JOIN categories ON categories.id = products.category_id";
        return $this->getAll($sql);
    }

    public function updateStatus($data)
    {
        $updated_at = date('Y-m-d H:i:s');
        $sql = "UPDATE products SET active='{$data['active']}' ,`updated_at`='$updated_at' WHERE `id`='{$data['id']}'";
        return $this->dbConnection->query($sql);
    }

    public function listByCategoryId($id, $limit = -1)
    {
        $sql = "SELECT * FROM `products` WHERE category_id = '$id'";
        if (isset($_GET['filter'])) {
            $filter = explode('-', $_GET['filter']);
            if (count($filter) == 2) {
                $sql .= " ORDER BY {$filter[0]} {$filter[1]}";
            }
        }
        if ($limit != -1) {
            $sql .= " LIMIT $limit";
        }
        return $this->getAll($sql);
    }
    
    public function bySearch($search)
    {
        $sql = "SELECT * FROM `products` WHERE title like '%$search%'";
        if (isset($_GET['filter'])) {
            $filter = explode('-', $_GET['filter']);
            if (count($filter) == 2) {
                $sql .= " ORDER BY {$filter[0]} {$filter[1]}";
            }
        }
        return $this->getAll($sql);
    }
    

    public function relative($category_id, $id, $limit)
    {
        $sql = "SELECT * FROM `products` WHERE category_id = '$category_id' AND id != '$id' ORDER BY RAND() LIMIT $limit";
        return $this->getAll($sql);
    }

    // admin
    public function pagination($limit)
    {   
        $sql_all_filter = "SELECT products.*, categories.title as 'category_title' FROM `products` INNER JOIN categories ON categories.id = products.category_id";
        $filter = '';
        $filter = isset($_GET['s']) ? "AND products.name like '%{$_GET['s']}%'" : '';
        $sql_all_filter .= " WHERE TRUE $filter";
        return $this->paginationBase($limit, $sql_all_filter);
    }

    // web
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
        $sql_all_filter = "SELECT * FROM `products` WHERE name like '%$search%'";
        if (isset($_GET['filter'])) {
            $filter = explode('-', $_GET['filter']);
            if (count($filter) == 2) {
                $sql_all_filter .= " ORDER BY {$filter[0]} {$filter[1]}";
            }
        }
        return $this->paginationBaseWeb($limit, $sql_all_filter);
    }

    public function home_news($category_id)
    {
        $sql = "SELECT * FROM `products` WHERE category_id = $category_id ORDER BY created_at DESC LIMIT 8";
        return $this->getAll($sql);
    }

    public function sellers()
    {
        $sql = "SELECT order_details.product_id as 'id', MIN(products.name) as 'name', MIN(products.price) as 'price', MIN(products.thumbnail) as 'thumbnail' , SUM(order_details.quantity) as 'quantity' FROM `order_details` INNER JOIN products ON products.id = order_details.product_id GROUP BY order_details.product_id ORDER BY quantity DESC LIMIT 8";
        return $this->getAll($sql);
    }

}
