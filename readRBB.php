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
	$queryR="SELECT * from Recipients ORDER BY Blood ASC;";
	$stmtR = $mysqli->prepare($queryR);
	$stmtR->execute();
	if ($stmtR) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<h2>Recipient Information</h2>";
		echo "<p>Sorted by Blood Type in Ascending Order</p>";
		echo "<a href='readRBB.php'>Recipients</a> | <a href='readHBB.php'>Hospitals</a> | <a href='readBB.php'>Donors | </a> ";
		echo "<a href='readTBB.php'>Transactions</a> | <a href='readDNBB.php'>Donations</a> |  <a href='readQBB.php'>Queries</a>";
        echo "<br/><br />";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th></th><th>Recipient Name</th><th>Address</th><th>Phone Number</th><th>Email</th><th>Blood</th><th>DOB</th><th>Gender</th><th></th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row = $stmtR->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td><a href='deleteRBB.php?id=".urlencode($row['RecipientID'])."' style='color:red;' onclick='return confirm(\"Are you sure?\");'>X</a></td>";
			echo "<td>".$row["FirstNameR"]." ".$row["LastNameR"]."</td>";
			echo "<td>".$row["Address"]."</td>";
        	echo "<td>".$row["PhoneNum"]."</td>";
			echo "<td>".$row["Email"]."</td>";
			echo "<td>".$row["Blood"]."</td>";
        	echo "<td>".$row["DOB"]."</td>";
            echo "<td>".$row["Gender"]."</td>";
			echo "<td><a href='updateRBB.php?RecipientID=".urlencode($row['RecipientID'])."'>Edit</a></td>";
			echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		echo "<br /><a href='createRBB.php'>Add a Recipient</a>";
		echo "</center>";
		echo "</div>";
	}
new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
