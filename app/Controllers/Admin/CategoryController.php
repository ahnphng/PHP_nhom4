<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/CategoryRequest.php');
require_once('app/Models/Category.php');
require_once('app/Models/Pagination.php');
require_once('core/Flash.php');
require_once('core/Storage.php');
require_once('core/Auth.php');
class CategoryController extends BackendController
{
    public function __construct()
    {
        parent::__construct ();
        $this->middleware->handle();
    }

    public function index() 
    {   
        $categories_model = new Category();
        $categories = $categories_model->pagination(5);
        return $this->view("pages/category/index.php", $categories);
    }

    public function create()
    {
        return $this->view("pages/category/create.php");
    }

    public function update()
    {
        if (isset($_GET['id'])) {
            $category_model = new Category();
            $category = $category_model->find($_GET['id']);
            return $this->view("pages/category/update.php", ['category' => $category]);
        }
        redirect('admin/category');
    }

    public function handleCreate()
    {
        $request = new CategoryRequest();
        $errors = $request->validateCreate($_POST);
        if (empty($errors)) {
            $active = isset($_POST['active']) ? 1 : 0;
            $category_model = new Category();
            $data = array_merge($_POST, ['active' => $active]);
            if ($category_model->create($data)) {
                Flash::set('success', 'Tạo danh mục thành công!');
                return redirect('admin/category');
            }
        }
        $errors['form_data'] = $_POST;
        Flash::set('errors', $errors);
        return back();
        
    }

    public function handleUpdate()
    {
        if (isset($_GET['id'])) {
            $request = new CategoryRequest();
            $errors = $request->validateUpdate($_POST);
            if (empty($errors)) {
                $id = $_GET['id'];
                $category_model = new Category();
                $active = isset($_POST['active']) ? 1 : 0;
                $data = array_merge($_POST, ['active' => $active, 'updated_at' => now()]);
                if ($category_model->update($data, $id)) {
                    Flash::set('success', 'Cập nhật danh mục thành công!');
                    return redirect('admin/category');
                }
            }
            $errors['form_data'] = $_POST;
            Flash::set('errors', $errors);
            return back();
        }
        redirect('admin/category');
    }

    public function status()
    {
        $request = new CategoryRequest();
        $errors = $request->validateStatus($_GET);
        if (empty($errors)) {
            $category_model = new Category();
            $category_model->updateStatus($_GET);
            Flash::set('success', 'Cập nhật trạng thái danh mục thành công!');
        }
        return redirect('admin/category');
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $category_model = new Category();
            $category = $category_model->find($id);
            unlink('public/storage/categories/'.$category['thumbnail']);
            if ($category_model->delete($id)) {
                Flash::set('success', 'Xoá danh mục thành công!');
                redirect('admin/category');
            }
        };
    }

}