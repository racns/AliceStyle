<?php	

/*
 * 作者：racns
 * 地址：https://racns.com
 * QQ：1211515059
 * 时间：2020年3月23
 * 注：本AliceStyle插件版权归 萌卜兔's 所有，禁止用于商用，如有违者，后果自负
 */
 
class PluginsHead{
    
    // 访问总数 		
	static function TotalVisit(){
	    
        $db = Typecho_Db::get();
        
	    $query = $db->select('SUM(views)')->from('table.contents'); 
	    
	    $result = $db->fetchAll($query);
	    
	    return number_format($result[0]['SUM(`views`)']);
    }
    
    // 全站字数
//     static function TotalFont(){
        
// 		$db = Typecho_Db::get();
		
// 	    $query = $db->select('text')->from('table.contents')->where('type = ?', 'post'); 
	    
// 	    $result = $db->fetchAll($query);
        
//         foreach ($result as $key => $val){
            
//             $test = ClientInfo::CountBit($val['text']);
            
//             $zs += $test['zs'];
//         }
        
//         $total = ClientInfo::FloatNumber($zs);
        
//         return $total;
//     }
    
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
            echo '<link rel="stylesheet" type="text/css" href="' . $PluginPath . 'css/top.css" />';
        }elseif($type == 2){
        	echo '<link rel="stylesheet" type="text/css" href="' . $PluginPath . 'css/szgotop.css" />';
        }
	}
	
	// Live2D
	static function Live2D(){
		
        // 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取配置信息
        $type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->Live2D;
        
        // 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
        
        if($type == 0){
        	// code...
        }else {
        	echo '<link rel="stylesheet" type="text/css" href="' . $PluginPath . 'css/live2d.css" />';
        }
        
	}
	
	// 顶部跑马灯特效
	static function TopLamp(){
		
		echo '<!-- 顶部跑马灯特效 --><div id="top-grrk"></div>';
	}
	
	// 更新提示
	static function UpdataTips($Cver){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
    	// 获取配置信息
    	$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->UpdataTips;
    	
    	// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
    	
    	// 获取API信息
		$ch = curl_init("http://api.racns.com/api/as/?as=info");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$res = curl_exec($ch);
		
		$data = json_decode($res,JSON_UNESCAPED_UNICODE);
		
    	if ($type == 1){
    		
	        echo '<link rel="stylesheet" href=" '. $PluginPath .'css/jquery.toolbar.css"/>';
	        
	        echo '<script type="text/javascript" src="' . $PluginPath . 'libs/jquery-3.5.1.min.js"></script>';
	        echo '<script type="text/javascript" src="' . $PluginPath . 'libs/jquery.toolbar.js"></script>';
	        
	        if($data['status'] == 1){

	            $Sver = $data['data']['version'];
	            
	            if($data['remark'] == 'updata' && $Cver < $Sver){
	        	
    	        	$info = '<section class="btn-set-03"><div class="samples"><div data-toolbar="set-03"class="btn-toolbar pull-left"><i>AliceStyle</i></div></div></section><div class="clear"></div></section><div id="set-03-options"><a href="#"><i style="color:white;">有</i></a><a href="#"><i style="color:white;">更</i></a><a href="#"><i style="color:white;">新</i></a></div>';
    	        	
    	        }elseif($data['remark'] == 'bulletin'){
    	            
    	        	$info = '<section class="btn-set-03"><div class="samples"><div data-toolbar="set-03"class="btn-toolbar pull-left"><i>AliceStyle</i></div></div></section><div class="clear"></div></section><div id="set-03-options"><a href="#"><i style="color:white;">有</i></a><a href="#"><i style="color:white;">公</i></a><a href="#"><i style="color:white;">告</i></a></div>';
    	        }else if($Cver >= $Sver){
    	            $info = null;
    	        }
    	        
    	        return $info;
    	        
	        }else{
		    
		        echo '无法获取插件更新信息！';
		    }
		}
	}
	
	// 主题美化
	static function PrettifyStyle(){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->PrettifyStyle;
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
		
        // 前台加载JQuery		
		echo '<script type="text/javascript" src="' . $PluginPath . 'libs/jquery-3.5.1.min.js"></script>';
        
		if(!empty($type)){
		    
	        // 获取彩色标签云配置信息
            $TagCloud = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->PrettifyStyle;
            
            if(in_array('ColorTagCloud',$TagCloud)){
                
                $color = ["#86d2f3","#a3dbf3","#5dbde7","#6b7ceb","#919ff5","#abb6f5"];
                
                // 加入 PJAX 回调函数
	            Helper::options()->ChangeAction .= 'let tags = document.querySelectorAll("#tag_cloud-2 a,.list-group-item .pull-right");let colorArr = ["#86d2f3", "#a3dbf3", "#5dbde7", "#6b7ceb", "#919ff5", "#abb6f5"];tags.forEach(tag =>{tagsColor = colorArr[Math.floor(Math.random() * colorArr.length)];tag.style.backgroundColor = tagsColor;});';
            }
		    
			if(in_array("OpacityTheme",$type)){
				// 透明样式
				echo <<<CSS
				<style>
				@media (min-width:768px){.app-aside-fixed .aside-wrap{opacity:0.8;}}#post-panel{background:rgba(241,243,244,.3)}.list-group-item{background-color:rgba(255,255,255,.6)}.bg-white{background-color:rgba(255,255,255,1)}.bg-light .lter,.bg-light.lter,.bg-info .dker,.bg-info.dker,.bg-info,.bg-black,.bg-dark,.bg-primary,.bg-info .dk,.bg-info.dk,.bg-success,.bg-danger,.bg-white-only,.alert-warning{opacity:.8}@media (max-width:767px){.navbar-nav .open .dropdown-menu{background-color:rgba(255,255,255,.8)}.settings>.btn,.topButton>.btn,.tocify-mobile-panel>.btn{background-color:rgba(255,255,255,0.8)!important}aside#aside{opacity:0.8;}.bg-light .lter,.bg-light.lter,.bg-info .dker,.bg-info.dker,.bg-info,.bg-black,.bg-dark,.bg-primary,.bg-info .dk,.bg-info.dk,.bg-success,.bg-danger,.bg-white-only,.alert-warning{opacity:0.98}}@media (min-width:768px){.app.container.app-aside-folded .app-aside{opacity:0.8;}}@media (min-width:1200px){.app.container .app-aside,.app.container .app-header{opacity:0.8;}}@media (min-width:992px){.app.container .app-aside,.app.container .app-header{opacity:0.8;}}@media (min-width:768px){.app.container .app-aside,.app.container .app-header{opacity:0.8;}}.bg-auto:before {display: none!important;}
				</style>
CSS;
			}
			if(in_array("BoxTheme",$type)){
				// 盒子模型
				echo <<<CSS
				<style>
				.link-main{padding:50px 0 50px 20px;text-align:center}.link-main h3{margin-top:0}.link-main .item{display:inline-block;letter-spacing:0;margin-right:20px;margin-bottom:20px;width:289px;height:240px;font-size:14px;overflow:hidden;border-radius:5px;background:rgba(255,255,255,.35);border:1px solid #e1e8ed;transition:background .2s}.link-main .link-bg{position:relative;height:90px;padding:0 1em;background-color:#777}.link-main .link-bg .bg:before{display:block;content:"";position:absolute;left:0;height:100%;width:100%;background:rgba(0,0,0,.5)}.link-main .link-bg .link-avatar{position:absolute;bottom:-50px;border:4px solid #fff;border-radius:100%;background-color:#fff;box-shadow:0 0 5px rgba(0,0,0,.5)}.link-main .link-bg .link-avatar img{border-radius:100%}.link-main .avatar{display:block;object-fit:cover}.link-main .bg,.link-main .link-bg{background-repeat:no-repeat;background-position:center;background-size:cover;display:block}.link-main .bg{position:absolute;top:0;bottom:0;left:0;right:0;filter:blur(1.5px);background-color:#fff}.link-main .meta{padding:.9em 1em;text-align:right}.link-main .info{color:#525766;padding:0 1em 1em}.link-main .info .name{font-weight:600;font-size:16px}@media screen and (max-width:330px){.link-main{padding:50px 0 50px 0}.link-main .item{margin-right:0}}.link-main .item:hover{background:rgba(255,255,255,1)}.link-main .item:hover .bg{filter:blur(.1px)}#comments pre code{display:inline}.wrapper-md>#comments{border:solid 1px #fff;padding:10px 30px 20px 30px}.hideContent{background-color:transparent;padding:10px 0}.agent{display:inline-block;margin-left:5px;padding:0 3px;border-radius:2px;color:#58666e;font-size:12px;opacity:.8}img[mw400]{max-width:400px!important;width:100%}.mw400{max-width:400px}@media screen and (min-width:1200px){.sticky{position:absolute;top:10px;left:15px}.panel .item-thumb{height:300px}#post-panel .blog-post{position:relative}#post-panel .panel{overflow:hidden}#post-panel .panel .post-meta{position:relative;margin-top:-300px;height:300px;padding-top:133px!important;padding-bottom:0!important;background-color:rgba(0,0,0,.15);color:#fff!important;transition:all .3s}#post-panel .panel .post-meta,#post-panel .panel-small .post-meta{border-radius:5px}#post-panel .panel .post-meta *,#post-panel .panel-small .post-meta *{color:#fff!important}#post-panel .panel .post-meta>h2,#post-panel .panel-small .post-meta>h2{text-align:center;text-shadow:0 0 3px #fff}#post-panel .panel .post-meta>div,#post-panel .panel .post-meta>p,#post-panel .panel-small .post-meta>div,#post-panel .panel-small .post-meta>p{transition:all .3s;transform:translateY(-10px);opacity:0}#post-panel .panel .post-meta>.text-muted,#post-panel .panel-small .post-meta>.text-muted{position:absolute;bottom:20px}#post-panel .panel .post-meta>.line{position:absolute;bottom:40px;width:740px}#post-panel .panel-small .post-meta>.line{position:absolute;bottom:40px;width:350px}#post-panel .panel .post-meta>.summary{position:absolute;bottom:60px;width:740px}#post-panel .panel-small .post-meta>.summary{position:absolute;bottom:60px;width:350px}#post-panel .panel-small{display:inline-block;height:300px;width:calc(50% - 10px);margin-right:20px}#post-panel .panel-small:nth-child(2n){margin-right:0}#post-panel .panel-small .index-img-small,#post-panel .panel-small .index-img-small .item-thumb-small{height:100%;width:100%}#post-panel .panel-small .post-meta{position:absolute;height:300px;width:calc(50% - 10px);padding:133px 20px 0 20px!important;background-color:rgba(0,0,0,.3);color:#fff!important;transition:all .3s}#post-panel .panel-small:hover .post-meta,#post-panel .panel:hover .post-meta{background-color:rgba(0,0,0,.6)}#post-panel .panel-small:hover .post-meta>div,#post-panel .panel-small:hover .post-meta>p,#post-panel .panel:hover .post-meta>div,#post-panel .panel:hover .post-meta>p{opacity:1;transform:translateY(0)}#post-panel .panel-small:hover .post-meta,#post-panel .panel:hover .post-meta{padding-top:80px!important}#post-panel .ahover{display:block;position:absolute;top:0;left:0;right:0;bottom:0}.blog-post>.panel-small:hover .index-post-img-small,.blog-post>.panel:hover .index-post-img{filter:blur(3px)}}
				</style>
CSS;
			}
			if(in_array("HeadImg",$type)){
				// 头像旋转
				echo <<<CSS
				<style>
				.thumb-lg{width:96px;}.avatar{-webkit-transition:0.4s;-webkit-transition:-webkit-transform 0.4s ease-out;transition:transform 0.4s ease-out;-moz-transition:-moz-transform 0.4s ease-out;}.avatar:hover{transform:rotateZ(360deg);-webkit-transform:rotateZ(360deg);-moz-transform:rotateZ(360deg);}#aside-user span.avatar{animation-timing-function:cubic-bezier(0,0,.07,1)!important;}#aside-user span.avatar:hover{transform:rotate(360deg) scale(1.2);border-width:5px;animation:avatar .5s}
				</style>
CSS;
			}
			if(in_array("ColourIco",$type)){
				// 彩色图标
				echo <<<CSS
				<style>
				.nav-tabs-alt .nav-tabs>li.active>a{border-bottom-color:#23b7e5!important;}.navs-slider-bar{background-color:#058cff!important;}.post_tab .nav-item.active .nav-link::before{border-bottom-color:rgb(5,140,255)!important;}
				</style>
CSS;
			}
			if(in_array("ArticleCard",$type)){
				// 文章选择卡
				echo <<<CSS
				<style>
				.panel{cursor:pointer;transition:all 0.6s;}.blog-post .panel:not(article):hover{transform:translateY(-10px);}.panel-small{cursor:pointer;transition:all 0.6s;}.panel-small:hover{transform:scale(1.05);}.item-thumb{cursor:pointer;transition:all 0.6s;}.item-thumb:hover{transform:scale(1.05);}.item-thumb-small{cursor:pointer;transition:all 0.6s;}.item-thumb-small:hover{transform:scale(1.05);}
				</style>
CSS;
			}
			if(in_array("ArticleShadowing",$type)){
				// 文章阴影化
				echo <<<CSS
				<style>
				.panel{-moz-box-shadow:0 8px 10px rgba(255,112,173,0.35);}.panel:hover{box-shadow:0 8px 10px rgba(62,147,241,0.37)!important;-moz-box-shadow:0 8px 10px rgba(62,147,241,0.35)!important;}.panel-small{box-shadow:0 8px 10px rgba(255,112,173,0.35);-moz-box-shadow:0 8px 10px rgba(255,112,173,0.35);}.panel-small:hover{box-shadow:0 8px 10px rgba(255,112,173,0.35)!important;-moz-box-shadow:0 8px 10px rgba(255,112,173,0.35)!important;}.app.container{box-shadow:0 0 30px rgba(255,112,173,0.35);}.index-post-img,.entry-thumbnail{overflow:hidden;}
				</style>
CSS;
			}
			if(in_array("TopLamp",$type)){
				// 顶部跑马灯
				echo <<<CSS
				<style>
				#top-grrk {background:url({$PluginPath}img/HorseRaceLamp.gif);height:2px;top:0px;position:fixed;width:100%;Z-index:10000;}
				</style>
CSS;
			}
			if(in_array("RewardStyle",$type)){
				// 打赏图片
				echo <<<CSS
				<style>
				.support-author{background-repeat:round;background-image:url({$PluginPath}img/MenheraSauce.png);}.article__reward-info{color:#00a0ed!important;font-weight:bold;}
				</style>
CSS;
			}
			if(in_array("RewardBeating",$type)){
				// 打赏跳动
				echo <<<CSS
				<style>
				.btn-pay{animation:star 0.5s ease-in-out infinite alternate;}@keyframes star{from{transform:scale(1);}to{transform:scale(1.1);}}
				</style>
CSS;
			}
			if(in_array("TitleCenter",$type)){
				// 标题居中
				echo <<<CSS
				<style>.bg-light .lter,.bg-light.lter{text-align:center!important;font-family:楷体!important;}</style>
				<style media="screen and (max-width:768px)">h1.m-n.font-thin.text-black.l-h{display:none!important;}h1.entry-title.m-n.font-thin.text-black.l-h {display: block!important;}</style>
CSS;
			}
			if(in_array("ScrollStyle",$type)){
				// 滚动条美化
				echo <<<CSS
				<style>
				div#toc{opacity:0.6;}div#toc::-webkit-scrollbar{width:6px;}div#toc::-webkit-scrollbar-thumb{background-color:#ccc;border-radius:6px;}div#toc::-webkit-scrollbar-track{background-color:#e8eaeb;border-radius:6px;}
				</style>
CSS;
			}
			if(in_array("TitleStyle",$type)){
				// 文章标题美化
				echo <<<CSS
				<style>
				#post-content h1{font-size:30px}#post-content h2{position:relative;margin:20px 0 32px!important;font-size:1.55em;}#post-content h3{font-size:20px}#post-content h4{font-size:15px}#post-content h2::after{transition:all .35s;content:"";position:absolute;background:linear-gradient(#3c67bd8c 30%,#3c67bd 70%);width:1em;left:0;box-shadow:0 3px 3px rgba(32,160,255,.4);height:3px;bottom:-8px;}#post-content h2::before{content:"";width:100%;border-bottom:1px solid #eee;bottom:-7px;position:absolute}#post-content h2:hover::after{width:2.5em;}#post-content h1,#post-content h2,#post-content h3,#post-content h4,#post-content h5,#post-content h6{color:#666;line-height:1.4;font-weight:700;margin:30px 0 10px 0}
				</style>
CSS;
			}
			if(in_array("TotalVisit",$type)){
			    
				// 访问总数
				
				$user = Ico::ResTime("user");
				
                echo '<script type="text/javascript">
                  function TotalVisit(){
                      $(function(){
                        $("ul.list-group.box-shadow-wrap-normal").append("<li class=\"list-group-item text-second\"><span class=\"blog-info-icons\">'.$user.'</span><span class=\"badge pull-right\" style=\"background-color: '.$color[array_rand($color)].'\">'.STATIC::TotalVisit().'</span>访客总数</li>");
                      });
                  }
		          TotalVisit();
		          </script>';
		          
		        // 加入 PJAX 回调函数
	            Helper::options()->ChangeAction .= "TotalVisit();";
			}
			if(in_array("ResponseTime",$type)){
			    
			    // 响应耗时
			    
			    $time = Ico::ResTime("time");
			    
			    $ram = Ico::ResTime("ram");
			    
			    $rend = Ico::ResTime("rend");
			    
			    $font = Ico::ResTime("font");
			    
				echo '<script type="text/javascript">
				    
                  function ResponseTime(){
                       
                       $(function(){
		                
    		                let res = AS_ResTime().res;
    		                
    		                let ram = AS_ResTime().ram;
    		                
    		                let tcp = AS_ResTime().tcp;
    		                
    		                function consume(time) {
                                return time + "ms";
                            };
                            
                            $("ul.list-group.box-shadow-wrap-normal").append("<li class=\"list-group-item text-second\"><span class=\"blog-info-icons\">'.$time.'</span><span class=\"badge pull-right\" style=\"background-color: '.$color[array_rand($color)].'\">"+res+"</span>响应耗时</li>");
                            
                            $("ul.list-group.box-shadow-wrap-normal").append("<li class=\"list-group-item text-second\"><span class=\"blog-info-icons\">'.$ram.'</span><span class=\"badge pull-right\" style=\"background-color: '.$color[array_rand($color)].'\">"+ram+"</span>内存占用</li>");
                            
                            window.onload = function() {
                                $("ul.list-group.box-shadow-wrap-normal").append("<li class=\"list-group-item text-second\"><span class=\"blog-info-icons\">'.$rend.'</span><span class=\"badge pull-right\" style=\"background-color: '.$color[array_rand($color)].'\">"+consume(window.performance.timing.domComplete - window.performance.timing.domLoading)+"</span>渲染耗时</li>");
                            };
                        
                        });
                  }
			      ResponseTime();
		          </script>';
		          
		          // 加入 PJAX 回调函数
		          Helper::options()->ChangeAction .= "ResponseTime();";
			}
// 			$("ul.list-group.box-shadow-wrap-normal").append("<li class=\"list-group-item text-second\"><span class=\"blog-info-icons\">'.$font.'</span><span class=\"badge pull-right\" style=\"background-color: '.$color[array_rand($color)].'\">'.STATIC::TotalFont().'</span>全站字数</li>");
			if(in_array("CommentPunchIn",$type)){
			    
			    echo '
			    <style>
    			    /* 评论打卡样式 */
        			.secret_comment{top:5px;}
        			.OwO {margin-right: 10px;}
        			.OwO.padder-v-sm{display:initial;}
        			.OwO.OwO-open .OwO-body{display:table}
        			div#secret_comment{position:inherit;margin-top:5px;}
			    </style>
			    ';
			    
				// 评论打卡
				echo '<script type="text/javascript">
				
				function CommentPunchIn(){ 
				  
				  $(function(){
    				  function a(a, b, c) {
                            if (document.selection) a.focus(), sel = document.selection.createRange(), c ? sel.text = b + sel.text + c : sel.text = b, a.focus();
                            else if (a.selectionStart || "0" == a.selectionStart) {
                                var l = a.selectionStart,
                                    m = a.selectionEnd,
                                    n = m;
                                c ? a.value = a.value.substring(0, l) + b + a.value.substring(l, m) + c + a.value.substring(m, a.value.length) : a.value = a.value.substring(0, l) + b + a.value.substring(m, a.value.length);
                                c ? n += b.length + c.length : n += b.length - m + l;
                                l == m && c && (n -= c.length);
                                a.focus();
                                a.selectionStart = n;
                                a.selectionEnd = n
                            } else a.value += b + c, a.focus()
                    }
                    var b = (new Date).toLocaleTimeString(),
                            c = document.getElementById("comment") || 0;
                    window.SIMPALED = {};
                    window.SIMPALED.Editor = {
                        daka: function() {
                            a(c, "滴！学生卡！打卡时间：" + b, "，请上车的乘客系好安全带~")
                        },
                        zan: function() {
                            a(c, " 写得好好哟,我要给你生猴子！::aru:flower:: ")
                        },
                        cai: function() {
                            a(c, "骚年,我怀疑你写了一篇假的文章！::aru:flower:: ")
                        }
                    };
				  });
		          
                  $(function(){
                        $(".OwO.padder-v-sm").after("<div class=\"OwO\"title=\"打卡\"style=\"display: inline;\"onclick=\"javascript:SIMPALED.Editor.daka();this.style.display=\'none\'\"><div class=\"OwO-logo\"><i class=\"fontello-pencil\"></i><span class=\"OwOlogotext\">打卡</span></div></div><div class=\"OwO\"title=\"赞\"style=\"display: inline;\"onclick=\"javascript:SIMPALED.Editor.zan();this.style.display=\'none\'\"><div class=\"OwO-logo\"><i class=\"glyphicon glyphicon-thumbs-up\"></i><span class=\"OwOlogotext\"></span></div></div><div class=\"OwO\"title=\"踩\"style=\"display: inline;\"onclick=\"javascript:SIMPALED.Editor.cai();this.style.display=\'none\'\"><div class=\"OwO-logo\"><i class=\"glyphicon glyphicon-thumbs-down\"></i><span class=\"OwOlogotext\"></span></div></div>");
                  });
                }
                CommentPunchIn();
                
		          </script>';
		          
	          // 加入 PJAX 回调函数
	          Helper::options()->ChangeAction .= "CommentPunchIn();";
			}
		// 默认启用的样式
		echo <<<CSS
			<style>
			/* 页脚版权信息美化 */
			span.footer-custom{color:#fff;display:inline-block;padding-top:2px;padding:2px 4px 2px 6px;padding-bottom:2px;padding-right:4px;padding-left:6px;}span.footer-left-ver{background-color:#4d4d4d;border-top-left-radius:4px;border-bottom-left-radius:4px;}span.footer-left-user{background-color:#007ec6;border-top-right-radius:4px;border-bottom-right-radius:4px;}span.footer-right-name{background-color:#ffa500;border-top-right-radius:4px;border-bottom-right-radius:4px;}span.footer-user-info{background:linear-gradient(to right,#7A88FF,#d27aff);border-top-right-radius:4px;border-bottom-right-radius:4px;}
			/* 忘记密码按钮 */
			a.ModifyPasswd{float:right!important;}
			/* 文章内插入标签卡 */
			.tab-pane a.light-link img{box-shadow:0 8px 10px rgba(0,0,0,0.35);}img.emotion-aru,img.emotion-twemoji{box-shadow:0 8px 10px rgba(0,0,0,0)!important;}li.nav-item.active{background-color:rgba(41,98,255,0.2);transition:color 1s ease,background-color 1s ease;}.post_tab .nav a,.post_tab .nav a:hover{outline:none;transition:color 1s ease,background-color 1s ease;}
			/*  评论区博主标识美化 */
			label.label.bg-dark.m-l-xs{background-color:#e7a671!important;color:white!important;}
			/*  兼容性修复 */
			@media (min-width:768px){.app-aside-fixed .aside-wrap{background-color:inherit!important;}}
			/*  手机终端美化 */
			@media screen and (max-width:768px){h1.m-n.font-thin.text-black.l-h{display:none!important;}h1.entry-title{display:block!important;}p.summary.l-h-2x.text-muted{display:none;}h1.entry-title.m-n.font-thin.text-black.l-h{font-size:24px!important;}}
			.modal-backdrop.in{display:none;}
			/* 首页文章列表透明 */
			#post-panel {opacity: 0.98;}
			/* 修复handsome酷炫透明模式的文章目录 */
			div#toc { color: #777; box-shadow: 0 2px 6px 0 rgba(114,124,245,.5); border-radius: 6px; }
			</style>
			<script></script>
CSS;
		}else{
		// 当选择为空时启用的样式
		echo <<<CSS
			<style>
			h1.m-n.font-thin.h3.text-black.l-h{color:red!important;}
			</style>
CSS;
		}
	}
	
	// 夜间模式
	static function NightMode($time_1,$time_2){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->NightMode;
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(!empty($SpeedUp)){
		    
		    $PluginPath = $SpeedUp;
		}
		
		// 夜间模式按钮头
	    $head ='<li class=\"dropdown\"><a href=\"#\" id=\"SW_NightMode\" class=\"dropdown-toggle feathericons\">';
	    
		$sun = Ico::NightMode("sun");
		$moon = Ico::NightMode("moon");
		
		if($type == 1){
			
			echo '<link rel="stylesheet" href=" '. $PluginPath .'css/nightmode.css"/>';
			
		}elseif($type == 2){
		    echo '<link rel="stylesheet" href=" '. $PluginPath .'css/night-mode.css"/>';
		    
		    echo '<script type="text/javascript">
		          // 初始化夜间模式图标 
		          $(function(){
                        if($("li#easyLogin").length>0){
                        
                    		$("li#easyLogin").before("'.$head.$moon.'</a></li>");
                    		
                        }else if(("ul.nav.navbar-nav.navbar-right").length>0){
                        
                            $("ul.nav.navbar-nav.navbar-right").append("'.$head.$moon.'</a></li>");
                        }
                  });
                  
                  // 切换  
                  $(function(){
                  
                      $("a#SW_NightMode").click(function(){
                      
                            if($("#body").hasClass("night-mode") == false){
                            
                                $("#body").addClass("night-mode");
                                
                                $("a#SW_NightMode").html("'.$sun.'");
                                
                                $("html").addClass("night");
                                
                            }else if($("#body").hasClass("night-mode")){
                            
                                $("#body").removeClass("night-mode");
                                
                                $("a#SW_NightMode").html("'.$moon.'");
                                
                                $("html").removeClass("night");
                            }
                        });
                  });
		          </script>';
			
			// 设置时区
			date_default_timezone_set('PRC');
			
			$time = date('H',time());
			
			if( $time_1  <= $time || $time <= $time_2){
				echo '<script type="text/javascript">
                  $(function(){
                  
                        $("#body").addClass("night-mode");
                  });
		          </script>';
				
			}
		}elseif($type == 3){
		    
		    echo '<script type="text/javascript" src=" '. $PluginPath .'js/bg/b8.js"></script>';
		    echo '<link rel="stylesheet" href=" '. $PluginPath .'css/night-mode-opacity.css"/>';
		    
		    echo '<script type="text/javascript">
		          // 初始化夜间模式图标 
		          $(function(){
                        if($("li#easyLogin").length>0){
                        
                    		$("li#easyLogin").before("'.$head.$moon.'</a></li>");
                    		
                        }else if(("ul.nav.navbar-nav.navbar-right").length>0){
                        
                            $("ul.nav.navbar-nav.navbar-right").append("'.$head.$moon.'</a></li>");
                        }
                        
                  });
                  
                  // 切换  
                  $(function(){
                  
                      $("a#SW_NightMode").click(function(){
                      
                            // $("#body").toggleClass("night-mode");
                            
                            if($("#body").hasClass("night-mode") == false){
                            
                                $("#body").addClass("night-mode");
                                
                                $("a#SW_NightMode").html("'.$sun.'");
                                
                            }else if($("#body").hasClass("night-mode")){
                            
                                $("#body").removeClass("night-mode");
                                
                                $("a#SW_NightMode").html("'.$moon.'");
                            }
                        });
                  });
		          </script>';
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
		
		// 后台默认的CSS
		echo '<link rel="stylesheet" href=" '. $PluginPath .'css/admin-def-style.css"/>';
		echo '<link rel="stylesheet" href=" '. $PluginPath .'css/grid.css"/>';
		echo '<link rel="stylesheet" href=" '. $PluginPath .'css/normalize.css"/>';
		
		if($type == 1){
			
			// AliceStyle美化的CSS
			echo '<link rel="stylesheet" href=" '. $PluginPath .'css/user-style.css"/>';
			
			// 引用 font-awesome 图标
			echo '<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.css"/>'; 
			
			// Title Ico图标
			echo '<link rel="shortcut icon" type="image/x-icon" href=" '. $PluginPath .'img/favicon.ico" />';
		}
	}
	
	// 登录壁纸
	static function LoginBg(){
	    
	    // 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->LoginBg;
		
		// 获取 云加速 配置信息
		$SpeedUp = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->SpeedUp;
		
		if(empty($type)){
			
			if(!empty($SpeedUp)){
			    $type = $SpeedUp.'img/logo-bg.jpg';
			}else{
			    $type = $PluginPath.'img/logo-bg.jpg';
			}
		}
		
		echo '<style>#login-bg{background-image:url('.$type.')!important;}</style>';
	}
	
	// 登录框美化
	static function LoginCard(){
		
		// 分割获取的配置信息
		$list = explode("-",Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->LoginCard);
		
		if($list[0]) echo '<style>.typecho-login{background:'.$list[0].'!important;color:'.$list[1].'!important;opacity:'.$list[2].'!important;border-radius:'.$list[3].'!important;}.typecho-login a{color:'.$list[1].'!important;}</style>';
	}
	
	// 字体美化
	static function FontStyle(){
		
		// 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->FontStyle;
		
		if(!empty($type)){
		    
    		echo '<style>@font-face{font-family:FontStyle;src:url("'.$type.'");format("truetype");}*{font-family:FontStyle;}i{font-family:none;}@media only screen and (min-width:0px) and (max-width:767px){.index-banner{height:50vh!important;}}</style>';
		}
	}
	
	// 天气信息
	static function Weather(){
	    
	    // 获取配置信息
		$type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->Weather;
		
		if(!empty($type)){
		    
		    // 定位 
		    $location = ClientInfo::Location($type);
		    
		    echo '<style>
    		        div#Weather{
    		            height: 30px;
    		        }
    		        div#Weather>div {
                        display: inline-block;
                        font-size: 1.1em;
                        margin: 0 5px;
                    }
                    .w-ico>svg {
                        margin: -5px 0;
                    }
                    .w-weather {
                        background-color: #5dbfe7;
                        color: white;
                        width: 46px;
                        border-radius: 50px;
                    }
                    .w-info {
                        color: white;
                        background-color: #5dbfe7;
                        border-radius: 3px;
                    }
		        </style>';
		        
		    if($location -> status == 1){
		        
		        // 天气 
		        $weather = ClientInfo::Weather($type);
		    
    		    // 获取地理位置并截取余两位
    		    // $city = mb_substr($location->city,0,2);
    		    $city = $location->city;
    		    
    		    $temperature = $weather->temperature.'°';
    		    
    		    $weatherInfo = $weather->weather;
    		    
    		    $arrIco = [
    		        'sunny'       =>    ['晴'],
    		        
    		        'cloud'       =>    ['少云','晴间多云','多云'],
    		        
    		        'cloudy'      =>    ['阴'],
    		      
    		        'gale'        =>    ['有风','平静','微风','和风','清风','强风/劲风','疾风','大风','烈风','风暴','狂爆风','飓风','热带风暴'],
    		        
    		        'smog'        =>    ['霾','中度霾','重度霾','严重霾'],
    		      
    		        'rain'        =>    ['阵雨','小雨','中雨','大雨','毛毛雨/细雨','雨','小雨-中雨'],
    		        
    		        'thunderRain' =>    ['雷阵雨','雷阵雨并伴有冰雹'],

                    'rainStorm'   =>    ['暴雨','大暴雨','特大暴雨','强阵雨','强雷阵雨','极端降雨','大雨-暴雨','暴雨-大暴雨','大暴雨-特大暴雨'],
                    
                    'sleet'       =>    ['雨雪天气','雨夹雪','阵雨夹雪','冻雨'],
                    
                    'snow'        =>    ['雪','阵雪','小雪','中雪','大雪','暴雪','小雪-中雪','中雪-大雪','大雪-暴雪'],
                    
                    'dust'        =>    ['浮尘','扬沙','沙尘暴','强沙尘暴'],
                    
                    'tornado'     =>    ['龙卷风'],
                    
                    'fog'         =>    ['雾','浓雾','强浓雾','轻雾','大雾','特强浓雾'],
                    
                    'heat'        =>    ['热'],
                    
                    'cold'        =>    ['冷'],
                    
                    'unknown'     =>    ['未知'],
    		        ];
    		    
    		    if(in_array($weatherInfo,$arrIco['sunny'])){
    		        
    		        $ico = Ico::Weather("sunny");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['cloud'])){
    		        
    		        $ico = Ico::Weather("cloud");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['cloudy'])){
    		        
    		        $ico = Ico::Weather("cloudy");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['gale'])){
    		        
    		        $ico = Ico::Weather("gale");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['smog'])){
    		        
    		        $ico = Ico::Weather("smog");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['rain'])){
    		        
    		        $ico = Ico::Weather("rain");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['thunderRain'])){
    		        
    		        $ico = Ico::Weather("thunderRain");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['rainStorm'])){
    		        
    		        $ico = Ico::Weather("rainStorm");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['sleet'])){
    		        
    		        $ico = Ico::Weather("sleet");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['snow'])){
    		        
    		        $ico = Ico::Weather("snow");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['dust'])){
    		        
    		        $ico = Ico::Weather("dust");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['tornado'])){
    		        
    		        $ico = Ico::Weather("tornado");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['fog'])){
    		        
    		        $ico = Ico::Weather("fog");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['heat'])){
    		        
    		        $ico = Ico::Weather("heat");
    		        
    		    }elseif(in_array($weatherInfo,$arrIco['cold'])){
    		        
    		        $ico = Ico::Weather("cold");
    		        
    		    }else{
    		        
    		        $ico = Ico::Weather("unknown");
    		    }
    		    
    		    echo '<script type="text/javascript">
    		        $(function(){
    		        
		                    $(".dropdown.wrapper").after("<div id=\"Weather\"><div class=\"w-city\">'. $city .'</div><div class=\"w-ico\">'. $ico .'</div><div class=\"w-temperature\">'. $temperature .'</div><div class=\"w-weather\">'. $weatherInfo .'</div></div>");
		                    
		                    if($(".app-aside-folded").length>0){
                                 $("div#Weather").css("display","none");
                            }
                            
                            $("div#Weather").click(function(){
                                    alert("\n您的IP是：'.ClientInfo::GetUserIP().'\n\n您的操作系统是：'.ClientInfo::GetOS().'\n\n您使用的浏览器是：'.ClientInfo::GetUserBrowser().'\n\n您所在的位置是：'.$location->province.$location->city.'\n\n当前天气情况：'.$weatherInfo.$weather->winddirection.'风'.$temperature.'C");
                            })
                      });
    				</script>';
    				
		    }else{
		        
		        $info = '错误，天气信息！您的API配置有误，请确认API是否正确！';
		        
		        echo '<script type="text/javascript">
    		        $(function(){
    		                
                            $(".dropdown.wrapper.vertical-wrapper").after("<div id=\"Weather\"><div class=\"w-info\">'. $info .'</div></div>");
                      });
    				</script>';
		    }
		}
	}
	
	
	// END
}





