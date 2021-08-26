<?php

// 加载宝塔API文件
require('./Bt.php');
require('../tool.php');

// 修改成自己的宝塔接口和Api密钥
// $bt = new Bt('https://bgp.racns.com:9000','b6BFJLyDxusFWu48NXhV5MD1J2l36pK8');
// $bt = new Bt('https://zz.inis.cc:9000','v9BHza65dcTgst3mmwXUuGewKTHKoijL');
header('Content-type: application/json');
header('Access-Control-Allow-Origin: *');

$ask = @$_GET['ask'] ? $_GET['ask'] : '';

if(empty($ask)){

    $data = [
        
        'status'    =>      0,
        
        'data'      =>      NULL,
        
        'info'      =>      '是谁动了我的代码',
    ];
    
    exit(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    
}else {
    
    // 接口
    if($ask == 'GetNetWork'){
        
        // 获取实时状态信息(CPU、内存、网络、负载)
        $data = $bt->GetNetWork();
        
    }else if($ask == 'GetSystemTotal'){
        
        // 获取系统基础统计
        $data = $bt->GetSystemTotal();
        
    }else if($ask == 'GetDiskInfo'){
        
        // 获取磁盘分区信息
        $data = $bt->GetDiskInfo();
        
    }else if($ask == 'GetPHPVersion'){
        
        // 获取已安装的 PHP 版本列表
        $data = $bt->GetPHPVersion();
        
    }else if($ask == 'UpdatePanel'){
        
        // 检查面板更新
        $data = $bt->UpdatePanel();
        
    }else if($ask == 'SERVER'){
        
        $data = [
            'php_ver'      =>  PHP_VERSION,
            'soft_ware'    =>  $_SERVER['SERVER_SOFTWARE'],
            'language'     =>  $_SERVER['HTTP_ACCEPT_LANGUAGE'],
            'user_system'  =>  ClientInfo::GetOS(),
            'user_browser' =>  ClientInfo::GetUserBrowser(),
            'user_ip'      =>  ClientInfo::GetUserIP(),
            'req_method'   =>  $_SERVER['REQUEST_METHOD'],
        ];
            
    }else{
        
        $data = [
        
            'status'    =>      0,
            
            'data'      =>      NULL,
            
            'info'      =>      '是谁动了我的代码',
        ];
    }
    
    exit(json_encode($data,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

echo json_encode($data);
