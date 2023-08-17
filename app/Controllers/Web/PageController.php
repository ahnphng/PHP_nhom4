<?php

require_once('app/Controllers/Web/WebController.php');

class PageController extends WebController
{
    public function lien_he()
    {
        return $this->view('pages/lien_he.php');
    }
}
