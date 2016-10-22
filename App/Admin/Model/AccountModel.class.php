<?php
namespace Admin\Model;
use Think\Model;
class AccountModel extends Model {
	//定义自动验证

	protected $tableName = 'admin';	//匹配admin数据表;框架默认的是与模型同名的数据表
	
	protected $_validate = array(
		array('name','require','用户名称必须'),
	    array('account','require','账户必须'),
	    array('name','','用户名称已经存在！',1,'unique',1), // 验证用户名是否已经存在 
	    array('account','','帐号已经存在！',1,'unique',1), // 验证账号是否已经存在
	    array('surepassword','password','两次密码不一致',0,'confirm'), // 验证确认密码是否和密码一致
	);

	// 定义自动完成
    protected $_auto = array(
        array('addtime','time',1,'function'),
        );
    
}