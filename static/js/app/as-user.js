function getElementsClass(classnames){ 
	var classobj= new Array();
	var classint=0;
	var tags=document.getElementsByTagName("*"); 
	for(var i in tags){
		if(tags[i].nodeType==1){
		if(tags[i].getAttribute("class") == classnames){
			classobj[classint]=tags[i];
			classint++;
			} 
		}
	}
	return classobj;
}

// 获取原导航的菜单数量
var AsNavLenght = $("nav#typecho-nav-list").children().size();

for (let i = 0; i < AsNavLenght; i++) {

    // 获取导航下的入口数量
    let AsNavUlLenght = $("nav#typecho-nav-list .root:eq(" + i + ") .child").children().size();
    // console.log(AsNavUlLenght);
    if (i == 0) {

        // console.log("第一个菜单",AsNavUlLenght);

        // 判断第一个菜单是否有插件生成入口
        if (AsNavUlLenght > 5) {

            let a = AsNavUlLenght - 5;
            
            // 把生成的入口数据放到数组里
            var AsArrOne = new Array();

            // 判断生成了几个入口
            for (let x = 0; x < a; x++) {

                let b = 5 + x;

                // 获取生成的入口数据
                let link = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").attr("href");
                let txt = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").html();
                
                AsArrOne[x] = {
                    'txt': txt,
                    'link': link
                };
            }
        }

    } else if (i == 1) {

        // console.log("第二个菜单",AsNavUlLenght);
        
        // 判断第二个菜单是否有插件生成入口
        if (AsNavUlLenght > 2) {

            let a = AsNavUlLenght - 2;
            
            // 把生成的入口数据放到数组里
            var AsArrTwo = new Array();

            // 判断生成了几个入口
            for (let x = 0; x < a; x++) {

                let b = 2 + x;

                // 获取生成的入口数据
                let link = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").attr("href");
                let txt = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").html();

                AsArrTwo[x] = {
                    'txt': txt,
                    'link': link
                };

            }
        }

    } else if (i == 2) {

        // console.log("第三个菜单",AsNavUlLenght);
        
        // 判断第三个菜单是否有插件生成入口
        if (AsNavUlLenght > 7) {

            let a = AsNavUlLenght - 7;
            
            // 把生成的入口数据放到数组里
            var AsArrThree = new Array();

            // 判断生成了几个入口
            for (let x = 0; x < a; x++) {

                let b = 7 + x;

                // 获取生成的入口数据
                let link = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").attr("href");
                let txt = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").html();

                AsArrThree[x] = {
                    'txt': txt,
                    'link': link
                };

            }
        }

    } else if (i == 3) {

        // console.log("第四个菜单",AsNavUlLenght);
        
        // 判断第二个菜单是否有插件生成入口
        if (AsNavUlLenght > 4) {

            let a = AsNavUlLenght - 4;
            
            // 把生成的入口数据放到数组里
            var AsArrFour = new Array();

            // 判断生成了几个入口
            for (let x = 0; x < a; x++) {

                let b = 4 + x;

                // 获取生成的入口数据
                let link = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").attr("href");
                let txt = $("nav#typecho-nav-list .root:eq(" + i + ") .child li:eq(" + b + ") a").html();

                AsArrFour[x] = {
                    'txt': txt,
                    'link': link
                };

            }
        }

    }

    // END FOR
}



