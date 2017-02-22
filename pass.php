<!DOCTYPE html>
<html>
<head>
 <meta name="description" content="Lab3" charset="UTF-8"  >
   
   <meta name="description" content="Lab3" charset="UTF-8"  >
    <link rel="stylesheet" type="text/css" href="graphics.css" />
<title>  new lottery</title>
</head>

    
    <body>
        <form name="this"action="join.php" method="Post">
        <?php
        $servername = "localhost";
$username = "jim";
$password = "1234";
$dbname = "lottery";
        
        
        
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
        $which=$_POST['which'];
        
        if( isset($_POST['psw']) ){
        $sql ="  SELECT * FROM lotteries WHERE Name='$which'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
        if($row["pin"]==$_POST['psw']):
echo "Access Granted";
             

?>
           <?php if( isset($_POST['which2']) ){
                 
                 ?>
  <input type="hidden" name="true2" value="Granted">
        <?php     } ?>
        <input type="hidden" name="true" value="Granted">
           <button type="submit" name="anon" value="<?php echo htmlspecialchars($_POST['which']); ?>" >Submit</button>
           
  <script>
document.getElementById('this').submit();

</script>     
            <?php
        else:
        echo "Access denied";
endif;
        }
        
        
        
        ?>
             </form>
       </body>
    
    
    
    
</html>