<?php

include'DB_connect.php';
include'header.php';

$customer_id = $product_code = $sell_date = $name = "";

$i=0;
if(isset($_POST['submit']))
{

	$customer_id  = $_POST['customer_id'];
	$product_code  = $_POST['product_code'];
    $sell_date = $_POST['sale_date'];
	
	$insertQuery = "INSERT INTO `sales`(`customer_id`,`product_code`,`sale_date`)
	VALUES('$customer_id','$product_code','$sell_date')";
	$re = mysqli_query($connect,$insertQuery);

	if($re)
	{
		echo "<script>alert('Successfully Submited')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=sales.php">
		<?php
	}
	else
	{
		echo "<script>alert('Failed! Try Again')</script>";
		?>
		<META HTTP-EQUIV="Refresh" CONTENT="0; URL=sales.php">
		<?php
	}
}
if(isset($_POST['reset']))
{
	?>
	<META HTTP-EQUIV="Refresh" CONTENT="0; URL=sales.php">
	<?php
}
?>
<!DOCTYPE html>
<html lang="zxx">
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="styles_2.css">

		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<link rel="stylesheet" href="css/flaticon.css"/>
		<link rel="stylesheet" href="css/owl.carousel.css"/>
		<link rel="stylesheet" href="css/style.css"/>
		<link rel="stylesheet" href="css/animate.css"/>
		<!-- Stylesheets -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	</head>
	<title>বিক্রয়</title>
	<body>
		<form action="" method="post">
			<!-- The POST attribute is used to save submitted data-->
			<fieldset>
				<legend><h1> বিক্রয় </h1></legend>
				<p>
					<div class="row">
						<div class="col-md-12">

						<?php
							include'DB_connect.php';
							$data = mysqli_query($connect,"SELECT * FROM customer ORDER BY 'customer_id' desc ");
							while($row=mysqli_fetch_array($data))
							{
								$customer_id = $row['customer_id'];
							}

						?>
						
						<div class="col-md-6">
							<label> সন্ধান করুন</label>
							<input 	type="text" 
									name="description" 
									id="description" 
									autocomplete="off" 
									placeholder="মালের বিবরণী" />
							
						</div>
						
						<div id="productList" class="productList"></div>
						
						<div class="col-md-6">
							<label> কাষ্টমার নং</label>
							<input type="text" 
							name="customer_id"
							id="customer_id"  
							autocomplete="off" 
							placeholder='কাষ্টমার নং- <?php echo $customer_id ?>'/>
						</div>

						<input name="select" type="submit" value="select" style="width: 100px; margin-left: 5%;">
															
					</div>
						
						<?php
						if(isset($_POST['select']))
						{
						$description  = $_POST['description'];
						
							include'DB_connect.php';
							$data = mysqli_query($connect,"SELECT * FROM product WHERE description = '$description'");
							while($row=mysqli_fetch_array($data))
							{
								$product_code = $row['product_code'];
								$product_weight = $row['product_weight'];
								$buying_price = $row['buying_price'];
								$buying_date = $row['buying_date'];
								$selling_price = $row['selling_price'];
							}
						
						?>
						<br>
						<br>
						<br>
						<div class="col-md-6">
							<label> কাষ্টমার নং</label>
							<input type="text" 
							name="customer_id"
							id="customer_id"  
							autocomplete="off" 
							value='<?php echo $customer_id ?>' readonly/>
						</div>
						
						<div class="col-md-6">
							<label>মালের বিবরণী </label>
							<input type="text" 
							name="des" 
							id="" 
							autocomplete="on" 
							value='<?php echo   $description ?>'  readonly/>
						</div>
					
						<div class="col-md-6">
							<label>প্রোডাক্ট কোড</label>
							<input type="text" 
							name="product_code" 
							id="" 
							autocomplete="on" 
							value='<?php echo   $product_code ?>' readonly/>
						</div>
					
						<div class="col-md-6">
							<label>বিক্রয় মূল্য </label>
							<input type="text" 
							name="selling_price" 
							id="" 
							autocomplete="off" 
							value='<?php echo   $selling_price ?>' readonly/>
						</div>
						
						<div class="col-md-6">
							<label> বিক্রয়ের তারিখ</label>
							<input type="date" 
							name="sale_date" 
							id="" 
							autocomplete="off" 
							value="" />
						</div>				
						
						<?php
							$customer_id = $_POST['customer_id'];

							include'DB_connect.php';
							$data = mysqli_query($connect,"SELECT name FROM customer WHERE customer_id = '$customer_id'");
							while($row=mysqli_fetch_array($data))
							{
								$name = $row['name'];
								
							}
						?>
						
					<?php 
					} 
					?>
						
						
					</div>
					
					<input name="submit" type="submit" value="Submit" class ="submit" style="margin-left: 0%;">
					<input name="reset" type="reset" value="Reset" class ="reset">
						
			</fieldset>				
			</form>
		</body>
	</html>
			<script>
			$(document).ready(function(){
			$('#description').keyup(function(){
			var query = $(this).val();
			if(query != '')
			{
			$.ajax({
			url:"search.php",
			method:"POST",
			data:{query:query},
			success:function(data)
			{
			$('#productList').fadeIn();
			$('#productList').html(data);
			}
			});
			}
			});
			$(document).on('click', 'li', function(){
			$('#description').val($(this).text());
			$('#productList').fadeOut();
			});
			});
			</script>