$(function(){
	var UserInfo = "<div class=\"user-info\"><a href=\""+AdminLink+"profile.php\"><img src=\""+UserPic+"s=100\" /></a><p>欢迎您，<a href=\""+AdminLink+"\">"+UserName+"</a></p></div>";
  	if(UserGroup == "administrator"){
		var HtmlText="<div class=\"user-nav\"><span class=\"user-nav-span\">导航栏</span><ul><li class=\"menu-ul\"><a href=\""+AdminLink+"index.php\"><i class=\"fa fa-dashboard\"></i>控制台</a></li><li class=\"menu-li\"><a href=\"javascript:;\"><i class=\"fa fa-paper-plane\"></i>全局模块<i class=\"fa fa-angle-down right\"></i></a><ul class=\"menu-ul\"><li><a href=\""+AdminLink+"profile.php\">个人设置</a></li><li><a href=\""+AdminLink+"plugins.php\">插件控制</a></li><li><a href=\""+AdminLink+"themes.php\">模板外观</a></li><li><a href=\""+AdminLink+"backup.php\">数据备份</a></li></ul></li><li class=\"menu-li\"><a href=\"javascript:;\"><i class=\"fa fa-pencil\"></i>快捷操作<i class=\"fa fa-angle-down right\"></i></a><ul class=\"menu-ul\"><li><a href=\""+AdminLink+"write-post.php\">撰写文章</a></li><li><a href=\""+AdminLink+"write-page.php\">创建页面</a></li><li><a href=\""+AdminLink+"user.php\">新增用户</a></li></ul></li><li class=\"menu-li\"><a href=\"javascript:;\"><i class=\"fa fa-cube\"></i>内容管理<i class=\"fa fa-angle-down right\"></i></a><ul class=\"menu-ul\"><li><a href=\""+AdminLink+"manage-posts.php\">内容文章</a></li><li><a href=\""+AdminLink+"manage-pages.php\">独立页面</a></li><li><a href=\""+AdminLink+"manage-comments.php\">用户评论</a></li><li><a href=\""+AdminLink+"manage-categories.php\">分类管理</a></li><li><a href=\""+AdminLink+"manage-tags.php\">标签管理</a></li><li><a href=\""+AdminLink+"manage-medias.php\">文件管理</a></li><li><a href=\""+AdminLink+"manage-users.php\">用户管理</a></li></ul></li><li class=\"menu-li\"><a href=\"javascript:;\"><i class=\"fa fa-gear\"></i>网站设置<i class=\"fa fa-angle-down right\"></i></a><ul class=\"menu-ul\"><li><a href=\""+AdminLink+"options-general.php\">基本设置</a></li><li><a href=\""+AdminLink+"options-discussion.php\">评论设置</a></li><li><a href=\""+AdminLink+"options-reading.php\">阅读设置</a></li><li><a href=\""+AdminLink+"options-permalink.php\">永久链接</a></li></ul>  <li class=\"menu-li as-add-menu\" style=\"display:none;\"><a href=\"javascript:;\"><i class=\"fa fa-bell\"></i>新增入口<i class=\"fa fa-angle-down right\"></i></a><ul class=\"menu-ul as-add-menu-ul\"></ul></li>  </div><span class=\"user-nav-span\">帮助</span><div id=\"head-tag\"><div id=\"head-img\"><li class=\"head-name\">AliceStyle</li><li>您好！"+UserName+"</li><li>请问有什么可以帮您！</li><div class=\"head-btn\"><a href=\"https://racns.com/374.html\" target=\"_Blank\">点击这里</a></div></div></div>";
	}else if(UserGroup == "editor"||UserGroup == "contributor"){
		var HtmlText="<div class=\"user-nav\"><span class=\"user-nav-span\">导航栏</span><ul><li class=\"menu-ul\"><a href=\""+AdminLink+"index.php\"><i class=\"fa fa-dashboard\"></i>控制台</a></li><li><a href=\""+AdminLink+"profile.php\"><i class=\"fa fa-gear\"></i>个人设置</a></li><li><a href=\""+AdminLink+"write-post.php\"><i class=\"fa fa-pencil\"></i>创建文章</a></li><li><a href=\""+AdminLink+"manage-posts.php\"><i class=\"fa fa-cube\"></i>管理文章</a></li><li><a href=\""+AdminLink+"/manage-comments.php\"><i class=\"fa fa-comments-o\"></i>管理评论</a></li></ul></div><span class=\"user-nav-span\">帮助</span><div id=\"head-tag\"><div id=\"head-img\"><li class=\"head-name\">AliceStyle</li><li>您好！"+UserName+"</li><li>请问有什么可以帮您！</li><div class=\"head-btn\"><a href=\"https://racns.com/374.html\" target=\"_Blank\">点击这里</a></div></div></div>";
    }else{
		var HtmlText="<div class=\"user-nav\"><span class=\"user-nav-span\">导航栏</span><ul><li class=\"menu-ul\"><a href=\""+AdminLink+"index.php\"><i class=\"fa fa-dashboard\"></i>控制台</a></li><li><a href=\""+AdminLink+"profile.php\"><i class=\"fa fa-gear\"></i>个人设置</a></li></ul></div><span class=\"user-nav-span\">帮助</span><div id=\"head-tag\"><div id=\"head-img\"><li class=\"head-name\">AliceStyle</li><li>您好！"+UserName+"</li><li>请问有什么可以帮您！</li><div class=\"head-btn\"><a href=\"https://racns.com/374.html\" target=\"_Blank\">点击这里</a></div></div></div>";
    }
    
	var NavHtml = UserInfo + HtmlText;
	var Nav = document.getElementById('typecho-nav-list');
	if(UserGroup != ""){
		$('#typecho-nav-list').html(NavHtml);
      	var ToMain=getElementsClass("operate")[0];
        var Main=getElementsClass("main")[0];
        var ToNav=document.createElement('a');
        var width=document.body.clientWidth;
        ToNav.id="tonav";
        ToNav.href='javascript:;';
        ToNav.innerHTML='<i class="fa fa-bars"></i>'; 
        ToMain.appendChild(ToNav);
        var ToggleNav=document.createElement('tonav');
        tonav.onclick=function(){
            if(width>1000){
                if(Nav.style.display == "block"){
                    Nav.style.display="none";
                    ToMain.style.width="calc(100% - 15px)";
                    Main.style.width="100%";
                } else if(Nav.style.display == "none") {
                    Nav.style.display="block";
                    ToMain.style.width="calc(100% - 265px)";
                    Main.style.width="calc(100% - 270px)";
                } else{
                    Nav.style.display="none";
                    ToMain.style.width="calc(100% - 15px)";
                    Main.style.width="100%";
                }
            }else{
                if(Nav.style.display == "block"){
                    Nav.style.display="none";
                    ToMain.style.width="100%";
                    Main.style.width="100%";
                } else if(Nav.style.display == "none") {
                    Nav.style.display="block";
                    ToMain.style.width="100%";
                    Main.style.width="100%";
                } else{
                    Nav.style.display="block";
                    ToMain.style.width="100%";
                    Main.style.width="100%";
                }
            }
        }
        
	if (MenuTitle == "个人设置"){
		var avatar=getElementsClass("profile-avatar")[0];
		avatar.setAttribute("src",UserPic+"s=640");
		avatar.style.width="220px";
	}
	
    }else{
        var LoginMain=getElementsClass("i-logo")[0];
      	var Body=getElementsClass("body-100")[0];
      	var Cover=document.createElement('div');
      	Cover.id="login-bg";
        Body.appendChild(Cover);
        // LoginMain.innerHTML="<img src=\""+SiteLink+"user/logo.png\" alt=\""+SiteName+"\"/>";
    }
    
	$("body").on("click",".menu-li",function () {
		$(this).find(".menu-ul").slideToggle(200);
	});
	
	$("body").on("click","#wmd-fullscreen-button",function () {
		$(".main").addClass("main-in");
	});
	
	$("body").on("click","#wmd-exit-fullscreen-button",function () {
		$(".main").removeClass("main-in");
	});
	
});

