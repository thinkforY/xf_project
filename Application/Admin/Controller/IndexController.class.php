<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
class IndexController extends BaseController {
    public function index(){
        $this->display();
    }
    public function signout(){
    	session("xf_admin",null);
    	$this->redirect('login/login');
    }
}