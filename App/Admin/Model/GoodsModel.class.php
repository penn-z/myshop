<?php
namespace Admin\Model;
use Think\Model;
class GoodsModel extends Model {
	//定义自动验证
	protected $_validate    =   array(
	    array('goods_name','require','商品名称必须'),
	    array('goods_name','','商品名称已经存在！',1,'unique',1), // 验证商品名称是否已经存在
		array('goods_sn[]','require','商品序列号必须'),
	    //~ array('goods_sn[]','','商品序列号已经存在！',1,'unique',1), // 验证商品序列号是否已经存在
	);

	// 定义自动完成
    protected $_auto    =   array(
        array('addtime','time',1,'function'),
        );
}
