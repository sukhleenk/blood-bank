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
echo "<h3>Update Donor Information</h3>";

	if (isset($_POST["submit"])) {
        if((isset($_POST["FirstNameD"]) && $_POST["FirstNameD"] !== "") 
        && (isset($_POST["LastNameD"]) && $_POST["LastNameD"] !== "") 
        && (isset($_POST["Address"]) && $_POST["Address"] !== "") 
        && (isset($_POST["PhoneNum"]) && $_POST["PhoneNum"] !== "") 
        && (isset($_POST["Email"]) && $_POST["Email"] !== "") 
        && (isset($_POST["Blood"]) && $_POST["Blood"] !== "") 
        && (isset($_POST["DOB"]) && $_POST["DOB"] !== "") 
        && (isset($_POST["Gender"]) && $_POST["Gender"] !== "")
        && (isset($_POST["Hemoglobin"]) && $_POST["Hemoglobin"] !== "")) {

	    $query3 = "UPDATE Donors SET FirstNameD = ?, LastNameD = ?, Address = ?, PhoneNum = ?, Email = ?,Blood = ?, DOB = ?, Gender = ?, Hemoglobin=?  WHERE DonorID = ?;";
	    $stmt4 = $mysqli -> prepare($query3);
	    $stmt4 -> execute([$_POST['FirstNameD'], $_POST['LastNameD'], $_POST['Address'], $_POST['PhoneNum'], $_POST['Email'], $_POST['Blood'], $_POST['DOB'], $_POST['Gender'], $_POST['Hemoglobin'], $_POST['DonorID']]);

	    if($stmt4) {
            if($_POST['Conditions'] != NULL) {
                $query4 = "SELECT DonorID,CondtitionID FROM DConditions WHERE DonorID = ? AND CondtitionID = ?";
                $stmtVerify = $mysqli -> prepare($query4);
                $stmtVerify -> execute([$_POST['DonorID'],$_POST['Conditions']]);
                    if($stmtVerify -> rowCount() <= 0) {
                        $query5 = "UPDATE DConditions SET CondtitionID =? WHERE DonorID=?";
                        $stmt5 = $mysqli -> prepare($query5);
                        $stmt5 -> execute([$_POST['Conditions'],$_POST['DonorID']]);
                        if($stmt5) {
                            $_SESSION["message"] = $_POST["FirstNameD"]." has been changed";
                        } else {
                            $_SESSION["message"] = "Error! Could not change ".$_POST["FirstNameD"];
                        }
                        redirect("readBB.php");
                    }
            }
		$_SESSION["message"] = $_POST["FirstNameD"]." ".$_POST["LastNameD"]."'s information has been changed";
		} else {
		$_SESSION["message"] = "Error! Could not change ".$_POST["FirstNameD"]." ".$_POST["LastNameD"]."'s information";
		}
	}
///////////////////////////////////////////////////////////////////////////////////////////
		redirect("readBB.php");
	} else {
///////////////////////////////////////////////////////////////////////////////////////////
	  if (isset($_GET["DonorID"]) && $_GET["DonorID"] !== "") {
	 	$query = "SELECT * FROM Donors WHERE DonorID = ?";
		$stmt = $mysqli->prepare($query);
		$stmt -> execute([$_GET['DonorID']]);
		if ($stmt)  {
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			echo "<form action = 'updateDBB.php' method='post'>";
			echo "<input type='hidden' name='DonorID' value='".$row['DonorID']."' />";
			echo "First Name: <input type = 'text' name = 'FirstNameD' value='".$row['FirstNameD']."' />";
            echo "Last Name: <input type = 'text' name = 'LastNameD' value='".$row['LastNameD']."' />";
            echo "Address: <input type = 'text' name = 'Address' value='".$row['Address']."' />";
            echo "Phone Number (eg. XXX-XXX-XXXX): <input type = 'text' name = 'PhoneNum' value='".$row['PhoneNum']."' />";
            echo "Email: <input type = 'text' name = 'Email' value='".$row['Email']."' />";
            echo "Blood Type (eg. A+, A-, B+, B-, AB+, AB-, O+, O-): <input type = 'text' name = 'Blood' value='".$row['Blood']."' />";
            echo "Date of Birth: <input type = 'text' name = 'DOB' value='".$row['DOB']."' />";
            echo "Gender (M/F): <input type = 'text' name = 'Gender' value='".$row['Gender']."' />";
            echo "<p>Hemoglobin: <input  type='number' step='0.1' name='Hemoglobin' min='12.5' max='20' value='".$row['Hemoglobin']."' />";

            $query5 = "SELECT DonorID, GROUP_CONCAT(Conditions.ConditionName) as Condition_name FROM DConditions LEFT OUTER JOIN Conditions on DConditions.CondtitionID = Conditions.CondtitionID WHERE DonorID = ?";
			$stmt2 = $mysqli-> prepare($query5);
			$stmt2 -> execute([$row['DonorID']]);
			$row2 = $stmt2-> fetch(PDO::FETCH_ASSOC);

			echo "<p>Conditions: " .$row2['Condition_name']. "</p>";
			echo "Conditions: <select name='Conditions'>";
			echo "<option></option>";
			$query6 = "SELECT * FROM Conditions ORDER BY ConditionName ASC";
			$stmt3 = $mysqli -> prepare($query6);
			$stmt3 -> execute();
			while($row = $stmt3->fetch(PDO::FETCH_ASSOC)) {
				echo "<option value='".$row['CondtitionID']."'>".$row['ConditionName']."</option>";
			}
			echo "</select>";
			echo "<input type='submit' name='submit' value='Update Donor Information ' class='tiny round button'>";
			echo "</form>";
			echo "<br /><p>&laquo:<a href='readBB.php'>Back to Main Page</a>";
			echo "</label>";
			echo "</div>";
		} else {
			$_SESSION["message"] = "Donor could not be found!";
			redirect("readBB.php");
		}
	  }
    }
    new_footer("2022 Blood Bank Management System");
	Database::dbDisconnect($mysqli);
?>