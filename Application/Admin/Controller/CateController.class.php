<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

class CateController extends BaseController {
    public function lst(){
        $cate = D('Cate');
        $list = $cate->getTreeData("tree","sort DESC,id ASC");
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
        $cate = D('Cate');
        $pic = post_upload("/Upload/Goods/");
        $data = I('post.');
        $map['id'] = I('id');
        if ($pic) {
            $cates = $cate->findOne($cate,$map['id'],"catepic");
            if (!empty($cates)) {
                @unlink('.'.$cates['catepic']);
            }
            $data['catepic'] = $pic['name'];
        }
        if (IS_POST) {
            if (I('id')) {//编辑
                if ($cate->create()) {
                   if ($cate->editData($map,$data)) {
                        $this->success("修改分类成功",U("cate/lst"));
                    }else{
                        $this->error("修改分类失败");
                    }
                }else{
                    $this->error($cate->getError());
                }
            }else{//添加
                if ($cate->create()) {
                    if (empty($data["pid"])) {
                        $data['pid'] = 0;
                    }
                    if ($cate->addData($data)) {
                        $this->success("添加分类成功",U("cate/lst"));
                    }else{
                        $this->error("添加分类失败");
                    }
                }else{
                    $this->error($cate->getError());
                }
            }
        }
    }
    public function edit(){
        $cate = D("cate");
        $id = I('id');
        if ($id) {
            $data = $cate->where(array('id'=>$id))->find();
            $this->assign("data",$data);
        }
    	$this->display();
    }
    public function del(){
        $cate = D("cate");
        $map['id'] = I('id');
        if ($cate->deleteData($map)) {
            $this->success("删除分类成功",U('cate/lst'));
        }else{
            $this->error("删除分类失败");
        }
    }

    /**
     * 分类排序
     */
    public function order(){
        $data=I('post.');
        $result=D('cate')->orderData($data);
        if ($result) {
            $this->success('排序成功',U('Admin/cate/lst'));
        }else{
            $this->error('排序失败');
        }
    }
}