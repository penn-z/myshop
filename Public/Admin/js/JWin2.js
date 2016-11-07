/**
 * windows about tip tools for javascript base one jquery
 *
 * @author 	chenxin<chenxin619315@gmail.com>
 */
//--------------------------------------------------------------------
	
var JWin = {};
JWin.config = {
	init : function() {
		String.prototype.inc=function(s){return this.indexOf(s)>-1?true:false};
		String.prototype.trim = function() {
			return this.replace(/^\s+|\s+$/g, '');
		}
		var agent=navigator.userAgent;
		//window.alert(agent);
		window.isOpr = agent.inc("Opera");
    	window.isIE  = agent.inc("MSIE");
    	window.isFire= agent.inc("Firefox");
		window.isNavi= agent.inc("Navigator")&&!isFire;
		if ( ! window.isIE && (window.isOpr || window.isNavi || window.isFire) ) {
			Event.prototype.__defineGetter__("keyCode", function(){
				return this.which;
			}
		);
	}	
	},
	
	/*
	 * create a html element
	 * and add the attributes
	 */
	createEle : function(tag, attr) {
		var ele = document.createElement(tag);
		for( name in attr) {
			if ( attr.hasOwnProperty(name) ) {
				ele[name] = attr[name];
			}
		}
		return ele;
	}
}

JWin.config.init();

//center the specifield element relative to the avaible window
JWin.center	= function(id)
{
	var o;
	if ( typeof(id) == 'string' ) o = $('#'+id);
	else o = $(id);

	var l	= ($(window).width() - $(o).width()) / 2;
	var t	= ($(window).height() - $(o).height()) / 2;
	$(o).css({'left':l+'px', 'top':t+'px'});
}

JWin.getParam	= function( _name ) 
{
	var pattern = new RegExp("(\\?|#|&)" + _name + "=([^&#]*)");
	var m = window.location.href.match(pattern);
	return (!m?"":m[2]);
}

//tip window
JWin.tip = {
	tipBak : null,
	create : function() {
		if (this.tipBak != null) {
			//$(this.tipBak).fadeIn();
			return;
		}
		var _div = document.createElement('div');
		_div.className = 'tips_box';
		_div.id = '_tip_box';
		var _left = document.createElement('div');
		_left.className = 'tips_left';
		_left.id = '_tips_left_div';
		var _center = document.createElement('div');
		_center.className = 'tips_center';
		_center.id = '_tips_center_div';
		var _right = document.createElement('div');
		_right.className = 'tips_right';
		_div.appendChild(_left);
		_div.appendChild(_center);
		_div.appendChild(_right);
		
		this.tipBak = _div;
		document.body.appendChild(this.tipBak);
	},
	
	setContent : function(_str) {
		if ( this.tipBak == null ) return;
		document.getElementById('_tips_center_div').innerHTML = _str;
		//$('#_tips_center_div').html(_str);
	},
	
	center : function(_width) {
		if (this.tipBak == null) return;
		this.tipBak.style.width = _width + 44 + 4 + 'px';
		document.getElementById('_tips_center_div').style.width = _width + 'px';
		this.tipBak.style.left = (parseInt($(document).width()) - this.tipBak.offsetWidth)/2+'px';
		var top = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
		this.tipBak.style.top  = top + (parseInt($(window).height()) - this.tipBak.offsetHeight)/2+'px';	
	},
	
	show : function(_type) {
		if (this.tipBak == null) return;
		if (_type == undefined) _type = 'error'; 
		var obj = document.getElementById('_tips_left_div');
		switch (_type) {
			case 'ok':
				obj.style.backgroundPosition = '-6px 0px';	
				break;
			case 'warn':
				obj.style.backgroundPosition = '-6px -54px';
				break;
			case 'error':
				obj.style.backgroundPosition = '-6px -108px';
				break;
			default :
				obj.style.backgroundPosition = '-6px -54px';
				
		}	
		$(this.tipBak).fadeIn();
	},
	
	hide : function(timer, callback) {
		if (this.tipBak == null) return;
		var that = this;
		if (timer != undefined) {
			setTimeout(function() {
				$(that.tipBak).fadeOut('slow', callback);	
			}, timer);	
		}
		
	},
	
	work : function(_str, _type, _width, timer, callback) {
		this.create();
		this.setContent(_str);
		this.show(_type);
		this.center(_width);
		this.hide(timer, callback);
	}
}

