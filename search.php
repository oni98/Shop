<?php  
include'DB_connect.php';
 if(isset($_POST["query"]))  
 {  
      $output = '';  
      $query = "SELECT * FROM product WHERE description LIKE '%".$_POST["query"]."%'";  
      $result = mysqli_query($connect, $query);  
      $output = '<ul class="list-unstyled">';  
      if(mysqli_num_rows($result) > 0)  
      {  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '<li>'.$row["description"].'</li>';  
           }  
      }  
      else  
      {  
           $output .= '<li>Name Not Found</li>'; 
           
      }  
      $output .= '</ul>';  
      echo $output;  
 }  
 ?>  