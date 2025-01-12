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

	if (isset($_GET["TransactionID"]) && $_GET["TransactionID"] !== "") {
    	$ID = $_GET["TransactionID"];
      $query  = "DELETE FROM Transactions WHERE TransactionID =".$ID;
   	  $stmt = $mysqli -> prepare($query);
   	  $stmt -> execute();

      	if ($stmt) {
          $_SESSION["message"]= "Transaction successfully deleted";
          $output = message();
        echo $output;
        echo "<br /><p>&laquo:<a href='readTBB.php'>Back to Main Page</a>";
        }

        else {
          $_SESSION["message"] = "Transaction could not be deleted";
          redirect("readTBB.php");
        }

      }
      else {
        $_SESSION["message"] = "Transaction could not be found!";
        redirect("readTBB.php");
      }

      new_footer("Blood bank Management");
        Database::dbDisconnect($mysqli);

      ?>
