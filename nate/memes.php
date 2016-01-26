<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Memes</title>
	<style>
	canvas{
		border:1px solid black;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>
<body>
<img id="meme" src="img/78279.png" alt="">
<canvas id="img" width="1000" height="500"></canvas>
<script>
var canvas = document.getElementById('img');
var ctx = canvas.getContext('2d');
var img = document.getElementById('meme');
var arr1 = [35,85],
	arr2 = [120, 145],
	arr3 = [150, 200],
	arr4 = [200, 255];

	// rgb(212,255,255)


img.onload = function () {
	ctx.drawImage(img, 0,0);
	var data = ctx.getImageData(0, this.height - 50, this.width, this.height);
	var originalData = ctx.getImageData(0,0,this.height, this.width);
	var started;
	for(var i = 0; i < data.data.length; i += 4){
		var d = data.data;
		if(inArray(d[i], arr1) && inArray(d[i + 1], arr2) && inArray(d[i + 2], arr3)){
			started = true;
			d[i] = 0;
			d[i + 1] = 0;
			d[i + 2] = 0;
		}

		if(started){
			d[i] = 0;
			d[i + 1] = 0;
			d[i + 2] = 0;
		}			

	}

	ctx.putImageData(originalData, this.width + 10, 0);
	ctx.putImageData(data, this.width + 10, this.height - 50);
}

function inArray (num, arr) {
	if(num >= arr[0] && num <= arr[1])return true;
}
$.ajax({
	url : 'https://api.imgflip.com/get_memes',
	success : function (data) {
		console.log(data);
	}
})
</script>
</body>
</html>