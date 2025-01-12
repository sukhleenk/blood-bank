<?php
require_once("session.php");
require_once("included_functions.php");
require_once("database.php");
new_header("Blood Bank Management");
$mysqli = Database::dbConnect();
$mysqli -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (($output = message()) !== null) {
	echo $output;
}
  	if (isset($_GET["id"]) && $_GET["id"] !== "") {
	$rm = $_GET["id"];
	$query = "DELETE FROM Recipients WHERE RecipientID =?";
	$stmt = $mysqli->prepare($query);
	$stmt-> execute([$rm]);
		if ($stmt) {
			$_SESSION['message'] = $_POST["FirstNameR"]." ".$_POST["LastNameR"]." was successfully deleted";
		}
		else {
				$_SESSION["message"] = "Error! Could not delete ".$_POST["FirstNameR"]." ".$_POST["LastNameR"];
		}
		redirect("readRBB.php");
	}
	else {
		$_SESSION["message"] = "Recipient could not be found!";
		redirect("readRBB.php"); 
	}
new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
