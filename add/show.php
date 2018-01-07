<?php
require 'DBconnect.php';

header("Access-Control-Allow-Origin: *");
//header("Content-type: image/jpeg");
$act = $_REQUEST['act'];

switch($act){
  case 'frog':
  try{
    $sql = "SELECT filepic,filetype,id FROM frogphotos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i]['filepic'] = base64_decode($result[$i]['filepic']);
    }
    return $result;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }

  case 'butterfly':
  try{
    $sql = "SELECT filepic,filetype,id FROM butterfly";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i]['filepic'] = base64_decode($result[$i]['filepic']);
    }
    return $result;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }

  case 'nature':
  try{
    $sql = "SELECT filepic,filetype,id FROM nature";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i]['filepic'] = base64_decode($result[$i]['filepic']);
    }
    return $result;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }

  case 'human':
  try{
    $sql = "SELECT filepic,filetype,id FROM human";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i]['filepic'] = base64_decode($result[$i]['filepic']);
    }
    return $result;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }
}

?>
