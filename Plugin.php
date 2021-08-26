<?php
if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}
// 定义版本号
defined($Cver,'20201015');

// 插件设置模块
include 'inc/form.min.php';

// 前端header
include 'inc/header.min.php';

// 前端footer
include 'inc/footer.min.php';

// 工具模块 主要是定位和天气
include 'inc/tool.php';

// 图标文件
include 'inc/ico.php';

/**
 * <strong style="color:#7682fa;font-family: 楷体;">萌卜兔's 美化插件</strong>
 *
 * @package AliceStyle
 * @author <strong style="color:#7682fa;font-family: -webkit-pictograph;">racns</strong>
 * @version <strong style="color:#7682fa;font-family: 楷体;">3.4.0</strong>
 * @update: 2020-8-26
 * @link //racns.com
 */
class AliceStyle_Plugin implements Typecho_Plugin_Interface{
	
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate(){
        
        Typecho_Plugin::factory('Widget_Archive')->header = array(__CLASS__, 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array(__CLASS__, 'footer');
        
        // 激活后台menu页面接口
        Typecho_Plugin::factory('admin/menu.php')->navBar = array('AliceStyle_Plugin', 'render');
        
        // 激活后台header接口
        Typecho_Plugin::factory('admin/header.php')->header = array('AliceStyle_Plugin', 'A_Header');
        
        // 激活后台footer接口
        Typecho_Plugin::factory('admin/footer.php')->end = array('AliceStyle_Plugin', 'A_Footer');
        
        // 添加路由
        Helper::addRoute("route_AliceStyle","/AliceStyle","AliceStyle_Action",'action');
        return '<div id="AS-SW"style="border-radius:2px;box-shadow:1px 1px 50px rgba(0,0,0,.3);background-color: #fff;width: auto; height: auto; z-index: 2501554; position: fixed; margin-left: -125px; margin-top: -75px; left: 50%; top: 50%;"><div style="text-align: center;height:42px;line-height:42px;border-bottom:1px solid #eee;font-size:14px;overflow:hidden;border-radius:2px 2px 0 0;font-weight:bold;position:relative;cursor:move;min-width:200px;box-sizing:border-box;background-color:#7272da;color:#fff;">启用成功</div><div style="padding:15px;font-size:14px;min-width:150px;position:relative;box-sizing:border-box;height: 50px;">欢迎使用AliceStyle插件，希望能让您喜欢！</div><div style="text-align:right;padding-bottom:15px;padding-right:10px;min-width:200px;box-sizing:border-box;"><button onclick="colseDIV()"style="height:28px;line-height:28px;margin:15px 5px 0;padding:0 15px;border-radius:2px;font-weight:400;cursor:pointer;text-decoration:none;outline:none;background-color:#7272da;border:0;color:#fff;">确定</button></div><Script>function colseDIV(){$("#AS-SW").hide()}</Script></div>';
        
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){
        
    	// 删除路由
    	Helper::removeRoute("route_AliceStyle");
    	return '<div id="AS-SW"style="border-radius:2px;box-shadow:1px 1px 50px rgba(0,0,0,.3);background-color: #fff;width: auto; height: auto; z-index: 2501554; position: fixed; margin-left: -125px; margin-top: -75px; left: 50%; top: 50%;"><div style="text-align: center;height:42px;line-height:42px;border-bottom:1px solid #eee;font-size:14px;overflow:hidden;border-radius:2px 2px 0 0;font-weight:bold;position:relative;cursor:move;min-width:200px;box-sizing:border-box;background-color:#7272da;color:#fff;">卸载成功</div><div style="padding:15px;font-size:14px;min-width:150px;position:relative;box-sizing:border-box;height: 50px;">再次感谢您使用AliceStyle，我们会有一个更好的遇见！</div><div style="text-align:right;padding-bottom:15px;padding-right:10px;min-width:200px;box-sizing:border-box;"><button onclick="colseDIV()"style="height:28px;line-height:28px;margin:15px 5px 0;padding:0 15px;border-radius:2px;font-weight:400;cursor:pointer;text-decoration:none;outline:none;background-color:#7272da;border:0;color:#fff;">确定</button></div><Script>function colseDIV(){$("#AS-SW").hide()}</Script></div>';
    }

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form){
    	
		// 在线检查最新版本	参数 '本插件的版本号'
		echo PluginsForm::updata('20201015');
		
		// 初始化
		PluginsForm::init();
		
		// 测试用的
		PluginsForm::test();
		
        // 动态背景
        $form->addInput(PluginsForm::DynamicBackground(), PluginsForm::GetDBFlie());
        
        // 主题美化
        $form->addInput(PluginsForm::PrettifyStyle());
        
        // 返回顶部
        $form->addInput(PluginsForm::ReturnTop());
        
        // 更新提示
        $form->addInput(PluginsForm::UpdataTips());
        
        // Live2D
        $form->addInput(PluginsForm::Live2D());
        
        // 图灵机器人APIKEY
        $form->addInput(PluginsForm::APIKEY());
        
        // 鼠标样式
        $form->addInput(PluginsForm::MouseStyle());
        
        // 遮罩特效
        $form->addInput(PluginsForm::Mask());
        
        // 夜间模式
        $form->addInput(PluginsForm::NightMode());
        
        // 后台美化
        $form->addInput(PluginsForm::AliceStyleAdmin());
        
        // 登录背景
        $form->addInput(PluginsForm::LoginBg());
        
        // 登录框美化
        $form->addInput(PluginsForm::LoginCard());
        
        // 字体美化
        $form->addInput(PluginsForm::FontStyle());
        
        // 动态标题
        $form->addInput(PluginsForm::TitleDynamic());
        
        // 天气信息
        $form->addInput(PluginsForm::Weather());
        
        // 云加速
        $form->addInput(PluginsForm::SpeedUp());
        
        // 随机图
        $form->addInput(PluginsForm::RandomImg());
        
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
    public static function render(){
    	
    	// 更新提示	参数 '本插件的版本号'
		echo PluginsHead::UpdataTips('20201015');
		
    }

    /**
     * 为header添加css文件
     * @return void
     */
    public static function header(){
    	
        // 主题美化
        PluginsHead::PrettifyStyle();

        // 返回顶部开关
        PluginsHead::ReturnTop();
        
        // Live2D
		PluginsHead::Live2D();
		
		// 顶部跑马灯特效
		PluginsHead::TopLamp();
		
		// 夜间模式	参数 '开始时间','结束时间' 24小时整点格式
		PluginsHead::NightMode('23','5');
		
        // 字体美化
        PluginsHead::FontStyle();
        
        // 天气信息
		PluginsHead::Weather();
    }

    /**
     * 为footer添加js文件
     * @return void
     */
    public static function footer(){
    	
        // 动态背景
        PluginsFooter::DynamicBackground();
        
        // 主题美化
        PluginsFooter::PrettifyStyle();
        
        // 返回顶部
        PluginsFooter::ReturnTop();
		
		// Live2D
		PluginsFooter::Live2D();
		
		// 鼠标样式
		PluginsFooter::MouseStyle();
        
		// 遮罩特效
		PluginsFooter::Mask();
		
		// 输出log
		PluginsFooter::TagLog();
		
		// 动态标题
		PluginsFooter::TitleDynamic();
		
    }
    
    /**
     * 为后台header添加css文件
     * @return void
     */
    public static function A_Header(){
    	
    	// 后台美化
    	PluginsHead::AliceStyleAdmin();
    	
    	// 登录壁纸
    	PluginsHead::LoginBg();
    	
    	// 登录框美化
    	PluginsHead::LoginCard();
    }
    
    /**
     * 为后台footer添加js文件
     * @return void
     */
    public static function A_Footer(){
     	
     	// 后台美化
     	PluginsFooter::AliceStyleAdmin();
    }
     
    /**
     * 服务器状态信息
     * 
     */
    public static function AS_SERVER(){
        
        // PluginsForm::SERVER();
    }
}
