<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
/**
* 网站配置控制器
*/
class ConfController extends BaseController
{
	public function lst(){
		$conf = D('Conf');
		$map = "";
		$list = $conf->getPage($conf,$map,"id",10,"id,cname,ename,d_type,c_type,value,values,sort");
		$this->assign('list',$list['data']);
		$this->assign('page',$list['page']);
		$this->display();
	}

	public function lstconf(){
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function edit(){
		$id = I('id');
		$conf = D("Conf");
		$data = $conf->findOne($conf,$id,"id,cname,ename,d_type,c_type,value,values");
		$this->assign('data',$data);
		$this->display();
	}
	public function save(){
		$conf = D('Conf');
		$data = I('post.');
		if ($conf->addData($data)) {
			$this->success("添加配置项成功",'lst');
		}else{
			$this->error("修改配置项失败");
		}
	}
	public function editSave(){
		$conf = D('Conf');
		$map['id'] = I('id');
		$data = I('post.');
		if ($conf->editData($map,$data)) {
			$this->success("编辑配置项成功",'lst');
		}else{
			$this->error("编辑配置项失败");
		}
	}
}