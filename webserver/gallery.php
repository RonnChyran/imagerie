<?php
$password = "password";
$files = scandir('uploads');
$filetypes = array(
    'png'  => 'png',
    'jpg' => 'jpg',
    'bmp' => 'bmp',
    'gif' => 'gif',
);
session_start();
if($_POST["key"] == $password){
$_SESSION['login'] = TRUE;
}

if(isset($_GET['logout'])){
session_destroy();
header('Location: http://'.$_SERVER['HTTP_HOST'].'/gallery');
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Gallery - Imagerie</title>
<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">

<!--fancybox js-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<link rel="stylesheet" href="/css/fancybox.css?v=2.1.4" type="text/css" media="screen" />
<script type="text/javascript" src="/css/fancybox.js?v=2.1.4"></script>
<!--/fancybox js-->

<script type="text/javascript">
function focusLogin()
{
     document.getElementById("keyinput").focus();
}
</script>

</head>

<?php
if($_SESSION['login'] == TRUE){
?>

<body>
<header>
<span class="align-right">
Imagerie - Gallery
</span>

<span class="align-left">
<a class="logout" href="?logout">Logout</a>
</span>
</header>

<!--fancybox js-->
<script type="text/javascript">
	$(document).ready(function() {
		$(".fancybox")
		.attr('rel', 'gallery')
		.fancybox({
			'arrows' : false,
			'closeBtn' : false,
			beforeLoad: function() {
				this.title = $(this.element).attr('caption');
			}
		});
});
</script>
<script type="text/javascript">
function deleteFile(filename)
{	
if (confirm('Are you sure you want to delete '+filename+' ?\nThis can only be undone manually')) { 
 window.location.href = 'trash.php?f='+filename;
}
}
</script>
<!--/fancybox js-->

<?php
if ($files !== false) 
{
    foreach($files as $filename) {
    	if ($filename == '..' || $filename == '.') continue;		
		$filetype = pathinfo("uploads/".$filename, PATHINFO_EXTENSION);
		if (!in_array($filetype, $filetypes)) continue;
		?>
        <a class="fancybox" title="<?php echo $filename;?>" caption="<a class='title' href='#' onclick='$.fancybox.prev();'>Previous</a>&nbsp;-&nbsp;<a class='title' target='_blank' href='uploads/<?php echo $filename;?>'><?php echo $filename;?></a>&nbsp;-&nbsp;<a class='title' href='#' onclick='$.fancybox.next();'>Next</a>&nbsp;-&nbsp;<a class='title' href='#' onclick='$.fancybox.close();'>Close</a>&nbsp;-&nbsp;<a class='title' href='#' onclick='deleteFile(&quot;<?php echo $filename;?>&quot;)'>Delete</a>" href="uploads/<?php echo $filename;?>?raw"><img class="base gallery" src="uploads/<?php echo $filename;?>?raw" alt="<?php echo $filename;?>"></a>
	<?php
    }
}
?>
</body>
</html>

<?php
die();
}else{
?>
<body class="display" onload="focusLogin()">
<header>
<span class="align-right">
Imagerie - Gallery
</span>
</header>

<div class="loginwrapper">
<form class="login" name="login" action="#" method="post">
<input type="password" id="keyinput" name="key">
<a class="submit" href="#" onclick="parentNode.submit();">login</a>
</form>
</div>

<?php
}
?>
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