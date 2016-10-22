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
            	
            <form name="article_add" method="post" 
            action="/Admin/Article/edit?act=update&id=<?php echo ($data["id"]); ?>">
            <table border="0" cellpadding="0" cellspacing="0" id="add_table" width="100%">
                <tr>
                    <td class="left_td">文章标题：</td>
                    <td class="right_td"><input type="text" name="article[title]" class="input" value="<?php echo ((isset($data["title"]) && ($data["title"] !== ""))?($data["title"]):''); ?>" id="title"/></td>
                </tr>
                <tr>
					<td class="left_td">文章简介：</td>
                    <td class="right_td">
						<textarea  style="width:480px; height:80px" name="article[description]" class="input" id="description" ><?php echo ((isset($data["description"]) && ($data["description"] !== ""))?($data["description"]):''); ?></textarea>
					</td>
                </tr>
                <tr>
                    <td class="left_td">文章类别：</td>
                    <td class="right_td">
						<select name="" id="article_category" style="xbackground:#FFF;border:1px solid #CCC;">
							
						</select>  
                    </td>
                </tr>
                <tr>
                    <td class="left_td">文章来源名称：</td>
                    <td class="right_td"><input type="text" name="article[name]" class="input" value="<?php echo ((isset($data["name"]) && ($data["name"] !== ""))?($data["name"]):''); ?>" id="srcname"/></td>
                </tr>
                
                <tr id="qr-upload-tr" style="height:50px;">
                    <td class="left_td">文章封面图：</td>
                    <td class="right_td" id="upload-td">
						<input type="text" name="" class="input" value="<?=isset(${result.img_src})?${result.img_src}:''?>" id="ad_img" />
						<div id="img-view">
							<img id="thumb" src="<?=isset(${result.thumb})?${result.thumb}:''?>" onclick="viewImage(this.src)" />
						</div>
						<input type="file" class="add_file" id="add_file" />
                    </td>
                </tr>
              
                <tr style="clear:both">
                    <td class="left_td" valign="top">文章内容：</td>
					<td class="right_td">
						<!-- 加载编辑器的容器 -->
						<textarea style="z-index: 1;" name="article[content]" id="content" type="text/plain">
							<?php echo ((isset($data["content"]) && ($data["content"] !== ""))?($data["content"]):''); ?>
						</textarea>
					</td>
                </tr>
                
               
                <!-- 操作按钮 -->
                <tr><td colspan="4" valign="bottom" align="center"><div class="formHandleBox" style="padding-left:100px;">
                    <!-- <input type="hidden" name="run" value="submit" /> -->
                    <a onclick="form_submit(); return false;" class="eventlink">保存数据</a>
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



function form_submit ()
{
	document.article_add.submit();
}



</script>
</body>
</html>