function EnemyManager () {
	this.enemies = [];

	this.points = 0;
}

EnemyManager.prototype = {
	init : function (game) {
		this.game = game;
	},
	addEnemy : function (canvas) {
		var y = Math.random() * canvas.height;
		if(y < 0) y = 0;
		if(y > canvas.height - 30)y = canvas.height - 30;
		var e = new Enemy(canvas.width, y, this);
		this.enemies.push(e);
		this.game.items.push(e);
	},
	draw : function (ctx) {
		for(var i = 0; i < this.enemies.length; i++){
			var e = this.enemies[i];
			e.fly(ctx);

			if(e.x + e.w <= 0){
				this.removeEnemy = e;
			}
		}

		if(this.removeEnemy){
			this.destroyEnemy(this.removeEnemy);
			this.removeEnemy = false;
		}

		ctx.font = "15px Arial";
		ctx.fillText(this.points,10,20);
	},
	destroyEnemy : function (enemy, addPoints) {
		this.enemies.splice(this.enemies.indexOf(enemy), 1);
		this.game.items.splice(this.game.items.indexOf(enemy), 1);

		if(addPoints)
			this.points += 5;
	},
	endGame : function () {
		this.enemies = [];
		this.game.endGame();
		this.points = 0;
	}
}

var enemyManager = new EnemyManager();