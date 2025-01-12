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

	echo "<br/>";
	echo "<br /><a href='readBB.php'>Donor Information</a>";
	echo "<br /><a href='readTBB.php'>Transactions</a>";

	$query="SELECT Donors.FirstNameD, Donors.LastNameD, Donations.DateDonated, Donations.Plasma, Donations.Platelets, Donations.WholeBlood from Donations left join Donors on Donations.DonorID = Donors.DonorID ORDER BY DateDonated ASC;";

	$stmt = $mysqli->prepare($query);
	$stmt->execute();

	if ($stmt) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<h2>Donation Information</h2>";
		echo "<a href='readRBB.php'>Recipients</a> | <a href='readHBB.php'>Hospitals</a> | <a href='readBB.php'>Donors | </a> ";
		echo "<a href='readTBB.php'>Transactions</a> | <a href='readDNBB.php'>Donations</a> |  <a href='readQBB.php'>Queries</a>";
       echo "<br/><br />";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Date Donated</th><th>Donor Name</th><th>Plasma</th><th>Platelets</th><th>Whole Blood</th><th></th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr>";
					echo "<td>".$row["DateDonated"]."</td>";
					echo "<td>".$row["FirstNameD"]." ".$row["LastNameD"]."</td>";
                    echo "<td>".$row["Plasma"]."</td>";
					echo "<td>".$row["Platelets"]."</td>";
					echo "<td>".$row["WholeBlood"]."</td>";
					//echo "<td><a href='updateDNBB.php?id=".urlencode($row['DonationID'])."'>Edit</a></td>";
			echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		echo "<br /><a href='createDNBB.php'>Add a Donation</a>";
		echo "</center>";
		echo "</div>";
	}
new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
