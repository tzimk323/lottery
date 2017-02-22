<!DOCTYPE HTML>
<html>

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
    <?php  if( isset($_POST['lotaria']) ):  ?>
    <?php
    $sql = "INSERT INTO lotteries (Name, team, category,start,end,type,visibility,pin,Active)
VALUES ( '".$_POST['lotaria']."', '".$_POST['team']."','".$_POST['category']."','".$_POST['Sdaytime']."','".$_POST['Edaytime']."','".$_POST['status']."','".$_POST['status2']."','".$_POST['pin']."','Yes')";
    
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


         echo $_POST["lotaria"];
      echo $_POST["team"];
      echo $_POST["category"];
  //   echo $_POST["stime"];
     // echo $_POST["endtime"];
     if(  $_POST["status"]=='yes'){
echo 'ANONYMOUS';
     }elseif(  $_POST["status"]=='no'){

     echo 'eponimous';
     }else{
 echo 'both';
}
    
    ?>

    <?php  elseif( isset($_POST['Delete']) ):   //update//////////////
    $which=$_POST['Delete'];
   

    
    $name="name".$which. "";
    $pame=$_POST["name".$which.""];

 
  
    
       $sql = "DELETE FROM lotteries WHERE Name='$which'";

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
  
    ?>
   <?php  elseif( isset($_POST['Deactivate']) ): 
    $which=$_POST['Deactivate'];
 $name="name".$which. "";
    $pame=$_POST["name".$which.""];
     
$sql = "UPDATE lotteries SET Active='No' WHERE Name='$which'";
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
    $sql = "UPDATE lotteries SET end='0' WHERE Name='$which'";
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}
    ?>
    
    
    
    
    
    
    <?php  elseif( isset($_POST['Update']) ): 
    $which=$_POST['Update'];
   $name=$_POST["name".$which.""];
    echo $which;
   $team=$_POST["team".$which.""];
    echo $team;
    $category=$_POST['category'.$which.""];
    $endt=$_POST['Edaytime'.$which.""];
    $type=$_POST['Type'.$which.""];
    $visibility=$_POST['Visibility'.$which.""];
    $pin=$_POST['Pin2mj'.$which.""];
    
    $sql ="  SELECT * FROM lotteries WHERE Name='$which'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    
     if($row["Name"]!='$name')  {
         
    echo $row["Name"];
            echo $name ;
   
         $sql = "UPDATE lotteries SET Name='$name' WHERE Name='".$row['Name']."' ";
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
     }
    
      if($row["team"]!='$team')  {
         
  
   
         $sql = "UPDATE lotteries SET team='$team' WHERE team='".$row['team']."' and  Name='".$name."' " ;
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
     }
    
    if($row["category"]!='$category')  {
         
  
   
         $sql = "UPDATE lotteries SET category='$category' WHERE category='".$row['category']."' and  Name='".$name."' " ;
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
     }
    
    
    if($row["end"]!='$endt' && $endt !=0)  {
         
  
   
         $sql = "UPDATE lotteries SET end='$endt' WHERE end='".$row['end']."' and  Name='".$name."' " ;
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
     }

     if($row["type"]!='$type' )  {
         
  
   
         $sql = "UPDATE lotteries SET type='$type' WHERE type='".$row['type']."' and  Name='".$name."' " ;
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
     }
    
     if($row["visibility"]!='$visibility' )  {
         
  
   
         $sql = "UPDATE lotteries SET visibility='$visibility' WHERE visibility='".$row['visibility']."' and  Name='".$name."' " ;
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
     }
    
    
     
     if($row["pin"]!='$pin' )  {
         
  
   
         $sql = "UPDATE lotteries SET pin='$pin' WHERE pin='".$row['pin']."' and  Name='".$name."' " ;
    if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
} 
     }
    

    ?>
    
     <?php  elseif( isset($_POST['ajoin']) ): 
    
     
  $sql ="  SELECT * FROM lotteries WHERE Name='".$_POST['ajoin']."'";
      $result = $conn->query($sql);
     $row = $result->fetch_assoc();
   
    if ($result->num_rows > 0) {
        
    }else{
         echo "0 results";
    }
      
    $id=$row["id"];
    echo $id;

$name=$_POST['onoma'];
    $eponimo=$_POST['eponimo'];
    $email=$_POST['email'];
    $am=$_POST['am'];
    $sql =" INSERT INTO draw1 (Name,Surname,email,am,l_id) VALUES
    ( '$name',  '$eponimo','$email','$am' ,   (SELECT id from lotteries WHERE id='$id') )";
   
 
    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    

    
    

?>


        
    <?php endif; ?>
    
</html>