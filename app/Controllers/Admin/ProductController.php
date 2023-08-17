<?php 

require_once('app/Controllers/Admin/BackendController.php');
require_once('app/Requests/ProductRequest.php');
require_once('app/Models/Product.php');
require_once('app/Models/Category.php');
require_once('core/Flash.php');
require_once('core/Storage.php');
require_once('core/Auth.php');
class ProductController extends BackendController
{
    public function __construct()
    {
        parent::__construct ();
        $this->middleware->handle();
    }

    public function index() 
    {   
        $product_model = new Product();
        $products = $product_model->pagination(10);
        return $this->view("pages/product/index.php", $products);
    }

    public function create()
    {
        $category_model = new Category();
        $categories = $category_model->all();
        return $this->view("pages/product/create.php", ['categories' => $categories]);
    }

    public function update()
    {
        if (isset($_GET['id'])) {
            $product_model = new Product();
            $product = $product_model->find($_GET['id']);
            $category_model = new Category();
            $categories = $category_model->all();
            return $this->view("pages/product/update.php", ['product' => $product, 'categories' => $categories]);
        }
        redirect('admin/category');
    }

    public function handleCreate()
    {
        $request = new ProductRequest();
        $errors = $request->validateCreate($_POST);
        $file = $_FILES['thumbnail'];
        if (!$file['error'] == 0) {
            $errors['thumbnail'] = 'Ảnh không được để trống hoặc bị sai định dạng';
        }
        if (empty($errors)) {
            $file['name'] = md5(now()).'.'.pathinfo($file['name'], PATHINFO_EXTENSION);;
            $image_name = $file['name'];
            Storage::upload('products', $file);
            $active = isset($_POST['active']) ? 1 : 0;
            $product_model = new Product();
            $data = array_merge($_POST, ['active' => $active, 'thumbnail' => $image_name]);
            $data['description'] = utf8_encode($data['description']);
            if ($product_model->create($data)) {
                Flash::set('success', 'Tạo sản phẩm thành công!');
                return redirect('admin/product');
            }
        }
        $errors['form_data'] = $_POST;
        Flash::set('errors', $errors);
        return back();
        
    }

    public function handleUpdate()
    {
        if (isset($_GET['id'])) {
            $request = new ProductRequest();
            $errors = $request->validateUpdate($_POST);
            if (empty($errors)) {
                $id = $_GET['id'];
                $product_model = new Product();
                $product = $product_model->find($id);
                $file = $_FILES['thumbnail'];
                if ($file['error'] == 0) {
                    Storage::upload('products', $file);
                    unlink('public/storage/products/'.$product['thumbnail']);
                    $image_name = $file['name'];
                } else {
                    $image_name = $product['thumbnail'];
                }
                $active = isset($_POST['active']) ? 1 : 0;
                $data = array_merge($_POST, ['active' => $active, 'thumbnail' => $image_name]);
                $data['description'] = utf8_encode($data['description']);
                if ($product_model->update($data, $id)) {
                    Flash::set('success', 'Cập nhật sản phẩm thành công!');
                    return redirect('admin/product');
                }
            }
            $errors['form_data'] = $_POST;
            Flash::set('errors', $errors);
            return back();
        }
        redirect('admin/product');
    }

    public function status()
    {
        $request = new ProductRequest();
        $errors = $request->validateStatus($_GET);
        if (empty($errors)) {
            $product_model = new Product();
            $product_model->updateStatus($_GET);
            Flash::set('success', 'Cập nhật trạng thái sản phẩm thành công!');
        }
        return redirect('admin/product');
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product_model = new Product();
            $product = $product_model->find($id);
            $path = 'public/storage/products/'.$product['thumbnail'];
            if (file_exists($path)) {
                unlink($path);
            }
            if ($product_model->delete($id)) {
                Flash::set('success', 'Xoá sản phẩm thành công!');
                return redirect('admin/product');
            } else {
                Flash::set('error', 'Xoá sản phẩm thất bại!');
                // redirect('admin/product');
                return back();
            }
        };
    }

}