<?php 
require_once('app/Models/Model.php');

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = ['id', 'title', 'active', 'created_at', 'updated_at'];

    protected $primaryKey = 'id';

    public function all()
    {
        $sql = "SELECT * FROM categories";
        $this->data = $this->getAll($sql);
        return $this->data;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM categories WHERE id = '$id'";
        return $this->getFirst($sql);
    }   

    public function active($limit = -1)
    {
        $sql = "SELECT * FROM categories where active = 1";
        if ($limit != -1) {
            $sql .= " limit $limit";
        }
        $this->data = $this->getAll($sql);
        return $this->data;
    }

    public function updateStatus($data)
    {
        $updated_at = date('Y-m-d H:i:s');
        $sql = "UPDATE categories SET active='{$data['active']}' ,`updated_at`='$updated_at' WHERE `id`='{$data['id']}'";
        return $this->dbConnection->query($sql);
    }

    public function pagination($limit)
    {
        $sql_all_filter = "SELECT * FROM $this->table";
        $filter = '';
        $filter = isset($_GET['s']) ? "AND title like '%{$_GET['s']}%'" : '';
        $sql_all_filter .= " WHERE TRUE $filter";
        return $this->paginationBase($limit, $sql_all_filter);
    }
    
}
