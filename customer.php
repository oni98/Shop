<?php

include'DB_connect.php';
include'header.php';

$name = $address = $mobile = "";

if(isset($_POST['submit']))
{
    $name  = $_POST['name'];
    $address  = $_POST['address'];
    $mobile  = $_POST['mobile'];
    

    $insertQuery = "INSERT INTO `customer`(`name`,`address`,`mobile`) 
           VALUES('$name','$address','$mobile')";
           $re = mysqli_query($connect,$insertQuery);
   
   if($re)
   {

        echo "<script>alert('Successfully Submited')</script>";
            ?>
                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=customer.php">

            <?php
   }
   else
   {
      echo "<script>alert('Failed! Try Again')</script>";
            ?>
                <META HTTP-EQUIV="Refresh" CONTENT="0; URL=customer.php">

            <?php
   }
 
}

if(isset($_POST['reset']))
{
    ?>
        <META HTTP-EQUIV="Refresh" CONTENT="0; URL=customer.php">

        <?php
}


?>


<!DOCTYPE html>
<html>
	<head lang="zxx">
		<meta charset="UTF-8">
		<link rel="stylesheet" href="styles_2.css">
	</head>
	<title>কাষ্টমার </title>
	<body>
		<div>
		<form action="" method="post">			<!-- The POST attribute is used to save submitted data-->
			<fieldset >
				<legend><h1> কাষ্টমার </h1></legend>
				<p>
					<label> কাষ্টমারের নাম </label>
					<input type = "prtclrs"
						   id = "misc"
						   name = "name"
						   value = "" />
				</p>
				<p>
					<label> ঠিকানা</label>
					<input type = "prtclrs"
						   id = "misc"
						   name = "address"
						   value = "" />
				</p>
				
				<p>
					<label> ফোন </label>
					<input type = "prtclrs"
						   id = "misc"
						   name = "mobile"
						   value = "" />
				</p>
				
				<input name="submit" type="submit" value="Submit" class ="submit" >
				<input name="reset" type="reset" value="Reset" class="reset">
				
			</fieldset>
		</form>
		</div>
	</body>
</html>