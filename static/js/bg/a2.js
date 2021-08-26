document.writeln("<canvas id=\'cvs\' style=\'width:100%;height:100%;position:fixed;top:0;left:0;z-index:-1;background-color:#000;\'></canvas>");


var cvs = document.getElementById("cvs"); 
            var ctx = cvs.getContext("2d");
            var cw = cvs.width = document.body.clientWidth;
            var ch = cvs.height = document.body.clientHeight; 
            //动画绘制对象
            var requestAnimationFrame = window.requestAnimationFrame || window.mozRequestAnimationFrame || window.webkitRequestAnimationFrame || window.msRequestAnimationFrame;
            var codeRainArr = []; //代码雨数组
            var cols = parseInt(cw/14); //代码雨列数
            var step = 16 ;    //步长，每一列内部数字之间的上下间隔
            ctx.font = " 14px microsoft yahei"; //声明字体，个人喜欢微软雅黑
            //创建代码雨
            function createCodeRain() {
                for (var n = 0; n < cols; n++) {
                    var col = []; 
                    //基础位置，为了列与列之间产生错位
                    var basePos = parseInt(Math.random()*300);
                    //随机速度 3~13之间
                    var speed = parseInt(Math.random()*10)+3;
                    //每组的x轴位置随机产生
                    var colx = parseInt(Math.random()*cw)
                    for (var i = 0; i < parseInt(ch/step)/2; i++) {
                        var code = {
                            x : colx, 
                            y : -(step*i)-basePos, 
                            speed : speed, 
                            text : parseInt(Math.random()*10)%2 == 0 ? 0 : 1  //随机生成0或者1
//                          text : ["a","b","c","d","e","f","g","h","o","s","x"][parseInt(Math.random()*11)] //随机生成字母数组中的一个
                        }
                        col.push(code);  
                    }
                    codeRainArr.push(col);
                }
            }
            //代码雨下起来
            function codeRaining(){
                //把画布擦干净
                ctx.clearRect(0,0,cw,ch);
                for (var n = 0; n < codeRainArr.length; n++) {
                    //取出列
                    col = codeRainArr[n];
                    //遍历列，画出该列的代码
                    for (var i = 0; i < col.length; i++) {
                        var code = col[i]; 
                        if(code.y > ch){ 
                            //如果超出下边界则重置到顶部
                            code.y = 0;
                        }else{
                            //匀速降落
                            code.y += code.speed;
                        }
                        //颜色也随机变化
                        ctx.fillStyle = "hsl("+(parseInt(Math.random()*359)+1)+",30%,"+(50-i*2)+"%)"; 
                        //把代码画出来
                        ctx.fillText(code.text,code.x,code.y);
                    }
                }
                requestAnimationFrame(codeRaining);
            }
            //创建代码雨
            createCodeRain();
            //开始下雨吧 GO>>
            requestAnimationFrame(codeRaining);