// 获取当前页面名称
function strPage(){
    
    var strUrl = window.location.href;
    var arrUrl = strUrl.split("/");
    var strPage = arrUrl[arrUrl.length - 1];
    
    if (strPage.indexOf("?") > -1) {
        var pageName = strPage.split("?");
        strPage = pageName[0];
    }
    
    return strPage;
}

// 获取URL GET参数
function GetQueryString(name){
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!=null)return  unescape(r[2]); return null;
}

// 根据屏幕分辨率
function IsPhone() {
    mobile_flag = false;
    var screen_width = window.screen.width;
    var screen_height = window.screen.height;
    if (screen_width < 500 && screen_height < 820) {
        mobile_flag = true;
    }
    return mobile_flag;
}

// 判断如果当前页面为插件设置页面
if(strPage() == "plugins.php"){
    
    // 设置操作的宽度
    $(".typecho-list-table colgroup").find("col:eq(1)").css("width","35%");
    
    // 设置操作列居中
    $(".typecho-list-table tbody tr").find("td:eq(4)").css("text-align","center");
    
    // 修改插件启用按钮
    $(".typecho-list-table:eq(1) tbody tr").find("td:eq(4)").find("a:eq(0)").html("<i class=\"fa fa-check\"></i>");
    
    // 获取已启用插件的长度
    let EnabePL = $("table.typecho-list-table:eq(0) tbody").children().size();
    
    for (let i=0; i<EnabePL; i++){
        
        // 获取启用插件的ID
    	let PLID = $("table.typecho-list-table:eq(0) tbody tr:eq("+i+")").attr("id");
    	
        let PTDL = $("table.typecho-list-table:eq(0) tbody tr:eq("+i+") td:eq(4)").children().size();
        
        if(PTDL == 1){
            
            // 修改插件禁用按钮
            // $("#"+PLID+" td:eq(4) a").html("<i class=\"fa fa-close\"></i>");
            
            var tag = $("#"+PLID).find("td:eq(4) a").text();
            
            if(tag.indexOf("设置") >= 0){
                
                $(function(){
                    $("#"+PLID+" td:eq(4) a").html("<i class=\"fa fa-cog\"></i>");
                })
                
            }else if(tag.indexOf("禁用") >= 0){
                
                $(function(){
                    $("#"+PLID+" td:eq(4) a").html("<i class=\"fa fa-close\"></i>");
                })
                
            }
            
        }else if(PTDL == 2){
            
            // 修改插件设置按钮
            $("#"+PLID+" td:eq(4)").find("a:eq(0)").html("<i class=\"fa fa-cog\"></i>");
            
            // // 修改插件禁用按钮
            $("#"+PLID+" td:eq(4)").find("a:eq(1)").html("<i class=\"fa fa-close\"></i>");
            
        }
        
    }
    
    // END IF
}else if(strPage()=="options-theme.php"){
    
    // 判断是否是手机页面大小
    if(IsPhone()==false){
        
        $("#typecho-nav-list").attr("style","display:block");
    }
    
    $(".typecho-option-tabs a").css("background","none").css("box-shadow","none");
    
}else if(strPage()=="options-general.php" || strPage()=="options-discussion.php" || strPage()=="options-reading.php" || strPage()=="options-permalink.php" || strPage()=="extending.php" || strPage()=="options-plugin.php" || strPage()=="options-theme.php" || strPage()=="user.php"){
    
    $(function(){
        $("button.btn.primary").attr("id","as-save");
    })
    
}else if(strPage()=="profile.php"){
    
    $(function(){
        $("button.btn.primary").attr("id","as-primary");
    })
    
}

