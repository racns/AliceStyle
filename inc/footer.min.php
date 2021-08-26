<?php
	
/*
 * 作者：racns
 * 地址：https://racns.com
 * QQ：1211515059
 * 时间：2020年8月25
 * 注：本AliceStyle插件版权归 萌卜兔's 所有，禁止用于商用，如有违者，后果自负
 */
 
class PluginsFooter{
	
	// 动态背景
	static function DynamicBackground(){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->DynamicBackground;
		
        echo '<script type="text/javascript" src="' . $PluginPath . 'js/bg/' . $type . '"></script>';
	}
	
	// 返回顶部
	static function ReturnTop(){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->ReturnTop;
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
		
        if ($type == 1) {
            echo '<div id="updown"><div class="sidebar_wo" id="leimu">
	        <img src="' . $PluginPath . 'img/leimuA.png" alt="雷姆" onmouseover="this.src=\'' . $PluginPath . 'img/leimuB.png\'" onmouseout="this.src=\'' . $PluginPath . 'img/leimuA.png\'" id="audioBtn"></div>
	        <div class="sidebar_wo" id="lamu"><img src="' . $PluginPath . 'img/lamuA.png" alt="雷姆" onmouseover="this.src=\'' . $PluginPath . 'img/lamuB.png\'" onmouseout="this.src=\'' . $PluginPath . 'img/lamuA.png\'" id="audioBtn"></div>';
            echo '<script type="text/javascript" src="' . $PluginPath . 'js/app/RamRem.jquery.min.js"></script>';
            echo '<script type="text/javascript" src="' . $PluginPath . 'js/app/top.js"></script>';
        }elseif($type == 2){
        	echo '<div class="back-to-top cd-top faa-float animated cd-is-visible" style="top: -900px;"></div>';
            echo '<script type="text/javascript" src="' . $PluginPath . 'js/app/szgotop.js"></script>';
        }
	}
	
	// Live2D
	static function Live2D(){
		
		// 获取路径信息
		$siteUrl = Helper::options()->siteUrl;
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/assets/';
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->Live2D;
		
        if ($type == 0) {
        	// code...
        }else {
        	echo '<div id="landlord"style="left:5px;bottom:0px;"><div class="message"style="opacity:0"></div><canvas id="live2d"width="500"height="560"class="live2d"></canvas><div class="live_talk_input_body"><div class="live_talk_input_name_body"><input name="name"type="text"class="live_talk_name white_input"id="AIuserName"autocomplete="off"placeholder="你的名字"/></div><div class="live_talk_input_text_body"><input name="talk"type="text"class="live_talk_talk white_input"id="AIuserText"autocomplete="off"placeholder="要和我聊什么呀？"/><button type="button"class="live_talk_send_btn"id="talk_send">发送</button></div></div><input name="live_talk"id="live_talk"value="1"type="hidden"/><div class="live_ico_box"><div class="live_ico_item type_info"id="showInfoBtn"></div><div class="live_ico_item type_talk"id="showTalkBtn"></div><div class="live_ico_item type_quit"id="hideButton"></div><div class="live_ico_item type_music"id="musicButton"></div><audio src=""style="display:none;"id="live2d_bgm"data-bgm="0"preload="none"></audio><input name="live_statu_val"id="live_statu_val"value="0"type="hidden"/></div></div>';
	    	echo '<div id="open_live2d">召唤看板娘</div>';	
	
			echo "<script>var message_Path='".$PluginPath."';var home_Path='".$siteUrl."';var live2d_type=".$type.";</script>";
			echo '<script src="'. $PluginPath .'live2d/live2d.js?ver0.2"></script>';
			echo '<script src="'. $PluginPath .'live2d/message.js?ver0.9"></script>';
        }
	}
	
	// 遮罩特效
	static function Mask(){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->Mask;
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
		
        if($type == 1){
        	echo '<script src="'. $PluginPath .'js/canvas/snow.js"></script>';
        }elseif($type == 2){
        	echo '<script src="'. $PluginPath .'js/canvas/sakura.js"></script>';
        }
	}
	
