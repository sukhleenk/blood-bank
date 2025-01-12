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
echo "<center>";
echo "<h3>Add a Recipient</h3>";

if (isset($_POST["submit"])) {
	if((isset($_POST["FirstNameR"]) && $_POST["FirstNameR"] !== "") 
    && (isset($_POST["LastNameR"]) && $_POST["LastNameR"] !== "") 
    && (isset($_POST["Address"]) && $_POST["Address"] !== "") 
    && (isset($_POST["PhoneNum"]) && $_POST["PhoneNum"] !== "") 
    && (isset($_POST["Email"]) && $_POST["Email"] !== "") 
    && (isset($_POST["Blood"]) && $_POST["Blood"] !== "") 
    && (isset($_POST["DOB"]) && $_POST["DOB"] !== "") 
    && (isset($_POST["Gender"]) && $_POST["Gender"] !== "")) {
//////////////////////////////////////////////////////////////////////////////////////////////////
					//STEP 3.
					//Create and prepare query to insert information that has been posted - use stmt3
	$query ="INSERT INTO Recipients(FirstNameR, LastNameR, Address, PhoneNum, Email, Blood, DOB, Gender) VALUES (?,?,?,?,?,?,?,?);";
	$stmt3 = $mysqli->prepare($query);
    $stmt3-> execute([$_POST['FirstNameR'], $_POST['LastNameR'], $_POST['Address'], $_POST['PhoneNum'], $_POST['Email'], $_POST['Blood'], $_POST['DOB'], $_POST['Gender']]);
					//Verify $stmt3 executed - create another query to select from Games to get newly added gameID - use $stmt4
	                //If the statement did not execute, create a SESSION message that there was an error (use the video game name)
	
/*
        if($stmt3){
	    $query1 = "SELECT RecipientID FROM Recipients WHERE FirstName = ?";
		$stmt4 = $mysqli ->prepare($query1);
		$stmt4 -> execute([$_POST['FirstName']]);
        redirect("readRBB.php");
	}
	else{
		$_SESSION['message'] = "Error could not add" ;
	}
    
						//Using results from $stmt4, create, prepare and execute a query
						//to INSERT into Game_Genres - use $stmt5
						//If the statement did not execute, create a SESSION message that there was an error (use the video game name)

	if($stmt4){
	$row = $stmt4->fetch(PDO::FETCH_ASSOC);
	$query2 = "INSERT INTO Game_Genres (gameID, genreID) VALUES(?, ?)";
	$stmt5 = $mysqli ->prepare($query2);
	echo $_POST['Genre'];
	$stmt5 -> execute([ $row['gameID'], $_POST['Genre'] ]);
	//$stmt5 -> execute([$row['gameID'],$_POST['Genre']]);
	}
    else {
		$_SESSION["message"] = "Error! Could not add" .$_POST['FirstName']."".$_POST['LastName']."";
	}*/
	    if($stmt3) {
		    $_SESSION['message'] = $_POST['FirstNameR']." ".$_POST['LastNameR']." has been added";
			redirect("readRBB.php");
			}else{
				$_SESSION["message"] = "Error! Could not add " .$_POST['FirstNameR']."";
				}
                


						//Verify $stmt5 executed - create a SESSION message that the name of the video game has been added and redirect to readS22.php
						//If the statement did not execute, create a SESSION message that there was an error inserting the video game (use the name)


	redirect("readRBB.php");

//////////////////////////////////////////////////////////////////////////////////////////////////
		}
		else {
			$_SESSION["message"] = "Unable to add recipient. Fill in all information!";
			redirect("createRBB.php");
		}
	}
	else {

		echo "<div class='row'>";
		echo "<form action='createRBB.php' method='POST'>";

		echo "<p>First Name: <input type=text name='FirstNameR'</p>";
       // echo "<p>Middle Initial: <input type=text name='MInitial'</p>";
        echo "<p>Last Name: <input type=text name='LastNameR'</p>";
		echo "<p>Address: <input type=text name='Address'</p>";
        echo "<p>Phone Number (eg. XXX-XXX-XXXX): <input type=text name='PhoneNum'</p>";
        echo "<p>Email: <input type=text name='Email'</p>";
        echo "<p> Blood Type (eg. A+, A-, B+, B-, AB+, AB-, O+, O-): <input type=text name='Blood'</p>";    
        echo "<p>Date of Birth (YEAR-MONTH-DAY: eg: 1965-04-01): <input type=text name='DOB'</p>";
        echo "<p>Gender (M/F): <input type=text name='Gender'</p>";
	}
	echo "<input type='submit' name='submit' class='button tiny round' value='Add Recipient'/>";
	echo "</label>";
	echo "</div>";
	echo "<br /><p>&laquo:<a href='readRBB.php'>Back to Main Page</a>";
	echo "</center>";
new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);

?>
