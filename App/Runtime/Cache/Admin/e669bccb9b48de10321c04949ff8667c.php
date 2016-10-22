<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章编辑</title>
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
</style>
</head>
<body bgcolor="#F7F7F7">
<div class="content">
	
    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：文章管理-&gt;添加文章</div>
    <div class="m_content">
    	<div class="keywords_show"></div>
        <div class="real_c">
            
            <?php if($errno != null): ?><p class="tip <?php echo ($errno["style"]); ?>"><?php echo ($errno["str"]); ?><span onclick="$(this.parentNode).slideUp();">X</span></p><?php endif; ?>
           

            <div class="s-space"></div>

        	<div>
            	
            <form name="article_add" method="post" action="/Admin/Article/add">
            <table border="0" cellpadding="0" cellspacing="0" id="add_table" width="100%">
                <tr>
                    <td class="left_td">文章标题：</td>
                    <td class="right_td"><input type="text" name="title" class="input" value="" id="title"/></td>
                </tr>
                <tr>
					<td class="left_td">文章简介：</td>
                    <td class="right_td">
						<textarea  style="width:480px; height:80px" name="description" class="input" id="description" ></textarea>
					</td>
                </tr>
                <tr>
                    <td class="left_td">文章类别：</td>
                    <td class="right_td">
						<select name="" id="article_category" style="xbackground:#FFF;border:1px solid #CCC;">
							<option value="0" >--未分类--</option>
							
							<option>  </option>
							
						</select>  
                    </td>
                </tr>
                <tr>
                    <td class="left_td">文章来源名称：</td>
                    <td class="right_td"><input type="text" name="name" class="input" value="" id="srcname"/></td>
                </tr>
                
                
              
                <tr style=" clear:both">
                    <td class="left_td">文章内容：</td>
					<td class="right_td">
						<!-- 加载编辑器的容器 -->
						<textarea style="z-index: 1;" name="content" id="content" type="text/plain">
							
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
	handlerUrl: '/Public/Uploads/',
	input: '_imgs[]'
}).uploadFile('add_file', {
	'partition'	: 'date',
	'space'		: 'article.image',
	'thumb'     : 2,
	'width'     : 0,
	'height'    : 0
},{
	ready: function(ret){
		JWin.tip.work('正在上传中！','warn',200,1000);
	},
	complete: function(ret){
		JWin.tip.work('上传成功！','ok',200,1000);
		$('#thumb').attr('src', ret.data.cdn_url+ret.data.img_src);
		$('#ad_img').attr('value', ret.data.img_src);
	}
});

function form_submit ()
{
	var _ele = document.article_add.elements;
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
	}   

	document.article_add.submit();
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

</script>
</body>
</html>