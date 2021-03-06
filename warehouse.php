<!doctype html>
<html>

<head>
	<title>Warehouse Stock Status</title>
	<meta name="description" content="SalesReport">
	<meta name="keywords" content="SalesReport">
	<link rel="stylesheet" href="Style/style.css">
	<link rel="script" href="Scripts/UpdateStock.php">
	<!--Get your code at fontawesome.com-->
	<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	<!--Get your own code at fontawesome.com-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>

	<div id="page-container">
		<div id="content-wrap">

			<ul class="topnav">
			<li><a href="homepage.php">Home</a></li>
                <li><a href="addItems.php">Add Item</a></li>
                <li><a href="warehouse.php">Warehouse Report</a></li>
                <li><a href="AddSales.php">Add Sales</a></li>
                <li><a href="SalesReport.php">Sales Report</a></li>
                <li><a href="admin.php">Manage</a></li>
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
							echo "<table id='warehousetable1' class='table table-dark table-striped table-bordered'>";
				?>

							<div class="col-md-12 head">
								<div class="exportData">
									<a href="export_in_stock.php">Download CSV File <i class='fas fa-cloud-download-alt'></i></a>
								</div>
							</div>
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
							echo "<table id='warehousetable2' class='table table-dark table-striped table-bordered'>";
				?>
							<div class="col-md-12 head">
								<div class="exportData">
									<a href="export_sold_stock.php">Download CSV File <i class='fas fa-cloud-download-alt'></i></a>
								</div>
							</div>
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
							echo "<table id='warehousetable3' class='table table-dark table-striped table-bordered'>";
				?>

							<div class="col-md-12 head">
								<div class="exportData">
									<a href="export_out_of_stock.php">Download CSV File <i class='fas fa-cloud-download-alt'></i></a>
								</div>
							</div>
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

		</div>

		<div class="footer">
			<p> People Health Pharmacy | Group 420</p>
		</div>

	</div>



</body>

</html>