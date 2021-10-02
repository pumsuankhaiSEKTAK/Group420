<!doctype html>
<html>

<head>
	<title>Warehouse Stock Status</title>
	<meta name="description" content="SalesReport">
	<meta name="keywords" content="SalesReport">
	<link rel="stylesheet" href="Style/style.css">
	<link rel="script" href="Scripts/UpdateStock.php">
</head>

<body>
	<ul class="topnav">
		<li><a href="homepage.php">Home</a></li>
		<li><a href="addItems.php">Add Item</a></li>
		<li><a href="warehouse.php">Warehouse Report</a></li>
		<li class="right"><a href="About.php">About</a></li>
	</ul>
	<h1>Warehouse Stock Status</h1>

	<br />
	<br />

	<div class="instockReport">

		<!--for Stock report-->
		<h3>Stock Report Display available item</h3>

		<?php

		require_once "settings.php";	// Load MySQL log in credentials
		$conn = mysqli_connect($host, $user, $pwd, $sql_db);	// Log in and use database

		if ($conn) { // connected

			//echo "database connected!<br>";

			$query = "SELECT * FROM Warehouse WHERE ItemStatus = 'INSTOCK';";

			$result = mysqli_query($conn, $query);
			if ($result) {	//   query was successfully executed

				$record = mysqli_fetch_assoc($result);
				if ($record) {		//   record exist
					echo "<table class='salesReportTable'>";
		?>
					<tr>
						<th><a class="colum_sort" id="id" data-order="'.$order.'">Item_ID</a></th>
						<th><a class="colum_sort" id="name" data-order="'.$order.'">Item_Name</a></th>
						<th><a class="colum_sort" id="quantity" data-order="'.$order.'">Quantity</a></th>
						<th><a class="colum_sort" id="description" data-order="'.$order.'">Item_Description</a></th>
						<th><a class="colum_sort" id="description" data-order="'.$order.'">ItemStatus</a></th>
						<th><a class="colum_sort" id="price" data-order="'.$order.'">Price</a></th>

					</tr>
		<?php
					while ($record) {
						echo "<tr><td>{$record['Item_ID']}</td>";
						echo "<td>{$record['Item_Name']}</td>";
						echo "<td>{$record['Quantity']}</td>";
						echo "<td>{$record['Item_Description']}</td>";
						echo "<td>{$record['ItemStatus']}</td>";
						echo "<td>{$record['Price']}</td>";
						echo "				
					</tr>";

						$record = mysqli_fetch_assoc($result);
					}
					echo "</table>";
					mysqli_free_result($result);	// Free resources
				} else {
					echo "<p>No record retrieved.</p>";
				}
			} else {
				echo "<p>Orders table doesn't exist or select operation unsuccessful.</p>";
			}
			mysqli_close($conn);	// Close the database connection
		} else {
			echo "<p>Unable to connect to the database.</p>";
		}

		?>

		<input type="button" name="generateStockCSV" value="Generate CSV" />

	</div>

	<hr />
	<br />
	<br />


	<div class="soldStockReport">

		<!--for Stock report-->
		<h3>Stock Report Display sold item</h3>

		<?php

		require_once "settings.php";	// Load MySQL log in credentials
		$conn = mysqli_connect($host, $user, $pwd, $sql_db);	// Log in and use database

		if ($conn) { // connected

			//echo "database connected!<br>";

			$query = "SELECT * FROM Warehouse WHERE ItemStatus = 'SOLD';";

			$result = mysqli_query($conn, $query);
			if ($result) {	//   query was successfully executed

				$record = mysqli_fetch_assoc($result);
				if ($record) {		//   record exist
					echo "<table class='salesReportTable'>";
		?>
					<tr>
						<th><a class="colum_sort" id="id" data-order="'.$order.'">Item_ID</a></th>
						<th><a class="colum_sort" id="name" data-order="'.$order.'">Item_Name</a></th>
						<th><a class="colum_sort" id="quantity" data-order="'.$order.'">Quantity</a></th>
						<th><a class="colum_sort" id="description" data-order="'.$order.'">Item_Description</a></th>
						<th><a class="colum_sort" id="description" data-order="'.$order.'">ItemStatus</a></th>
						<th><a class="colum_sort" id="price" data-order="'.$order.'">Price</a></th>

					</tr>
		<?php
					while ($record) {
						echo "<tr><td>{$record['Item_ID']}</td>";
						echo "<td>{$record['Item_Name']}</td>";
						echo "<td>{$record['Quantity']}</td>";
						echo "<td>{$record['Item_Description']}</td>";
						echo "<td>{$record['ItemStatus']}</td>";
						echo "<td>{$record['Price']}</td>";
						echo "			
					</tr>";

						$record = mysqli_fetch_assoc($result);
					}
					echo "</table>";
					mysqli_free_result($result);	// Free resources
				} else {
					echo "<p>No record retrieved.</p>";
				}
			} else {
				echo "<p>Orders table doesn't exist or select operation unsuccessful.</p>";
			}
			mysqli_close($conn);	// Close the database connection
		} else {
			echo "<p>Unable to connect to the database.</p>";
		}

		?>

		<input type="button" name="generateSalesCSV" value="Generate CSV" />

	</div>


	<hr />
	<br />
	<br />


	<div class="outofStockReport">

		<!--for Stock report-->
		<h3>Stock Report Display out of stock item</h3>

		<?php

		require_once "settings.php";	// Load MySQL log in credentials
		$conn = mysqli_connect($host, $user, $pwd, $sql_db);	// Log in and use database

		if ($conn) { // connected

			//echo "database connected!<br>";

			$query = "SELECT * FROM Warehouse WHERE ItemStatus = 'OUT_OF_STOCK';";

			$result = mysqli_query($conn, $query);
			if ($result) {	//   query was successfully executed

				$record = mysqli_fetch_assoc($result);
				if ($record) {		//   record exist
					echo "<table class='salesReportTable'>";
		?>
					<tr>
						<th><a class="colum_sort" id="id" data-order="'.$order.'">Item_ID</a></th>
						<th><a class="colum_sort" id="name" data-order="'.$order.'">Item_Name</a></th>
						<th><a class="colum_sort" id="quantity" data-order="'.$order.'">Quantity</a></th>
						<th><a class="colum_sort" id="description" data-order="'.$order.'">Item_Description</a></th>
						<th><a class="colum_sort" id="description" data-order="'.$order.'">ItemStatus</a></th>
						<th><a class="colum_sort" id="price" data-order="'.$order.'">Price</a></th>

					</tr>
		<?php
					while ($record) {
						echo "<tr><td>{$record['Item_ID']}</td>";
						echo "<td>{$record['Item_Name']}</td>";
						echo "<td>{$record['Quantity']}</td>";
						echo "<td>{$record['Item_Description']}</td>";
						echo "<td>{$record['ItemStatus']}</td>";
						echo "<td>{$record['Price']}</td>";
						echo "			
					</tr>";

						$record = mysqli_fetch_assoc($result);
					}
					echo "</table>";
					mysqli_free_result($result);	// Free resources
				} else {
					echo "<p>No record retrieved.</p>";
				}
			} else {
				echo "<p>Orders table doesn't exist or select operation unsuccessful.</p>";
			}
			mysqli_close($conn);	// Close the database connection
		} else {
			echo "<p>Unable to connect to the database.</p>";
		}

		?>

		<input type="button" name="generateSalesCSV" value="Generate CSV" />

	</div>


</body>

</html>