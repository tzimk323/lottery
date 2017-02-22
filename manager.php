<!DOCTYPE html>
<html>
<head>
 <meta name="description" content="Lab3" charset="UTF-8"  >
   
   <meta name="description" content="Lab3" charset="UTF-8"  >
    <link rel="stylesheet" type="text/css" href="graphics.css" />
<title>  new lottery</title>
</head>

    
    <body>
        
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
  <?php 
        if( $_POST["action"]=='Δημιουργία νέας'){  ?>
<p>Create   new </p>
        
       <form action="mysql.php" method="post"> //form
          
           <p>name of lottery</p>
           <input type="text" name="lotaria">
           <p>team</p>
           <input type="text" name="team">
             <p>category</p>
           <input type="text" name="category">
           <p>Start time</p>
  <input type="datetime-local" name="Sdaytime">

               
               
               
           <p>End time</p>
           <input type="datetime-local" name="Edaytime">
 
           <p><input type="radio" name="status" value="A" checked="checked" />anonymous<br/>
<input type="radio" name="status" value="E" />Eponimous<br />
           <input type="radio" name="status" value="B" />All in<br />
           </p>
           
           <p>Visibility</p>
            <p><input type="radio" name="status2" value="yes" checked="checked" />Vissible<br/>
                <input type="radio" name="status2" value="no" />Hidden<br /></p>
           
              <p>PIN?</p>
            <p><input type="radio" name="status3" value="yes" checked="checked"  />with pin<br/></p>
          
            <p>  <input type="radio" name="status3" value="no" onchange="toggleDisabled(this.checked)" />without pin<br /></p>
         
           
           <p>ENTER PIN</p>
         <p>  <input type="text" id="che" name="pin" value="0"></p>
           
           <script>
function toggleDisabled(_checked) {
    document.getElementById('che').disabled = _checked ? true : false;
}
             
</script>
           
           
             <textarea id="description" class="text" cols="65" rows ="10" name="description">Write some description....</textarea>
           <input type="submit" value="That's it" class="submitButton">
        </form>
        EN
        
        
        
  
      
        
        
        <?php  }elseif($_POST["action"]=='Επεξεργασία υπάρχουσας') {   ?>
        <p> UPdate something</p>
        
        
    <p>Choose one of Pending lotteries </p>
     <?php
      $sql ="  SELECT * FROM lotteries WHERE Active='Yes'";
      $result = $conn->query($sql);
        if ($result->num_rows > 0) {
                   $x=0;
            while($row = $result->fetch_assoc()) {   //WHILEEEEEEE
        echo "name: " . $row["Name"].   "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Team: " . $row["team"]. "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp Category " . $row["category"]. " &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp End:" . $row["end"].
           " &nbsp &nbsp &nbsp &nbsp   Type:" . $row["type"]. 
             " &nbsp &nbsp &nbsp Visibility:" . $row["visibility"]. " &nbsp &nbsp &nbsp Pin:" . $row["pin"]. " &nbsp &nbsp &nbsp Active:" . $row["Active"]."<br>";     
     
        ?>
        <p></p>
        
    
        
        <form action="mysql.php"  method="post">
        
           
           <input type="text" name="name<?php echo htmlspecialchars($row["Name"]); ""?>" value="<?php echo htmlspecialchars($row["Name"]); ?>">
           <input type="text" name="team<?php echo htmlspecialchars($row["Name"]); ""?>" value="<?php echo htmlspecialchars($row["team"]); ?>">
           <input type="text" name="category<?php echo htmlspecialchars($row["Name"]); ""?>" value="<?php echo htmlspecialchars($row["category"]); ?>">

          
           <input type="datetime-local" name="Edaytime<?php echo htmlspecialchars($row["Name"]); ""?>" value="<?php echo htmlspecialchars($row["end"]); ?>" step="1">
 
            <select name="Type<?php echo htmlspecialchars($row["Name"]); ""?>">
              
                <?php if( $row["type"] == "A"): ?>
  <option value="A"   selected >Anonymous </option>
  <option value="E" >Eponimous</option>
  <option value="B" >Both</option>
             <?php elseif( $row["type"] == "E"): ?> 
                 <option value="A"  >Anonymous </option>
  <option value="E"  selected>Eponimous</option>
  <option value="B" >Both</option>
                  <?php else: ?>  
                 <option value="A"  >Anonymous </option>
  <option value="E"  >Eponimous</option>
  <option value="B"   selected>Both</option>
                 <?php endif; ?>

</select>
              <select name="Visibility<?php echo htmlspecialchars($row["Name"]); ?>">
                <?php if( $row["visibility"] == "yes"): ?>
  <option value="yes"   selected >yes </option>
  <option value="no" >no</option>

                  <?php else: ?>  
           <option value="yes"    >yes </option>
  <option value="no" selected >no</option>
                 <?php endif; ?>

</select>

              <select name="Pin<?php echo htmlspecialchars($row["Name"]); ?>">
                  <?php if( $row["pin"] == "0"): ?>
  <option value="no"   selected >yes </option>
  <option value="yes" >no</option>
      <?php else: ?>
                           <option value="yes"  selected  >yes </option>
           <option value="no"  >no</option>
         
                
          
              
            
                 <?php endif; ?>
                   
</select>
            <input type="text" id="che" name="Pin2<?php echo htmlspecialchars($row["Name"]); ?>" value="<?php echo htmlspecialchars($row["pin"]); ?>">
            <select name="Active<?php echo htmlspecialchars($row["Active"]); ?>">
                  <?php if( $row["Active"] == "Yes"): ?>
  <option value="Yes"   selected >yes </option>
  <option value="No" >no</option>
      <?php else: ?>
                           <option value="No"  selected  >yes </option>
           <option value="Yes"  >no</option>
         
                
          
              
            
                 <?php endif; ?>
                   
</select>
              
           
            
         
          <p></p> 
            
   <button type="submit" name="Update" value="<?php echo htmlspecialchars($row["Name"]); ?>" >Update</button>
                  <button type="submit" name="Delete" value="<?php echo htmlspecialchars($row["Name"]); ?>" >Delete</button>  
                    <button type="submit" name="Deactivate" value="<?php echo htmlspecialchars($row["Name"]); ?>" >Deactivate</button>
            <p></p>
        
        
         <?php     }
            
        } else {
    echo "0 results";
} 

    ?>
         </form>

        
   <?php } elseif($_POST["action"]=='Let it rol') {   ?>
        
        
        <p>Let it beggin</p>

        
        <form action="lottery.php"  method="post">
            <p>Choose the number of the successful</p>
            
            <input type="text" name="nluck"  >
             <p>Choose one of the active lotteries</p>
             
         <?php
         $sql ="  SELECT * FROM lotteries WHERE Active='Yes'";
      $result = $conn->query($sql);
        if ($result->num_rows > 0) { ?>
            <p><h2>Name:</h2></p>
        <?php
         while($row = $result->fetch_assoc()) {   //WHILEEEEEEE
            ?> <button type="submit" name="Begin" value="<?php echo htmlspecialchars($row["Name"]); ?>"> <?php echo htmlspecialchars($row["Name"]); ?>   </button>   
             
        
        <?php
            
         }
        }  ?>
        
            
            
        </form>
        
        
        
        
        
        
        
        <?php  }elseif($_POST["action"]=='Actives') {   ?>
        <p> PENDING</p>
        
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
    
    </b></h3> 
 
   <?php
        }    
   
         } else {
    echo "0 results";
} 
        
        ?>
        <?php  }elseif($_POST["action"]=='History') {   ?>
        <p>HISTORY</p>
        <?php } ?>
        
          
        
        <form action="teacher.html" >
           <input type="submit" name="cancel" value="Cancel"/>
        
        
        </form>
        
        <?php
        $conn->close();
?>
        
    </body>
    
    
</html>