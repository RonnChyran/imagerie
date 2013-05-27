<?php
if(isset($_FILES['imagedata']['tmp_name']))
{
// Directory related to the location of your gyazo script
	$newName = 'uploads/' . substr(md5(rand() . time()), 0, 20) . '.png';
    $tf = fopen($newName, 'w');
    fclose($tf);
    move_uploaded_file($_FILES['imagedata']['tmp_name'], $newName);
// Website
    echo 'http://'.$_SERVER['HTTP_HOST'].'/' . $newName;
}
?>