JWin.lock = {
	lockBak : null,
	click: null,			//click bind callback
	create : function() {
		if (this.lockBak != null) return;
		var _div = document.createElement('div');
		_div.className = 'webssky_lock_div';
		_div.id = 'webssky_lock_div';
		this.lockBak = _div;
		document.body.appendChild(this.lockBak);
	},

	setClick: function(click)
	{
		this.click = click;
	},
	
	show : function() {
		this.create();
		$(this.lockBak).css({
			'backgroundColor' : '#000',
			'opacity' : '0.6',
			'height':$(document).height()+'px',
		    'width':$(window).width()+'px'
		});
		if ( this.click != null )
			$(this.lockBak).bind('click', this.click);
		$(this.lockBak).fadeIn('slow');
	},
	
	hide : function(timer, callback) {
		if (this.lockBak == null) return;
		var that = this;
		if (timer != null && timer != undefined) {
			setTimeout(function() {
				$(that.lockBak).fadeOut('slow', callback); 
			}, timer);	
		}
		
	},
	
	work : function(timer, callback) {
		//this.create();
		this.show();	
		this.hide(timer, callback);
	}	
}

//popup window
JWin.win = {
	winBak : null,
	closeCallBack : function() {},
	create : function() {
		if (this.winBak != null) {
			return;
		}
		var div = document.createElement('div');
		div.className = 'hoverWindowBox';
		
		//title line
		var hTitleBox = document.createElement('div');
		hTitleBox.className = 'hoverWindowTitleBox';
		hTitleBox.id = 'hoverWindowTitleBox';
		div.appendChild(hTitleBox);
		
		var hTitleH = document.createElement('h3');
		hTitleH.className = 'hoverWindowTileContent';
		hTitleH.id = 'hoverWindowTileContent';
		hTitleBox.appendChild(hTitleH);
		
		//close button
		var titleCloseButton = document.createElement('a');
		titleCloseButton.className = 'titleCloseButton';
		titleCloseButton.innerHTML = 'x';
		titleCloseButton.title = '点击关闭­';
		hTitleBox.appendChild(titleCloseButton);
		
		//content box
		var divContent = document.createElement('div');
		divContent.className = 'hoverWindowContent';
		divContent.id = 'hoverWindowContent';
		div.appendChild(divContent);

		$(hTitleBox).mousedown(function(e){
			var offset = $(this).offset();
			var x = e.pageX - offset.left;
			var y = e.pageY - offset.top;
			$(document).bind("mousemove",function(ev)
			{    
				var _x = ev.pageX - x;
				var _y = ev.pageY - y; 
				var obj = div;
				obj.style.left = _x + 'px';
				obj.style.top  = _y + 'px';
			});	
			
			$(document).mouseup(function() {   
			   $(this).unbind("mousemove");
			});
		})
		this.winBak = div;
		var that = this;
		//bind the close event
		titleCloseButton.onclick = function() {
			$(that.winBak).fadeOut();
			that.closeCallBack();
		}
		document.body.appendChild(this.winBak);
	},

	setTitle : function(_title) {
		if (this.winBak ==  null) return;
		if ( _title == '' ) {
			document.getElementById('hoverWindowTitleBox').style.display = 'none';
		} else {
			document.getElementById('hoverWindowTileContent').innerHTML = _title;
		}
	},
	
	setContent : function(_content) {
		if (this.winBak ==  null) return;
		document.getElementById('hoverWindowContent').innerHTML = _content;
	},
	
	center : function (_css) {
		if (this.winBak == null) return;
		$(this.winBak).css(_css);
		this.winBak.style.width = $(this.winBak).width() + 'px';
		this.winBak.style.left = ($(window).width() - this.winBak.offsetWidth)/2+'px';
		var top = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
		top = $('body').height();
		var scrolltop = $(window).scrollTop();
		//this.winBak.style.top  = top + this.winBak.offsetHeight+'px';	
		//this.winBak.style.top = scrolltop / 2 + this.winBak.offsetHeight / 2 +  'px';
		this.winBak.style.top = top + 'px';
		//$(window).scrollTop(scrolltop / 2 - this.winBak.offsetHeight /2);
	},
	
	show : function() {
		if (this.winBak == null) return;
		$(this.winBak).fadeIn(); 	
	},
	
	hide : function(callback) {
		if (this.winBak == null) return;
		$(this.winBak).fadeOut('slow', callback); 	
	},
	
	work : function(_title, _content, _css, callback) {
		if (callback != undefined) {
			this.closeCallBack = callback;
		}
		this.create();
		this.setTitle(_title);
		this.setContent(_content);
		this.show();
		this.center(_css);
	}
}

