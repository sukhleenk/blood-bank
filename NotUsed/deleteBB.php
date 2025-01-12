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
	$gm = $_GET["id"];
	$query = "DELETE FROM Donors WHERE donorID =?";
	$stmt = $mysqli->prepare($query);
	$stmt-> execute([$gm]);
		if ($stmt) {
			$_SESSION['message'] = "The donor was successfully deleted";
		}
		else {
				$_SESSION["message"] = "Error! Could not delete the donor.";
		}
		redirect("readBB.php");
	}
	else {
		$_SESSION["message"] = "Donor could not be found!";
		redirect("readBB.php");
	}
new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
