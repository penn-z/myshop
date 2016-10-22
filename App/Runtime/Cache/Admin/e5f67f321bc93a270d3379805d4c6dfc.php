<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Light App - Right</title>
<link href="/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="/Public/Admin/js/window.js"></script>
<style>

#img-box img{
	display:block;
	float:left;
}
#img-box a{
	display:block;
	width:12px;
	height:12px;
	line-height:12px;
	font-size: 12px;
	color:orange;
	text-align:center;
	position:relative;
	top:0px;
	left:68px;
	cursor: pointer;
	border:1px orange solid; 
	border-radius:50%;
}
</style>
</head>
<body bgcolor="#F7F7F7">
<div class="content">
	
    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为-&gt;</div>
    
    <div class="m_content">
   
    	<div class="keywords_show">当前搜索关键字为: search</div>
    	<div class="search">
        	<form name="v_search" method="post" action="#">
				<input type="text" name="keywords" value="搜索：请输入关键字" onfocus="clear_d();" onblur="clear_d()" />
				
				<input type="submit" value="" class="buttun">
            </form>
        </div>
        
        <div class="real_c">
			<!-- 网站内容部分 -->
			
			<table>
			
			<tr id="qr-upload-tr">
				<td class="left_td">商品图片：</td>
				<td class="right_td" id="upload-td">
					<input type="file" id="img_src" style="display:block;width: 200px;" /> 
					<form id="upload_thumb" method="post" action="/admin/img/accept">
						<div id="img-box"></div>
						<input type="hidden" name="upload" value="add" />
						<input type="hidden" name="goods_sn" value="<?php echo ($goods_sn); ?>"/>
					</form>
				</td>
			</tr>
			<tr>
                    <td class="left_td"></td>
                    <td class="right_td"><input type="button" onclick="sub()" class="input" value="添加缩略图" /></td>
            </tr>
            
			</table>
			
			
        </div>
    </div>
    
    <div class="b_border">&nbsp;</div>
    
</div>
<script type="text/javascript" src="/Public/js/jquery.js"></script>
<script language="javascript" src="/Public/js/Ajax.class.js"></script>
<script language="javascript" src="/Public/js/XHRUploader.class.js"></script>
<script>
XHRUploader.init({
	handlerUrl: '/admin/img/accept',
	input: '_imgs[]'
}).uploadFile('img_src', {
	'partition'	: 'date',
	'space'		: 'article.image',
	'thumb'     : 2,
	'width'     : 0,
	'goods_sn'  : '<?php echo ($goods_sn); ?>',
	'height'    : 0
},{
	ready: function(ret){
		//alert('zhengzai');
	},
	complete: function(ret){
		//alert('wangcheng');
		
		var html = '<div id="add" style="float:left;"><a onclick="delPic(this)">X</a><img src="'+ret.big_path+'" width="80px" /><input type="hidden" name="big[]" value="'+ret.big_path+'" /><input type="hidden" name="mid[]" value="'+ret.mid_path+'" /><input type="hidden" name="small[]" value="'+ret.small_path+'" /></div>';
		$('#img-box').append(html);
	}
});

function delPic(data){
	var bool = confirm('要删除吗？');
	if( bool!=true ) return; 
	$(data).parents("#add").empty();
}

function sub(){
	$("#upload_thumb").submit();
}
</script>
</body>
</html>