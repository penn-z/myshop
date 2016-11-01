<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>商品添加</title>
<link href="/Public/Admin/css/page.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/main.css" rel="stylesheet" type="text/css" />
<link href="/Public/Admin/css/webmallDialog.css" rel="stylesheet" type="text/css" />
<style>
.add_title_img {
   
    height: 35px;
    padding: 5px 5px;
    position: relative;
}
.add_title_img #title_img {
    border: 2px solid #c1c1c1;
    float: left;
    height: 30px;
    width: 50px;
}
.add_title_img #title_img img {
    height: 30px;
    width: 50px;
}
a.title_text {
    color: #999;
    float: left;
    letter-spacing: 2px;
    line-height: 35px;
    padding-left: 15px;
}

.eventlink{
	color: #fff;
    float: left;
    font-weight: 600;
    height: 32px;
    line-height: 32px;
    margin-right: 10px;
    padding: 0 10px;
    text-align: center; border-radius:3px; background:#09C;
	cursor:pointer
}
#title {width:450px;}
#ad_img {position:relative;top:-5px; display:none;}
#img-view {display:inline-block;border: 1px solid #CCC;position:relative;top: 7px;}
#img-view img {width: 60px;height:32px;}
#add_file {width: 70px;}
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
.type_content{
    width:530px;
    height:30px;
    display:block;
    margin-top:4px;
}
</style>
</head>
<body bgcolor="#F7F7F7">
<div class="content">
	
    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：商品管理-&gt;商品添加</div>
    <div class="m_content">
    	<div class="keywords_show"></div>
        <div class="real_c">
            
            <?php if($errno != null): ?><p class="tip <?php echo ($errno["style"]); ?>"><?php echo ($errno["str"]); ?><span onclick="$(this.parentNode).slideUp();">X</span></p><?php endif; ?>
           

            <div class="s-space"></div>

        	<div>
            	
            <form name="goods_add" method="post" action="/admin/goods/add">
            <table border="0" cellpadding="0" cellspacing="0" id="add_table" width="100%">
                <tr>
                    <td class="left_td">商品名称：</td>
                    <td class="right_td"><input type="text" name="goods_name" class="input" value="" id="title"/></td>
                </tr>
                <!-- <tr>
                    <td class="left_td">商品原价：</td>
                    <td class="right_td"><input type="text" name="goods_price" class="input" value="" /></td>
                </tr>
                <tr>
                    <td class="left_td">商品促销价：</td>
                    <td class="right_td"><input type="text" name="goods_discount" class="input" value=""/></td>
                </tr>
                <tr>
                    <td class="left_td">商品序列号：</td>
                    <td class="right_td"><input type="text" name="goods_sn" class="input" value="" /></td>
                </tr>
                <tr>
                    <td class="left_td">商品库存：</td>
                    <td class="right_td"><input type="text" name="goods_nums" class="input" value="" /></td>
                </tr> -->
                <tr>
                    <td class="left_td">商品月销量：</td>
                    <td class="right_td"><input type="text" name="month_sales" class="input" value="" /></td>
                </tr>
                <tr>
                    <td class="left_td">商品累计销量：</td>
                    <td class="right_td"><input type="text" name="cumulative_sales" class="input" value="" /></td>
                </tr>
                <tr>
                    <td class="left_td">商品评价总数：</td>
                    <td class="right_td"><input type="text" name="goods_evaluation" class="input" value="" /></td>
                </tr>
                
                
                <tr>
               
                    <td class="left_td">商品<input style="width:40px;margin:1px;" type="text" name="type1" class="input" placeholder="规格名1">及信息：</td>
                    
                    <td class="right_td" id="goods_type">
                        <div class="type_content">
                            <input style="width:80px;" type="text" name="goods_sn[]" placeholder="商品货号" class="input" value="" />
                            <input style="width:80px;" type="text" name="goods_type[]" class="input" placeholder="规格子类名" value="" />
                            <input style="width:80px;" type="text" name="goods_price[]" placeholder="商品原价" class="input" value="" />
                            <input style="width:80px;" type="text" name="goods_discount[]" placeholder="商品折扣价" class="input" value="" />
                            <input style="width:80px;" type="text" name="goods_num[]" class="input" placeholder="库存数量" value="" />
                            <img src="/Public/images/minus sign.jpg" style="width:20px;height:20px;cursor:pointer;" onclick="delType(this)" />
                        </div>
                    </td>
                    <td class="left_td"><img src="/Public/images/add.jpg" style="width:20px;height:20px;cursor:pointer;" id="style_add" />
                    </td>
                
                </tr>
               
                <tr>
                    <td class="left_td">商品<input style="width:40px;margin:1px;" type="text" name="type2" class="input" placeholder="规格名2">：</td>
                    <td class="right_td" id="goods_package">
                        <div id="type_content">
                            <input type="text" name="type2_name[]" class="input" value=""  placeholder="规格子类名"/>
                            <img src="/Public/images/minus sign.jpg" style="width:20px;height:20px;cursor:pointer;" onclick="delType(this)" />
                        </div>
                        

                    </td>
                    <td>
                    <img src="/Public/images/add.jpg" style="width:20px;height:20px;cursor:pointer;float:right;" id="package_add" />
                    </td>
                </tr>

                <tr>
					<td class="left_td">商品简介：</td>
                    <td class="right_td">
						<textarea  style="width:480px; height:80px" name="goods_brief" class="input" id="description" ></textarea>
					</td>
                </tr>

                <tr>
                    <td class="left_td">商品范畴：</td>
                    <td class="right_td">
						<select name="category_id" id="article_category" style="xbackground:#FFF;border:1px solid #CCC;">
                            <option value="0" >--未分类--</option>
                            <?php if(is_array($cat)): foreach($cat as $key=>$vo): ?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; ?>
						</select>  
                    </td>
                </tr>
                <tr>
                    <td class="left_td">商品来源名称：</td>
                    <td class="right_td"><input type="text" name="goods_source" class="input" value="" id="srcname"/></td>
                </tr>

                <tr>
                    <td class="left_td">选购热点：</td>
                    <td class="right_td"><input type="text" name="hot_spot" class="input" value="" id="hot_sopt"/></td>
                </tr>

                <tr id="qr-upload-tr">
                    <td class="left_td">商品缩略图片：</td>
                    <td class="right_td" id="upload-td">
                        <input type="file" id="img_src" style="display:block;width: 200px;" /> 
                        
                        <div id="img-box"></div>
                    </td>
                </tr>
                
                
                <tr style=" clear:both">
                    <td class="left_td">商品内容：</td>
					<td class="right_td">
						<!-- 加载编辑器的容器 -->
						<textarea style="z-index: 1;" name="goods_description" id="content" type="text/plain">
							
						</textarea>
					</td>
                </tr>
                
               
                <!-- 操作按钮 -->
                <tr><td colspan="4" valign="bottom" align="center"><div class="formHandleBox" style="padding-left:100px;">
                    <input type="hidden" name="act" value="add" />
                    <a href="javascript:void(0)" onclick="form_submit(); return false;" class="eventlink">保存数据</a>
                </div></td></tr>
            </table>
            </form>
            </div>
        </div>
    </div>
    <div class="b_border"></div>
    
