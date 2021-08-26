<?php

// 文件夹地址
$DIR = @$_GET['dir'] ? $_GET['dir'] : '';
// 文件夹名称
$NAME = @$_GET['name'] ? $_GET['name'] : '';

$ROOT = $_SERVER["DOCUMENT_ROOT"];

(substr($ROOT,-1) == '/') ? $ROOT : $ROOT = $ROOT.'/';

// 判断必填参数
if(!empty($NAME)){
    
    // 判断选填参数
    if(empty($DIR)){
        
        // 创建目录
        AS_MKDIR($NAME);
        
        // 复制文件
        AS_FILE($NAME.'/');
        
        echo '激活成功！<br><br>
              本地图片模式：<br>
              1、上传图片到'.$ROOT.'usr/api/'.$NAME.'/images/目录下<br>
              2、<span style=\'color:red\'>随机图地址</span><span style=\'color:red\'><a href='.GetPageUrl().'/usr/api/'.$NAME.'/?type=local>'.GetPageUrl().'/usr/api/'.$NAME.'/?type=local</a></span><br><br>
              外链图片模式：<br>
              1、打开目录下文件'.$ROOT.'usr/api/'.$NAME.'/img.txt<br>
              2、添加或修改img.txt内的外链地址，每行一条外链<br>
              3、<span style=\'color:red\'>随机图地址</span><span style=\'color:red\'><a href='.GetPageUrl().'/usr/api/'.$NAME.'/?type=link>'.GetPageUrl().'/usr/api/'.$NAME.'/?type=link</a></span><br><br>
              <span style="color:#0095ff;">注意：</span><br>
              <span style="color:#0095ff;">为了防止该功能被他人滥用，默认该功能使用一次后失效，</span><br>
              <span style="color:#0095ff;">也就是说，随机图的功能生成，生成一次后就不再生成文件了，防止刷目录和文件。</span><br>
              <span style="color:#0095ff;">但是如果您想继续二次或多次使用该功能生成多个随机图功能，</span><br>
              <span style="color:#0095ff;">可以把/AliceStyle/inc/api/img/index.php文件的权限改为755即可</span><br>
              ';
              
        // 修改权限 - 防止滥用
        AS_CHMOD();
        
    }else{
        
        // 创建目录
        AS_MKDIR($NAME,$DIR.'/');
        
        // 复制文件
        AS_FILE($NAME.'/',$DIR.'/');
        
        echo '激活成功！<br><br>
              本地图片模式：<br>
              1、上传图片到'.$ROOT.'usr/api/'.$NAME.'/images/目录下<br>
              2、<span style=\'color:red\'>随机图地址</span><span style=\'color:red\'><a href='.GetPageUrl().'/usr/api/'.$NAME.'/?type=local>'.GetPageUrl().'/usr/api/'.$NAME.'/?type=local</a></span><br><br>
              外链图片模式：<br>
              1、打开目录下文件'.$ROOT.'usr/api/'.$NAME.'/img.txt<br>
              2、添加或修改img.txt内的外链地址，每行一条外链<br>
              3、<span style=\'color:red\'>随机图地址</span><span style=\'color:red\'><a href='.GetPageUrl().'/usr/api/'.$NAME.'/?type=link>'.GetPageUrl().'/usr/api/'.$NAME.'/?type=link</a></span><br><br>
              <span style="color:#0095ff;">注意：</span><br>
              <span style="color:#0095ff;">为了防止该功能被他人滥用，默认该功能使用一次后失效，</span><br>
              <span style="color:#0095ff;">也就是说，随机图的功能生成，生成一次后就不再生成文件了，防止刷目录和文件。</span><br>
              <span style="color:#0095ff;">但是如果您想继续二次或多次使用该功能生成多个随机图功能，</span><br>
              <span style="color:#0095ff;">可以把/AliceStyle/inc/api/img/index.php文件的权限改为755即可</span><br>
              ';
              
        // 修改权限 - 防止滥用
        AS_CHMOD();
    }
}

// 创建目录
function AS_MKDIR($NAME, $DIR='usr/api/'){
    
    $ROOT = $_SERVER["DOCUMENT_ROOT"];

    (substr($ROOT,-1) == '/') ? $ROOT : $ROOT = $ROOT.'/';
    
    $mkdir = iconv("UTF-8", "GBK",$NAME);
    
    $mkdir = $ROOT.$DIR.$mkdir;
    
    if(!file_exists($mkdir)){
        
        mkdir ($mkdir,0755,true);
        mkdir ($mkdir.'/images',0755,true);
    }
}

// 复制文件
function AS_FILE($NAME, $DIR='usr/api/'){
    
    $ROOT = $_SERVER["DOCUMENT_ROOT"];

    (substr($ROOT,-1) == '/') ? $ROOT : $ROOT = $ROOT.'/';
    
    if(!file_exists('api.php')) return false;
    
    copy('img.txt', $ROOT.$DIR.$NAME.'img.txt');
     
    copy('api.php', $ROOT.$DIR.$NAME.'index.php');
}

// 修改权限
function AS_CHMOD(){
    
    $file = 'index.php';

    if (file_exists($file)) {
        
        // 文件存在
        chmod($file,0000);
    
    } else {
    
        exit("文件不存在");
    }
}

// 获取路径
function GetPageUrl(){
    
    // 判断是否https
    $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://": "http://";
    
    // 组合url
    $url = $protocol . $_SERVER['HTTP_HOST'];
    return $url;
}







