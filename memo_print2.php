<?php
include'DB_connect.php';
$cust_id  = $_POST['c_id'];
$sale_date = $_POST['sale_date'];
$sql = "SELECT * FROM(( sales INNER JOIN customer ON sales.customer_id = customer.customer_id) INNER JOIN product ON sales.product_code = product.product_code) WHERE sales.customer_id = '$cust_id' AND sale_date ='$sale_date'";
$result = mysqli_query($connect,$sql);
?>    
        <div class="container">
            <div >
                <form method="post" action="">
                    
                    <table class="table table-striped table-bordered table-hover">
                        <tr class="active edit">
                            <th>নং</th>
                            <th>প্রোডাক্টের বিবরণী </th>
                            <th>প্রোডাক্টের পরিমাণ </th>
                            <th>প্রোডাক্টের মূল্য</th>
                            <th>বিক্রয় মূল্য </th>
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
                            <td><?php echo Converter::en2bn($row["description"]) ?></td>
                            <td><?php echo Converter::en2bn($row["product_weight"]) ?></td>
                            <td><?php echo Converter::en2bn($row["selling_price"]) ?></td>
                            <?php $amount = ($row["product_weight"]) * ($row["selling_price"]); ?>
                            <td><?php echo Converter::en2bn($amount) ?></td>
                        <?php 
							$total += $amount;
							?>
                        </tr>
						<?php
                        }
                        ?>
                        <tr>
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