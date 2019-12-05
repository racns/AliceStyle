<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

/**
 * <strong style="color:#9e5df3;">萌卜兔's 前台美化插件</strong>
 *
 * @package AliceStyle
 * @author racns
 * @version 2.4.0
 * @update: 2019-12-5
 * @link //racns.com
 */
class AliceStyle_Plugin implements Typecho_Plugin_Interface
{
	const STATIC_DIR = '/usr/plugins/AliceStyle/static';
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->header = array(__CLASS__, 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array(__CLASS__, 'footer');
        Typecho_Plugin::factory('admin/menu.php')->navBar = array('AliceStyle_Plugin', 'render');
        Helper::addRoute("route_AliceStyle","/AliceStyle","AliceStyle_Action",'action');
        return '插件安装成功，请进入设置配置信息！';
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate()
    {
    	Helper::removeRoute("route_AliceStyle");
    	return '插件卸载成功了呢';
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {

        //定义插件当前版本号
        $client_version = 20191205;
        //获取服务器上面的版本号
        $data = file_get_contents('http://racns.com/usr/program/api/Server/AliceStyle/');
        /*获取json数据*/
        $result = json_decode($data, true);
        /*获取输出类型*/
        $select = $result['select'];
        //最新版本号
        $server_version = $result['version'];
        //下载地址
        $url = $result['url'];
        //头部信息
        $title = $result['title'];
        //更新说明
        $tips = $result['tips'];
        
        $styleUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/style.css';
        echo '<link rel="stylesheet" href=" '. $styleUrl .'"/>';
        
        if ($client_version < $server_version) {
        	echo '<div class="container"><div class="inner"><span>i</span><h1>'. $title .'</h1><p>'. $tips .'</p><p>下载地址：<a href="'. $url .'">'. $url .'</a></p></div></div>';
        }elseif($select == 2) {
        	echo '<div class="container"><div class="inner"style="background:linear-gradient(to right , #7A88FF, #9b83ff);"><span>i</span><h1>'. $title .'</h1><p>'. $tips .'</p><p>下载地址：<a href="'. $url .'">'. $url .'</a></p></div></div>';
        }
        

        //设置代码风格样式
        $JSstyles = array_map('basename', glob(dirname(__FILE__) . '/static/js/bg_file/*.js'));
        $JSstyles = array_combine($JSstyles, $JSstyles);
        $name = new Typecho_Widget_Helper_Form_Element_Select('code_js', $JSstyles, '8-RiseBalloon.js',
            _t('动态背景'), _t('默认背景：PinkBubble，如不需要动态背景，请选择"Null.js"'));
        $form->addInput($name->addRule('enum', _t('必须选择背景'), $JSstyles));

        //主题开关
        $type = new Typecho_Widget_Helper_Form_Element_Radio('type', array(
            '0' => '关闭',
            '1' => '默认样式',
            '2' => '透明样式',
            '3' => '盒子模型'
        ),
            '1', _t('主题样式'), _t('"透明样式"或"盒子模型"，推荐使用handsome的9号主题'));
        $form->addInput($type);
        
        //返回顶部
        $ReturnTop = new Typecho_Widget_Helper_Form_Element_Radio('ReturnTop', array(
            '0' => '关闭',
            '1' => '拉姆雷姆',
            '2' => '夏目的喵'
        ),
            '2', _t('返回顶部'), _t('拉姆、夏目的喵：返回顶部；雷姆：返回底部'));
        $form->addInput($ReturnTop);
        
        /* 分类名称 */
        $headtips = new Typecho_Widget_Helper_Form_Element_Radio('headtips', array(
            '0' => '关闭',
            '1' => '开启'
        ),
            '1', _t('授权信息'), _t('这个功能还在开发中，暂时展示效果，等待功能实现'));
        $form->addInput($headtips);
        
        /*设置live2d人物*/
        $live2d_type = new Typecho_Widget_Helper_Form_Element_Radio('live2d_type', array (
        	0 => '关闭',
        	1 => '伊斯特瓦尔',
        	2 => '雷姆'
        ), 
        	0,_t('Live2D酱'), _t('Live2D整合版：带文字提示功能的看板娘！'));
        $form->addInput($live2d_type);
        
        /*图灵机器人APIkey*/
        $appkey = new Typecho_Widget_Helper_Form_Element_Text('appkey', NULL, NULL, _t('ApiKey'), _t('图灵机器人的ApiKey，填写后可以与看板娘聊天！'));
        $form->addInput($appkey);
        
        /*鼠标样式*/
        $dir = self::STATIC_DIR . '/img/cur';
        $options = [
            'none' => _t('关闭'),
            'dew' => "<img src='{$dir}/dew/normal.cur'><img src='{$dir}/dew/link.cur'>",
            'blademaster' => "<img src='{$dir}/blademaster/normal.cur'><img src='{$dir}/blademaster/link.cur'>",
            'fireworks' => "<img src='{$dir}/fireworks/shownormal.cur'><img src='{$dir}/fireworks/link.cur'>",
        ];
        $bubbleType = new Typecho_Widget_Helper_Form_Element_Radio('mouseType', $options, 'dew', _t('鼠标样式'),  _t('修改默认鼠标样式，最后一项带特效！'));
        $form->addInput($bubbleType);
        
        $snow = new Typecho_Widget_Helper_Form_Element_Radio('snow', array (
        	0 => '关闭',
        	1 => '雪花',
        	2 => '樱花',
        ), 
        	0,_t('遮罩特效'), _t('开启该功能后，前台会有雪花或樱花下落效果！'));
        $form->addInput($snow);
		
		
    }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 插件实现方法
     *
     * @access public
     * @return void
     */
    public static function render()
    {
    	$headtips = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->headtips;
    	$StaticCssUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/';
    	$StaticJsNeed_file = Helper::options()->pluginUrl . '/AliceStyle/static/js/need_file/';
    	if ( $headtips == 1) {
	        echo '<link rel="stylesheet" href=" '. $StaticCssUrl .'jquery.toolbar.css"/>';
	        echo '<script type="text/javascript" src="' . $StaticJsNeed_file . 'jquery-1.11.0.min.js"></script>';
	        echo '<script type="text/javascript" src="' . $StaticJsNeed_file . 'jquery.toolbar.js"></script>';
	    	echo '
				<section class="btn-set-03">
					<div class="samples">
						<div data-toolbar="set-03" class="btn-toolbar pull-left"><i>AliceStyle</i></div>
					</div>
				</section>
					<div class="clear"></div>
				</section>
				<div id="set-03-options">
					<a href="#"><i style="color:white;">已</i></a>
					<a href="#"><i style="color:white;">授</i></a>
					<a href="#"><i style="color:white;">权</i></a>
				</div>';
			}
    }

    /**
     *为header添加css文件
     * @return void
     */
    public static function header()
    {

        /*主题样式*/
        $type = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->type;
        $customUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/custom.css';
        $opacityUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/opacity.css';
        $customboxUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/custombox.css';
        $defaultUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/default.css';
        

        //主题开关
        if ($type == 0){
        	echo '<link rel="stylesheet" type="text/css" href="' . $defaultUrl . '" />';
        }elseif ($type == 1) {
            echo '<link rel="stylesheet" type="text/css" href="' . $customUrl . '" />';
        } elseif ($type == 2) {
            echo '<link rel="stylesheet" type="text/css" href="' . $customUrl . '" />';
            echo '<link rel="stylesheet" type="text/css" href="' . $opacityUrl . '" />';
        }elseif ($type == 3){
        	echo '<link rel="stylesheet" type="text/css" href="' . $customUrl . '" />';
        	echo '<link rel="stylesheet" type="text/css" href="' . $customboxUrl . '" />';
        }

        /*返回顶部开关*/
        $ReturnTop = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->ReturnTop;
        $RamRemTopUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/top.css';
        $BanUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/szgotop.css';
        if ($ReturnTop == 1) {
            echo '<link rel="stylesheet" type="text/css" href="' . $RamRemTopUrl . '" />';
        }elseif($ReturnTop == 2){
        	echo '<link rel="stylesheet" type="text/css" href="' . $BanUrl . '" />';
        }
		
		$Options = Helper::options()->plugin('AliceStyle');
        $live2d_type = $Options->live2d_type;
        $live2dCssUrl = Helper::options()->pluginUrl . '/AliceStyle/static/css/live2d/live2d.css';
        if($live2d_type == 0){
        	// code...
        }else {
        	echo '<link rel="stylesheet" type="text/css" href="' . $live2dCssUrl . '" />';
        }

        echo <<<HTML
		<!-- 顶部跑马灯特效 --><div id="top-grrk"></div>
HTML;
    }


    /**
     *为footer添加js文件
     * @return void
     */
    public static function footer()
    {

        /*主题样式*/
        $Options = Helper::options()->plugin('AliceStyle');
        $Path = Helper::options()->pluginUrl . '/AliceStyle/static/';
        $JSstyle = Helper::options()->plugin('AliceStyle')->code_js;
        $jsUrl = Helper::options()->pluginUrl . '/AliceStyle/static/js/bg_file/' . $JSstyle;
        echo '<script type="text/javascript" src="' . $jsUrl . '"></script>';
        $jsUrl_custom = Helper::options()->pluginUrl . '/AliceStyle/static/js/need_file/custom.js';
        
        /*返回顶部控件*/
        $ReturnTop = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->ReturnTop;
        if ($ReturnTop == 1) {
            echo '<div id="updown"><div class="sidebar_wo" id="leimu">
	        <img src="' . $Path . 'img/leimuA.png" alt="雷姆" onmouseover="this.src=\'' . $Path . 'img/leimuB.png\'" onmouseout="this.src=\'' . $Path . 'img/leimuA.png\'" id="audioBtn"></div>
	        <div class="sidebar_wo" id="lamu"><img src="' . $Path . 'img/lamuA.png" alt="雷姆" onmouseover="this.src=\'' . $Path . 'img/lamuB.png\'" onmouseout="this.src=\'' . $Path . 'img/lamuA.png\'" id="audioBtn"></div>';
            echo '<script type="text/javascript" src="' . $Path . 'js/need_file/ReturnTop.jquery.min.js"></script>';
            echo '<script type="text/javascript" src="' . $Path . 'js/need_file/top.js"></script>';
        }elseif($ReturnTop == 2){
        	echo '<div class="back-to-top cd-top faa-float animated cd-is-visible" style="top: -900px;"></div>';
            echo '<script type="text/javascript" src="' . $Path . 'js/need_file/szgotop.js"></script>';
        }
		
        $siteUrl = Helper::options()->siteUrl;
        $live2d_type = $Options->live2d_type;
        if ($live2d_type == 0) {
        	// code...
        }else {
        	echo '<div id="landlord"style="left:5px;bottom:0px;"><div class="message"style="opacity:0"></div><canvas id="live2d"width="500"height="560"class="live2d"></canvas><div class="live_talk_input_body"><div class="live_talk_input_name_body"><input name="name"type="text"class="live_talk_name white_input"id="AIuserName"autocomplete="off"placeholder="你的名字"/></div><div class="live_talk_input_text_body"><input name="talk"type="text"class="live_talk_talk white_input"id="AIuserText"autocomplete="off"placeholder="要和我聊什么呀？"/><button type="button"class="live_talk_send_btn"id="talk_send">发送</button></div></div><input name="live_talk"id="live_talk"value="1"type="hidden"/><div class="live_ico_box"><div class="live_ico_item type_info"id="showInfoBtn"></div><div class="live_ico_item type_talk"id="showTalkBtn"></div><div class="live_ico_item type_quit"id="hideButton"></div><div class="live_ico_item type_music"id="musicButton"></div><audio src=""style="display:none;"id="live2d_bgm"data-bgm="0"preload="none"></audio><input name="live_statu_val"id="live_statu_val"value="0"type="hidden"/></div></div>';
	    	echo '<div id="open_live2d">召唤看板娘</div>';	
	
			echo "<script>var message_Path='".$Path."';var home_Path='".$siteUrl."';var live2d_type=".$live2d_type.";</script>";
			echo '<script src="'. $Path .'js/live2d/live2d.js?ver0.2"></script>';
			echo '<script src="'. $Path .'js/live2d/message.js?ver0.9"></script>';
        }
    	$arr = self::handleBubbleType($Options);
        echo $arr['html'];
        echo $arr['js'];
        
		/*遮罩特效*/
        $snow = Typecho_Widget::widget('Widget_Options')->plugin('AliceStyle')->snow;
        if($snow == 1){
        	echo '<script src="'. $Path .'js/page_canvas/snow.js"></script>';
        }elseif($snow == 2){
        	echo '<script src="'. $Path .'js/page_canvas/sakura.js"></script>';
        }
		
		
		
        echo <<<HTML
		<script type="text/javascript" src="{$jsUrl_custom}"></script>
HTML;
    }
    
    /*鼠标样式*/
    private static function handleBubbleType($Options)
    {
        $bubbleType = $Options->bubbleType;
        $dir  = self::STATIC_DIR;
        $js   = '';
        $html = '';
        
        $mouseType = $Options->mouseType;
        $imageDir  = self::STATIC_DIR . '/img/cur';
        if ($mouseType != 'none') {
            $js .= '<script>';
            $js .= <<<JS
				$("body").css("cursor", "url('{$imageDir}/{$mouseType}/normal.cur'), default");
				$("a").css("cursor", "url('{$imageDir}/{$mouseType}/link.cur'), pointer");
JS;
            $js .= '</script>';
            if ($mouseType == 'fireworks') {
            	$html .= '<canvas id="fireworks" style="position:fixed;left:0;top:0;pointer-events:none;"></canvas>';
                $js   .= '<script type="text/javascript" src="https://cdn.bootcss.com/animejs/2.2.0/anime.min.js"></script>';
                $js   .= "<script type='text/javascript' src='{$dir}/js/need_file/fireworks.js'></script>";
            }
        }
        
        return compact('js', 'html');
    }
}