	// 鼠标样式
	static function MouseStyle(){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
        // 获取配置信息
        $type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->MouseStyle;
        
        // 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
        
        $js   = '';
        $html = '';
        $dir  = $PluginPath;
        
        $imageDir  = $dir . 'mouse';
        if ($type != 'none') {
            $js .= '<script>';
            $js .= <<<JS
				$("body").css("cursor", "url('{$imageDir}/{$type}/normal.cur'), default");
				$("a").css("cursor", "url('{$imageDir}/{$type}/link.cur'), pointer");
JS;
            $js .= '</script>';
            if ($type == 'fireworks') {
            	$html .= '<canvas id="fireworks" style="position:fixed;left:0;top:0;pointer-events:none;z-index:999999999999;"></canvas>';
                $js   .= '<script type="text/javascript" src="'.$PluginPath.'libs/anime.min.js"></script>';
                $js   .= "<script type='text/javascript' src='{$dir}js/app/fireworks.js'></script>";
            }
        }
        
        $arr = compact('js', 'html');
        
        echo $arr['html'];
        echo $arr['js'];
	}
	
	// 在控制台Console输出AliceStyle Plugin版本信息
	public static function TagLog(){
	    
	    // 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
	    
	    // 前台JS
	    echo '<script type="text/javascript" src="'.$PluginPath.'js/app/as-tool.js"></script>';
	    echo '<script type="text/javascript" src="'.$PluginPath.'js/app/as-style.js"></script>';
	    
		echo '<script>console.log("\n %c AliceStyle v3.4.0 Pro By 萌卜兔\'s | https://racns.com/374.html","color:#fff;background: linear-gradient(to right , #7A88FF, #9ba5ff);padding:5px;border-radius: 10px;");</script>';
	}
	
