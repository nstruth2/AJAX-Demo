<?php
	include 'database.php';
	error_reporting(E_ALL);
    ini_set('display_errors', 1);
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$city=$_POST['city'];
	$language=$_POST['language'];
	$sList=$_POST['sList'];
	$timeControl=$_POST['timeControl'];
	$dateControl=$_POST['dateControl'];
  $query = "INSERT INTO `crud`(name, email, phone, city, language, sList, timeControl, dateControl) VALUES (:name, :email, :phone, :city, :language, :sList, :timeControl, :dateControl)";
  $stmt = $conn->prepare($query);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':phone', $phone, PDO::PARAM_STR);
$stmt->bindValue(':city', $city, PDO::PARAM_STR);
$stmt->bindValue(':language', $language, PDO::PARAM_STR);
$stmt->bindValue(':sList', $sList, PDO::PARAM_STR);
$stmt->bindValue(':timeControl', $timeControl, PDO::PARAM_STR);
$stmt->bindValue(':dateControl', $dateControl, PDO::PARAM_STR);
$rc = $stmt->execute();

    if (true===$rc) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
      //connection closed.

?>