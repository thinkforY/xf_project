<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;

class AdminUsersController extends BaseController {
    public function lst(){
        $groupAccess = D('AuthGroupAccess');
        $list = $groupAccess->getAllData();
        $this->assign('list',$list);
        $this->display();
    }
    public function add(){
        $group = D('AuthGroup');
        $list = $group->select();
        $this->assign('list',$list);
    	$this->display();
    }
    public function save(){
        $user = D('AdminUser');
        if (IS_POST) {
            if (I('id')) {//编辑
                $data=I('post.');
                // 组合where数组条件
                $uid=$data['id'];
                $map=array(
                    'id'=>$uid
                    );
                // 修改权限
                D('AuthGroupAccess')->deleteData(array('uid'=>$uid));
                foreach ($data['gid'] as $k => $v) {
                    $group=array(
                        'uid'=>$uid,
                        'group_id'=>$v
                        );
                    D('AuthGroupAccess')->addData($group);
                }
                $data=array_filter($data);
                // 如果修改密码则md5
                if (!empty($data['password'])) {
                    $data['password']=md5($data['password']);
                }
                $data['status'] = I('status');
                $result=D('AdminUser')->editData($map,$data);
                if($result){
                    // 操作成功
                    $this->success('编辑管理员成功',U('Admin/adminUsers/lst'));
                }else{
                    $error_word=D('AdminUser')->getError();
                    if (empty($error_word)) {
                        $this->success('编辑管理员成功',U('Admin/adminUsers/lst'));
                    }else{
                        // 操作失败
                        $this->error($error_word);                  
                    }

                }
            }else{//添加
                $data = I('post.');
                $result = $user->addData($data);
                if ($result) {
                    if (!empty($data['gid'])) {
                        foreach ($data['gid'] as $k => $v) {
                            $group_data = array(
                                'uid'=>$result,
                                'group_id'=>$v
                            );
                            D('AuthGroupAccess')->addData($group_data);
                        }
                    }
                    // 操作成功
                    $this->success('添加管理员成功',U('adminUsers/lst'));
                }else{
                    $error = $user->getError();
                    $this->error($error);
                }
            }
        }
    }
    public function edit(){
        $id=I('get.id',0,'intval');
        // 获取用户数据
        $user_data=M('AdminUser')->find($id);
        // 获取已加入用户组
        $group_data=M('AuthGroupAccess')
            ->where(array('uid'=>$id))
            ->getField('group_id',true);
        // 全部用户组
        $data=D('AuthGroup')->select();
        $assign=array(
            'data'=>$data,
            'user_data'=>$user_data,
            'group_data'=>$group_data
            );
        $this->assign($assign);
        $this->display();
    }

    public function del(){

    }
}