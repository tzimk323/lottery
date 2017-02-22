<!DOCTYPE html>
<html>
<head>
 <meta name="description" content="Lab3" charset="UTF-8"  >
   
   <meta name="description" content="Lab3" charset="UTF-8"  >
    <link rel="stylesheet" type="text/css" href="graphics.css" />
<title>  new lottery</title>
</head>

    
    <body>
    <h1> Καλως ήρθες στο i-lottery</h1>         
        <p> <h2>Οι τρέχουσες κληρώσεις είναι:</h2> </p>
          <?php   $servername = "localhost";
$username = "jim";
$password = "1234";
$dbname = "lottery";
        
        
        
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
    ?>
<b><h3>
     <form action="join.php" method="post">
    <?php
         $sql ="  SELECT * FROM lotteries WHERE Active='Yes'";
      $result = $conn->query($sql);
        if ($result->num_rows > 0) { ?>

    <h3>Name: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Team: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Category  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  Remaining time &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Type</h3>
<?php
                 $code='N0';
            while($row = $result->fetch_assoc()) {   //WHILEEEEEEE
                if($row["pin"]!=0){ 
            $code="Yes";
            }
        echo " " . $row["Name"].   "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  " . $row["team"]. "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  " . $row["category"]. " &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp End:" . $row["end"].
           " \t  \t \t " . $row["type"]." &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Pin:"    .$code.
           

            "<br>";     
  
         ?>
        
        <button type="submit" name="Join" value="<?php echo htmlspecialchars($row["Name"]); ?>" >Join</button>
                  <button type="submit" name="Info" value="<?php echo htmlspecialchars($row["Name"]); ?>" >Πληροφορίες</button> 
               <?php      if($row["type"]=="A" ||$row["type"]=="B" ){
             ?>
             <button type="submit" name="Anonymous" value="<?php echo htmlspecialchars($row["Name"]); ?>" >Ανώνυμη Συμμετοχή</button> 
           <?php }
 ?>

       
    
    </b></h3> 
 
   <?php
        }    
   
         } else {
    echo "0 results";
} 
        
        $conn->close();
    ?>
    </form>
  
            
    </body>
    
    
    
    
</html>