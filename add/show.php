<?php
require 'DBconnect.php';

header("Access-Control-Allow-Origin: *");
//header("Content-type: image/jpeg");
$act = $_REQUEST['act'];

switch($act){
  case 'frog':
  try{
    $sql = "SELECT filepic,filetype,id FROM frog";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = array ();
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($row);
    $result2[] = $row;
    for($i = 0;$i < $count;$i++){
      $result2[0][$i]['filepic'] = base64_decode($result2[0][$i]['filepic']);
    }
    print_r($result2);
    return $result2;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }

  case 'butterfly':
  try{
    $sql = "SELECT filepic,filetype,id FROM frog";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = array ();
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($row);
    $result2[] = $row;
    for($i = 0;$i < $count;$i++){
      $result2[0][$i]['filepic'] = base64_decode($result2[0][$i]['filepic']);
    }
    print_r($result2);
    return $result2;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }

  case 'nature':
  try{
    $sql = "SELECT filepic,filetype,id FROM frog";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = array ();
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($row);
    $result2[] = $row;
    for($i = 0;$i < $count;$i++){
      $result2[0][$i]['filepic'] = base64_decode($result2[0][$i]['filepic']);
    }
    print_r($result2);
    return $result2;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }

  case 'human':
  try{
    $sql = "SELECT filepic,filetype,id FROM frog";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = array ();
    $row = $stmt->fetchall(PDO::FETCH_ASSOC);
    $count = count($row);
    $result2[] = $row;
    for($i = 0;$i < $count;$i++){
      $result2[0][$i]['filepic'] = base64_decode($result2[0][$i]['filepic']);
    }
    print_r($result2);
    return $result2;
  }catch (PDOException $e) {
    echo "幫你QQ";
  }
}

?>
