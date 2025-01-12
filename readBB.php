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
	
	$query="SELECT DConditions.DonorID, Donors.FirstNameD, Donors.LastNameD, Donors.Address, Donors.PhoneNum, Donors.Email, Donors.Blood, Donors.DOB, Donors.Gender, Donors.Hemoglobin, Conditions.ConditionName from Donors left join DConditions on Donors.DonorID = DConditions.DonorID natural join Conditions ORDER BY Blood ASC;";
	$stmt = $mysqli->prepare($query);
	$stmt->execute();
	if ($stmt) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<h2>Donor Information</h2>";
		echo "<p>Sorted by Blood Type in Ascending Order</p>";
		echo "<a href='readRBB.php'>Recipients</a> | <a href='readHBB.php'>Hospitals</a> | <a href='readBB.php'>Donors | </a> ";
		echo "<a href='readTBB.php'>Transactions</a> | <a href='readDNBB.php'>Donations</a> |  <a href='readQBB.php'>Queries</a>";
        echo "<br/><br />";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Donor Name</th><th>Address</th><th>Phone Number</th><th>Email</th><th>Blood</th><th>DOB</th><th>Gender</th><th>Hemoglobin</th><th>Condition(s)</th><th></th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr>";
					echo "<td>".$row["FirstNameD"]." ".$row["LastNameD"]."</td>";
					echo "<td>".$row["Address"]."</td>";
                    echo "<td>".$row["PhoneNum"]."</td>";
					echo "<td>".$row["Email"]."</td>";
					echo "<td>".$row["Blood"]."</td>";
                    echo "<td>".$row["DOB"]."</td>";
                    echo "<td>".$row["Gender"]."</td>";
                    echo "<td>".$row["Hemoglobin"]."</td>";
					echo "<td>".$row["ConditionName"]."</td>";
					echo "<td><a href='updateDBB.php?DonorID=".urlencode($row['DonorID'])."'>Edit</a></td>";
			echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		echo "<br /><a href='createDBB.php'>Add a Donor</a>";
		echo "</center>";
		echo "</div>";
	}

new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