// 判断是否是插件设置页面
if(strPage() == "options-plugin.php" && GetQueryString("config") == "AliceStyle"){
    
    let key = $("input[name='RandomImg']").val();
        
    $("input[name='RandomImg']").blur(function () {
        
        let val = $(this).val().trim();
        
        if(key != val){
            
            let url = SiteLink + "usr/plugins/AliceStyle/inc/api/img/?" + val;
            
            $("#as-save").after("<a href=\""+url+"\" class=\"btn primary\" id=\"as-url\"><i class=\"fa fa-send\"></i></a>");
        }
        
    });
}

// 判断插件添加的入口数据是否为空
if ($.isEmptyObject(AsArrOne)==false || $.isEmptyObject(AsArrTwo)==false || $.isEmptyObject(AsArrThree)==false || $.isEmptyObject(AsArrFour)==false ) {
    
    $(function(){
        
        $("li.menu-li.as-add-menu").attr("style","display:block!important");
        
        if($.isEmptyObject(AsArrOne)==false){
            
            for(let i=1; i<=AsArrOne.length; i++){
                
                let txt = AsArrOne[i-1]["txt"];
                let link = AsArrOne[i-1]["link"];
                $("ul.menu-ul.as-add-menu-ul").prepend("<li><a href=\""+link+"\">"+txt+"</a></li>");
            }
        }
        
        if($.isEmptyObject(AsArrTwo)==false){
            
            for(let i=1; i<=AsArrTwo.length; i++){
                
                let txt = AsArrTwo[i-1]["txt"];
                let link = AsArrTwo[i-1]["link"];
                $("ul.menu-ul.as-add-menu-ul").prepend("<li><a href=\""+link+"\">"+txt+"</a></li>");
            }
        }
        
        if($.isEmptyObject(AsArrThree)==false){
            
            for(let i=1; i<=AsArrThree.length; i++){
                
                let txt = AsArrThree[i-1]["txt"];
                let link = AsArrThree[i-1]["link"];
                $("ul.menu-ul.as-add-menu-ul").prepend("<li><a href=\""+link+"\">"+txt+"</a></li>");
            }
        }
        
        if($.isEmptyObject(AsArrFour)==false){
            
            for(let i=1; i<=AsArrFour.length; i++){
                
                let txt = AsArrFour[i-1]["txt"];
                let link = AsArrFour[i-1]["link"];
                $("ul.menu-ul.as-add-menu-ul").prepend("<li><a href=\""+link+"\">"+txt+"</a></li>");
            }
        }
    })
    
}

// 撰写文章保存按钮
$("#btn-save").html("<i class=\"fa fa-save\"></i>");

// 撰写文章发布按钮
$("#btn-submit").html("<i class=\"fa fa-send\"></i>");

// 后台彩色标签云
let tags = document.querySelectorAll("ul.typecho-list-notable.tag-list.clearfix .size-5");
let colorArr = ["#86d2f3","#a3dbf3","#5dbde7","#6b7ceb","#919ff5","#abb6f5"];
tags.forEach(tag => {
    tagsColor = colorArr[Math.floor(Math.random() * colorArr.length)];
    tag.style.backgroundColor = tagsColor;
});

