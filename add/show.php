<?php
require 'DBconnect.php';

header("Access-Control-Allow-Origin: *");
$act = $_REQUEST['act'];

switch($act){
  case 'frog':
  try{
    $sql = "SELECT filepic,filetype,id,textName,textIntroduce FROM frogphotos";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM exif";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute();
    $result2 = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i] = array_merge($result[$i],$result2[$i]);
    }
    $result = json_encode($result);
    $result = str_replace("\\","",$result);
    print_r($result);
    return $result;
  }catch (PDOException $e) {
    echo $e;
  }

  case 'butterfly':
  try{
    $sql = "SELECT filepic,filetype,id FROM butterfly";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM exif";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute();
    $result2 = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i] = array_merge($result[$i],$result2[$i]);
    }
    $result = json_encode($result);
    $result = str_replace("\\","",$result);
    print_r($result);
    return $result;
  }catch (PDOException $e) {
    echo $e;
  }

  case 'nature':
  try{
    $sql = "SELECT filepic,filetype,id FROM nature";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM exif";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute();
    $result2 = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i] = array_merge($result[$i],$result2[$i]);
    }
    $result = json_encode($result);
    $result = str_replace("\\","",$result);
    print_r($result);
    return $result;
  }catch (PDOException $e) {
    echo $e;
  }

  case 'human':
  try{
    $sql = "SELECT filepic,filetype,id FROM human";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchall(PDO::FETCH_ASSOC);
    $sql2 = "SELECT * FROM exif";
    $stmt = $pdo->prepare($sql2);
    $stmt->execute();
    $result2 = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($result);
    for($i = 0;$i < $count;$i++){
      $result[$i] = array_merge($result[$i],$result2[$i]);
    }
    $result = json_encode($result);
    $result = str_replace("\\","",$result);
    print_r($result);
    return $result;
  }catch (PDOException $e) {
    echo $e;
  }
}

?>
