!DOCTYPE html>
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
            
            
            
             ?>
                 
    </body>
    
    
    
    
</html>