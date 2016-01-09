
function Box (x,y,w,h) {
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	this.speed = 5;
}

Box.prototype = {
	move : function () {
		this.x += this.speed;
		this.y += this.speed;
	}
}