//screen menu manager class
JWin.smenu = function()
{
	var o 	= {};
	o.obj	= {};
	o.init	= {};
	o.isshow = false;
	
	//create the screen
	o.create	= function(name)
	{
		if ( this.obj[name] != undefined 
				&& this.obj[name]['o'] != undefined ) return this.obj[name]['o'];
		var _div = document.createElement('div');
		//_div.className = 'screen-menu';
		//_div.id = 'screen-menu';
		if ( this.obj[name] == undefined ) this.obj[name] = {};
		var obj = this.obj[name];
		obj.o		=_div,
		obj.isshow	= false,
		obj.init_x	= 0,
		obj.init_y	= 0
		
		//bind the click event
		if ( this.obj[name]['click'] != undefined )
		{
			$(_div).bind('click', this.obj[name]['click']);
		}

		document.body.appendChild(_div);
	}

	//click handler
	o.setClick	= function(name, click)
	{
		if ( name == undefined ) name = 'main';
		if ( this.obj[name] == undefined ) this.obj[name] = {};
		this.obj[name]['click'] = click;
	}

	//set the innerHTML
	o.setHtml	= function(name, html)
	{
		if ( name == undefined ) name = 'main';
		if ( this.obj[name] == undefined ) this.create(name);
		$(this.obj[name]['o']).html(html);
	}

	//show the handler
	o.show	= function(name, timer, attr, callback)
	{
		if ( name == undefined ) name = 'main';
		this.create(name);

		var w	= $(window).width();
		var h	= $(window).height();
		var css	=
		{
			'position':'fixed',
			'left':(w/2)+'px',
			'top':(h/2)+'px',
			'background':'#000',
			'opacity':'0.6',
			'height':'0px',
		    'width':'0px',
			'overflow':'hidden'
		}

		//merge the self define attributes with default ones
		if ( attr != undefined ) 
		{
			for ( key in css )
				if ( attr.hasOwnProperty(key) )	css[key] = attr[key];
		}

		var obj	= this.obj[name];

		//css2.0 left|top attributes backup
		obj.init_x	= parseInt(css.left);
		obj.init_y	= parseInt(css.top);

		$(obj.o).css(css);
		$(obj.o).animate({width:w+'px', height:h+'px', left:'0px', top:'0px'}, timer, function(){
			obj.isshow = true;
			if ( callback != undefined ) callback();
		});
	}
	
	o.hide	= function(name, timer, callback) 
	{
		if ( name == undefined ) name = 'main';
		if (this.obj[name] == null) return;
		var obj	 = this.obj[name];
		$(obj.o).animate({width:'0px', height:'0px', 
				left:obj.init_x+'px', top:obj.init_y+'px'}, timer, function(){
			obj.isshow = false;
			if ( callback != undefined ) callback();
		});
	}

	o.isHidden	= function(name)
	{
		if ( name == undefined ) name = 'main';
		return (this.obj[name]['isshow']==false);
	}

	return o;
}();
