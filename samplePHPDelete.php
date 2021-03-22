<?php include'DB_connect.php';
$user_name = $_POST["name"];  
$user_pass = $_POST["email"]; 
$sql = "delete from user_info where name='".$user_name."';";  
if(mysqli_query($connect,$sql))  
{  
    echo "Data deleted successfully!";  
}  
else   
{  
    echo "some error occured!";  
}  
mysqli_close($con);  
?>
