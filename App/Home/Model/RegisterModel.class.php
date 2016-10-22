<?php
namespace Home\Model;
use Think\Model;
class RegisterModel extends Model {

	protected $tableName = 'user';
	// 定义自动验证
	protected $_validate = array(
     	array('email','email','email格式错误！',2), // 如果输入则验证Email格式是否正确
     	array('email','','邮箱已经存在！',1,'unique',1), // 验证邮箱是否已经存在
     	array('account','','账号已经存在！',1,'unique',1), // 验证邮箱是否已经存在
     	array('password','6,30','密码长度不正确',0,'length'), // 验证密码是否在指定长度范围
     	array('sure_password','password','确认密码不一致',0,'confirm'), // 验证确认密码是否和密码一致  
   	);
	// 定义自动完成
	protected $_auto = array(
		array('addtime','time',1,'function'),
		array('password','md5',3,'function'),
	);
}