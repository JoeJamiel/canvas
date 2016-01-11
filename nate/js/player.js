function Player () {
	this.x = 400;
	this.y = 100;
	this.speed = 7;
	this.shootWaitTime = 0.5;
	this.w = 60;
	this.h = 25;
	this.id = "player";

	this.bullets = [];
}

Player.prototype = {
	init : function (game) {
		this.game = game;

		$(document).on('keyup', this.keyUp.bind(this))
		.on('keydown', this.keyDown.bind(this))
		.on('mousedown', this.mouseDown.bind(this));
	},
	keys : function (code) {
		var obj = {
			87 : 'up',
			65 : 'left',
			83 : 'down',
			68 : 'right',
			32 : 'shooting'
		}
		return obj[code];
	},
	keyDown : function (e) {
		this[this.keys(e.keyCode)] = true;
	},
	keyUp : function (e) {
		this[this.keys(e.keyCode)] = false;
	},
	mouseDown : function () {
		this.shooting = true;	
	},
	update : function (canvas) {
		if(this.left && this.x >= 0)
			this.x -= this.speed;
		if(this.up && this.y - 10 >= 0)
			this.y -= this.speed;
		if(this.right && this.x + 60 <= canvas.width)
			this.x += this.speed;
		if(this.down && this.y + 35 <= canvas.height)
			this.y += this.speed;

		if(this.shooting)this.shoot();

		

	},
	shoot : function  () {
		var bullet = new Bullet(this.x + 60, this.y + 10);
		this.bullets.push(bullet);
		this.game.items.push(bullet);
		this.shooting = false;
	},
	draw : function (ctx) {
		ctx.beginPath();
		ctx.moveTo(this.x, this.y);
		ctx.lineTo(this.x + 20, this.y- 5);
		ctx.lineTo(this.x + 40, this.y);
		ctx.lineTo(this.x + 60, this.y + 2);
		ctx.lineTo(this.x + 40, this.y + 7);
		ctx.lineTo(this.x + 40, this.y + 15);
		ctx.lineTo(this.x + 60, this.y + 20);
		ctx.lineTo(this.x + 40, this.y + 22);
		ctx.lineTo(this.x + 20, this.y + 30);
		ctx.lineTo(this.x, this.y + 25);
		ctx.lineTo(this.x, this.y);
		// Create gradient
	      var grd = ctx.createLinearGradient(0.000, 150.000, 300.000, 150.000);
	      
	      // Add colors
	      grd.addColorStop(0.000, 'rgba(124, 7, 7, 1.000)');
	      grd.addColorStop(1.000, 'rgba(216, 85, 62, 1.000)');
	      
	      // Fill with gradient
	      ctx.fillStyle = grd;
	      ctx.fill();
	      ctx.strokeStyle = '#D85C04';
		ctx.stroke();

		for(var i = 0; i < this.bullets.length; i++){
			this.bullets[i].shoot(ctx);

			if(this.bullets[i].x >= canvas.width)
				this.needsRemoved = this.bullets[i];
		}
		if(this.needsRemoved){
			this.bullets.splice(this.bullets.indexOf(this.needsRemoved), 1);
			this.game.items.splice(this.game.items.indexOf(this.needsRemoved), 1);
			this.needsRemoved = false;
		}

	},
	collision : function (item) {
		console.log(item.id);
	}
}

var p = new Player();
