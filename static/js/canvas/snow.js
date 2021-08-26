document.writeln("<canvas id=\'canvas\' style=\'width:100%;height:100%;position:fixed;top:0;left:0;z-index:999999;pointer-events: none;\'></canvas>");

if (! (navigator.userAgent.match(/(iPhone|iPod|Android|ios|iPad)/i))) {
;(function (window, undefined) {
      var canvas = document.getElementById('canvas')
      var ctx = canvas.getContext('2d')
      var canvasW = window.innerWidth
      var canvasH = window.innerHeight
      var particles = []
      var maxParticles = 500

      var random = function (min, max) {
        return Math.random() * (max - min) + min
      }

      window.requestAnimationFrame = (function () {
        var FPS = 60

        return window.requestAnimationFrame  ||
               window.webkitRequestAnimationFrame ||
               window.mozRequestAnimationFrame ||
               window.oRequestAnimationFrame ||
               window.msRequestAnimationFrame ||
               function (callBack) {
                 window.setTimeout(callBack, 1000/FPS)
               }
      })()

      var Particle = function () {
        this.x = Math.random() * canvasW
        this.y = Math.random() * canvasH
        this.r = random(1, 5)
        this.alpha = random(0.3, 1)
        this.velocity = {
          x: random(-0.35, 0.35),
          y: random(0.75, 1.5)
        }

        this.draw = function () {
          ctx.fillStyle = 'rgba(255, 255, 255, '+this.alpha+')'
          ctx.beginPath()
          ctx.arc(this.x, this.y, this.r, 0, 2 * Math.PI, false)
          ctx.closePath()
          ctx.fill()
        }

        this.moving = function () {
          this.x += this.velocity.x
          this.y += this.velocity.y

          if (this.y > canvasH) {
            this.x = Math.random() * canvasW
            this.y = 0
          }

          this.draw()
        }
      }

      init()

      function init() {
        canvas.width = canvasW
        canvas.height = canvasH

        for (var i = 0; i < maxParticles; i++) {
          particles.push(new Particle())
        }

        animate()
      }

      function animate() {
        ctx.clearRect(0, 0, canvasW, canvasH)
        particles.forEach(function (particle) {
          particle.moving()
        })

        requestAnimationFrame(animate)
      }
    })(window)
}