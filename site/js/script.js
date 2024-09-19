$(document).ready(function(){	
var MSIE8 = ($.browser.msie) && ($.browser.version == 8);
	$.fn.ajaxJSSwitch({
		topMargin:330,//mandatory property for decktop
		bottomMargin:150,//mandatory property for decktop
		bodyMinHeight:910,
		topMarginMobileDevices:0,//mandatory property for mobile devices
		bottomMarginMobileDevices:0,//mandatory property for mobile devices
		menuInit:function (classMenu, classSubMenu){
			classMenu.find(">li").each(function(){
				var conText = $(this).find('.mText').text();
				$(">a", this).append("<div class='_area'></div><div class='_overPl'></div><div class='_overLine'></div><div class='mTextOver'>"+conText+"</div>"); 
			})
		},
		buttonOver:function (item){
			$(".mText",item).stop(true).animate({top:"160px"}, 600, 'easeOutCubic');
            $(".mTextOver", item).stop(true).delay(150).animate({top:"5px"}, 500, 'easeOutCubic');
			$("._overPl", item).stop(true).animate({bottom:"0px"}, 500, 'easeOutCubic');
			$("._overLine", item).stop(true).animate({opacity:1}, 500, 'easeOutCubic');
		},
		buttonOut:function (item){
			$(".mText", item).stop(true).animate({top:"0px"}, 600, 'easeOutCubic');
			$(".mTextOver", item).stop(true).delay(20).animate({top:"-100px"}, 400, 'easeOutCubic');
			$("._overPl", item).stop(true).animate({bottom:"100px"}, 400, 'easeOutCubic');
			$("._overLine", item).stop(true).animate({opacity:0}, 500, 'easeOutCubic');
		},
		subMenuButtonOver:function (item){
			
		},
		subMenuButtonOut:function (item){
		
		},
		subMenuShow:function(subMenu){
			if(MSIE8){
				//subMenu.css({"display":"block", "margin-top":-(subMenu.outerHeight()+0)});
				subMenu.css({"display":"block", "margin-top":0});
			}else{
				//subMenu.stop(true).css({"display":"block", "margin-top":-(subMenu.outerHeight()+0)}).animate({"opacity":"1"}, 600, "easeInOutCubic");
				subMenu.stop(true).css({"display":"block", "margin-top":0}).animate({"opacity":"1"}, 600, "easeInOutCubic");
			}
		},
		subMenuHide:function(subMenu){
			if(MSIE8){
				subMenu.css({"display":"none"});
			}else{
				subMenu.stop(true).delay(300).animate({"opacity":"0"}, 600, "easeInOutCubic", function(){
					$(this).css({"display":"none"})
				});
			}
		},
		pageInit:function (pages){
		},
		currPageAnimate:function (page){

			$("#logo").stop(true).delay(100).animate({"marginTop":'140px'}, 900, "easeOutBack");
			page.css({"left":-$(window).width()}).stop(true).delay(600).animate({"left":0}, 900, "easeOutBack");

		},
		prevPageAnimate:function (page){

			page.stop(true).animate({"display":"block", "left":-$(window).outerWidth()*2}, 700, "easeInCubic");

		},
		backToSplash:function (){

			setTimeout(function() {
				$("#logo").stop(true).delay(100).animate({"marginTop":'390px'}, 900, "easeOutBack");
			},300);

		},
		pageLoadComplete:function (){

			setTimeout(function() {
				$('.scroll')
					.uScroll({			
						mousewheel:true,
						step: 202,
						lay:'outside'
					});

				$('.scroll_1')
					.uScroll({			
						mousewheel:true,
						step: 397,
						lay:'outside'
					});

			},300);

		},
	});
	
	////////////////// submenu hover //////////////////// 
		//$('.submenu_1 a b').css({width:'0px'})
		//$('.submenu_2 a span').css({width:'0px'})
		$('.submenu_1 a').hover(function()
			{
				//$(this).find('b').css({width:'0px', left:'-23px'}).stop().animate({width:'234px'}, 300,'easeOutCubic');	
				//$(this).find('span').css({width:'0px', left:'-23px'}).stop().animate({width:'203px'}, 300,'easeOutCubic');			
			}, function(){
				//$(this).find('b').stop().animate({width:'0px', left:'210px'}, 300,'easeOutCubic');
				//$(this).find('span').stop().animate({width:'0px', left:'180px'}, 300,'easeOutCubic');
			})
		////////////////// end submenu hover ////////////////////
	
	
})
$(window).load(function(){	
	$("#webSiteLoader").delay(500).animate({opacity:0}, 600, "easeInCubic", function(){$("#webSiteLoader").remove()});

	$(".image_resize").image_resize({align_img:"center", mobile_align_img:"center"});
	

	var linkmenu = 0;
     $(".menuButton a").click (function() {
            if (linkmenu == 0){
				$('.leftPanel').stop(true).delay(350).animate({left:0}, 650, 'easeOutExpo');
                linkmenu = 1;
            } else { 
				$('.leftPanel').stop(true).delay(350).animate({left:-138}, 650, 'easeOutExpo');
                linkmenu = 0;
            }
        });


	});