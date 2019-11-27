/*
 * 需要在 “后台” → “设置外观” → “开发者设置” → “自定义输出body 尾部的HTML代码” 添加以下代码
 * <!-- canvas背景 -->
 * <script type="text/javascript" src="//域名/usr/extend/canvas.js"></script>
 */

"use strict";
window.bubbly = function(t) {
    var o =t  || 		{
			colorStart: "rgba(255,244,230,1)",
			colorStop: "rgba(255,233,228,1)",
			blur: 1,
			compose: "source-over",
			bubbleFunc: () => `hsla(${Math.random() * 50}, 100%, 50%, .3)`
		},
    e = function() {
        return Math.random()
    },
    r = o.canvas || document.createElement("canvas"),
    n = r.width,
    a = r.height;
    null === r.parentNode && (r.setAttribute("style", "position:fixed;z-index:-1;left:0;top:0;min-width:100vw;min-height:100vh;"), n = r.width = window.innerWidth, a = r.height = window.innerHeight, document.body.appendChild(r));
    var i = r.getContext("2d");
    i.shadowColor = o.shadowColor || "#fff",
    i.shadowBlur = o.blur || 4;
    var l = i.createLinearGradient(0, 0, n, a);
    l.addColorStop(0, o.colorStart || "#2AE"),
    l.addColorStop(1, o.colorStop || "#17B");
    for (var h = o.bubbles || Math.floor(.02 * (n + a)), d = [], c = 0; c < h; c++) d.push({
        f: (o.bubbleFunc ||
        function() {
            return "hsla(0, 0%, 100%, " + .1 * e() + ")"
        }).call(),
        x: e() * n,
        y: e() * a,
        r: 4 + e() * n / 25,
        a: e() * Math.PI * 2,
        v: .1 + .5 * e()
    }); !
    function t() {
        if (null === r.parentNode) return cancelAnimationFrame(t); ! 1 !== o.animate && requestAnimationFrame(t),
        i.globalCompositeOperation = "source-over",
        i.fillStyle = l,
        i.fillRect(0, 0, n, a),
        i.globalCompositeOperation = o.compose || "lighter",
        d.forEach(function(t) {
            i.beginPath(),
            i.arc(t.x, t.y, t.r, 0, 2 * Math.PI),
            i.fillStyle = t.f,
            i.fill(),
            t.x += Math.cos(t.a) * t.v,
            t.y += Math.sin(t.a) * t.v,
            t.x - t.r > n && (t.x = -t.r),
            t.x + t.r < 0 && (t.x = n + t.r),
            t.y - t.r > a && (t.y = -t.r),
            t.y + t.r < 0 && (t.y = a + t.r)
        })
    } ()
};


bubbly();
	let configs = [
		{},
		{
			colorStart: "#111",
			colorStop: "#422",
			bubbleFunc: () => `hsla(0, 100%, 50%, ${Math.random() * 0.25})`
		},
		{
			colorStart: "#4c004c",
			colorStop: "#1a001a",
			bubbleFunc: () => `hsla(${Math.random() * 360}, 100%, 50%, ${Math.random() * 0.25})`
		},
		{
			colorStart: "#fff4e6",
			colorStop: "#ffe9e4",
			blur: 1,
			compose: "source-over",
			bubbleFunc: () => `hsla(${Math.random() * 50}, 100%, 50%, .3)`
		}
	];
	document.addEventListener("click", function (e) {
		if (e.target.hasAttribute("data-config-nr")) {
			document.body.removeChild(document.querySelector("canvas"));
			bubbly(configs[e.target.getAttribute("data-config-nr")]);
		}
	});