var canvas = document.getElementById('game');
var ctx = canvas.getContext('2d');


function Game () {
	this.items = [];
}

Game.prototype = {
	create : function (x,y,w,h, color, vx, vy) {
		var box = new Box(x,y,w,h, color, vx, vy);
		this.items.push(box);	
	},
	draw : function () {
		ctx.clearRect(0,0,canvas.width, canvas.height);

		for (var i = this.items.length - 1; i >= 0; i--) {
			var b = this.items[i];

			// Collision Detection

			// Boundaries
			if(b.x < 0 || b.x + b.w > canvas.width)
				b.vx *= -1;
			if(b.y < 0 || b.y + b.w > canvas.height)
				b.vy *= -1;

			b.move();

			for(var j = 0; j < this.items.length; j++)
				if(this.items[j] !== b)this.collision(b, this.items[j]);

		


			ctx.fillStyle = b.color;
			ctx.fillRect(b.x, b.y, b.w, b.h);
		};

		requestAnimationFrame(this.draw.bind(this));
	},
	collision : function (b1, b2) {
		if (
			b1.x < b2.x + b2.w && 
			b1.x + b1.w  > b2.x &&
			b1.y < b2.y + b2.h && 
			b1.y + b1.h > b2.y) {

			b1.collision(b2);
			b2.collision(b1);
		}
	}
}


var game = new Game();

game.create(10, 10, 100, 100, 'black',5,5);
game.create(410, 70, 100, 100, 'red',5,5);
game.draw();
