<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑文章</title>
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
	
    <div class="content_top">&nbsp;&nbsp;&nbsp;现在的位置为：文章管理-&gt;文章</div>
    <div class="m_content">
    	<div class="keywords_show"></div>
        <div class="real_c">
            
          
            <?php if($errno != null): ?><p class="tip <?php echo ($errno["style"]); ?>"><?php echo ($errno["str"]); ?><span onclick="$(this.parentNode).slideUp();">X</span></p><?php endif; ?>
           
           
            <div class="s-space"></div>

        	<div>
            	
            <form name="acount_add" method="post" 
            action="/Admin/Account/add" enctype="multipart/form-data">
            <table border="0" cellpadding="0" cellspacing="0" id="add_table" width="100%">
            
                <tr>
                    <td class="left_td">管理员姓名：</td>
                    <td class="right_td"><input type="text" name="name" class="input" value="" id="username"/></td>
                </tr>

                <tr>
                    <td class="left_td">管理员账户：</td>
                    <td class="right_td"><input type="text" name="account" class="input" value="" id="username"/></td>
                </tr>

                <tr>
                    <td class="left_td">管理员密码：</td>
                    <td class="right_td"><input type="text" name="password" class="input" id="password" /></td> 
                </tr>
                <tr>
                    <td class="left_td">确认密码：</td>
                    <td class="right_td"><input type="text" name="surepassword" class="input" id="password" /></td> 
                </tr>
                
               
                <!-- 操作按钮 -->
                <tr><td colspan="4" valign="bottom" align="center"><div class="formHandleBox" style="padding-left:100px;">
                    <input type="hidden" name="act" value="add" />
                    <a onclick="form_submit(); return false;" class="eventlink">添加管理员</a>
                </div></td></tr>
            </table>
            </form>
            </div>
        </div>
    </div>
    <div class="b_border"></div>
    
</div>

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
	autoFloatEnabled: false
});



function form_submit ()
{
	document.acount_add.submit();
}




</script>
</body>
</html>