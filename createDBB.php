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
	//echo "<center>";
	echo "<h3>Add a Donor</h3>";

	if (isset($_POST["submit"])) {
    if((isset($_POST["FirstNameD"]) && $_POST["FirstNameD"] !== "")
    //&& (isset($_POST["MInitial"]) && $_POST["MInitial"] !== "")
    && (isset($_POST["LastNameD"]) && $_POST["LastNameD"] !== "")
    && (isset($_POST["Address"]) && $_POST["Address"] !== "")
    && (isset($_POST["PhoneNum"]) && $_POST["PhoneNum"] !== "")
    && (isset($_POST["Email"]) && $_POST["Email"] !== "")
    && (isset($_POST["Blood"]) && $_POST["Blood"] !== "")
    && (isset($_POST["DOB"]) && $_POST["DOB"] !== "")
    && (isset($_POST["Gender"]) && $_POST["Gender"] !== "")
    && (isset($_POST["Hemoglobin"]) && $_POST["Hemoglobin"] !== "")){
//////
      $query ="INSERT INTO Donors(FirstNameD, LastNameD, Address, PhoneNum, Email, Blood, DOB, Gender, Hemoglobin) VALUES (?,?,?,?,?,?,?,?,?)";
      $stmt3 = $mysqli->prepare($query);
      $stmt3-> execute([$_POST['FirstNameD'], $_POST['LastNameD'], $_POST['Address'], $_POST['PhoneNum'], $_POST['Email'], $_POST['Blood'], $_POST['DOB'], $_POST['Gender'], $_POST['Hemoglobin'] ]);
    

      if($stmt3){
        $query1 = "SELECT DonorID FROM Donors WHERE FirstNameD = ?";
        $stmt4 = $mysqli ->prepare($query1);
        $stmt4 -> execute([$_POST['FirstNameD']]);
      }
      else{
        $_SESSION['message'] = "Error could not add" ;
      }
			
      if($stmt4){
        $row = $stmt4->fetch(PDO::FETCH_ASSOC);
        $query2 = "INSERT INTO DConditions (DonorID, CondtitionID) VALUES(?, ?)";
        $stmt5 = $mysqli ->prepare($query2);
        echo $_POST['Conditions'];
        $stmt5 -> execute([ $row['DonorID'], $_POST['Conditions'] ]);
      }else {
        $_SESSION["message"] = "Error! Could not add ".$_POST['FirstNameD']." ".$_POST['LastNameD']."";
      }
        if($stmt5) {
         $_SESSION['message'] = $_POST['FirstNameD']." ".$_POST['LastNameD']." has been added";
          redirect("readBB.php");
        }else{
         $_SESSION["message"] = "Error! Could not add ".$_POST['FirstNameD']." ".$_POST['LastNameD']."";
        }
		redirect("readBB.php");
		}
		else {
				$_SESSION["message"] = "Unable to add donor. Fill in all information!";
				redirect("createDBB.php");
		}
	}
	else {
//////////////////////////////////////////////////////////////////////////////////////////////////
				echo "<div class='row'>";
				echo "<form action='createDBB.php' method='POST'>";
				//echo "<center>";
        echo "<p>First Name: <input type=text name='FirstNameD'</p>";
       // echo "<p>Middle Initial: <input type=text name='MInitial'</p>";
        echo "<p>Last Name: <input type=text name='LastNameD'</p>";
	    	echo "<p>Address: <input type=text name='Address'</p>";
        echo "<p>Phone Number (eg. XXX-XXX-XXXX): <input type=text name='PhoneNum'</p>";
        echo "<p>Email (if no email: place N/A): <input type=text name='Email'</p>";
        echo "<p> Blood Type (eg. A+, A-, B+, B-, AB+, AB-, O+, O-): <input type=text name='Blood'</p>";    
        echo "<p>Date of Birth (YEAR-MONTH-DAY: eg: 1965-04-01): <input type=text name='DOB'</p>";
        echo "<p>Gender (M/F): <input type=text name='Gender'</p>";
        echo "<p>Hemoglobin: <input  type='number' step='0.1' name='Hemoglobin' min='12.5' max='20' ></p>";
				echo "<p> Conditions: <select name='Conditions'>";
				$query6 = "SELECT * FROM Conditions;";
				$stmt1 = $mysqli -> prepare($query6);
				$stmt1 -> execute();

				while($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					echo "<option value =".$row["CondtitionID"].">".$row["ConditionName"]."</option>";
				}
				echo "</select>";
				echo "</p>";
			}
	  echo "<input type='submit' name='submit' class='button tiny round' value='Add a Donor'/>";
		//echo "</center>";
	echo "</label>";
	echo "</div>";
	echo "<br /><p>&laquo:<a href='readBB.php'>Back to Main Page</a>";
	//echo "</center>";

  new_footer("2022 Blood Bank Management System");
  Database::dbDisconnect($mysqli);
?>
