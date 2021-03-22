<?php
include'DB_connect.php';
include'header.php';

if (isset($_POST['search2'])) 
{
    $search = $_POST['search'];
    $search_date = $_POST['search_date'];
    $search_date2 = $_POST['search_date2'];

    $sql = "SELECT * FROM(( sales INNER JOIN customer ON sales.customer_id = customer.customer_id) INNER JOIN product ON sales.product_code = product.product_code) WHERE description = '$search'";
    $result = mysqli_query($connect,$sql);
}

elseif (isset($_POST['searchDate'])) 
{
    $search = $_POST['search'];
    $search_date = $_POST['search_date'];
    $search_date2 = $_POST['search_date2'];

    $sql = "SELECT * FROM(( sales INNER JOIN customer ON sales.customer_id = customer.customer_id) INNER JOIN product ON sales.product_code = product.product_code) WHERE sale_date BETWEEN '$search_date' AND '$search_date2'";
    $result = mysqli_query($connect,$sql);
}

else
{
    $sql = "SELECT * FROM(( sales INNER JOIN customer ON sales.customer_id = customer.customer_id) INNER JOIN product ON sales.product_code = product.product_code) ORDER BY sales_id asc";
    $result = mysqli_query($connect,$sql);

}


?>
<!DOCTYPE html>
<html lang="zxx">
    <head>
        <title>Sales</title>
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
             <br><br>
                <b>বিক্রয় তালিকা</b><br>
            </div>
            <br>
            <div >
                <form method="post" action="">
                    <input type="text" name="search"  placeholder="মালের বিবরণী">
                    <button type="submit" name="search2">খুঁজুন</button>

                    <input type="date" name="search_date" class="searchDate"> থেকে
                    <input type="date" name="search_date2" class="searchDate"> পর্যন্ত
                    <button type="submit" name="searchDate">খুঁজুন</button>
                    <br><br>
                    <table class="table table-striped table-bordered table-hover">
                        <tr class="active edit">
                            <th>নং</th>
                            <th>কাষ্টমারের নাম</th>
                            <th>মালের বিবরণী </th>
                            <th>বিক্রয়ের তারিখ</th>
                            <th>ক্রয় মূল্য</th>
                            <th>বিক্রয় মূল্য</th>
                            <th>বিক্রিত মালের পরিমাণ</th>
                            <th>লাভ</th>
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
                            <td><?= Converter::en2bn($j) ?></td>
                            <td><?php echo $row["name"] ?></td>
                            <td><?php echo $row["description"] ?></td>
                            <td><?php echo Converter::en2bn($row["sale_date"]) ?></td>
                            <td><?php echo Converter::en2bn($row["buying_price"]) ?></td>
                            <td><?php echo Converter::en2bn($row["selling_price"])  ?></td>
                            <td><?php echo Converter::en2bn($row["product_weight"]) ?></td>
                            <?php 
							$profit = (($row["selling_price"]) * ($row["product_weight"])) - (($row["buying_price"]) * ($row["product_weight"])); 
							$total += $profit
							?>
                            <td><?php echo Converter::en2bn($profit); ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>সর্বমোট =</td>
                            <td><?php echo Converter::en2bn($total); ?></td>
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