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
  echo "</br>";
	echo "<h3>Add a Donation</h3>";

	if (isset($_POST["submit"])) {
    //if((isset($_POST["DonorID"]) && $_POST["DonorID"] !== ""
    //&& (isset($_POST["MInitial"]) && $_POST["MInitial"] !== "")
		echo "<p>Break1</p>";

    if((isset($_POST["DateDonated"]) && $_POST["DateDonated"] !== "")
    && (isset($_POST["Plasma"]) && $_POST["Plasma"] !== "")
    && (isset($_POST["Platelets"]) && $_POST["Platelets"] !== "")
    && (isset($_POST["WholeBlood"]) && $_POST["WholeBlood"] !== "")){
      $query ="INSERT INTO Donations(DateDonated, Plasma, Platelets, WholeBlood) VALUES (?,?,?,?);";
      $stmt3 = $mysqli->prepare($query);
      $stmt3-> execute([$_POST['DateDonated'], $_POST['Plasma'], $_POST['Platelets'], $_POST['WholeBlood'] ]);
			echo "<p>Break2</p>";
      if($stmt3){
        $query1 = "SELECT DonationID, DonorID FROM Donations WHERE DateDonated = ?";
        $stmt4 = $mysqli ->prepare($query1);
        $stmt4 -> execute([$_POST['DateDonated']]);
				echo "<p>Break3</p>";
      }
      else{
        $_SESSION['message'] = "Error could not add" ;
				echo "<p>Break4</p>";
      }

    if($stmt4){
			echo "<p>Break5</p>";
        $row = $stmt4->fetch(PDO::FETCH_ASSOC);
        $query2 = "INSERT INTO Donations (DonationID, DonorID) VALUES(?, ?)";
        $stmt5 = $mysqli ->prepare($query2);
				echo "<p>Break6</p>";
        echo $_POST['Donations'];
        $stmt5 -> execute([ $row['DonationID'], $_POST['DonorID'] ]);
      }else {
				echo "<p>Break7</p>";
        $_SESSION["message"] = "Error! Could not add ".$_POST['FirstNameD']." ".$_POST['LastNameD']."";
      }
        if($stmt3) {
					echo "<p>Break8</p>";
         $_SESSION['message'] = $_POST['FirstNameD']." ".$_POST['LastNameD']." has been added";
          redirect("readDNBB.php");
        }else{
					echo "<p>Break9</p>";
         $_SESSION["message"] = "Error! Could not add ".$_POST['FirstNameD']." ".$_POST['LastNameD']."";
        }

		redirect("readDNBB.php");

		}
		else {
				$_SESSION["message"] = "Unable to add donation. Fill in all information!";
				redirect("createDNBB.php");
		}
	}
	else {
//////////////////////////////////////////////////////////////////////////////////////////////////
				echo "<div class='row'>";
				echo "<form action='createDNBB.php' method='POST'>";
				//echo "<center>";
        echo "<p>Date Donated: (Insert as YEAR-MONTH-DAY) <input type=text name='DateDonated'</p>";
        echo "<p> Name: <select name='Name'>";
				$query6 = "SELECT * FROM Donors;";
				$stmt1 = $mysqli -> prepare($query6);
				$stmt1 -> execute();

				while($row = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					echo "<option value =".$row["DonorID"].">".$row["FirstNameD"]." ".$row["LastNameD"]."</option>";
				}
				echo "</select>";
				echo "</p>";

        echo "<p>Quantity of Plasma: <input type=text name='Plasma'</p>";
	    	echo "<p>Quantity of Platelets: <input type=text name='Platelets'</p>";
        echo "<p>Quantity of Whole Blood: <input type=text name='WholeBlood'</p>";
			}
    echo "<br>";
    echo "<br>";
	  echo "<input type='submit' name='submit' class='button tiny round' value='Add a Donation'/>";
		//echo "</center>";
	echo "</label>";
	echo "</div>";
	echo "<br /><p>&laquo:<a href='readDNBB.php'>Back to Main Page</a>";
	//echo "</center>";

  new_footer("2022 Blood Bank Management System");
  Database::dbDisconnect($mysqli);
?>
