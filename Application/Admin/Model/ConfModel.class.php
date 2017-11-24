<?php
namespace Admin\Model;
use Admin\Model\BaseModel;

/**
* 网站配置Model层
*/
class ConfModel extends BaseModel
{
	public function editSave(){
		$data = I('post.');
		if($_FILES['logo']['tmp_name']){
			$confs = $this->field('value')->where(array('ename'=>'logo'))->find();
			if ($confs) {
				@unlink($confs['value']);
			}
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize   =     3145728 ;// 设置附件上传大小
            $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
            // $upload->autoSub = false;
            $upload->savePath  =      ''; // 设置附件上传目录
            $upload->rootPath  =      './Public/Upload/'; 
            $info   =   $upload->uploadOne($_FILES['logo']);
            $logo=$info['savepath'].$info['savename'];
            $data['logo']=$logo;
            $this->where(array('ename'=>'logo'))->setField('value',$data['logo']);
        }
		foreach ($data as $k => $v) {
			$this->where(array('ename'=>$k))->setField('value',$v);
            $data[$k]=htmlspecialchars_decode($v);
		}
		return true;
	}
}