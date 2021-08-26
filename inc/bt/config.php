<?php
// +----------------------------------------------------------------------
// | 宝塔接口配置文件
// +----------------------------------------------------------------------
$config = [
    # 系统状态相关接口
    'GetSystemTotal' => '/system?action=GetSystemTotal',	   //获取系统基础统计
    'GetDiskInfo' => '/system?action=GetDiskInfo',			     //获取磁盘分区信息
    'GetNetWork' => '/system?action=GetNetWork',			       //获取实时状态信息(CPU、内存、网络、负载)
    'GetTaskCount' => '/ajax?action=GetTaskCount',			     //检查是否有安装任务
    'UpdatePanel' => '/ajax?action=UpdatePanel',			       //检查面板更新
   	# 网站管理相关接口
   	'Websites' => '/data?action=getData&table=sites',		     //获取网站列表
   	'Webtypes' => '/site?action=get_site_types',			       //获取网站分类
   	'GetPHPVersion' => '/site?action=GetPHPVersion',		     //获取已安装的 PHP 版本列表
    'GetSitePHPVersion' => '/site?action=GetSitePHPVersion', //获取指定网站运行的PHP版本
    'SetPHPVersion' => '/site?action=SetPHPVersion',         //修改指定网站的PHP版本
    'SetHasPwd' => '/site?action=SetHasPwd',                 //开启并设置网站密码访问
    'CloseHasPwd' => '/site?action=CloseHasPwd',             //关闭网站密码访问
    'GetDirUserINI' => '/site?action=GetDirUserINI',         //获取网站几项开关（防跨站、日志、密码访问）
   	'WebAddSite' => '/site?action=AddSite',					         //创建网站
   	'WebDeleteSite' => '/site?action=DeleteSite',			       //删除网站
   	'WebSiteStop' => '/site?action=SiteStop',				         //停用网站
   	'WebSiteStart' => '/site?action=SiteStart',				       //启用网站
   	'WebSetEdate' => '/site?action=SetEdate',				         //设置网站有效期
   	'WebSetPs' => '/data?action=setPs&table=sites',			     //修改网站备注
   	'WebBackupList' => '/data?action=getData&table=backup',	 //获取网站备份列表
   	'WebToBackup' => '/site?action=ToBackup',				         //创建网站备份
   	'WebDelBackup' => '/site?action=DelBackup',				       //删除网站备份
   	'WebDoaminList' => '/data?action=getData&table=domain',	 //获取网站域名列表
    'GetDirBinding' => '/site?action=GetDirBinding',         //获取网站域名绑定二级目录信息
    'AddDirBinding' => '/site?action=AddDirBinding',         //添加网站子目录域名
    'DelDirBinding' => '/site?action=DelDirBinding',         //删除网站绑定子目录
    'GetDirRewrite' => '/site?action=GetDirRewrite',         //获取网站子目录伪静态规则
   	'WebAddDomain' => '/site?action=AddDomain',				       //添加网站域名
   	'WebDelDomain' => '/site?action=DelDomain',				       //删除网站域名
    'GetSiteLogs' => '/site?action=GetSiteLogs',             //获取网站日志
    'GetSecurity' => '/site?action=GetSecurity',             //获取网站盗链状态及规则信息
    'SetSecurity' => '/site?action=SetSecurity',             //设置网站盗链状态及规则信息
    'GetSSL' => '/site?action=GetSSL',                       //获取SSL状态及证书详情
    'HttpToHttps' => '/site?action=HttpToHttps',             //强制HTTPS
    'CloseToHttps' => '/site?action=CloseToHttps',           //关闭强制HTTPS
    'SetSSL' => '/site?action=SetSSL',                       //设置SSL证书
    'CloseSSLConf' => '/site?action=CloseSSLConf',           //关闭SSL
    'WebGetIndex' => '/site?action=GetIndex',                //获取网站默认文件
    'WebSetIndex' => '/site?action=SetIndex',                //设置网站默认文件
    'GetLimitNet' => '/site?action=GetLimitNet',             //获取网站流量限制信息
    'SetLimitNet' => '/site?action=SetLimitNet',             //设置网站流量限制信息
    'CloseLimitNet' => '/site?action=CloseLimitNet',         //关闭网站流量限制
    'Get301Status' => '/site?action=Get301Status',           //获取网站301重定向信息
    'Set301Status' => '/site?action=Set301Status',           //设置网站301重定向信息
   	'GetRewriteList' => '/site?action=GetRewriteList',		   //获取可选的预定义伪静态列表
   	'GetFileBody' => '/files?action=GetFileBody',			       //获取指定预定义伪静态规则内容(获取文件内容)
   	'SaveFileBody' => '/files?action=SaveFileBody',			     //保存伪静态规则内容(保存文件内容)
    'GetProxyList' => '/site?action=GetProxyList',           //获取网站反代信息及状态
    'CreateProxy' => '/site?action=CreateProxy',             //添加网站反代信息
    'ModifyProxy' => '/site?action=ModifyProxy',             //修改网站反代信息

    # Ftp管理
    'WebFtpList' => '/data?action=getData&table=ftps',       //获取FTP信息列表
    'SetUserPassword' => '/ftp?action=SetUserPassword',      //修改FTP账号密码
    'SetStatus' => '/ftp?action=SetStatus',                  //启用/禁用FTP

    # Sql管理
    'WebSqlList' => '/data?action=getData&table=databases',  //获取SQL信息列表
    'ResDatabasePass' => '/database?action=ResDatabasePassword',  //修改SQL账号密码
    'SQLToBackup' => '/database?action=ToBackup',            //创建sql备份
    'SQLDelBackup' => '/database?action=DelBackup',          //删除sql备份

    'download' => '/download?filename=',                     //下载备份文件(目前暂停使用)

    # 插件管理
    'deployment' => '/plugin?action=a&name=deployment&s=GetList&type=0',       //宝塔一键部署列表
    'SetupPackage' => '/plugin?action=a&name=deployment&s=SetupPackage',       //部署任务
    
];