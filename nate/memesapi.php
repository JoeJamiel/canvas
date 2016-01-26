<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Memes API</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<style>

#share-buttons img {
width: 35px;
padding: 5px;
border: 0;
box-shadow: 0;
display: inline;
}
 </style>
</head>
<body>
<?php
if(isset($_GET['img'])){
	echo "<img src='$_GET[img]'>";
}
?>
	<!-- I got these buttons from simplesharebuttons.com -->
<div id="share-buttons">
    
    <!-- Buffer -->
    <!-- <a href="https://bufferapp.com/add?url=https://simplesharebuttons.com&amp;text=Simple Share Buttons" target="_blank"> -->
        <!-- <img src="https://simplesharebuttons.com/images/somacro/buffer.png" alt="Buffer" /> -->
    <!-- </a> -->
    
    <!-- Digg -->
    <!-- <a href="http://www.digg.com/submit?url=https://simplesharebuttons.com" target="_blank"> -->
        <!-- <img src="https://simplesharebuttons.com/images/somacro/diggit.png" alt="Digg" /> -->
    <!-- </a> -->
    
    <!-- Email -->
    <!-- <a href="mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://simplesharebuttons.com">
        <img src="https://simplesharebuttons.com/images/somacro/email.png" alt="Email" />
    </a>
  -->
    <!-- Facebook -->
    <a href="http://www.facebook.com/sharer.php?u=<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];?>" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
    </a>
    
    <!-- Google+ -->
    <!-- <a href="https://plus.google.com/share?url=https://simplesharebuttons.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/google.png" alt="Google" />
    </a>
     -->
    <!-- LinkedIn -->
   <!--  <a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=https://simplesharebuttons.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/linkedin.png" alt="LinkedIn" />
    </a>
     -->
    <!-- Pinterest -->
   <!--  <a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
        <img src="https://simplesharebuttons.com/images/somacro/pinterest.png" alt="Pinterest" />
    </a> -->
    
    <!-- Print -->
   <!--  <a href="javascript:;" onclick="window.print()">
        <img src="https://simplesharebuttons.com/images/somacro/print.png" alt="Print" />
    </a> -->
    
    <!-- Reddit -->
    <!-- <a href="http://reddit.com/submit?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/reddit.png" alt="Reddit" />
    </a> -->
    
    <!-- StumbleUpon-->
    <!-- <a href="http://www.stumbleupon.com/submit?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/stumbleupon.png" alt="StumbleUpon" />
    </a> -->
    
    <!-- Tumblr-->
    <!-- <a href="http://www.tumblr.com/share/link?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/tumblr.png" alt="Tumblr" />
    </a> -->
     
    <!-- Twitter -->
   <!--  <a href="https://twitter.com/share?url=https://simplesharebuttons.com&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
    </a> -->
    
    <!-- VK -->
    <!-- <a href="http://vkontakte.ru/share.php?url=https://simplesharebuttons.com" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/vk.png" alt="VK" />
    </a> -->
    
    <!-- Yummly -->
    <!-- <a href="http://www.yummly.com/urb/verify?url=https://simplesharebuttons.com&amp;title=Simple Share Buttons" target="_blank">
        <img src="https://simplesharebuttons.com/images/somacro/yummly.png" alt="Yummly" />
    </a> -->

</div>
<?php
if(!isset($_GET['img'])):
	?>
	<script>
	$.ajax({
		url : 'https://api.imgflip.com/get_memes',
		success : function (data) {
			console.log(data);
			var memes = data.data.memes;
			for(var i = 0; i < memes.length; i++)
				CreateImage(memes[i].url, memes[i].name);
		}
	});

	function CreateImage (url, title) {
		$('<div>', {class : 'meme'}).append($('<div>', {class : 'title', text : title}), $('<a href="?img='+url+'"><img src="'+url+'"></a>'))
		.appendTo('body');
	}
	</script>
	<?php
	endif;
	?>
</body>
</html>