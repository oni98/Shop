<?php
include'DB_connect.php';
include'header.php';

$sql = "SELECT * FROM product ORDER BY product_code asc";
$result = mysqli_query($connect,$sql);
?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>প্রোডাক্ট</title>
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
            <br><br><br>
            <div class="data">
                <b>প্রোডাক্ট তালিকা</b><br>
            </div>
           
            <div >
                <form method="post" action="">
                    
                    <table class="table table-striped table-bordered table-hover">
                        <tr class="active edit">
                            <th>নং</th>
                            <th>প্রোডাক্ট কোড</th>
                            <th>মালের বিবরণী </th>
                            <th>প্রোডাক্টের পরিমাণ </th>
                            <th>ক্রয় মূল্য</th>
                            <th>ক্রয়ের তারিখ</th>
                            <th>বিক্রয়ের মূল্য </th>
                        </tr>
                        <?php
                        $j=0;
						$total = 0;
                        if(mysqli_num_rows($result) > 0)
                        {
                        while ($row=mysqli_fetch_array($result))
                        {  $j++;
                        ?>
                        <tr>
                            <td><?= $j ?></td>
                            <td><?php echo $row["product_code"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td><?php echo Converter::en2bn($row["product_weight"]) ?></td>
                            <td><?php echo Converter::en2bn($row["buying_price"]) ?></td>
                            <td><?php echo Converter::en2bn($row["buying_date"]) ?></td>
                            <td><?php echo Converter::en2bn($row["selling_price"]) ?></td>
							<?php 
							$total += $row["product_weight"];
							?>
                        </tr>
						<?php
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>সর্বমোট =</td>
                            <td><?php echo Converter::en2bn($total); ?></td>
							<td></td>
							<td></td>
							<td></td>
                        </tr>
                        
                        
                    </table>
                </form>
            </div>
            <br>
            <br>
			<?php
            }
            else
            {
            echo "No record Found";
            }
            ?>
        </div>
    </body>
    </html>