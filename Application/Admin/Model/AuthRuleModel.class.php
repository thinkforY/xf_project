<?php

namespace Admin\Model;
use Admin\Model\BaseModel;

/**
* 菜单model
*/
class AuthRuleModel extends BaseModel
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
	
}
