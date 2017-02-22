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
        
        
        
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
       
       if( isset($_POST['Join']) ){
         $which= $_POST['Join'];
       
        $sql ="  SELECT * FROM lotteries WHERE Name='$which'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
      
        
        
        if($row["pin"]!=0){
            echo "PIN REQUIRED";
            
  
    ?>
        
    <form action="pass.php" method="Post">
User name:<br>
Pin:<br>
<input type="password" name="psw">
        <input type="hidden" name="which" value="<?php echo htmlspecialchars($_POST['Join']); ?>">
</form>

        <?php
            
        }//pin
    
       } elseif(isset($_POST['Anonymous'])){ 
           $which= $_POST['Anonymous'];
       
        $sql ="  SELECT * FROM lotteries WHERE Name='$which'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc() ;  
         if($row["pin"]!=0){
            echo "PIN REQUIRED";
        ?>
            
    <form action="pass.php" method="Post">
User name:<br>
Pin:<br>
<input type="password" name="psw">
        <input type="hidden" name="which" value="<?php echo htmlspecialchars($_POST['Anonymous']); ?>">
        <input type="hidden" name="which2" value="<?php echo htmlspecialchars($_POST['Anonymous']); ?>">
</form>
            
  
        
        
        <?php
         }
       }else{
        if( (isset($_POST['true']) && $_POST['true'] == "Granted" ) || $row["pin"]==0):
        
        echo "well done my friend";
           endif;
        
        
        if(isset($_POST['true2'])&& $_POST['true2'] == "Granted")  :

        
             ?>
        <form action="mysql.php" method="Post">
            <p>Εισάγωγη Ονόματος</p>
            <input type="text" name="onoma" value="Somename">
             <p>Εισάγωγη Surname</p>
             <input type="text" name="eponimo" value="Surename">
            <p>Εισάγωγη ΑΜ</p>
           <input type="text" name="am" value="2323431">
            
            <p>Εισάγωγη Email</p>
           <input type="text" name="email" value="lucky@luckyday.com">
           <button type="submit" name="ajoin" value="<?php echo htmlspecialchars($_POST['anon']); ?>" >Submit</button>
            
            
            
            
            
        </form>
             
             <?php endif;
       }
        ?>
                 
    </body>
    
    
    
    
</html>