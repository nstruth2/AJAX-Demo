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
$stmt->bindParam(':name', $name, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
$stmt->bindParam(':city', $city, PDO::PARAM_STR);
$stmt->bindParam(':language', $language, PDO::PARAM_STR);
$stmt->bindParam(':sList', $sList, PDO::PARAM_STR);
$stmt->bindParam(':timeControl', $timeControl, PDO::PARAM_STR);
$stmt->bindParam(':dateControl', $dateControl, PDO::PARAM_INT);
$rc = $stmt->execute();

    if (true===$rc) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
      //connection closed.

?>