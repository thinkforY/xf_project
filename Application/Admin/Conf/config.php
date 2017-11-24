<?php
return array(
	//'配置项'=>'配置值'
	'TMPL_TEMPLATE_SUFFIX'=>'.htm',//更改模板文件后缀名
	'TMPL_PARSE_STRING' => array(
        '__ADMIN_CSS__'       => __ROOT__ . '/Public/Admin/css',       // 后台样式路径
        '__ADMIN_JS__'        => __ROOT__ . '/Public/Admin/js',        // 后台js路径
        '__ADMIN_IMG__'        => __ROOT__ . '/Public/Admin/images',        // 后台image路径
        '__ADMIN_UPLOAD__'        => __ROOT__ . '/Public/Upload',        // 后台文件上传路径
    ),
    //自定义success与error模板
    'TMPL_ACTION_SUCCESS'=>'Public:dispatch_jump',
	'TMPL_ACTION_ERROR'=>'Public:dispatch_jump',
);