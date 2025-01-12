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

	$query="SELECT Transactions.TransactionDate, Hospitals.HName, Employees.FirstNameE,Employees.LastNameE, Recipients.FirstNameR, Recipients.LastNameR, Donors.FirstNameD, Donors.LastNameD from Transactions natural join Hospitals left join Employees on Transactions.EmployeeID = Employees.EmployeeID left join Recipients on Transactions.RecipientID = Recipients.RecipientID left join Donations on Transactions.DonationID = Donations.DonationID left join Donors on Donations.DonorID = Donors.DonorID ORDER BY TransactionDate;";
	$stmt = $mysqli->prepare($query);
	$stmt->execute();

	if ($stmt) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<h2>Transaction Information</h2>";
		echo "<p>Sorted by Transaction Date</p>";
		echo "<a href='readRBB.php'>Recipients</a> | <a href='readHBB.php'>Hospitals</a> | <a href='readBB.php'>Donors | </a> ";
		echo "<a href='readTBB.php'>Transactions</a> | <a href='readDNBB.php'>Donations</a> |  <a href='readQBB.php'>Queries</a>";
       echo "<br/><br />";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Transaction Date </th><th>Hospital Name</th><th>Employee Name</th><th>Donor Name</th><th>Recipient Name</th></th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		  echo "<tr>";
			//echo "<td><a href='deleteTBB.php?id=".urlencode($row['TransactionID'])."' style='color:red;' onclick='return confirm(\"Are you sure?\");'>X</a></td>";
          echo "<td>".$row["TransactionDate"]."</td>";
          echo "<td>".$row["HName"]."</td>";
		  echo "<td>".$row["FirstNameE"]." ".$row["LastNameE"]."</td>";
		  echo "<td>".$row["FirstNameD"]." ".$row["LastNameD"]."</td>";
          echo "<td>".$row["FirstNameR"]." ".$row["LastNameR"]."</td>";
		  //echo "<td><a href='updateTBB.php?id=".urlencode($row['TransactionID'])."'>Edit</a></td>";
          echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		//echo "<br /><a href='createTBB.php'>Add a Transaction</a>";
		echo "</center>";
		echo "</div>";
	}

new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
