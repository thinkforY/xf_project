<?php
namespace Admin\Controller;
use Think\Controller;
class BaseController extends Controller {
    public function _initialize(){
    	if (!empty(session("xf_admin"))) {
    		$this->getLeftMenu();
            $this->checkStatus();
    		layout("layout/layout");
    	}else{
    		$this->redirect('login/login');
    	}
    }

    //分配左侧菜单
    public function getLeftMenu(){
    	$menu = D('AdminNav');
    	$menus = $menu->getTreeData("level",'sort DESC,id ASC');
        // p($menus);die;
    	$this->assign('menu',$menus);
    }
    //选中状态
    public function checkStatus(){
        $menu = D("AdminNav");
        $activeId = I('activeId');
        $data = $menu->where(array('id'=>$activeId))->find();
        $this->assign('data',$data);
    }
}