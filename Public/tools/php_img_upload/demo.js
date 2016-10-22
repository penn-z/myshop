
$(function(){
	// 初始化插件
	var width = $(window).width();
	if ( width >= 650 )	 width = '750px';
	else 	width = "100%";

	$("#demo").zyUpload({
		width            :   width,                 // 宽度
		height           :   "auto",                 // 宽度
		itemWidth        :   "140px",                 // 文件项的宽度
		itemHeight       :   "100px",                 // 文件项的高度
		//url              :   "/upload/UploadAction",  // 上传文件的路径
		url              :   "/admin/img/accept",
		inputName		 : 	'img[]',
		id 				 :	 img_id,
		multiple         :   true,                    // 是否可以多个文件上传
		dragDrop         :   false,                    // 是否可以拖动上传文件
		del              :   true,                    // 是否可以删除文件
		finishDel        :   false,  				  // 是否在上传文件完成后删除预览
		/* 外部获得的回调接口 */
		onSelect: function(selectFiles, allFiles){    // 选择文件的回调方法  selectFile:当前选中的文件  allFiles:还没上传的全部文件
			console.info("当前选择了以下文件：");
			console.info(selectFiles);
		},
		onProgress: function(file, loaded, total){    // 正在上传的进度的回调方法
			var eleProgress = $("#uploadProgress_" + file.index), percent = (loaded / total * 100).toFixed(2) + '%';
			eleProgress.html(percent);
			console.info(file.index);
			console.info("当前正在上传此文件：");
			console.info(file.name);
			console.info("进度等信息如下：");
			console.info(loaded);
			console.info(total);
		},   
		onDelete: function(file, files){              // 删除一个文件的回调方法 file:当前删除的文件  files:删除之后的文件
			console.info("当前删除了此文件：");
			console.info(file.name);
		},
		onSuccess: function(file, response){          // 文件上传成功的回调方法
			console.info("此文件上传成功：");
			$('#successinfo').append("<p>"+response+"</p>");
			console.info(response);
		},
		onFailure: function(file, response){          // 文件上传失败的回调方法
			$("#uploadImage_" + file.index).css("opacity", 0.2);
			console.info("此文件上传失败：");
			console.info(file.name);
		},
		onComplete: function(response){           	  // 上传完成的回调方法
			console.info("文件上传完成");
			console.info(response);
		}
	});
	
});

