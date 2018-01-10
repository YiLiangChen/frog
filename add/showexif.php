<?php
require 'Dbconnect.php';
header("Access-Control-Allow-Origin: *");
try{
  $qq = $_POST['filename'];
  $sql = "SELECT resolution,camera,aperture,exposure,isoSpeed,focalLength,saturation,whiteBalance,photoTime FROM exif WHERE filename = :filename";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':filename',$qq);
  $stmt->execute();
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  $sql2 = "SELECT textName,textIntroduce FROM frogphotos WHERE filename = :filename";
  $stmt = $pdo->prepare($sql2);
  $stmt->bindParam(':filename',$qq);
  $stmt->execute();
  $result2 = $stmt->fetchall(PDO::FETCH_ASSOC);
  $result = array_merge($result,$result2);
  $result = json_encode($result);
  print_r($result);
  return $result;
}catch(PDOException $e) {
  echo $e;
}
?>
