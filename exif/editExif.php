<?php
require'DBconnect.php';
header('Access-Control-Allow-Origin:*');

try{
	$id = (int) $_REQUEST['id'];
	/*$resolution=$_REQUEST['resolution'];	$camera=$_REQUEST['camera'];
	$aperture=$_REQUEST['aperture'];	$exposure=$_REQUEST['exposure'];
	$isoSpeed=$_REQUEST['isoSpeed'];	$focalLength=$_REQUEST['focalLength'];
	$saturation=$_REQUEST['saturation'];	$whiteBalance=$_REQUEST['whiteBalance'];
	$photoTime=$_REQUEST['photoTime'];  */
	if (array_key_exists('resolution', $exif)) {
      $resolution = $exif['resolution'];
    }else
	if (array_key_exists('camera', $exif)) {
      $camera = $exif['camera'];
    }else
	if (array_key_exists('aperture', $exif)) {
      $aperture = $exif['aperture'];
    }else
    if (array_key_exists('exposure', $exif)) {
      $exposure = $exif['exposure'];
    }else
	if (array_key_exists('isoSpeed', $exif)) {
      $isoSpeed = $exif['isoSpeed'];
    }else	
	if (array_key_exists('focalLength', $exif)) {
      $focalLength = $exif['focalLength'];
    }else
	if (array_key_exists('saturation', $exif)) {
      $saturation = $exif['saturation'];
    }else
	if (array_key_exists('whiteBalance', $exif)) {
      $whiteBalance = $exif['whiteBalance'];
    }else
	if (array_key_exists('photoTime', $exif)) {
      $photoTime = $exif['photoTime'];
    }else	
	$sql = "update exif set resolution='$resolution',camera='$camera',aperture='$aperture',exposure='$exposure',isoSpeed='$isoSpeed',
		focalLength='$focalLength',saturation='$saturation',whiteBalance='$whiteBalance',photoTime='$photoTime' where id=$id;";
		$pdo->exec($sql);
		echo"修改完成嘞~";
		
        $sql2 = "SELECT resolution,camera,aperture,exposure,isoSpeed,focalLength,saturation,whiteBalance,photoTime,id FROM exif";
        $stmt = $pdo->prepare($sql2);
        $stmt->execute();
        $result = $stmt->fetchall(PDO::FETCH_ASSOC);
        return $result;
    }catch (PDOException $e) {
        echo "爆了，重打一次吧";
  }
?>