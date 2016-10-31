$(document).ready(function() {

	var hh = document.documentElement.clientHeight;
	var ls = document.documentElement.clientWidth;
	if (ls < 640) {



		$(".select dt").click(function() {
			if ($(this).next("div").css("display") == 'none') {
				$(".theme-popover-mask").height(hh);
				$(".theme-popover").css("position", "fixed");
				$(this).next("div").slideToggle("slow");
				$(".select div").not($(this).next()).hide();
			}
          else{
          	$(".theme-popover-mask").height(0);
			$(".theme-popover").css("position", "static");
			$(this).next("div").slideUp("slow");;
          }

		})


		$(".eliminateCriteria").live("click", function() {
			$(".dd-conent").hide();
		})

		$(".select dd").live("click", function() {
			$(".theme-popover-mask").height(0);
			$(".theme-popover").css("position", "static");
			$(".dd-conent").hide();
		});
		$(".theme-popover-mask").live("click", function() {
			$(".theme-popover-mask").height(0);
			$(".theme-popover").css("position", "static");
			$(".dd-conent").hide();
		});

	}


	$("span.love").click(function() {
		$(this).toggleClass("active");
	});


	$("#select1 dd").click(function() {
		$(this).addClass("selected").siblings().removeClass("selected");
		if ($(this).hasClass("select-all")) {
			$("#selectA").remove();
		} else {
			var copyThisA = $(this).clone();
			if ($("#selectA").length > 0) {
				$("#selectA a").html($(this).text());
			} else {
				$(".select-result dl").append(copyThisA.attr("id", "selectA"));

			}
			show_hide();
		}
	});

	$("#select2 dd").click(function() {
		$(this).addClass("selected").siblings().removeClass("selected");
		if ($(this).hasClass("select-all")) {
			$("#selectB").remove();
		} else {
			var copyThisB = $(this).clone();
			if ($("#selectB").length > 0) {
				$("#selectB a").html($(this).text());
			} else {
				$(".select-result dl").append(copyThisB.attr("id", "selectB"));
			}
		}
		show_hide();
	});

	$("#select3 dd").click(function() {
		$(this).addClass("selected").siblings().removeClass("selected");
		if ($(this).hasClass("select-all")) {
			$("#selectC").remove();
		} else {
			var copyThisC = $(this).clone();
			if ($("#selectC").length > 0) {
				$("#selectC a").html($(this).text());
			} else {
				$(".select-result dl").append(copyThisC.attr("id", "selectC"));
			}
		}
		show_hide();
	});

	$("#selectA").live("click", function() {
		$(this).remove();
		$("#select1 .select-all").addClass("selected").siblings().removeClass("selected");
		show_hide();

	});

	$("#selectB").live("click", function() {
		$(this).remove();
		$("#select2 .select-all").addClass("selected").siblings().removeClass("selected");
		show_hide();
	});

	$("#selectC").live("click", function() {
		$(this).remove();
		$("#select3 .select-all").addClass("selected").siblings().removeClass("selected");
		show_hide();
	});

	$(".select dd").live("click", function() {
		if ($(".select-result dd").length > 1) {
			$(".select-no").hide();
			$(".eliminateCriteria").show();
			$(".select-result").show();
		} else {
			$(".select-no").show();
			$(".select-result").hide();

		}
	});

	$(".eliminateCriteria").live("click", function() {
		$("#selectA").remove();
		$("#selectB").remove();
		$("#selectC").remove();
		$(".select-all").addClass("selected").siblings().removeClass("selected");
		$(".eliminateCriteria").hide();
		$(".select-no").show();
		$(".select-result").hide();
		show_hide();
	});


	/**
	 * 根据品牌、种类、选购热点显示或隐藏元素
	 */
	function show_hide(){
		/*获取已选里面的类型，然后显示相应的已选类型的商品*/
		var selectA = $("#selectA").text();	//已选里面的类型
		var selectB = $("#selectB").text();
		var selectC = $("#selectC").text();
		$(".boxes").find("li").each(function(){
			$(this).show();	//首先显示所有商品li元素
			var ret_1 = $(this).find("input").val().search(selectA);	//品牌
			if( ret_1 == '-1'){
				$(this).hide();
			}
			var ret_2 = $(this).find("input").val().search(selectB);	//种类
			if( ret_2 == '-1'){
				$(this).hide();
			}
			var ret_3 = $(this).find("input").val().search(selectC);	//限购热点
			if( ret_3 == '-1'){
				$(this).hide();
			}
		});
	}


});