</div>
<script type="text/javascript" src="/Public/tools/UEditor/ueditor.config.js"></script>
<!-- 编辑器源码文件 -->
<script type="text/javascript" src="/Public/tools/UEditor/ueditor.all.js"></script>
<script type="text/javascript" src="/Public/Admin/js/jquery.min.js"></script>
<script language="javascript" src="/Public/Admin/js/Ajax.class.js"></script>
<script language="javascript" src="/Public/Admin/js/JWin.js"></script>
<script language="javascript" src="/Public/Admin/js/XHRUploader.class.js"></script>
<script language="javascript">
var ue = UE.getEditor('content',{
	textarea: 'content',
	initialFrameWidth: 800,
	initialFrameHeight: 400,
	autoHeightEnabled: false,
	autoFloatEnabled: false,
    enterTag: 'br',
});

XHRUploader.init({
    handlerUrl: '/admin/img/accept',
    input: '_imgs[]'
}).uploadFile('img_src', {
    'partition' : 'date',
    'space'     : 'article.image',
    'thumb'     : 2,
    'width'     : 0,
    'height'    : 0
},{
    ready: function(ret){
        //alert('zhengzai');
    },
    complete: function(ret){
        //alert('wangcheng');
        
        var html = '<div id="add" style="float:left;"><a onclick="delPic(this)">X</a><img src="'+ret.data+'" width="80px" /><input type="hidden" name="thumb[]" value="'+ret.data+'" /></div>';
        $('#img-box').append(html);
    }
});

function delPic(data){
    $(data).parents("#add").empty();
}

function form_submit ()
{
	/*var _ele = document.goods_add.elements;
	var prevNode = null;
	for ( var i = 0; i < _ele.length; i++ )
    {
		prevNode = _ele[i].parentNode.previousSibling;
        if ( prevNode == null ) continue;
        if ( _ele[i].id == 'add_file' || _ele[i].id == 'thumb-text' )  continue;
		while ( prevNode.nodeType != 1 )
			prevNode = prevNode.previousSibling;
		if ( _ele[i].value.trim() == '' )
        {
			JWin.lock.work(1000);
			JWin.tip.work(prevNode.innerHTML.replace('：','')+'不能为空。','warn',200,1000);
			return;
		}
	}   */

	document.goods_add.submit();
}

function viewImage( img_src )
{   
	if ( img_src == '' ) return;
	
    JWin.lock.work();
	JWin.win.work('预览图','<div style="text-align:center;padding:10px;"><img src="'+img_src+'" border="0" width="100%"/></div>',{'width':'640px','text-align':'center'},function(){
        JWin.lock.hide(0);
        JWin.win.hide(0);
    });
}

//动态添加商品种类
$(document).ready(function(){
    $("#style_add").click(function(){
        $("#goods_type").append('<div id="type_content"><td class="right_td"><input style="width:80px;" type="text" name="goods_sn[]" placeholder="商品货号" class="input" value="" /><input style="width:80px;" type="text" name="goods_type[]" class="input" placeholder="规格子类名" value="" /><input style="width:80px;" type="text" name="goods_price[]" placeholder="商品原价" class="input" value="" /><input style="width:80px;" type="text" name="goods_discount[]" placeholder="商品折扣价" class="input" value="" /><input style="width:80px;" type="text" name="goods_num[]" class="input" placeholder="库存数量" value="" /><img src="/Public/images/minus sign.jpg" style="width:20px;height:20px;cursor:pointer;" onclick="delType(this)"/></td></div>');
    });
})

//动态添加商品包装种类
$(document).ready(function(){
    $("#package_add").click(function(){
        $("#goods_package").append('<div id="type_content"><td class="right_td"><input type="text" name="type2_name[]"" class="input" placeholder="规格子类名"/><img src="/Public/images/minus sign.jpg" style="width:20px;height:20px;cursor:pointer;" onclick="delType(this)"/></td></div>');
    });
})

function delType(obj){
    var bool = window.confirm("确定要删除吗？");
    if(bool != true) return;
    $(obj).parents("#type_content").remove();
}

function delPic(data){
    var bool = confirm('要删除吗？');
    if( bool!=true ) return; 
    $(data).parents("#add").empty();
}
</script>
</body>
</html>