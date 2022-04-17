<?php

/*
 * 作者：racns
 * 地址：https://racns.com
 * QQ：1211515059
 * 时间：2020年3月23
 * 注：本AliceStyle插件版权归 萌卜兔's 所有，禁止用于商用，如有违者，后果自负
 */

class PluginsForm{
	
	// 测试用的方法
	public static function test(){
	    
	    
	}
	
	// 初始化
	static function init(){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
		// 引入插件面板美化文件
        echo '<link rel="stylesheet" href=" '. $PluginPath .'css/as-style.css"/>';
        
        // jQuery
        echo '<script type="text/javascript" src="' . $PluginPath . 'libs/jquery-3.5.1.min.js"></script>';
        
	}
	
	// 插件检测更新
	static function updata($Cver){
	    
	    // 获取API信息
		$ch = curl_init("http://api.racns.com/api/as/?as=info");
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		
		$res = curl_exec($ch);
		
		$data = json_decode($res,JSON_UNESCAPED_UNICODE);
		
		if($data['status'] == 1){
		    
		    $Sver = $data['data']['version'];
		    
		    if($data['remark'] == 'updata' && $Cver < $Sver){
		        
		        $info = '<div class="container"><div class="inner"><span>i</span><h1>'. $data['data']['title'] .'</h1><p>'. $data['data']['tips'] .'</p><p>下载地址：<a href="'. $data['data']['url'] .'">'. $data['data']['url'] .'</a></p></div></div>';
		        
		    }elseif($data['remark'] == 'bulletin'){
		        
		        $info = '<div class="container"><div class="inner"style="background:linear-gradient(to right , #7A88FF, #9b83ff);"><span>i</span><h1>'. $data['data']['title'] .'</h1><p>'. $data['data']['tips'] .'</p><p>下载地址：<a href="'. $data['data']['url'] .'">'. $data['data']['url'] .'</a></p></div></div>';
		    }
		    
		    return $info;
		    
		}else{
		    
		    echo '无法获取插件更新信息！';
		}
	}
	
	// 获取动态背景文件
	static function GetDBFlie(){
		
		$list = [
			'a0.js'     => '不使用动态背景',
			'a1.js'     => '黑客帝国001',
			'a2.js'     => '黑客帝国002',
			'a3.js'     => '磁力线条',
			'a4.js'     => '浮动气泡',
			'a5.js'     => '七色彩虹',
			'a6.js'     => '下雨背景',
			'a7.js'     => '彩色气球[推荐]',
			'a8.js'     => '彩色爱心',
			'a9.js'     => '科技背景',
			'b1.js'     => '蓝色气泡',
			'b2.js'     => '漫漫星空[推荐]',
			'b3.js'     => '海平面',
			'b4.js'     => '随机色带',
			'b5.js'     => '气泡背景[推荐]',
			'b6.js'     => '旋转特效',
			'b7.js'     => '磁感线',
			'b8.js'     => '互动星空',
			'b9.js'     => '旋转星空',
			];
        
        return $list;
	}
	
	// 动态背景
	static function DynamicBackground(){
		
		$list = STATIC::GetDBFlie();
		
        $result = new Typecho_Widget_Helper_Form_Element_Select('DynamicBackground', $list, 'a7.js', _t('动态背景'), _t('动态背景的渲染会占用终端用户的内存，如果您的用户不是十几年前的机型，影响可以忽略不计'));
        
        return $result;
	}
	
	// 返回顶部
	static function ReturnTop(){
		
		$list = [
			'0' => '关闭',
            '1' => '拉姆雷姆',
            '2' => '夏目的喵'
		];
		
		$result = new Typecho_Widget_Helper_Form_Element_Radio('ReturnTop', $list,'2', _t('返回顶部'), _t('这是两个很萌的返回顶部控件'));
            
        return $result;
	}
	
	// 更新提示
	static function UpdataTips(){
		
		$list = [
			'0' => '关闭',
            '1' => '开启'
		];
		
		$result = new Typecho_Widget_Helper_Form_Element_Radio('UpdataTips', $list,'1', _t('更新提示'), _t('仅用于提示更新，开启后本插件将会推送新版插件信息，用于提示更新'));
            
        return $result;
	}
	
	// Live2D
	static function Live2D(){
		
		$list = [
			0 => '关闭',
        	1 => '伊斯特瓦尔',
        	2 => '雷姆',
        	3 => 'Terisa'
		];
		
		$result = new Typecho_Widget_Helper_Form_Element_Radio('Live2D', $list, 0,_t('Live2D酱'), _t('Live2D整合版，模型可更换，但对小白来说操作较为复杂，如有更换模型的需求，可以咨询本兔'));
		
		return $result;
	}
	
	// 图灵机器人APIKEY
	static function APIKEY(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('appkey', NULL, NULL, _t('ApiKey'), _t('图灵机器人的ApiKey，填写后Live2D才能使用聊天功能！'));
		
		return $result;
	}
	
