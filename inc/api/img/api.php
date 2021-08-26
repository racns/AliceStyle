<?php
/**
 * 随机图片方法
 * 作者：兔子
 */
 
$TYPE = @$_GET['type'] ? $_GET['type'] : '';
 
function GetPageUrl(){
    
    // 判断是否https
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://": "http://";
    
    //组合url
    $url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    
    return $url;
}


if(!empty($TYPE)){
    
    // 本地模式 - 图片保存在本地
    if($TYPE == "local"){
        
        $img_array = glob('images/*.{gif,jpg,png,jpeg,webp,bmp}', GLOB_BRACE);

        if(count($img_array) == 0) die("没找到图片文件。<br><br>请先上传一些图片到 ".dirname(__FILE__)."/images/目录下<br>使用方式：<span style=\"color:red\"></span><span style=\"color:red\">".GetPageUrl().'</span>');
        
        header('Content-Type: image/png');
        
        echo(file_get_contents($img_array[array_rand($img_array)]));
        
        $img_array = glob('images/*.{gif,jpg,png,jpeg,webp,bmp}', GLOB_BRACE);
    }elseif($TYPE == "link"){
        
        // 存有链接的文件名
        $file = "img.txt";
        
        if(!file_exists($file)){
            
        	die('文件不存在');
        }
        
        // 从文本获取链接
        $pics = [];
        
        $fs = fopen($file, "r");
        
        while (!feof($fs)) {
        
        	$line=trim(fgets($fs));
        	
        	if ($line!='') array_push($pics, $line);
        }
        
        // 从数组随机获取链接
        $pic = $pics[array_rand($pics)];
        
        // 返回指定格式
        $type=$_GET['type'];
        
        switch($type){
        
        // JSON返回
        case 'json':
        
        	header('Content-type:text/json');
        	die(json_encode(['pic'=>$pic]));
        
        default:
        	die(header("Location: $pic"));
        }
    }
    
}else{
    
    $msg = [
	    
	    'msg'       =>      '请选择模式',
	    
	    '模式一'    =>      '?type=local',
	    
	    '模式一'    =>      '?type=link',
	    
	    '用法：'    =>      '在连接后加上?type=local或?type=link'
	    ];
    
    exit(json_encode($msg,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}


