var canvas = document.getElementById('game');
var ctx = canvas.getContext('2d');


function Game () {
	this.items = [];
}

Game.prototype = {
	draw : function () {
		for (var i = this.items.length - 1; i >= 0; i--) {
			var b = this.items[i];
			ctx.fillRect(b.x, b.y, b.w, b.h);
		};
	}
}