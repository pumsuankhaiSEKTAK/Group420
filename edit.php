<!doctype html>
<html>

<head>
    <title>Help</title>
    <meta name="description" content="Help">
    <meta name="keywords" content="Help">
    <link rel="stylesheet" href="Style/style.css">
</head>

<body>

    <h3>Update Data</h3>

    <?php
    //for Edit function

    //sanitise input function
    function sanitise_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    require_once "settings.php";    // Load MySQL log in credentials
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);    // Log in and use database

    $id = "";

    if (!empty($_GET['id'])) {
        $id = $_GET['id'];
    }

    if (empty($id)) {
        echo "ID is blank!";
    }

    $qry = mysqli_query($conn, "SELECT * FROM PHPWarehouse WHERE Item_ID='$id'"); // select query

    $data = mysqli_fetch_array($qry); // fetch data

    if (isset($_POST['update'])) {

        $itemname = $_POST['itemname'];
        $itemname = sanitise_input($itemname);

        $quantity = $_POST['quantity'];
        $quantity = sanitise_input($quantity);

        $description = $_POST['description'];
        $description = sanitise_input($description);

        $price = $_POST['price'];
        $price = sanitise_input($price);

        $query = "UPDATE PHPWarehouse SET Item_Name ='$itemname', Quantity ='$quantity', Item_Description ='$description', Price ='$price'  WHERE Item_ID= $id;";
        $result = mysqli_query($conn, $query);
        if ($result) {
            mysqli_close($conn); // Close connection
            header("location: AddSales.php"); // redirects to all addsales page
            exit;
        } else {
            echo "Error Updating record!";
        }
    }

    ?>

    <form method="POST">
        <label for="itemname">Item name</label>
        <input type="text" name="itemname" value="<?php echo $data['Item_Name'] ?>" placeholder="Enter item name" Required>
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" value="<?php echo $data['Quantity'] ?>" placeholder="Enter quantity" Required>
        <label for="description">Description</label>
        <input type="text" name="description" value="<?php echo $data['Item_Description'] ?>" placeholder="Enter description" Required>
        <label for="price">Price</label>
        <input type="text" name="price" value="<?php echo $data['Price'] ?>" placeholder="Enter price" Required>
        <input type="submit" name="update" value="Update">
    </form>

</body>

</html>