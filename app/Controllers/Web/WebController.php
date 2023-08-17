<?php 
require_once('app/Controllers/Controller.php');
require_once('app/Middlewares/UserMiddleware.php');
require_once 'core/Flash.php';

class WebController extends Controller
{
    protected $middleware;
    public function __construct()
    {
        $this->middleware = new UserMiddleware();
    }

    public function view($view, $data = []) 
    {
        return render("web/$view", $data);
    }
}