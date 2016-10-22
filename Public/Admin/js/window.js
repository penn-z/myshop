
function switchMenu(oH)
{
	var oDiv = oH.parentNode;
	var oHs = oDiv.getElementsByTagName("H3");
	/*window.alert(oHs.length);
	return;*/
	for(var i=0; i<oHs.length; i++)
	{
		var oUl = oHs[i].nextSibling;
		while(oUl.nodeName=="#text")
		{
			oUl = oUl.nextSibling;
		}
		
		if( oUl.tagName == "UL" )
		{
			if(oHs[i] != oH)
			{
				//oUl.style.display="none"; //展开其中一个时是否关闭其他的子菜单
			}
			else
			{
				if(oUl.style.display=="none")
				{
					oUl.style.display="";
				} else{
					oUl.style.display="none";
				}
			}
		}
	}
}


function clear_d(o)
{
	if ( typeof o == 'string' ) 
	{
		o = document.getElementById(o);
	}

	if( o.value == '搜索：请输入关键字' ) {
		o.value = '';
	} else if ( o.value == '' ) {
		o.value = '搜索：请输入关键字';	
	}	
}


function checkAll(theForm){
	var elements = theForm.elements;
	for(i=0;i <elements.length; i++){
		if(elements[i].type == "checkbox"){
			elements[i].checked = true;
		}
	}	
}

function uncheckAll(theForm){
	
	var elements = theForm.elements;
	for(i=0;i <elements.length; i++){
		
		if(elements[i].type == "checkbox"){
			elements[i].checked = false;
		}
	}	
}

function checked(theForm){
		
	result = false;
	var elements = theForm.elements;
	for(i=0;i <elements.length; i++){
		
		if(elements[i].type == "checkbox"){
			if(elements[i].checked == true){
				result = true;
			}
		}
	}
	
	return result;
}

