<?php

namespace Admin\Model;
use Admin\Model\BaseModel;

/**
* 菜单model
*/
class AdminNavModel extends BaseModel
{
	/**
	 * 删除数据
	 * @param	array	$map	where语句数组形式
	 * @return	boolean			操作是否成功
	 */
	public function deleteData($map){
		$count = $this->where(array("pid"=>$map['id']))->count();
		if ($count != 0) {
			return false;
		}
		return true;
	}
	/**
	 * 获取全部菜单
	 * @param  string $type tree获取树形结构 level获取层级结构
	 * @return array       	结构数据
	 */
	public function getTreeData($type='tree',$order=''){
		// 判断是否需要排序
		if(empty($order)){
			$data=$this->select();
		}else{
			$data=$this->order('sort is null,'.$order)->select();
		}
		// 获取树形或者结构数据
		if($type=='tree'){
			$data=\Org\Nx\Data::tree($data,'name','id','pid');
		}elseif($type="level"){
			$data=\Org\Nx\Data::channelLevel($data,0,'&nbsp;','id');
			// 显示有权限的菜单
			$auth=new \Think\Auth();
			// p($data);
			foreach ($data as $k => $v) {
				// p($auth->check($v['mca'],$_SESSION['xf_admin']['id']));
				if ($auth->check($v['mca'],$_SESSION['xf_admin']['id'])) {
					foreach ($v['_data'] as $m => $n) {
						if(!$auth->check($n['mca'],$_SESSION['xf_admin']['id'])){
							unset($data[$k]['_data'][$m]);
						}
					}
				}else{
					// 删除无权限的菜单
					unset($data[$k]);
				}
			}
		}
		// p($data);die;
		return $data;
	}
}
