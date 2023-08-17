<?php 

require_once('app/Middlewares/BaseMiddleware.php');
require_once('core/Auth.php');

class UserMiddleware extends BaseMiddleware
{
    public function handle($parameters = null)
    {
        if (!Auth::loggedIn('user')) {
            return redirect('');
        }
        return true;
    }
}