	// 鼠标样式
	static function MouseStyle(){
		
		// 插件所在位置的路径信息
		$PluginPath = Helper::options()->pluginUrl.'/AliceStyle/static/';
		
        $dir = $PluginPath . 'mouse';
        
        $list = [
            'none' => _t('关闭'),
            'dew' => "<img src='{$dir}/dew/normal.cur'><img src='{$dir}/dew/link.cur'>",
            'blademaster' => "<img src='{$dir}/blademaster/normal.cur'><img src='{$dir}/blademaster/link.cur'>",
            'fireworks' => "<img src='{$dir}/fireworks/shownormal.cur'><img src='{$dir}/fireworks/link.cur'>",
        ];

        $result = new Typecho_Widget_Helper_Form_Element_Radio('MouseStyle', $list, 'dew', _t('鼠标样式'),  _t('鼠标样式文件可修改，替换/AliceStyle/static/img/cur/目录下对应的文件即可'));
        
        return $result;
	}
	
	// 主题美化
	static function PrettifyStyle(){
		
		$list = [
			'OpacityTheme'      => '透明样式',
			'BoxTheme'          => '盒子模型',
            'HeadImg'           => '头像旋转',
            'ColourIco'         => '彩色图标',
            'ArticleCard'       => '文章选择卡',
            'ArticleShadowing'  => '文章阴影化',
            'TopLamp'           => '顶部跑马灯',
            'RewardStyle'       => '打赏图片',
            'RewardBeating'     => '打赏跳动',
            'TitleCenter'       => '标题居中',
            'ScrollStyle'       => '滚动条美化',
            'TitleStyle'        => '文章标题美化',
            'ColorTagCloud'     => '彩色标签云',
            'CommentParticle'   => '评论框粒子',
            'TotalVisit'        => '访问总数',
            'ResponseTime'      => '响应耗时',
            'CommentPunchIn'    => '评论打卡',
        ];
        
        $en_list = [
        	'HeadImg',
        	'ColourIco',
        	'ArticleCard',
        	'ArticleShadowing',
        	'RewardBeating',
        	'TitleCenter',
        	'ScrollStyle',
        	'TitleStyle',
        	'ColorTagCloud'
    	];
        
        $result = new Typecho_Widget_Helper_Form_Element_Checkbox('PrettifyStyle', $list, $en_list, '主题美化', 'handsome主题专属功能，只适用handsome主题');
        
        return $result;
	}
	
	// 遮罩特效
	static function Mask(){
		
		$list = [
			0 => '关闭',
        	1 => '雪花',
        	2 => '樱花'
		];
		
		$result = new Typecho_Widget_Helper_Form_Element_Radio('Mask', $list, 0,_t('遮罩特效'), _t('该功能会占用CPU和GPU资源，如果您的用户不是十几年前的机型，影响可以忽略不计'));
		
		return $result;
	}
	
	// 夜间模式
	static function NightMode(){
		
		$list = [
			0 => '关闭',
        	1 => '开启',
        	2 => '自动',
        	3 => '酷炫'
		];
		
		$result = new Typecho_Widget_Helper_Form_Element_Radio('NightMode', $list, 0,_t('夜间模式'), _t('自动模式会在每天23点到次日凌晨5点自动开启！自动开启时间可修改，详细看教程。这里不推荐开启酷炫模式，因为会占用大量的CPU和GPU资源，开启酷炫模式建议不要开启动态背景'));
		
		return $result;
	}
	
	// 后台美化
	static function AliceStyleAdmin(){
		
		$list = [
			0 => '关闭',
        	1 => '开启'
		];
		
		$result = new Typecho_Widget_Helper_Form_Element_Radio('AliceStyleAdmin', $list, 0,_t('后台美化'), _t('如果你没有使用该功能，请一定要按教程注释三行代码，以免后台不兼容等'));
		
		return $result;
	}
	
	// 登录背景
	static function LoginBg(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('LoginBg', NULL, NULL, _t('登录壁纸'), _t('登录背景壁纸地址，请以http://或https://开头'));
		
		return $result;
	}
	
	// 登录框美化
	static function LoginCard(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('LoginCard', NULL, _t('#fff-#727cf5-0.75-7px'), _t('登录框美化'), _t('请分别填写背景颜色、字体颜色、透明度和圆角值，以 - 分割'));
		
		return $result;
	}
	
    // 字体美化
	static function FontStyle(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('FontStyle', NULL, NULL, _t('字体美化'), _t('字体文件地址，以http://或https://开头'));
		
		return $result;
	}
	
	// 动态标题
	static function TitleDynamic(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('TitleDynamic', NULL, NULL, _t('动态标题'), _t('请分别输入离开和归来的标题内容，并以 - 分隔'));
		
		return $result;
	}
	
	// 天气信息
	static function Weather(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('Weather', NULL, _t('9dea1edbf46b6e2d0c52c77858b4db3b'), _t('天气信息'), _t('填写高德API（目前只支持高德API，后面会慢慢增加)'));
		
		return $result;
	}
	
	// 文件加速
	static function SpeedUp(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('SpeedUp', NULL, NULL, _t('云加速'), _t('你需要把ststic目录上传到你的cdn服务器上，比如CDN服务器的 as目录里，地址即为 https://cdn.racns.com/as/static/'));
		
		return $result;
	}
	
	// 文件加速
	static function RandomImg(){
		
		$result = new Typecho_Widget_Helper_Form_Element_Text('RandomImg', NULL, NULL, _t('随机图'), _t('参数：name(必选，名称)、dir(可选，路径)，举例：name=as&dir=usr/api。填写参数后，请点击右下角小飞机激活该功能'));
		
		return $result;
	}
	// END
}