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
  $sql = $con->prepare("INSERT INTO `crud`( `name`, `email`, `phone`, `city`, `language`, `sList`, `timeControl`, `dateControl`) VALUES (?,?,?,?,?,?,?,?)");
$sql->bind_param("ssssssss", $name, $email, $phone, $city, $language, $sList, $timeControl, $dateControl);
$rc = $sql->execute();

    if (true===$rc) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
      //connection closed.
$sql->close();
 $con->close();
?>