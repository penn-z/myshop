<?php
return array(
	//'配置项'=>'配置值'
	
	// 添加数据库配置信息
	'DB_TYPE'=>'mysql',// 数据库类型
	'DB_HOST'=>'127.0.0.1',// 服务器地址
	'DB_NAME'=>'shop',// 数据库名
	'DB_USER'=>'root',// 用户名
	'DB_PWD'=>'root',// 密码
	'DB_PORT'=>3306,// 端口
	'DB_PREFIX'=>'think_',// 数据库表前缀
	'DB_CHARSET'=>'utf8',// 数据库字符集
	
	/*模板相关配置 */
	'TMPL_PARSE_STRING'  =>array(
		'__PUBLIC__' => __ROOT__.'/Public/Admin', // 更改默认的/Public 替换规则
		'__JS__'     => __ROOT__.'/Public/Admin/js', // 增加新的JS类库路径替换规则
		'__UPLOAD__' => __ROOT__.'/Uploads', // 增加新的上传路径替换规则
		'__CSS__'     => __ROOT__.'/Public/Admin/css', // 增加新的CSS类库路径替换规则
		'__IMAGE__'     => __ROOT__.'/Public/Admin/imgs', // 增加新的IMAGE类库路径替换规则
		
	),
);
