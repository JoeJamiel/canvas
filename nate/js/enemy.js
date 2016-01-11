function Enemy (x, y, manager) {
	this.x = x;
	this.y = y;
	this.w = 20;
	this.h = 30;
	this.vx = 5;
	this.id = "enemy";

	this.manager = manager;
}

Enemy.prototype = {
	fly : function (ctx) {
		ctx.fillStyle = "black";
		ctx.fillRect(this.x, this.y, this.w, this.h);
		this.x -= this.vx;
	},
	collision : function (item) {
		if(item.id.match('bullet'))this.manager.destroyEnemy(this, true);
		if(item.id.match('player'))this.manager.endGame();
	}
}