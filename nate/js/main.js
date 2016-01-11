var canvas = document.getElementById('game');
var ctx = canvas.getContext('2d');


function Game () {
	this.items = [];
}

Game.prototype = {
	init : function () {
		this.addEnemy = setInterval(function () {
			enemyManager.addEnemy(canvas);
		}, 300);

		this.items.push(p);
	},
	create : function (x,y,w,h, color, vx, vy) {
		var box = new Box(x,y,w,h, color, vx, vy);
		this.items.push(box);	
	},
	draw : function () {
		ctx.clearRect(0,0,canvas.width, canvas.height);

		for (var i = this.items.length - 1; i >= 0; i--) {
			var b = this.items[i];

			for(var j = 0; j < this.items.length; j++)
				if(this.items[j] !== b)this.collision(b, this.items[j]);

		};
		p.update(canvas);
		p.draw(ctx, canvas);
		enemyManager.draw(ctx);

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
	},
	endGame : function () {
		this.items = [];
		clearTimeout(this.addEnemy);
		$('.end-game').css('visibility', 'visible');
	}
}

$('.end-game').on('click', function () {
	game.init();
	$(this).css('visibility', 'hidden');
})


var game = new Game();
game.init();
game.draw();
p.init(game);
enemyManager.init(game);

