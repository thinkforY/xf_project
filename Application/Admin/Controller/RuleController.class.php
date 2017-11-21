<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

class RuleController extends BaseController {
    public function lst(){
        $rule = D('AuthRule');
        $list = $rule->getTreeData("tree","id","title");
        // p($list);die;
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
        $rule = D('AuthRule');
        if (IS_POST) {
            if (I('id')) {//编辑
                $map['id'] = I('id');
                if ($rule->create()) {
                   if ($rule->editData($map,$data)) {
                        $this->success("修改权限成功",U("rule/lst"));
                    }else{
                        $this->error("修改权限失败");
                    }
                }else{
                    $this->error($rule->getError());
                }
            }else{//添加
                if ($rule->create()) {
                    $data = I("post.");
                    if (empty($data["pid"])) {
                        $data['pid'] = 0;
                    }
                    if ($rule->addData($data)) {
                        $this->success("添加权限成功",U("rule/lst"));
                    }else{
                        $this->error("添加权限失败");
                    }
                }else{
                    $this->error($rule->getError());
                }
            }
        }
    }
    public function edit(){
        $id = I('id');
        $rule = D("AuthRule");
        $data = $rule->where(array('id'=>$id))->find();
        $this->assign('data',$data);
    	$this->display();
    }

    public function del(){
        $rule = D("AdminNav");
        $map['id'] = I('id');
        if ($rule->deleteData($map)) {
            $this->success("删除权限成功",U('rule/lst'));
        }else{
            $this->error("删除权限失败");
        }
    }

    public function group(){
        $group = D("AuthGroup");
        $list = $group->select();
        $this->assign('list',$list);
        $this->display();
    }
    public function add_group(){
        $this->display();
    }
    public function save_group(){
        $group = D('AuthGroup');
        if (IS_POST) {
            if (I('id')) {//编辑
                $map['id'] = I('id');
                if ($group->create()) {
                   if ($group->editData($map,$data)) {
                        $this->success("修改用户组成功",U("rule/group"));
                    }else{
                        $this->error("修改用户组失败");
                    }
                }else{
                    $this->error($group->getError());
                }
            }else{//添加
                if ($group->create()) {
                    $data = I("post.");
                    if (empty($data["pid"])) {
                        $data['pid'] = 0;
                    }
                    if ($group->addData($data)) {
                        $this->success("添加用户组成功",U("rule/group"));
                    }else{
                        $this->error("添加用户组失败");
                    }
                }else{
                    $this->error($group->getError());
                }
            }
        }
    }
    public function edit_group(){
        $this->display();
    }
    public function delete_group(){
        $id = I('id');
        $group = D("AuthGroup");
        if ($group->deleteData($id)) {
           $this->success("删除用户组成功",U("rule/group")); 
        }else{
            $this->error("删除用户组失败");
        }
    }

//*****************权限-用户组*****************
/**
 * 分配权限
 * @return [type] [description]
 */
    public function rule_group(){
        $rule = D('AuthRule');
        $group = D('AuthGroup');
        if (IS_POST){
            $data=I('post.');
            $map=array(
                'id'=>$data['id']
                );
            $data['rules']=implode(',', $data['rule_ids']);
            $result=D('AuthGroup')->editData($map,$data);
            if ($result) {
                $this->success('分配权限成功',U('rule/group'));
            }else{
                $this->error('分配权限失败');
            }
        }else{
            $id = I("get.id");
            //获取用户组数据
            $group_data = $group->where(array("id"=>$id))->find();
            $group_data['rules'] = explode(',', $group_data['rules']);
            //获取权限数据
            $rule_data = $rule->getTreeData("level","id","title");
            $this->assign(array(
                'group_data'=>$group_data,
                'rule_data'=>$rule_data,
            ));
            $this->display();
        }
    }
//*****************用户-用户组*****************
/**
 * 添加成员
 * @return [type] [description]
 */
    public function check_user(){
        $this->display();
    }
}