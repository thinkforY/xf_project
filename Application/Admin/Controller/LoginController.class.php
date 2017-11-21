<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
        $this->display();
    }
    public function signout(){
    	$admin = D('Admin_user');
		// $code = I('verify');
		$username = I('username');
		$password = I('password');
		$userinfo = $admin->where(array("username"=>$username))->find();
		if ($userinfo) {
			if (md5($password) == $userinfo['password']) {
				session('xf_admin',$userinfo);
				$this->success('登录成功!',U('index/index'));
			}else{
				$this->error('用户名或密码错误,请重新输入!');
			}
		}else{
			$this->error('账号不存在!');
		}
    }
    public function verify(){
    	getVerify();
    }
}