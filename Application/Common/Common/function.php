<?php

header("Content-type:text/html;charset=utf-8");

/**
 * 打印函数,便于阅读
 * data 要打印的数据
 */
function p($data){
	//定义样式
	$str='<pre style="display: block;padding: 9.5px;margin: 44px 0 0 0;font-size: 13px;line-height: 1.42857;color: #333;word-break: break-all;word-wrap: break-word;background-color: #F5F5F5;border: 1px solid #CCC;border-radius: 4px;">';
	//如果是boolean或null
	if (is_bool($data)) {
		$show_data = $data ? true : false;
	}else if(is_null($data)){
		$show_data = 'null';
	}else{
		$show_data = print_r($data,true);
	}
	$str .= $show_data;
	$str .= "</pre>";
	echo $str;
}
/**
 * 生成二维码
 * 
 */
function getVerify(){
	$verify = new \Think\Verify();
	$verify->entry();
}
/**
 * 检测二维码是否正确
 */
function checkVerify($code){
	$verify = new \Think\Verify();
	return $verify->check($code);
}

/**
 * 按符号截取字符串的指定部分
 * @param string $str 需要截取的字符串
 * @param string $sign 需要截取的符号
 * @param int $number 如是正数以0为起点从左向右截  负数则从右向左截
 * @return string 返回截取的内容
 */
function cut_str($str,$sign,$number){
	$array = explode($sign, $str);
	$length = count($array);
	if ($number < 0) {
		$new_array = array_reverse($array);
		$abs_number = abs($number);
		if ($abs_number > $length) {
			return "error";
		}else{
			return $new_array[$abs_number - 1];
		}
	}else{
		if ($number >= $length) {
			return "error";
		}else{
			return $new_array[$number];
		}
	}
}

/**
 * 生成不重复的随机数
 * @param  int $start  需要生成的数字开始范围
 * @param  int $end    结束范围
 * @param  int $length 需要生成的随机数个数
 * @return array       生成的随机数
 */
function get_rand_number($start=1,$end=10,$length=4){
	
}



