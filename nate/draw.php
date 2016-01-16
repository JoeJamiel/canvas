<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Draw Canvas</title>
	<style>
	canvas{
		border: 1px solid black;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<canvas id="draw" width="1000" height="500"></canvas>
<script>
var canvas = document.getElementById('draw');
var ctx = canvas.getContext('2d');
var lines = [];
var shapes = [];
var mousedown;
var currentLine = {};

$('canvas').on('mousedown', function (e) {
	mousedown = true;
	currentLine.startx = e.clientX;
	currentLine.starty = e.clientY;
}).on('mousemove', function (e) {
	if(mousedown){
		currentLine.x = e.clientX;
		currentLine.y = e.clientY;
	}
}).on('mouseup', function (e) {
	var shapeDone;

	mousedown = false;
	currentLine.x = e.clientX;
	currentLine.y = e.clientY;


	for(var i = 0; i < lines.length; i++){
		var l = lines[i].startx - currentLine.x;
		var d = lines[i].starty - currentLine.y;
		var distance = Math.sqrt(l * l + d * d);

		if(distance < 25){
			currentLine.x = lines[i].startx;
			currentLine.y = lines[i].starty;
			shapeDone = true;
		}
	}
	lines.push(currentLine);

	if(shapeDone){
		shapes.push(lines);
		lines = [];
	}
	currentLine = {};
	
});

function draw () {
	ctx.clearRect(0,0,canvas.width, canvas.height);
	ctx.beginPath();
	for(var j = 0; j < shapes.length; j++){
		var shapeLines = shapes[j];
		drawPath(shapeLines);
	}
	drawPath(lines);
	requestAnimationFrame(draw);
}
function drawPath (l) {

	for(var i = 0; i < l.length; i++){
		ctx.moveTo(l[i].startx, l[i].starty);
		ctx.lineTo(l[i].x, l[i].y);
		if(l[i + 1])
			ctx.lineTo(l[i + 1].startx, l[i + 1].starty);
	}

	if(lines[1])
		ctx.lineTo(currentLine.startx, currentLine.starty);
	ctx.moveTo(currentLine.startx, currentLine.starty);
	ctx.lineTo(currentLine.x, currentLine.y);
	ctx.stroke();
}
draw();

</script>
</body>
</html>