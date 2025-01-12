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

	$queryH="SELECT * from Hospitals ORDER BY HospitalID;";
	//  Prepare and execute query
	$stmtH = $mysqli->prepare($queryH);
	$stmtH->execute();
	if ($stmtH) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<h2>Hospital Information</h2>";
		echo "<p>Sorted by Hospital Name in Ascending Order</p>";
		echo "<a href='readRBB.php'>Recipients</a> | <a href='readHBB.php'>Hospitals</a> | <a href='readBB.php'>Donors | </a> ";
		echo "<a href='readTBB.php'>Transactions</a> | <a href='readDNBB.php'>Donations</a> |  <a href='readQBB.php'>Queries</a>";
        echo "<br/><br />";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Hospital Name</th><th>Address</th><th>Phone Number</th><th>Email</th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row = $stmtH->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr>";
					//echo "<td><a href='deleteRBB.php?id=".urlencode($row['gameID'])."' style='color:red;' onclick='return confirm(\"Are you sure?\");'>X</a></td>";
					echo "<td>".$row["HName"]."</td>";
					echo "<td>".$row["Address"]."</td>";
                    echo "<td>".$row["PhoneNum"]."</td>";
					echo "<td>".$row["Email"]."</td>";
					//echo "<td><a href='readHHBB.php'>Recipients</a></td>";
					//echo "<td><a href='updateRBB.php?id=".urlencode($row['gameID'])."'>Edit</a></td>";
                    echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		//echo "<br /><a href='createHBB.php'>Add a Hospital</a>";
		echo "</center>";
		echo "</div>";
	}

new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
