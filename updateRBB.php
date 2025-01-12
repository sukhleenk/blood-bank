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
echo "<div class='row'>";
echo "<label for='left-label' class='left inline'>";
echo "<h3>Update Recipient Information</h3>";

	if (isset($_POST["submit"])) {
	if((isset($_POST["FirstNameR"]) && $_POST["FirstNameR"] !== "") 
    && (isset($_POST["LastNameR"]) && $_POST["LastNameR"] !== "") 
    && (isset($_POST["Address"]) && $_POST["Address"] !== "") 
    && (isset($_POST["PhoneNum"]) && $_POST["PhoneNum"] !== "") 
    && (isset($_POST["Email"]) && $_POST["Email"] !== "") 
    && (isset($_POST["Blood"]) && $_POST["Blood"] !== "") 
    && (isset($_POST["DOB"]) && $_POST["DOB"] !== "") 
    && (isset($_POST["Gender"]) && $_POST["Gender"] !== "")) {
/////////////////////////
		$query3 = "UPDATE Recipients SET FirstNameR = ?, LastNameR = ?, Address = ?, PhoneNum = ?, Email = ?,Blood = ?, DOB = ?, Gender = ? WHERE RecipientID = ?;";
		$stmt4 = $mysqli -> prepare($query3);
		$stmt4 -> execute([$_POST['FirstNameR'], $_POST['LastNameR'], $_POST['Address'], $_POST['PhoneNum'], $_POST['Email'], $_POST['Blood'], $_POST['DOB'], $_POST['Gender'], $_POST['RecipientID']]);
		//Prepare and execute query (use $_POST values from submitted form)

		if($stmt4) {
/*
			if($_POST['Genre'] != NULL) {
				$query4 = "SELECT gameID,genreID FROM Game_Genres WHERE gameID = ? AND genreID = ?";
				$stmtVerify = $mysqli -> prepare($query4);
				$stmtVerify -> execute([$_POST['gameID'],$_POST['Genre']]);
				if($stmtVerify -> rowCount() <= 0) {
					$query5 = "INSERT INTO Game_Genres(gameID,genreID) VALUES(?,?)";
					$stmt5 = $mysqli -> prepare($query5);
					$stmt5 -> execute([$_POST['gameID'],$_POST['Genre']]);
					if($stmt5) {
						$_SESSION["message"] = $_POST["Name"]." has been changed";
					} else {
						$_SESSION["message"] = "Error! Could not change ".$_POST["Name"];
					}
					redirect("readS22.php");
				}
			}*/
		$_SESSION["message"] = $_POST["FirstNameR"]." ".$_POST["LastNameR"]."'s information has been changed";
		} else {
		$_SESSION["message"] = "Error! Could not change ".$_POST["FirstNameR"]." ".$_POST["LastNameR"]."'s information";
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////
		redirect("readRBB.php");
	} else {
///////////////////////////////////////////////////////////////////////////////////////////
	  //Step 1.
	  if (isset($_GET["RecipientID"]) && $_GET["RecipientID"] !== "") {
	 	$query = "SELECT * FROM Recipients WHERE RecipientID = ?";
		$stmt = $mysqli->prepare($query);
		$stmt -> execute([$_GET['RecipientID']]);
		if ($stmt)  {
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			echo "<form action = 'updateRBB.php' method='post'>";
			echo "<input type='hidden' name='RecipientID' value='".$row['RecipientID']."' />";

			echo "First Name: <input type = 'text' name = 'FirstNameR' value='".$row['FirstNameR']."' />";
            echo "Last Name: <input type = 'text' name = 'LastNameR' value='".$row['LastNameR']."' />";
            echo "Address: <input type = 'text' name = 'Address' value='".$row['Address']."' />";
            echo "Phone Number (eg. XXX-XXX-XXXX): <input type = 'text' name = 'PhoneNum' value='".$row['PhoneNum']."' />";
            echo "Email: <input type = 'text' name = 'Email' value='".$row['Email']."' />";
            echo "Blood Type (eg. A+, A-, B+, B-, AB+, AB-, O+, O-): <input type = 'text' name = 'Blood' value='".$row['Blood']."' />";
            echo "Date of Birth: <input type = 'text' name = 'DOB' value='".$row['DOB']."' />";
            echo "Gender (M/F): <input type = 'text' name = 'Gender' value='".$row['Gender']."' />";

			echo "</select>";
			echo "<input type='submit' name='submit' value='Update Recipient Information ' class='tiny round button'>";
			echo "</form>";
///////////////////////////////////////////////////////////////////////////////////////////
			echo "<br /><p>&laquo:<a href='readRBB.php'>Back to Main Page</a>";
			echo "</label>";
			echo "</div>";
		} else {
			$_SESSION["message"] = "Recipient could not be found!";
			redirect("readRBB.php");
		}
	  }
    }
    new_footer("2022 Blood Bank Management System");
	Database::dbDisconnect($mysqli);
?>
