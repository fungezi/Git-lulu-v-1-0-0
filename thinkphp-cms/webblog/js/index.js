jQuery.extend( jQuery.easing,  
{  
    easeOutExpo: function (x, t, b, c, d) {  
        return (t==d) ? b+c : c * (-Math.pow(2, -10 * t/d) + 1) + b;  
    },  
    easeOutBounce: function (x, t, b, c, d) {  
        if ((t/=d) < (1/2.75)) {  
            return c*(7.5625*t*t) + b;  
        } else if (t < (2/2.75)) {  
            return c*(7.5625*(t-=(1.5/2.75))*t + .75) + b;  
        } else if (t < (2.5/2.75)) {  
            return c*(7.5625*(t-=(2.25/2.75))*t + .9375) + b;  
        } else {  
            return c*(7.5625*(t-=(2.625/2.75))*t + .984375) + b;  
        }  
    },  
}); 
$(function(){
			function getUrlParam(name) {
	            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
	            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
	            if (r != null) return unescape(r[2]); return null; //返回参数值
	        }
	        var cid = getUrlParam("cid");
	        function setActive(index){
	        	var navList = $(".navBar").find("li");
	        	for(var i = 0;i<navList.length;i++){
	        		$(navList[i]).attr("class","");
	        	}
	        	$(navList[index]).attr("class","active");
	        }
	        var index = 0;
	        switch(cid){
	        	case "29":
	        		index = 0;
	        	break;
	        	case "30":
	        		index = 1;
	        	break;
	        	case "31":
	        		index = 2;
	        	break;
	        	case "32":
	        		index = 3;
	        	break;
	        	case "33":
	        		index = 4
	        	break;
	        	default:
	        		index = -1;
	        	break;
	        }
	        setActive(index+1);
		})
$(function(){
	var navBar = $(".navBar");
	var navBarList= $(".navBar").find("li");

	var navBarListLen = $(navBarList[0]).width();
	var Dvalue = (navBarListLen - navBarListLen/2)/2;
	for(var i=0;i<navBarList.length;i++){
		navBarList[i].index = i;
		$(navBarList[i]).mouseover(function(){
			$(".navMarker").stop();
			$(".navMarker").animate({"left":this.index * navBarListLen + Dvalue},100,'easeOutExpo');
		});
		$(navBarList[i]).mouseleave(back);
	} 
	function back(){
			for(var i=0;i<navBarList.length;i++){
				if($(navBarList[i]).hasClass("active")){
					$(".navMarker").animate({"left":navBarList[i].index * navBarListLen + Dvalue},300);
				}
			}
		}
	$(".navMarker").css("width",navBarListLen/2);
	
	for(var i=0;i<navBarList.length;i++){
		if($(navBarList[i]).hasClass("active")){
			$(".navMarker").css("left",navBarList[i].index * navBarListLen + Dvalue);
		}
	}
	
})

$(function(){
	var slidePicList = $(".slidePic").find("li");
	var len = slidePicList.length;
	var picWidth = $(slidePicList[0]).width();
	var nowIndex = 0;
	var inode = "<i class='iactive'></i>";

	for(var i=1;i<len;i++){
		inode = inode + "<i></i>";
	}
	$(".dots").html(inode);
	$(".dots").css("margin-left",-$(".dots").width()/2);
	console.log($(slidePicList[0]).width()*len);
	$($(".slidePic").find("ul")[0]).css("width",len * $(slidePicList[0]).width()); 
	var dots = $(".dots").find("i");
	$($(".dots").find("i")[nowIndex]).css("background-color","white");
	for(var i=0;i<dots.length;i++){
		dots[i].index = i;
		$(dots[i]).click(function(){
			clearInterval(timer);
			timer = "";
			nowIndex = this.index;
			move(nowIndex);
		})
	}
	var timer = setInterval(function(){
		nowIndex = (nowIndex+1)%len;
		move(nowIndex);
	},4000);
	function move(index){
		$(".slidePic").find("ul").stop();
		var orignopacity = $(".pic-desc").css("opacity");
			$(".pic-desc").css({"display":"none","opacity":0});
			for(var j=0;j<dots.length;j++){
				$(dots[j]).css("background-color","black");
			}
			$($(".dots").find("i")[nowIndex]).css("background-color","white");
			$(".slidePic").find("ul").animate({"margin-left":-picWidth * index},
				800,
				function(){
					var orginleft = $(".pic-desc").css("left");
					$(".pic-desc").css("left",0);
					$(".pic-desc").find("p").css("margin-left",300);
					$(".pic-desc").css("display","block");
					$(".pic-desc").animate({"left":orginleft,"opacity":1},600);
					$(".pic-desc").find("p").animate({"margin-left":0},600);
					if(!timer){
							timer = setInterval(function(){
							nowIndex = (nowIndex+1)%len;
							move(nowIndex);
						},4000);
					}
			})
	}
})

$(function(){
	var studyCateBox = $(".studyCate").find("ul");
	var studyCateList = $(studyCateBox).find("li");
	var ArtBoxs = $(".ArtBoxs");
	var artList = $(ArtBoxs).children("li");
	var picUrlArr = ["artbac1.jpg","artbac2.jpg","artbac3.jpg","artbac4.jpg","artbac5.jpg","artbac6.jpg","artbac7.jpg","artbac8.jpg"]
	for(var i=0;i<studyCateList.length;i++){
		$(artList[i]).css({"opacity":0,"background-image":"url(./images/"+picUrlArr[i]+")","background-repeat":"no-repeat","background-position":"100%"});
		studyCateList[i].index = i;
		$(studyCateList[i]).click(function(){
			// alert(this.index);
			for(var j=0;j<artList.length;j++){
				$(artList[j]).css({"opacity":0,"z-index":1});
			}
			$(artList[this.index]).animate({"opacity":1,"z-index":3});

		})
	}
	$(artList[0]).css({"opacity":1,"z-index":3});
})












