<?php
require 'Dbconnect.php';
header("Access-Control-Allow-Origin: *");
try{
  $qq = $_POST['filename'];
  $sql = "SELECT exif.resolution,exif.camera,exif.aperture,exif.exposure,exif.isoSpeed,exif.focalLength,exif.saturation,exif.whiteBalance,exif.photoTime,frogphotos.textName,frogphotos.textIntroduce FROM exif LEFT JOIN frogphotos ON exif.filename = :filename";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':filename',$qq);
  $stmt->execute();
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  $result = json_encode($result);
  print_r($result);
  return $result;
}catch(PDOException $e) {
  echo $e;
}
?>
