<?php include'DB_connect.php';
$user_name = $_POST["name"];  
$user_pass = $_POST["email"]; 
$sql = "update user_info set email='".$user_pass."' where name='".$user_name."';";  
if(mysqli_query($connect,$sql))  
{  
    echo "Data updated successfully!";  
}  
else   
{  
    echo "some error occured!";  
}  
mysqli_close($con);  
?>
