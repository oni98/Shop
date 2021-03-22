<?php include'DB_connect.php';
$user_name = $_POST["name"];  
$user_pass = $_POST["email"]; 
$sql = "select email from user_info where name='".$user_name."';";  
$result = $con->query($sql);
if(mysqli_query($connect,$sql))  
{  
    if ($result->num_rows > 0) {
			echo "email:\n";
    while($row = $result->fetch_assoc()) {
			echo "".$row["email"]. "\n";
    }
} else {
    echo "0 results";
}  
}  
else   
{  
    echo "some error occured";  
}  
mysqli_close($con);  
?>
