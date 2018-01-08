<?php
require 'DBconnect.php';
header('Access-Control-Allow-Origin:*');
$count = count($_FILES['file']['name']);
$error = $_FILES['file']['error'];

for ($i = 0; $i < $count; $i++) {
  if ($error[$i] === UPLOAD_ERR_OK){
    $tmp_name=$_FILES['file']['tmp_name'][$i];
    $file = fopen($tmp_name, "r+");
    $contents = fread($file,filesize($tmp_name));
    $exif = exif_read_data($tmp_name);
    fclose($file);
    $contents = base64_encode($contents);

    $type=$_FILES['file']['type'][$i];
    $size=$_FILES['file']['size'][$i];
    $name=$_FILES['file']['name'][$i];
    $sizemb = round($size/1024000,2);

    if (array_key_exists('DateTime', $exif)) {
      $DateTime = $exif['DateTime'];
    }else{
      $DateTime = "Unknown";
    }
    if (array_key_exists('ResolutionUnit', $exif)) {
      $ResolutionUnit = $exif['ResolutionUnit'];
    }else{
      $ResolutionUnit = "Unknown";
    }
    if (array_key_exists('Model', $exif)) {
      $Model = $exif['Model'];
    }else{
      $Model = "Unknown";
    }
    if (array_key_exists('ApertureFNumber', $exif)) {
      $ApertureFNumber = $exif['COMPUTED']['ApertureFNumber'];
    }else{
      $ApertureFNumber = "Unknown";
    }
    if (array_key_exists('ExposureTime', $exif)) {
      $ExposureTime = $exif['ExposureTime'];
    }else{
      $ExposureTime = "Unknown";
    }
    if (array_key_exists('ISOSpeedRatings', $exif)) {
      $ISOSpeedRatings = $exif['ISOSpeedRatings'];
    }else{
      $ISOSpeedRatings = "Unknown";
    }
    if (array_key_exists('FocalLengthIn35mmFilm', $exif)) {
      $FocalLengthIn35mmFilm = $exif['FocalLengthIn35mmFilm'];
    }else{
      $FocalLengthIn35mmFilm = "Unknown";
    }
    if (array_key_exists('Saturation', $exif)) {
      $Saturation = $exif['Saturation'];
    }else{
      $Saturation = "Unknown";
    }
    if (array_key_exists('WhiteBalance', $exif)) {
      $WhiteBalance = $exif['WhiteBalance'];
    }else{
      $WhiteBalance = "Unknown";
    }

    if($sizemb > 10){
      echo "檔案太大了>///<";
    }else{
      try{
        $sql = "INSERT INTO frogphotos(filepic,filename,filetype,filesize) VALUES('".$contents."','".$name."','".$type."','".$size."')";
        $pdo->exec($sql);
        $sql2 = "INSERT INTO exif(photoTime,resolution,camera,aperture,exposure,isoSpeed,focalLength,saturation,whiteBalance)
        VALUES('".$DateTime."','".$ResolutionUnit."','".$Model."','".$ApertureFNumber."','".$ExposureTime."','".$ISOSpeedRatings."','".$FocalLengthIn35mmFilm."','".$Saturation."','".$WhiteBalance."')" ;
        $pdo->exec($sql2);
        echo "檔案:".$name."上傳成功";
      }catch(PDOException $e){
        echo "檔案:".$name."上傳過惹";
      }
    }
  }else{
	  echo $error;
    echo "圖片上傳失敗";
  }
}
?>
