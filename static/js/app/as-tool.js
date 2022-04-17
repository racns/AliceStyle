
// 获取URL GET参数
function GetQueryString(name){
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
    var r = window.location.search.substr(1).match(reg);
    if(r!=null)return  unescape(r[2]); return null;
}

// 获取当前页面名称
function strPage(){
    
    var strUrl = window.location.href;
    var arrUrl = strUrl.split("/");
    var strPage = arrUrl[arrUrl.length - 1];
    
    if (strPage.indexOf("?") > -1) {
        var pageName = strPage.split("?");
        strPage = pageName[0];
    }
    
    return strPage;
}

// 根据屏幕分辨率
function IsPhone(){
	mobile_flag = false;
	var screen_width = window.screen.width;
	var screen_height = window.screen.height;
	if(screen_width < 500 && screen_height < 820){
		mobile_flag = true;
	}
	return mobile_flag;
}

// 根据操作系统
function IsMobile() {
    var isMobile = {
        Android: function () {
             return navigator.userAgent.match(/Android/i) ? true : false;
        },
        BlackBerry: function () {
             return navigator.userAgent.match(/BlackBerry/i) ? true : false;
        },
        iOS: function () {
             return navigator.userAgent.match(/iPhone|iPad|iPod/i) ? true : false;
        },
        Windows: function () {
             return navigator.userAgent.match(/IEMobile/i) ? true : false;
        },
        any: function () {
             return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Windows());
        }
     };
     // 是移动设备
     return isMobile.any(); 
}

// 将时间戳转换为人性化时间
function AS_Time(timestamp) {
    function zeroize(num) {
        return (String(num).length == 1 ? '0': '') + num;
    }
    // 当前时间戳
    let curTimestamp = parseInt(new Date().getTime() / 1000);
    // 参数时间戳与当前时间戳相差秒数
    let timestampDiff = curTimestamp - timestamp;
    // 当前时间日期对象
    let curDate = new Date(curTimestamp * 1000); 
    // 参数时间戳转换成的日期对象
    let tmDate = new Date(timestamp * 1000); 
    let Y = tmDate.getFullYear(),
    m = tmDate.getMonth() + 1,
    d = tmDate.getDate();
    let H = tmDate.getHours(),
    i = tmDate.getMinutes(),
    s = tmDate.getSeconds();

    if (timestampDiff < 60) {
        // 一分钟以内
        return "刚刚";
    } else if (timestampDiff < 3600) { 
        // 一小时前之内
        return Math.floor(timestampDiff / 60) + "分钟前";
    } else if (curDate.getFullYear() == Y && curDate.getMonth() + 1 == m && curDate.getDate() == d) {
        return '今天' + zeroize(H) + ':' + zeroize(i);
    } else {
        let newDate = new Date((curTimestamp - 86400) * 1000); 
        // 参数中的时间戳加一天转换成的日期对象
        if (newDate.getFullYear() == Y && newDate.getMonth() + 1 == m && newDate.getDate() == d) {
            return '昨天' + zeroize(H) + ':' + zeroize(i);
        } else if (curDate.getFullYear() == Y) {
            return zeroize(m) + '月' + zeroize(d) + '日 ' + zeroize(H) + ':' + zeroize(i);
        } else {
            return Y + '年' + zeroize(m) + '月' + zeroize(d) + '日 ' + zeroize(H) + ':' + zeroize(i);
        }
    }
}

// 响应耗时
function AS_ResTime(){
    
    let ResTime = window.performance;
    
    function RAM(size) {
        
        return Math.floor(size / 1024 / 1024, 4) + 'MB';
    };
    
    function consume(time) {
        return time + 'ms';
    };
    
    let data = {
        'ram':RAM(ResTime.memory.usedJSHeapSize),
        'tcp':consume(ResTime.timing.connectEnd - ResTime.timing.connectStart),
        'res':consume(ResTime.timing.responseEnd - ResTime.timing.responseStart),
    };
    
    // window.onload = function() {
    //     console.log("dom渲染耗时：" + consume(ResTime.timing.domComplete - ResTime.timing.domLoading));
    // };
    
    return data;
}

// 设置cookie
function SetCookie(name, value) {
    if (value) {
        var Days = 365;
        var exp = new Date();
        exp.setTime(exp.getTime() + Days * 24 * 60 * 60 * 1000);
        document.cookie = name + '=' + escape(value) + ';expires=' + exp.toGMTString();
    }
}

// 获取cookie
function GetCookie(name) {
    if (document.cookie.length > 0) {
        var begin = document.cookie.indexOf(name + '=');
        if (begin !== -1) {
            // cookie值的初始位置
            begin += name.length + 1;
            // 结束位置
            var end = document.cookie.indexOf(';', begin); 
            if (end === -1) {
                // 没有;则end为字符串结束位置
                end = document.cookie.length; 
            }
            return unescape(document.cookie.substring(begin, end));
        }
    }
    return null
    // cookie不存在返回null
}

// 清除某个cookie
function DelCookie(name) {
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval = SetCookie(name);
    if (cval && cval != null) {
        document.cookie = name + '=' + cval + ';expires=' + exp.toGMTString();
    }
}

// 清除所有cookie
function ClearCookie() {
    var keys = document.cookie.match(/[^ =;]+(?=\=)/g);
    if (keys) {
        for (var i = keys.length; i--;) {
            document.cookie = keys[i] + '=0;expires=' + new Date(0).toUTCString();
        }
    }
}