	// 主题美化
	static function PrettifyStyle(){
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->PrettifyStyle;
		
		if(!empty($type)){
			if(in_array("ColourIco",$type)){
				// 彩色图标
				echo <<<JS
				<script>
				let leftHeader=document.querySelectorAll("span.nav-icon>svg,span.nav-icon>i");let leftHeaderColorArr=["#86d2f3","#a3dbf3","#5dbde7","#6b7ceb","#919ff5","#abb6f5"];leftHeader.forEach(tag=>{tagsColor=leftHeaderColorArr[Math.floor(Math.random()*leftHeaderColorArr.length)];tag.style.color=tagsColor});	
				</script>
JS;
			}
			// 彩色标签云
			if(in_array('ColorTagCloud',$type)){
				echo <<<JS
				<script>
				  
				      let tags = document.querySelectorAll("#tag_cloud-2 a,.list-group-item .pull-right");
				      
                      let colorArr = ["#86d2f3", "#a3dbf3", "#5dbde7", "#6b7ceb", "#919ff5", "#abb6f5"];
                      
                      tags.forEach(tag =>{
                          tagsColor = colorArr[Math.floor(Math.random() * colorArr.length)];
                          tag.style.backgroundColor = tagsColor
                      });
                      
				</script>
JS;
			}
			// 评论框粒子
			if(in_array('CommentParticle',$type)){
				echo <<<JS
				<script>
				(function webpackUniversalModuleDefinition(a,b){if(typeof exports==="object"&&typeof module==="object"){module.exports=b()}else{if(typeof define==="function"&&define.amd){define([],b)}else{if(typeof exports==="object"){exports["POWERMODE"]=b()}else{a["POWERMODE"]=b()}}}})(this,function(){return(function(a){var b={};function c(e){if(b[e]){return b[e].exports}var d=b[e]={exports:{},id:e,loaded:false};a[e].call(d.exports,d,d.exports,c);d.loaded=true;return d.exports}c.m=a;c.c=b;c.p="";return c(0)})([function(c,g,b){var d=document.createElement("canvas");d.width=window.innerWidth;d.height=window.innerHeight;d.style.cssText="position:fixed;top:0;left:0;pointer-events:none;z-index:999999";window.addEventListener("resize",function(){d.width=window.innerWidth;d.height=window.innerHeight});document.body.appendChild(d);var a=d.getContext("2d");var n=[];var j=0;var k=120;var f=k;var p=false;o.shake=true;function l(r,q){return Math.random()*(q-r)+r}function m(r){if(o.colorful){var q=l(0,360);return"hsla("+l(q-10,q+10)+", 100%, "+l(50,80)+"%, "+1+")"}else{return window.getComputedStyle(r).color}}function e(){var t=document.activeElement;var v;if(t.tagName==="TEXTAREA"||(t.tagName==="INPUT"&&t.getAttribute("type")==="text")){var u=b(1)(t,t.selectionStart);v=t.getBoundingClientRect();return{x:u.left+v.left,y:u.top+v.top,color:m(t)}}var s=window.getSelection();if(s.rangeCount){var q=s.getRangeAt(0);var r=q.startContainer;if(r.nodeType===document.TEXT_NODE){r=r.parentNode}v=q.getBoundingClientRect();return{x:v.left,y:v.top,color:m(r)}}return{x:0,y:0,color:"transparent"}}function h(q,s,r){return{x:q,y:s,alpha:1,color:r,velocity:{x:-1+Math.random()*2,y:-3.5+Math.random()*2}}}function o(){var t=e();var s=5+Math.round(Math.random()*10);while(s--){n[j]=h(t.x,t.y,t.color);j=(j+1)%500}f=k;if(!p){requestAnimationFrame(i)}if(o.shake){var r=1+2*Math.random();var q=r*(Math.random()>0.5?-1:1);var u=r*(Math.random()>0.5?-1:1);document.body.style.marginLeft=q+"px";document.body.style.marginTop=u+"px";setTimeout(function(){document.body.style.marginLeft="";document.body.style.marginTop=""},75)}}o.colorful=false;function i(){if(f>0){requestAnimationFrame(i);f--;p=true}else{p=false}a.clearRect(0,0,d.width,d.height);for(var q=0;q<n.length;++q){var r=n[q];if(r.alpha<=0.1){continue}r.velocity.y+=0.075;r.x+=r.velocity.x;r.y+=r.velocity.y;r.alpha*=0.96;a.globalAlpha=r.alpha;a.fillStyle=r.color;a.fillRect(Math.round(r.x-1.5),Math.round(r.y-1.5),3,3)}}requestAnimationFrame(i);c.exports=o},function(b,a){(function(){var d=["direction","boxSizing","width","height","overflowX","overflowY","borderTopWidth","borderRightWidth","borderBottomWidth","borderLeftWidth","borderStyle","paddingTop","paddingRight","paddingBottom","paddingLeft","fontStyle","fontVariant","fontWeight","fontStretch","fontSize","fontSizeAdjust","lineHeight","fontFamily","textAlign","textTransform","textIndent","textDecoration","letterSpacing","wordSpacing","tabSize","MozTabSize"];var e=window.mozInnerScreenX!=null;function c(k,l,o){var h=o&&o.debug||false;if(h){var i=document.querySelector("#input-textarea-caret-position-mirror-div");if(i){i.parentNode.removeChild(i)}}var f=document.createElement("div");f.id="input-textarea-caret-position-mirror-div";document.body.appendChild(f);var g=f.style;var j=window.getComputedStyle?getComputedStyle(k):k.currentStyle;g.whiteSpace="pre-wrap";if(k.nodeName!=="INPUT"){g.wordWrap="break-word"}g.position="absolute";if(!h){g.visibility="hidden"}d.forEach(function(p){g[p]=j[p]});if(e){if(k.scrollHeight>parseInt(j.height)){g.overflowY="scroll"}}else{g.overflow="hidden"}f.textContent=k.value.substring(0,l);if(k.nodeName==="INPUT"){f.textContent=f.textContent.replace(/\s/g,"\u00a0")}var n=document.createElement("span");n.textContent=k.value.substring(l)||".";f.appendChild(n);var m={top:n.offsetTop+parseInt(j["borderTopWidth"]),left:n.offsetLeft+parseInt(j["borderLeftWidth"])};if(h){n.style.backgroundColor="#aaa"}else{document.body.removeChild(f)}return m}if(typeof b!="undefined"&&typeof b.exports!="undefined"){b.exports=c}else{window.getCaretCoordinates=c}}())}])});POWERMODE.colorful=true;POWERMODE.shake=false;document.body.addEventListener("input",POWERMODE);
				</script>
JS;
			}
		}
	}
	
