<?php
include'DB_connect.php';
include'header.php';

$sale_date = $_POST['sale_date'];
$cust_id  = $_POST['c_id'];
$sql = "SELECT * FROM(( sales INNER JOIN customer ON sales.customer_id = customer.customer_id) INNER JOIN product ON sales.product_code = product.product_code) WHERE sales.customer_id = '$cust_id'";
$result = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>INVOICE</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- FontAwesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- ElegantFonts CSS -->
        <link rel="stylesheet" href="css/elegant-fonts.css">
        <!-- themify-icons CSS -->
        <link rel="stylesheet" href="css/themify-icons.css">
        <!-- Swiper CSS -->
        <link rel="stylesheet" href="css/swiper.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="styles_2.css">
    </head>
    <body>
        <br>
        
        <div class="container">
            <div class="data">
                 
                <b>মেমো </b>
            </div>
            <form class="contact-form" method="post" action="">
                <div class="row" id="customer">

                    <?php
                    
                    if(mysqli_num_rows($result) > 0)
                    {
                    $row=mysqli_fetch_array($result)
                     
                    ?>   

                    <div class="col-md-6">
                        <label> কাষ্টমারের নংঃ </label>
                        <input type = "prtclrs" id = "misc" name = "name" value = "<?php echo $row["customer_id"]?>" readonly/>
                    </div>
                    <div class="col-md-6">
                        <label> কাষ্টমারের নামঃ </label>
                        <input type = "prtclrs" id = "misc" name = "name" value = "<?php echo $row["name"] ?>" readonly/>
                    </div>
                    <div class="col-md-6">
                        <label> ঠিকানাঃ </label>
                        <input type = "prtclrs" id = "misc" name = "name" value = "<?php echo $row["address"] ?>" readonly/>
                    </div>
                    <div class="col-md-6">
                        <label> ফোনঃ </label>
                        <input type = "prtclrs" id = "misc" name = "name" value = "<?php echo $row["mobile"] ?>" readonly/>
                    </div>
					<div class="col-md-6">
                        <label> বিক্রয়ের তারিখ </label>
                        <input type = "prtclrs" id = "misc" name = "name" value = "<?php echo Converter::en2bn($sale_date) ?>" readonly/>
                    </div>
                    <?php
                        }
                        else
                        {
                        echo "No record Found";
                        }
                    ?>
                </div>
            </form>
        </div>
