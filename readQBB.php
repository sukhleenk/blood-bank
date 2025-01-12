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


    echo "</br>";
	echo "</br>";
	$queryHH="SELECT Hospitals.HName, GROUP_CONCAT(
		CONCAT_WS(' ', Recipients.FirstNameR, Recipients.LastNameR) SEPARATOR ', ') as Recipients_names
	  from Hospitals left join Transactions on Hospitals.HospitalID = Transactions.HospitalID
	  left join Recipients on Transactions.RecipientID = Recipients.RecipientID group by Hospitals.HName;";
	  //  Prepare and execute query
	  $stmtHH = $mysqli->prepare($queryHH);
	  $stmtHH->execute();
	  if ($stmtHH) {
		  echo "<div class='row'>";
		  echo "<center>";
          echo "<h2>Queries from Milestone 3</h2>";
		  echo "<a href='readRBB.php'>Recipients</a> | <a href='readHBB.php'>Hospitals</a> | <a href='readBB.php'>Donors | </a> ";
		echo "<a href='readTBB.php'>Transactions</a> | <a href='readDNBB.php'>Donations</a> |  <a href='readQBB.php'>Queries</a>";
       echo "</br>";
        echo "</br>";
        echo "</br>";
        echo "</br>";
		  echo "<h3>More Hospital Information</h3>";
		  echo "<p>Hospitals and Their Recipients -- Sukhleen's Query Given by Dr. Davidson</p>";
		  echo "<table>";
		  echo "  <thead>";
		  echo "    <tr><th>Hospital Name</th><th>Recipients</th><th></th></tr>";
		  echo "  </thead>";
		  echo "  <tbody>";
		  while($row1 = $stmtHH->fetch(PDO::FETCH_ASSOC)) {
					  echo "<tr>";
					  //echo "<td><a href='deleteRBB.php?id=".urlencode($row['gameID'])."' style='color:red;' onclick='return confirm(\"Are you sure?\");'>X</a></td>";
					  echo "<td>".$row1["HName"]."</td>";
					  echo "<td>".$row1["Recipients_names"]."</td>";
					  //echo "<td><a href='updateRBB.php?id=".urlencode($row['gameID'])."'>Edit</a></td>";
					  echo "</tr>";
		  }
		  echo "</tbody>";
		  echo "</table>";
		  //echo "<br /><a href='createHBB.php'>Add a Hospital</a>";
		  echo "</center>";
		  echo "</div>";
	  }

	echo "</br>";
	echo "</br>";

	$query2="SELECT CONCAT_WS(' ', Donors.FirstNameD, Donors.LastNameD) as DName,
	GROUP_CONCAT(CONCAT_WS(' ', Recipients.FirstNameR, Recipients.LastNameR)) as RName
	FROM Donors left join Donations on Donors.DonorID = Donations.DonorID
	left join Transactions on Donations.DonationID = Transactions.DonationID
	left join Recipients on Transactions.RecipientID = Recipients.RecipientID
	group by Donors.FirstNameD;";
	$stmt2 = $mysqli->prepare($query2);
	$stmt2->execute();

	if ($stmt2) {
		echo "<div class='row'>";
		echo "<center>";
		echo "<h3>More Transaction Information</h3>";
		echo "<p>Diana's Query Given by Dr. Davidson</p>";
		echo "<p>Key: (,) means that the Donors blood has not been in a transaction yet</p>";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Donors </th><th>Recipients</th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
		  echo "<tr>";
          echo "<td>".$row2["DName"]."</td>";
          echo "<td>".$row2["RName"]."</td>";
          echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		echo "</center>";
		echo "</div>";
	}


	$query3="SELECT Donors.Gender, Donors.Hemoglobin, Donors.FirstNameD, Donors.LastNameD, SUM(WholeBlood) as Total_Blood_Donated,
    SUM(Plasma) as Total_Plasma_Donated, SUM(Platelets) as Total_Platelets_Donated from
    Donations natural join Donors GROUP BY DonorID Order by DonorID;";
	$stmt3 = $mysqli->prepare($query3);
	$stmt3->execute();

	if ($stmt3) {
		echo "<div class='row'>";
		echo "<center>";
        echo "<h3>Other Queries</h3>";
		echo "<h4>Sum of the Donations (Nested)</h4>";
		echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Gender </th><th>Hemoglobin</th><th>Donor Name </th><th>Total Blood Donated</th><th>Total Plasma Donated</th><th>Total Platelets Donated</th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)) {
		  echo "<tr>";
          echo "<td>".$row3["Gender"]."</td>";
          echo "<td>".$row3["Hemoglobin"]."</td>";
          echo "<td>".$row3["FirstNameD"]." ".$row3["LastNameD"]."</td>";
          echo "<td>".$row3["Total_Blood_Donated"]."</td>";
          echo "<td>".$row3["Total_Plasma_Donated"]."</td>";
          echo "<td>".$row3["Total_Platelets_Donated"]."</td>";

          echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		echo "</center>";
		echo "</div>";
	}


	$query1="SELECT DConditions.DonorID, Donors.FirstNameD, Donors.LastNameD
	from Donors left join DConditions on Donors.DonorID = DConditions.DonorID
	where DConditions.CondtitionID = (select Conditions.CondtitionID from Conditions
	where ConditionName = 'Diabetes - feeling well and healthy');";
	$stmt1 = $mysqli->prepare($query1);
	$stmt1->execute();

	if ($stmt1) {
		echo "<div class='row'>";
		echo "<center>";
        echo "</br>";
		echo "<h4>Donors with only Diabetes that feel Healthy (Aggregate)</h4>";
        echo "</br>";
        echo "</br>";
        echo "<table>";
		echo "  <thead>";
		echo "    <tr><th>Donor Name</th></tr>";
		echo "  </thead>";
		echo "  <tbody>";
		while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
					echo "<tr>";
					echo "<td>".$row1["FirstNameD"]." ".$row1["LastNameD"]."</td>";
					//echo "<td>".$row["Hemoglobin"]."</td>";
					//echo "<td><a href='updateDBB.php?DonorID=".urlencode($row['DonorID'])."'>Edit</a></td>";
			echo "</tr>";
		}
		echo "  </tbody>";
		echo "</table>";
		echo "</center>";
		echo "</div>";
	}


new_footer("2022 Blood Bank Management System");
Database::dbDisconnect($mysqli);
?>
