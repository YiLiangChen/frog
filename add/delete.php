<?php
require 'DBconnect.php';
header('Access-Control-Allow-Origin:*');

$act = $_REQUEST['act'];

switch($act){
    case 'delete':
    try{
		$filename=$_POST['filename'];
		$sql="DELETE FROM frogphotos WHERE filename = :filename";
		$stmt = $pdo->prepare($sql);
	    $stmt->bindParam(':filename',$filename);
	    $stmt->execute();
		$sql="DELETE FROM exif WHERE filename= :filename";
        $stmt = $pdo->prepare($sql);
	    $stmt->bindParam(':filename',$filename);
	    $stmt->execute();
		$sql2 = "SELECT filename,filepic,filetype,id,textName,textIntroduce FROM frogphotos";
		$stmt = $pdo->prepare($sql2);
		$result = $stmt->fetchall(PDO::FETCH_ASSOC);
		$result = json_encode($result);
		echo "刪除成功";
		print_r($result);
	    return $result;
    }catch(PDOException $e){
		print_r($e);
        echo "刪除失敗";
    }
}
?>
