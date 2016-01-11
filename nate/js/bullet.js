function Bullet (x, y, manager) {
	this.x = x;
	this.y = y;
	this.w = 50;
	this.h = 5;
	this.vx = 20;
	this.id = "bullet";

	this.manager = manager;
}

Bullet.prototype = {
	shoot : function (ctx) {
		ctx.fillStyle = "gold";
		ctx.fillRect(this.x, this.y, this.w, this.h);
		this.x += this.vx;
	},
	collision : function (item) {
		// if(item.id.match('bullet'))this.manager.removeBullet(this)
	}
}