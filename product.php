<?php

include'DB_connect.php';
include'header.php';

$description = $product_amount = $buying_price = $selling_price = $buying_date = "";

if(isset($_POST['submit']))
{
    $description  = $_POST['description'];
    $product_weight = $_POST['product_weight'];
    $buying_price = $_POST['buying_price'];
	$buying_date = $_POST['buying_date'];
	$selling_price  = $_POST['selling_price'];
    

    $insertQuery = "INSERT INTO `product`(`description`,`product_weight`,`buying_price`,`buying_date`,`selling_price`)
           VALUES('$description','$product_weight','$buying_price','$buying_date','$selling_price')";
           $re = mysqli_query($connect,$insertQuery);
   
   if($re)
   {

        echo "<script>alert('Successfully Submited')</script>";
            ?>
                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=product.php">

            <?php
   }
   else
   {
      echo "<script>alert('Failed! Try Again')</script>";
            ?>
                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=product.php">

            <?php
   }
 
}

if(isset($_POST['reset']))
{
    ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=product.php">

        <?php
}


?>

<!DOCTYPE html>
<html>
	<head lang="zxx">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="styles_2.css">
		<link rel="stylesheet" href="styles.css">
	</head>
	<title> Product </title>
	<body>

		<form action="" method="post">			<!-- The POST attribute is used to save submitted data-->
			<fieldset>
				<legend><h1>প্রোডাক্ট </h1></legend>
				<p>
					<label> মালের বিবরণী </label>
					<input type = "prtclrs"
						   id = "misc"
						   name = "description"
						   value = "" />
				</p>

				<p>
					<label> প্রোডাক্টের পরিমাণ </label>
					<input type = "prtclrs"
						   id = "misc"
						   name = "product_weight"
						   value = "" />
				</p>

				<p>
					<label> ক্রয় মূল্য </label>
					<input type = "prtclrs"
						   id = "misc"
						   name = "buying_price"
						   value = "" />
				</p>
				
				<p>
					<label> ক্রয়ের তারিখ </label>
					<input type = "date"
						   id = "misc"
						   name = "buying_date"
						   value = "" />
				</p>
				
				<p>
					<label> বিক্রয় মূল্য </label>
					<input type = "prtclrs"
						   id = "misc"
						   name = "selling_price"
						   value = "" />
				</p>
				
				<input name="submit" type="submit" value="Submit" class ="submit">
				<input name="reset" type="reset" value="Reset" class ="reset">
				
			</fieldset>
		</form>
	</body>
</html>