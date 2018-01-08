<?php
require'dbconnect.php';
header('Access-Control-Allow-Origin:*');

try{
	$id = (int) $_REQUEST['id'];
	$resolution=$_REQUEST['resolution'];
	$camera=$_REQUEST['camera'];
	$aperture=$_REQUEST['aperture'];
	$exposure=$_REQUEST['exposure'];
	$isoSpeed=$_REQUEST['isoSpeed'];
	$focalLength=$_REQUEST['focalLength'];
	$saturation=$_REQUEST['saturation'];
	$whiteBalance=$_REQUEST['whiteBalance'];
	$photoTime=$_REQUEST['photoTime'];
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