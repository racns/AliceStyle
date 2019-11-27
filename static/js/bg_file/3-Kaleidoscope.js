document.writeln("<canvas id=\'b\' style=\'position: fixed;top: 0;left: 0; width: 100%; height: 100% ;z-index: -1;background: #fff;\'></canvas>");
document.writeln("<canvas id=\'c\' style=\'position: fixed;top: 0;left: 0; width: 100%; height: 100% ;z-index: -1;\'></canvas>");


let canvas = document.getElementById("c");
let ctx = canvas.getContext("2d");
let w = canvas.width = window.innerWidth;
let h = canvas.height = window.innerHeight;
const {sin, cos, PI, sqrt} = Math;

const PI2 = PI * 2;
const SCALE = 1;
const radius = x => Math.pow(x, 3);
const NUM = 15;
let t = 1;
let t2 = 0;
let amount = 1;

function loop() {
	ctx.clearRect(0,0,w,h);
	ctx.translate(w/2, h/2);
	
	for(let r = 0; SCALE * radius(r) < (w+h)/2; r++) {
		let rad = SCALE * radius(r+t+t2);
		for(let i = 0; i < NUM; i++) {
			let a = PI2 * (i + t)/NUM;
			let x = rad * cos(a);
			let y = rad * sin(a);
			ctx.beginPath();
			ctx.arc(x, y, 0.2*(r+t+t2)*(r+t+t2), 0, PI2);
			ctx.fill();
		}
		rad = SCALE * radius(r+t+t2+0.5);
		for(let i = 0.5; i < NUM; i++) {
			let a = PI2 * (i - t)/NUM;
			let x = rad * cos(a);
			let y = rad * sin(a);
			ctx.beginPath();
			ctx.arc(x, y, 0.2*(r+t+t2+0.5)*(r+t+t2+0.5), 0, PI2);
			ctx.fill();
		}
	}
	t -= 0.01 * amount;
	if (t <= 0) t += 1;
	ctx.translate(-w/2, -h/2);
	requestAnimationFrame(loop);
}

ctx.fillStyle = "#595";
loop();

function background() {
	let canvas = document.getElementById("b");
	let ctx = canvas.getContext("2d");
	let w = canvas.width = window.innerWidth;
	let h = canvas.height = window.innerHeight;
	
	ctx.fillStyle = "#eee";
	ctx.fillRect(0,0,w,h);
	ctx.strokeStyle = "#8c8";
	
	function loop() {
		ctx.clearRect(0,0,w,h);
		ctx.translate(w/2, h/2);
		for(let i = 0; i < NUM*2; i++) {
			ctx.beginPath();
			ctx.moveTo(0,0);
			for(let r = 0; SCALE * radius(r) < (w+h)/2; r += 0.1) {
				let rad = SCALE * radius(r+t2);
				let a = PI2 * (i + (i<NUM? r: -r))/NUM;
				let x = rad * cos(a);
				let y = rad * sin(a);
				ctx.lineTo(x, y);
			}
			ctx.stroke();
		}
		t2 = (t2 + 0.004*amount) % 1;
		ctx.translate(-w/2, -h/2);
		requestAnimationFrame(loop);
	}
	loop();
}

background();

window.onclick = function(e) {
	amount = amount == 0 ? 1 : 0;
}