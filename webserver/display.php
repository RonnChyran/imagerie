<?php
if (!isset($_GET["img"])){
header('Location: http://images.punyman.com/uploads/404.png'); 
}
 
if (!file_exists("uploads/".$_GET["img"])){
header('Location: http://images.punyman.com/uploads/404.png'); 
}

$imgtype = pathinfo("uploads/".$_GET["img"], PATHINFO_EXTENSION);
if (isset($_GET["w"])){
$width = '&w='.$_GET["w"];
}

if (isset($_GET["h"])){
$height = '&h='.$_GET["h"];
}
if (isset($_GET["raw"])){
	if (isset($width) OR isset($height)){
		$image = file_get_contents("/thumb.php?src=uploads/".$_GET["img"].$width.$height."&q=90");
		
	}else{
		$image = file_get_contents("uploads/".$_GET["img"]); 
}
	header('content-type: image/'.$imgtype); 
	echo $image; 
	die();
}


?>

<!DOCTYPE HTML>
<html xmlns:og="http://ogp.me/ns#">
<head>
<meta charset="UTF-8">
<title><?php echo $_GET["img"];?> - Imagerie</title>
<meta name="description" content="<?php echo $_GET["img"]; ?> - Images Powered by Gyazo">

<!--Facebook Opengraph Tags-->
<meta property="og:title" content="<?php echo $_GET["img"]; ?>"/>
<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>/uploads/<?php echo $_GET["img"];?>"/>
<meta property="og:image" content="http://<?php echo $_SERVER['HTTP_HOST']; ?>/uploads/<?php echo $_GET["img"];?>?raw&amp;w=200"/>
<meta property="og:image:type" content="image/<?php echo $imgtype;?>" />
<meta property="og:type" content="website" />
<meta property="og:description" content="<?php echo $_GET["img"]; ?> - Imagerie Powered by Gyazo">
<meta property="og:site_name" content="Imagerie"/>
<!--/Facebook Opengraph Tags-->


<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:300' rel='stylesheet' type='text/css'>
<link href="/css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="display">
<header>
<span class="align-right">
Imagerie - <?php echo $_GET["img"]; ?>
</span>
</header>

<img class="base display" src="/uploads/<?php echo $_GET["img"];?>?raw<?php echo $width.$height;?>" alt="<?php echo $_GET["img"];?>"/>

<footer>
<span class="align-left">
Created by <a href="http://github.com/ron975/">Ronny Chan</a>
</span>

<span class="align-right">
Powered by <a href="http://gyazo.com/">Gyazo</a>
</span>

</footer>
</body>

</html>