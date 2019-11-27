document.writeln("<canvas id=\'mom\' style=\'width:100%;height:100%;position:fixed;top:0;left:0;z-index:-1;background-color:#000;\'></canvas>");

//获取屏幕可视区域大小
  var d = document.documentElement;
  var clinetW = d.clientWidth;
  var clinetH = d.clientHeight;

  //设置画布大小
  var canvas = document.querySelector('#mom');
  canvas.width = clinetW;
  canvas.height = clinetH;

  var cxt = canvas.getContext('2d');
  var rainStr = 'The matrix of hackers';
  var arr = rainStr.split('');

  var fontSize = 14;
  // 计算行数
  var cols = Math.floor(clinetW / fontSize);
  // 初始化Y轴坐标
  var down = [];
  for (var i = 0; i < cols; i++) {
    down.push(Math.floor(Math.random() * -100));
  }

  function drawRain() {
    // 填充背景(ps:背景采用rgba,可尝试不同透明度的效果)
    cxt.fillStyle = 'rgba(0,0,0,.1)';
    cxt.fillRect(0, 0, clinetW, clinetH);

    // 设置字体颜色
    cxt.fillStyle = '#00ff00';
    for (var i = 0; i < down.length; i++) {
      var randomNum = Math.random();
      // 绘制文字
      cxt.fillText(arr[Math.floor(randomNum * arr.length)], i * fontSize, down[i] * fontSize);

      if (down[i] * fontSize > clinetH && randomNum > 0.9) {
        down[i] = 0;
      }
      //绘制文字的下一个位置
      down[i]++;
    }
  }

  setInterval(drawRain, 30);
  
  
  /**
   * [rain description]
   * @param  {[Element]} canvas canvas元素对象
   * @param  {[String]} text    掉落的字符串
   * @param  {[String]} symbol  分隔符
   * @param  {[Number]} speed   掉落速度
   * @return {[type]}        [description]
   */
  function rain(canvas, text, symbol, speed) {
    //获取屏幕可视区域大小
    var d = document.documentElement;
    var clinetW = d.clientWidth;
    var clinetH = d.clientHeight;

    //设置画布大小
    var canvas = canvas || document.querySelector('#mom');
    canvas.width = clinetW;
    canvas.height = clinetH;

    var cxt = canvas.getContext('2d');
    var rainStr = text || 'The matrix of hackers';
    var symbol = symbol || '';
    var arr = rainStr.split(symbol);

    var fontSize = 14;
    // 计算行数
    var cols = Math.floor(clinetW / fontSize);
    // 初始化Y轴坐标
    var down = [];
    for (var i = 0; i < cols; i++) {
      down.push(Math.floor(Math.random() * -100));
    }

    function drawRain() {
      // 填充背景(ps:背景采用rgba,可尝试不同透明度的效果)
      cxt.fillStyle = 'rgba(0,0,0,.1)';
      cxt.fillRect(0, 0, clinetW, clinetH);

      // 设置字体颜色
      cxt.fillStyle = '#00ff00';
      for (var i = 0; i < down.length; i++) {
        var randomNum = Math.random();
        // 绘制文字
        cxt.fillText(arr[Math.floor(randomNum * arr.length)], i * fontSize, down[i] * fontSize);

        if (down[i] * fontSize > clinetH && randomNum > 0.9) {
          down[i] = 0;
        }

        down[i]++;
      }
    }
    var speed = speed || 30;
    setInterval(drawRain, speed);
  }
  var canvas = document.querySelector('#mom');
  var text = '富强 民主 文明 和谐 自由 平等 公正 法治 爱国 敬业 诚信 友善';
  rain(canvas, text, '', 30);