<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>boxmove</title>
</head>
<style> 
	canvas{
		border: 1px solid black;
	}
	.container{
		margin: auto;
		width: 600px;
	}

</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<body>
	<div class="container"></div>
		<canvas id="play" height="400" width="600"></canvas>
	</div>
<script>
var canvas = document.getElementById('play');
var ctx = canvas.getContext('2d');

var box = {
	h : 50,
	w : 50,
	x : 50,
	y : 50
};

var bullets = [];

function Bullet (x,y) {
	this.x = x;
	this.y = y;
	this.w = 10;
	this.h = 10;
	this.speed = 10;
}

$(document).on('keydown',function(e){
	console.log(e.keyCode);

	if(e.keyCode == 37){
		box.x -= 5;
	}
	if(e.keyCode == 38){
		box.y -= 5;
	}
	if(e.keyCode == 39){
		box.x += 5;
	}
	if(e.keyCode == 40){
		box.y += 5;
	}

	if(e.keyCode == 32){
		bullets.push(new Bullet(box.x, box.y + (box.h / 2)));
	}
})

setInterval(function () {
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.fillRect(box.x,box.y,box.w,box.h);

	for(var i = 0; i < bullets.length; i++){
		var b = bullets[i];
		ctx.fillRect(b.x, b.y, b.w, b.h);
		b.x += b.speed;
	}
}, 1000/20);


</script>
</body>
</html>