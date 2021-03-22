<?php
include'DB_connect.php';
include'header.php';

$cust_id = "";
if(isset($_POST['submit']))
{
	$cust_id  = $_POST['cust_id'];
//echo "<script>window.location.href= 'memo_print.php'; </script>";

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
	<title> Sales </title>
	<body>
		<form action="memo_print.php" method="post">
			<!-- The POST attribute is used to save submitted data-->
			<fieldset>
				<legend><h1> মেমো </h1></legend>
				<p>
					
					<div class="row">
						<div class="col-md-12">
							<?php
							
							
							$conn = mysqli_select_db($connect,'mjbv');
							$data = mysqli_query($connect,"SELECT * FROM customer ORDER BY 'customer_id' desc ");
							while($row=mysqli_fetch_array($data))
							{
								$customer_id = $row['customer_id'];
							}
								
							?>
							<label> সন্ধান করুন</label>
							<input type="text" name="c_id" id="c_id" autocomplete="off" placeholder="কাষ্টমার নং - <?php echo $customer_id ?>" required="" value="<?php if(isset($_POST['select'])) { $c_id = $_POST['c_id']; echo $c_id;}?>"/>
							<br>
							<label> বিক্রয়ের তারিখ</label>
							<input type="date" name="sale_date" id="" autocomplete="off" value="" />
							<input name="select" type="submit" value="select" style="width: 100px; margin-left: 5%;">
							
						</div>
						
					</fieldset>
					
				</form>
			</body>
		</html>