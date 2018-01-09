<?php
require 'DBconnect.php';
header('Access-Control-Allow-Origin:*');

try{
	$id = (int) $_POST['id'];
	
	if (isset($_POST['resolution'])) {
    $resolution = $_POST['resolution'];
  }else{
		$resolution = "Unknown";
	}
	if (isset($_POST['camera'])) {
    $camera = $_POST['camera'];
  }else{
		$camera = "Unknown";
	}
	if (isset($_POST['aperture'])) {
    $aperture = $_POST['aperture'];
  }else{
		$aperture = "Unknown";
	}
  if (isset($_POST['exposure'])) {
    $exposure = $_POST['exposure'];
  }else{
		$exposure = "Unknown";
	}
	if (isset($_POST['isoSpeed'])) {
    $isoSpeed = $_POST['isoSpeed'];
  }else{
		$isoSpeedn = "Unknown";
	}
	if (isset($_POST['focalLength'])) {
    $focalLength = $_POST['focalLength'];
  }else{
		$focalLength = "Unknown";
	}
	if (isset($_POST['saturation'])) {
    $saturation = $_POST['saturation'];
  }else{
		$saturation = "Unknown";
	}
	if (isset($_POST['whiteBalance'])) {
    $whiteBalance = $_POST['whiteBalance'];
  }else{
		$whiteBalance = "Unknown";
	}
	if (isset($_POST['photoTime'])) {
    $photoTime = $_POST['photoTime'];
  }else{
		$photoTime = "Unknown";
	}

	$sql = "update exif set resolution='$resolution',camera='$camera',aperture='$aperture',exposure='$exposure',isoSpeed='$isoSpeed',
		focalLength='$focalLength',saturation='$saturation',whiteBalance='$whiteBalance',photoTime='$photoTime' where id=$id;";
	$pdo->exec($sql);
	echo"修改完成嘞~";
  }catch (PDOException $e) {
    echo "爆了，重打一次吧";
}
?>
