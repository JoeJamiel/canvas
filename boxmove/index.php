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

var bullets = {
	


}

$(document).on('keydown',function(e){
	console.log(e.keyCode);

	if(e.keyCode == 37){
		box.x -= box.w/16;
	}
	if(e.keyCode == 38){
		box.y -= box.h/16;
	}
	if(e.keyCode == 39){
		box.x += box.w/16;
	}
	if(e.keyCode == 40){
		box.y += box.h/16;
	}
})

setInterval(function () {
	ctx.clearRect(0,0,canvas.width,canvas.height);
	ctx.fillRect(box.x,box.y,box.w,box.h);
}, 1000/20);


</script>
</body>
</html>