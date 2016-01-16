var canvas = document.getElementById('game');
var ctx = canvas.getContext('2d');

function Box (x,y,w,h) {
	this.x = x;
	this.y = y;
	this.w = w;
	this.h = h;
	this.speed = 5;
}

function Game () {
	this.items = [];
}

Game.prototype= {
	box : function  (x,y,w,h) {
		this.items.push({x : x, y : y, w : w, h : h, vx : 1});
	}
}