<?php
require 'Dbconnect.php';

try{
  $qq = $_POST['filename'];
  $sql = "SELECT resolution,camera,aperture,exposure,isoSpeed,focalLength,saturation,whiteBalance,photoTime FROM exif WHERE filename = :filename";
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':filename',$qq);
  $stmt->execute();
  $result = $stmt->fetchall(PDO::FETCH_ASSOC);
  print_r($result);
  return $result;
}catch(PDOException $e) {
  echo $e;
}
?>
