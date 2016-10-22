/**
 * cdn upload control panel
 *
 * @author	chenxin<chenxin619315@gmail.com>
*/

(function(window){

	window.XHRUploader = {};

	var _HandlerUrl, _InputName,
		_XHRUploader = window.XHRUploader;

	function _getImgInfo(img, _default)
	{
		//get the mimeType througth the file extension
		var mimeType = null, ext = null;
		var pos = img.src.lastIndexOf('.');
		if ( pos == -1 ) {
			ext = _default;
		} else {
			ext = img.src.substr(pos).toLowerCase();
		}

		if ( ext.length > 4 ) ext = 'jpg';

		switch ( ext ) 
		{
			case 'png': 
				mimeType = 'image/png';
				break;
			case 'jpg':
			case 'jpeg':
				mimeType = 'image/jpeg';
				break;
			case 'gif':
				mimeType = 'image/gif';
				break;
			default:
				mimeType = 'image/jpeg';
		}

		return {mimeType: mimeType, ext: ext};
	}

	function _getImgAsBlob(img, quality)
	{
		if ( quality == undefined ) quality = 1.0;

		// Create an empty canvas element
		// Create an empty canvas element
		var canvas = document.createElement("canvas");
		canvas.width = img.width;
		canvas.height = img.height;

		// Copy the image contents to the canvas
		var ctx = canvas.getContext("2d");
		ctx.drawImage(img, 0, 0);

		var imgInfo	= _getImgInfo(img, 'jpg');

		if ( canvas.mozGetAsFile )
		{
			return canvas.mozGetAsFile("temp."+imgInfo.ext, imgInfo.mimeType);
		}

		//window.alert(imgInfo.mimeType+', '+quality);
		var data = canvas.toDataURL(imgInfo.mimeType, quality);

		// convert base64 to raw binary data held in a string
		// doesn't handle URLEncoded DataURIs
		var byteString;
		if ( dataURI.split(',')[0].indexOf('base64') >= 0 ) {
			byteString = atob(dataURI.split(',')[1]);
		} else {
			byteString = unescape(dataURI.split(',')[1]);
		}

		// write the bytes of the string to an ArrayBuffer
		var ab = new ArrayBuffer(byteString.length);
		var ia = new Uint8Array(ab);
		for (var i = 0; i < byteString.length; i++) {
			ia[i] = byteString.charCodeAt(i);
		}

		// write the ArrayBuffer to a blob, and you're done
		var BlobBuilder = window.WebKitBlobBuilder || window.MozBlobBuilder;
		var bb = new BlobBuilder();
		bb.append(ab);

		return bb.getBlob(imgInfo.mimeType);
	}

	function _getImgAsFile(img)
	{
		// Create an empty canvas element
		var canvas = document.createElement("canvas");
		canvas.width = img.width;
		canvas.height = img.height;

		// Copy the image contents to the canvas
		var ctx = canvas.getContext("2d");
		ctx.drawImage(img, 0, 0);

		var imgInfo	= _getImgInfo(img, 'jpg');
		return canvas.mozGetAsFile('temp.'+imgInfo.ext, imgInfo.mimeType);
	}

	function _getImgAsBase64(img, quality)
	{
		if ( quality == undefined ) quality = 1.0;

		// Create an empty canvas element
		var canvas = document.createElement("canvas");
		canvas.width = img.width;
		canvas.height = img.height;

		// Copy the image contents to the canvas
		var ctx = canvas.getContext("2d");
		ctx.drawImage(img, 0, 0);

		// Get the data-URL formatted image
		// Firefox supports PNG and JPEG. You could check img.src to
		// guess the original format, but be aware the using "image/jpg"
		// will re-encode the image.
		var imgInfo = _getImgInfo(img, 'jpg');
		var dataURL = canvas.toDataURL(imgInfo.mimeType, quality);
		return dataURL.replace(/^data:image\/(png|jpg|jpeg);base64,/, "");
	}

	_XHRUploader.init	= function(conf)
	{
		if ( conf.handlerUrl ) _HandlerUrl = conf.handlerUrl;
		if ( conf.input ) _InputName = conf.input;

		return this;
	}

	_XHRUploader.uploadFile = function(inputObj, args, callback)
	{
		if ( typeof inputObj === 'string' ) 
		{
			inputObj = document.getElementById(inputObj);
		}

		inputObj.onchange	= function(){
			callback && callback.ready && callback.ready(inputObj);

			var fd = new FormData();
			fd.append(_InputName, inputObj.files[0]);
			for ( key in args )
			{
				if ( ! args.hasOwnProperty(key) ) continue;
				if ( key == 'apiurl' ) continue;
				fd.append(key, args[key]);
			}

			var _apiurl = args.apiurl ? args.apiurl : _HandlerUrl;
			Ajax.post(_apiurl, {
				data: fd,
				processData: false,
				//contentType: 'multipart/form-data'
				contentType: false,
				dataType: 'json'
			}, function(data){
				callback && callback.complete && callback.complete(data);
			});
		};

		return this;
	}

	//you to to invoke this funcion when the image is ready
	_XHRUploader.uploadImage = function(imageObj, args, callback)
	{
		if ( typeof imageObj === 'string' ) 
		{
			imageObj = document.getElementById(imageObj);
		}

		callback && callback.ready && callback.ready(imageObj);

		var fd = new FormData();
		fd.append(_InputName, _getImgAsBlob(imageObj));
		for ( key in args )
		{
			if ( ! args.hasOwnProperty(key) ) continue;
			if ( key == 'apiurl' ) continue;
			fd.append(key, args[key]);
		}

		var _apiurl = args.apiurl ? args.apiurl : _HandlerUrl;
		Ajax.post(_apiurl, {
			data: fd,
			processData: false,
			//contentType: 'multipart/form-data'
			contentType: false,
			dataType: 'json'
		}, function(data){
			callback && callback.complete && callback.complete(data);
		});
	}

	//send a image url to the server and download the image
	//	return the url in the cdn server
	_XHRUploader.uploadURL	= function(url, args, callback)
	{
		callback && callback.ready && callback.ready(url);

		var fd = new FormData();
		fd.append('img_url', url);
		for ( key in args )
		{
			if ( ! args.hasOwnProperty(key) ) continue;
			if ( key == 'apiurl' ) continue;
			fd.append(key, args[key]);
		}

		var _apiurl = args.apiurl ? args.apiurl : _HandlerUrl;
		Ajax.post(_apiurl, {
			data: fd,
			processData: false,
			contentType: false,
			dataType: 'json'
		}, function(data){
			callback && callback.complete && callback.complete(data);
		});
	}

})(window);
