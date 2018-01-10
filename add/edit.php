<?php
require 'DBconnect.php';
header('Access-Control-Allow-Origin:*');

try{
	$filename = $_POST['filename'];
	$sql = "SELECT resolution,camera,aperture,exposure,isoSpeed,focalLength,saturation,whiteBalance,photoTime FROM exif WHERE filename = :filename";
	$stmt = $pdo->prepare($sql);
    $stmt->bindParam(':filename',$filename);
	$stmt->execute();
	$result = $stmt->fetchall(PDO::FETCH_ASSOC);
	$sql2 = "SELECT textName,textIntroduce FROM frogphotos WHERE filename = :filename";
	$stmt = $pdo->prepare($sql2);
	$stmt->bindParam(':filename',$filename);
	$stmt->execute();
    $result2 = $stmt->fetchall(PDO::FETCH_ASSOC);
    $result = array_merge($result,$result2);

  if (!empty($_POST['resolution'])) {
    $resolution = $_POST['resolution'];
  }else{
    $resolution = $result[0]['resolution'];
  }
  if (!empty($_POST['camera'])) {
    $camera = $_POST['camera'];
  }else{
    $camera = $result[0]['camera'];
  }
  if (!empty($_POST['aperture'])) {
    $aperture = $_POST['aperture'];
  }else{
    $aperture = $result[0]['aperture'];
  }
  if (!empty($_POST['exposure'])) {
    $exposure = $_POST['exposure'];
  }else{
    $exposure = $result[0]['exposure'];
  }
  if (!empty($_POST['isoSpeed'])) {
    $isoSpeed = $_POST['isoSpeed'];
  }else{
    $isoSpeed = $result[0]['isoSpeed'];
  }
  if (!empty($_POST['focalLength'])) {
    $focalLength = $_POST['focalLength'];
  }else{
    $focalLength = $result[0]['focalLength'];
  }
  if (!empty($_POST['saturation'])) {
    $saturation = $_POST['saturation'];
  }else{
    $saturation = $result[0]['saturation'];
  }
  if (!empty($_POST['whiteBalance'])) {
    $whiteBalance = $_POST['whiteBalance'];
  }else{
    $whiteBalance = $result[0]['whiteBalance'];
  }
  if (!empty($_POST['photoTime'])) {
    $photoTime = $_POST['photoTime'];
  }else{
    $photoTime = $result[0]['photoTime'];
  }
  if(!empty($_POST['textName'])) {
	  $textName = $_POST['textName'];
  }else{
    $textName = $result[1]['textName'];
  }
  if(!empty($_POST['textIntroduce'])) {
	  $textIntroduce = $_POST['textIntroduce'];
  }else{
		$textIntroduce = $result[1]['textIntroduce'];
	}
	
	$sql3 = "UPDATE frogphotos SET textName = '$textName' , textIntroduce = '$textIntroduce' WHERE filename = '$filename'";
	$pdo->exec($sql3);
	$sql4 = "UPDATE exif SET resolution = :resolution , camera = :camera , aperture = :aperture , exposure = :exposure , isoSpeed = :isoSpeed , focalLength = :focalLength , saturation = :saturation , whiteBalance = :whiteBalance , photoTime = :photoTime WHERE filename= :filename";
	$stmt = $pdo->prepare($sql4);
	$stmt->bindParam(':resolution',$resolution);
	$stmt->bindParam(':camera',$camera);
	$stmt->bindParam(':aperture',$aperture);
	$stmt->bindParam(':exposure',$exposure);
	$stmt->bindParam(':isoSpeed',$isoSpeed);
	$stmt->bindParam(':focalLength',$focalLength);
	$stmt->bindParam(':saturation',$saturation);
	$stmt->bindParam(':whiteBalance',$whiteBalance);
	$stmt->bindParam(':photoTime',$photoTime);
	$stmt->bindParam(':filename',$filename);
	$stmt->execute();
	echo"修改完成嘞~";
}catch (PDOException $e) {
	echo $e;
}

?>
