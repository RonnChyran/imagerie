<?php
$filetypes = array(
    'png'  => 'png',
    'jpg' => 'jpg',
    'bmp' => 'bmp',
    'gif' => 'gif',
);

session_start();
if($_SESSION['login'] == TRUE && isset($_GET['f'])){
$filename = $_GET['f'];
$filetype = pathinfo("uploads/".$filename, PATHINFO_EXTENSION);

if (in_array($filetype, $filetypes) && file_exists('uploads/'.$filename) && $filename != '404.png'){
rename('uploads/'.$filename,'dump/'.$filename);
}
}
header('Location: http://'.$_SERVER['HTTP_HOST'].'/gallery')
?>