	// 后台美化
	static function AliceStyleAdmin(){
	    
	    // 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->AliceStyleAdmin;
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
		
		if($type == 1){
			
			// 处理中文乱码
			header("Content-type:text/html; charset=utf-8");
			
			$url = $_SERVER["DOCUMENT_ROOT"];
			
			(substr($url,-1) != '/') ? $url : $url = substr($url,0,-1);
			
			include($url.constant("__TYPECHO_ADMIN_DIR__").'common.php');
			
			if($email = $user->mail) {
				if(strpos($email,'@qq.com') !== false) {
					$email =str_replace('@qq.com','',$email);
					$UserPic = '//q1.qlogo.cn/g?b=qq&nk='.$email.'&';
				} else {
					$email = md5($email);
					$UserPic = '//cdn.v2ex.com/gravatar/'.$email.'?';
				}
			} else {
				 $UserPic = '//cdn.v2ex.com/gravatar/null?';
			}
			
			$UserInfo = [
				'UserLink'	=>	Helper::options()->adminUrl.'profile.php',
				'UserPic'	=>	$UserPic,
				'AdminLink' =>	Helper::options()->adminUrl,
				'SiteLink'	=>	Helper::options()->siteUrl,
				'UserName'	=>	$user->screenName,
				'UserGroup'	=>	$user->group,
				'SiteName'	=>	Helper::options()->title,
				'MenuTitle'	=>	$menu->title,
				];
			
			echo '<script type="text/javascript">var UserInfo="'.$UserInfo["UserLink"].'";var UserPic="'.$UserInfo["UserPic"].'";var AdminLink="'.$UserInfo["AdminLink"].'";var SiteLink="'.$UserInfo["SiteLink"].'";var UserName="'.$UserInfo["UserName"].'";var UserGroup="'.$UserInfo["UserGroup"].'";var SiteName="'.$UserInfo["SiteName"].'";var MenuTitle="'.$UserInfo["MenuTitle"].'";</script>';
			
			echo '<script src="'. $PluginPath .'js/app/as-user.js"></script>';
			
			$SELF = substr($_SERVER['PHP_SELF'],strrpos($_SERVER['PHP_SELF'],'/')+1);
		
			$allow = [
				'options-plugin.php',
				'options-theme.php',
				'user.php',
				'extending.php',
				'options-general.php',
				'options-discussion.php',
				'options-reading.php',
				'options-permalink.php',
				];
				
			if(in_array($SELF,$allow) and $_SERVER['QUERY_STRING'] != 'config=Handsome'){
				// 修改插件保存按钮
				echo '<style>ul.typecho-option-submit{width:10%;position:fixed;bottom:0px;right:20px;box-shadow:none;}ul.typecho-option-submit li button{position:fixed;right:10%;bottom:10%;border-radius:30px;font-size:1.6em;background:#7886fd;width:50px;height:50px;box-shadow:0 2px 6px 0 rgba(114,124,245,.5);}ul.typecho-option-submit li button:hover{color:#fff;background-color:#4e5bf2;border-color:#4250f2;}button.btn.primary{display:block!important;}</style>';
				echo '<script>$(".typecho-option-submit li").html("<button type=\"submit\" class=\"btn primary\"><i class=\" fa fa-save\"></i></button>");</script>';
			}
			if($SELF == 'plugins.php'){
				// 修改插件描述宽度和设置按钮
				echo '<script>$(".typecho-list-table colgroup").find("col:eq(1)").css("width","35%");$(".typecho-list-table:eq(0) tbody tr").find("td:eq(4)").find("a:eq(0)").html("<i class=\"fa fa-cog\"></i>");</script>';
			}
			if($SELF == 'profile.php' | $SELF == 'manage-tags.php'){
				echo '<style>.primary{background-color:#7886fd!important;border-radius:20px;box-shadow:0 2px 6px 0 rgba(114,124,245,.5);}</style>';
			}
			if($SELF == 'extending.php'){
				echo '<style>select#sort-0-3 {width: 100%;}</style>';
			}
			if($SELF == 'write-post.php' | $SELF == 'write-page.php'){
				echo '<script>$("#custom-field").addClass("fold");</script>';
				echo '<style>label#custom-field-expand{background: #7581f9; padding: 10px; margin: 0px -15px!important; border-radius: 4px;}</style>';
			}
		}
	}
	
	// 动态标题
	static function TitleDynamic(){
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->TitleDynamic;
		
		// 分割获取的配置信息
		$list = explode("-",Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->TitleDynamic);
		
		if(!empty($type)){
		    
		    echo '<script>
				var OriginTitile = document.title,
				titleTime;
				document.addEventListener("visibilitychange",
				function() {
				    if (document.hidden) {
				        document.title = "'.$list[0].'";
				        clearTimeout(titleTime)
				    } else {
				        document.title = "'.$list[1].'";
				        titleTime = setTimeout(function() {
				            document.title = OriginTitile
				        },
				        2000)
				    }
				});
				(function() {
				    var link = document.createElement("link");
				    link.type = "image/x-icon";
				    link.rel = "shortcut icon";
				    document.getElementsByTagName("head")[0].appendChild(link);
				}());
				</script>';
		}
	}
	
	
	// END 
}









