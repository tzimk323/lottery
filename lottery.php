<!DOCTYPE html>
<html>
<head>
 <meta name="description" content="Lab3" charset="UTF-8"  >
   
   <meta name="description" content="Lab3" charset="UTF-8"  >
    <link rel="stylesheet" type="text/css" href="graphics.css" />
<title>  new lottery</title>
</head>

    
    <body>
        
        <?php
        $servername = "localhost";
$username = "jim";
$password = "1234";
$dbname = "lottery";
        
        
        
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
            
         $number =$_POST['nluck'] ; 
          $lottery =$_POST['Begin'];
        

       
        $sql ="  SELECT * FROM lotteries WHERE Name='$lottery'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
        $id=$row['id'];
       
        
         $sql ="  SELECT * FROM draw1 WHERE l_id='$id'";
    $result = $conn->query($sql);
     $x=0;
        while($row = $result->fetch_assoc()) {
       $x++;  
     }
        echo $x;
       
        
     while($number>0) {
$sql ="  SELECT * FROM draw1 WHERE l_id='$id'";
    $result = $conn->query($sql);
$y=mt_rand(1,$x);
         
         $k=1;
          
          while($row = $result->fetch_assoc()) {
              
        if ($k==$y){
            
              echo $row['Name'];
        }
              $k++;
          }
         
         $number--;
     }
        
        
    
            ?>
        
        
            
            
                             
    </body>
    
    
    
    
</html>