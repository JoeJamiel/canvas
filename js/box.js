
function Box (x,y,w,h, color, vx, vy) {
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	this.vx = (vx < 3 ? 3 : vx) || 5;
	this.vy = (vy > 3 ? 3 : vy) || 5;
	this.color = color || 'black';

}

Box.prototype = {
	move : function () {
		this.x += this.vx;
		this.y += this.vy;
	},
	collision : function (box) {
		var dx = this.x - box.x,
			dy = this.y - box.y;

		this.vx *= Math.sign(dx);
		this.vy *= Math.sign(dy);

	}
}