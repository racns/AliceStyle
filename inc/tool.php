<?php
/**
 * 获取客户端浏览器信息 添加win10 edge浏览器判断
 * @param  null
 * @author  萌卜兔
 * @return string
 */
class ClientInfo{
	// 返回系统信息
	public static function GetOS($user_agent=null) {
		$userAgent 	= strtolower($user_agent ? : $_SERVER['HTTP_USER_AGENT']);
		$os = "";
		$os_array = array(
		    		'/windows nt 10.0/i' 	=> 	'Windows 10',
					'/windows nt 6.3/i'     =>  'Windows 8.1',
					'/windows nt 6.2/i'     =>  'Windows 8',
					'/windows nt 6.1/i'     =>  'Windows 7',
					'/windows nt 6.0/i'     =>  'Windows Vista',
					'/windows nt 5.2/i'     =>  'Windows Server 2003/XP x64',
					'/windows nt 5.1/i'     =>  'Windows XP',
					'/windows xp/i'         =>  'Windows XP',
					'/windows nt 5.0/i'     =>  'Windows 2000',
					'/windows me/i'         =>  'Windows ME',
					'/win98/i'              =>  'Windows 98',
					'/win95/i'              =>  'Windows 95',
					'/win16/i'              =>  'Windows 3.11',
					'/macintosh|mac os x/i' =>  'Mac OS X',
					'/mac_powerpc/i'        =>  'Mac OS 9',
					'/linux/i'              =>  'Linux',
					'/ubuntu/i'             =>  'Ubuntu',
					'/iphone/i'             =>  'iPhone',
					'/ipod/i'               =>  'iPod',
					'/ipad/i'               =>  'iPad',
					'/android/i'            =>  'Android',
					'/blackberry/i'         =>  'BlackBerry',
					'/webos/i'              =>  'Mobile'
		     	);
		foreach ($os_array as $regex => $value) {
			if ( preg_match($regex, $userAgent) ) {
				$os = $value;
			}
		}
		return $os;
	}
	
	// 获取用户客户端浏览器信息
	public static function GetUserBrowser() {
		if (empty($_SERVER['HTTP_USER_AGENT'])) {
			return 'error!';
		}
		if ((strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') == false) && (strpos($_SERVER['HTTP_USER_AGENT'], 'Trident') !== FALSE)) {
			return 'Internet Explorer 11.0';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 10.0') != false) {
			return 'Internet Explorer 10.0';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 9.0') != false) {
			return 'Internet Explorer 9.0';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 8.0') != false) {
			return 'Internet Explorer 8.0';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 7.0') != false) {
			return 'Internet Explorer 7.0';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE 6.0') != false) {
			return 'Internet Explorer 6.0';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Edge') != false) {
			return 'Edge';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], '360SE') != false) {
			return '360SE';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'QQBrowser') != false) {
			return 'QQ浏览器';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox') != false) {
			return 'Firefox';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') != false) {
			return 'Chrome';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') != false) {
			return 'Safari';
		}
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') != false) {
			return 'Opera';
		}
		
		//微信浏览器
		if (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessage') != false) {
			return 'MicroMessage';
		}
	}
	
	// 获取用户真实 IP
	public static function GetUserIP() {
		static $realip;
		if (isset($_SERVER)) {
			if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) {
				$realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
			} else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
				$realip = $_SERVER["HTTP_CLIENT_IP"];
			} else {
				$realip = $_SERVER["REMOTE_ADDR"];
			}
		} else {
			if (getenv("HTTP_X_FORWARDED_FOR")) {
				$realip = getenv("HTTP_X_FORWARDED_FOR");
			} else if (getenv("HTTP_CLIENT_IP")) {
				$realip = getenv("HTTP_CLIENT_IP");
			} else {
				$realip = getenv("REMOTE_ADDR");
			}
		}
		return $realip;
	}
	
	// 获得天气信息
	public static function Weather($key) {
		//$key = '你在高德申请的秘钥';
		$Weather = $Weather ? : STATIC::Location($key);
		//调用方法获得 Ip 定位信息;
		$city = $Weather->adcode;
		//获得adcode;
		$WeatherInfo = $WeatherInfo ? : STATIC::WeatherInfo($key, $city);
		//已经获取了天气信息;
		return $WeatherInfo;
	}
	
	// 定位信息
	public static function Location($key) {
		$ip = $ip ? : STATIC::GetUserIP($realip);
		$ch = curl_init("http://restapi.amap.com/v3/ip?key=".$key."&ip=" . $ip);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// 请求的数据不直接发送到浏览器
		$result = curl_exec($ch);
		//执行请求,直接发送到浏览器
		// $city = json_decode($result)->adcode;
		$info = json_decode($result);
		return $info;
	}
	
	// 天气信息
	public static function WeatherInfo($key, $city) {
		$ch = curl_init("http://restapi.amap.com/v3/weather/weatherInfo?key=" . $key ."&city=" . $city ."&extensions=base");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$result = curl_exec($ch);
		$info = json_decode($result)->lives[0];
		return $info;
	}
	
    // 统计字数
    public static function CountBit($string){
        
        header('Content-Type:text/html;charset=utf-8');
        
        $a = $b = $c = $d = $e = $f = 0;
        
        for ($i=0; $i < mb_strlen($string,'utf8'); $i++) {
            
            // 将单个字符存到数组当中
        	$obj = mb_substr($string,$i,1,'utf-8');
        	
        	if(preg_match('/^[a-z]$/', $obj)) {
        	    // 小写字母
        		$count['xx'] = ++$a;
        	} elseif(preg_match('/^[A-Z]$/', $obj)) {
        	    // 大写字母
        		$count['dx'] = ++$b;
        	} elseif(preg_match('/^[0-9]$/', $obj)) {
        	    // 数字
        		$count['sz'] = ++$c;
        	} elseif(preg_match("/^[\x{4e00}-\x{9fa5}]$/u", $obj)) {
        	    // 汉字
        		$count['hz'] = ++$d;
        	}elseif(preg_match("/\s/", $obj)) {
        	    // 空格
        		$count['kg'] = ++$e;
        	} else {
        	    // 特殊字符
        		$count['ts'] = ++$f;
        	}
        	$count['zs'] = $count['ts']+$count['kg']+$count['hz']+$count['sz']+$count['dx']+$count['xx'];
        }
        
        return $count;
    }
    
    // 格式化数字
    public static function FloatNumber($number){
        
        // 数字长度
        $length = strlen($number);
        
        if($length > 12){
            
            // 兆单位
            $str = substr_replace(floor($number * 0.00000000001),'.',-1,0)."兆";
            
        }elseif($length > 8){
            
            // 亿单位
            $str = substr_replace(floor($number * 0.0000001),'.',-1,0)."亿";
            
        }elseif($length >4){ 
            
            // 万单位
            $str = floor($number * 0.001) * 0.1."W";
            
        }else{
            
            return $number;
        }
        
        return $str;
    }
        
    // END
}