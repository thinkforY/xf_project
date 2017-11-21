<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

class MenuController extends BaseController {
    public function lst(){
        $menu = D('Admin_nav');
        $list = $menu->getTreeData("tree","sort,id");
        $this->assign('list',$list);
        $this->display();
    }
    public function add(){
        $pid = I('pid');
        if ($pid) {
            $this->assign('pid',$pid);
        }
    	$this->display();
    }
    public function save(){
        $menu = D('Admin_nav');
        if (IS_POST) {
            $data = I('post.');
            if (I('id')) {//编辑
                $map['id'] = I('id');
                if ($menu->create()) {
                   if ($menu->editData($map,$data)) {
                        $this->success("修改菜单成功",U("menu/lst"));
                    }else{
                        $this->error("修改菜单失败");
                    }
                }else{
                    $this->error($menu->getError());
                }
            }else{//添加
                if ($menu->create()) {
                    if (empty($data["pid"])) {
                        $data['pid'] = 0;
                    }
                    if ($menu->addData($data)) {
                        $this->success("添加菜单成功",U("menu/lst"));
                    }else{
                        $this->error("添加菜单失败");
                    }
                }else{
                    $this->error($menu->getError());
                }
            }
        }
    }
    public function edit(){
        $menu = D("AdminNav");
        $id = I('id');
        if ($id) {
            $data = $menu->where(array('id'=>$id))->find();
            $this->assign("data",$data);
        }
    	$this->display();
    }

    public function del(){
        $menu = D("AdminNav");
        $map['id'] = I('id');
        if ($menu->deleteData($map)) {
            $this->success("删除菜单成功",U('menu/lst'));
        }else{
            $this->error("删除菜单失败");
        }
    }

    /**
     * 菜单排序
     */
    public function order(){
        $data=I('post.');
        $result=D('AdminNav')->orderData($data);
        if ($result) {
            $this->success('排序成功',U('Admin/menu/lst'));
        }else{
            $this->error('排序失败');
        }
    }
}