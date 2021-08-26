document.writeln("<canvas id=\'bg_canvas\' style=\'top: 0;left: 0;position: fixed;width: 100%;height: 100%;z-index: -1;display: block; background: rgb(56, 163, 179);\'></canvas> ");

var can = document.getElementById("bg_canvas");
		//设置2d绘图环境
		var ctx = can.getContext("2d");

		//获取浏览器窗口的宽高
		var w = can.width = window.innerWidth,
			h = can.height = window.innerHeight;
		//自适应浏览器窗口
		window.onresize = function () {
			w = can.width = window.innerWidth,
			h = can.height = window.innerHeight;
		}
		//         ctx.fillStyle="yellow"
		//       ctx.fillRect(100,100,100,100);
		//       //  绘制圆形
		//    ctx.arc(250,250,50,0,Math.PI*2,false);
		//    ctx.strokeStyle="yellow";
		//    ctx.stroke();
		// //运动
		// var y=0;
		// setInterval(function(){
		// y++;
		// ctx.clearRect(0,0,w,h);
		// ctx.fillRect(100,y,100,100);
		// },30);
		function Drop() {}; //创建雨滴类
		Drop.prototype = {
			init: function () {
				this.x = rand(0, w); //雨滴的初始化坐标
				this.y = 0; //雨滴y轴方向的坐标
				this.vy = rand(8, 9); //雨滴下落的速度
				this.l = rand(h * 0.8, h * 0.9); //雨滴下落的高度
				this.r = 1;
				this.vr = 1; //半径增加的速度
				this.a = 1;
				this.va = 0.98; //透明度的变化系数
			},
			draw: function () //绘制雨滴
			{
				if (this.y > this.l) {
					//绘制圆形
					ctx.beginPath(); //开始路径
					ctx.arc(this.x, this.y, this.r, 0, Math.PI * 2, false);
					ctx.strokeStyle = "rgba(255,255,255," + this.a + ")";
					ctx.stroke();

				} else {
					//绘制下落的雨滴
					ctx.fillStyle = "rgb(255,255,255)";
					ctx.fillRect(this.x, this.y, 2, 10);
				}
				this.update();
			},
			update: function () //更新坐标
			{
				if (this.y < this.l) {
					this.y += this.vy;
				} else {
					if (this.a > 0.03) {
						this.r += this.vr;
						if (this.r > 50) {
							this.a *= this.va;
						}
					} else {
						//重新初始化了
						this.init();
					}
				}
			}
		}
		//实例化一个雨滴对象
		var drops = []; //默认值为undefined
		//console.log(drops)
		for (var i = 0; i < 30; i++) {
			setTimeout(function () {
				var drop = new Drop();
				drop.init();
				drops.push(drop);
			}, i * 200)
		}
		//实例初始化
		setInterval(function () {
			//绘制一个透明层
			ctx.id = "rainbow";
			ctx.fillStyle = "rgba(129, 135, 255, 0.44)";
			ctx.fillRect(0, 0, w, h);
			for (var i = 0; i < drops.length; i++) {
				drops[i].draw();
			}
		}, 30);

		function rand(min, max) {
			return Math.random() * (max - min) + min;
		}