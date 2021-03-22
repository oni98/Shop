<?php include'DB_connect.php'; 
$user_name = $_POST["name"];  
$user_pass = $_POST["email"];  
$sql = "insert into user_info values('".$user_name."','".$user_pass."');";  
if(mysqli_query($connect,$sql))  
{  
    echo "Data inserted successfully!";  
}  
else   
{  
    echo "some error occured!";  
}  
mysqli_close($con);  
?>
