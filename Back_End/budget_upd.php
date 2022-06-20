<!DOCTYPE html>
<html>
<body>
<style>
.registerbtn {
  /*font-size:130%;
  color: white;
  padding: 16px 20px;
  margin-left: 10% ;
  border: none;
  cursor: pointer;
  width: 10%;
  opacity: 0.9;*/

  background-color: darkblue;
  border-radius: 5px;
  -webkit-border-radius: 5px;
  padding: 4px 14px;
  height:34px;
  width:320px;
  cursor: pointer;
  font-size: 1em;
  border: 1px solid #b5b5b5;
  text-transform:uppercase;
  color:white;
  font-weight:bold;
}

.registerbtn:hover {
  opacity:1;
}
</style>
	<center>
    <?php
		
    $SnoErr = "";   
    $quarErr = ""; 
    $amtErr = "";  
    $yearErr = ""; 
    $headErr = "";  
  
   
    $sno = "";
    	$head = "";
	$quarter = "";
	$amount = "";
	$year = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
      if (empty($_POST["sno"])) {  
        $SnoErr = "Sno Field is required";  
      } else {  
       
        $sno = test_input($_POST["sno"]);  
      }
       if (empty($_POST["head"])) {  
        $headErr = "Head Field is required";  
      } else {  
       
        $head = test_input($_POST["head"]);  
      }
      if (empty($_POST["quarter_no"])) {  
        $quarErr = "Quarter_no Field is required!";  
      } 
      else
      {
      $quarter = test_input($_POST["quarter_no"]);   
      }
      if (empty($_POST["amount"])) {  
        $amtErr = "Amount Field is required";  
      } 
      else
      {
      $amount = test_input($_POST["amount"]); 
  
      }
      if (empty($_POST["year"])) {  
        $yearErr = "Year Field is required";  
      } 
      else
      {
      $year = test_input($_POST["year"]);  
      }
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
   
    echo nl2br("\n$SnoErr\n $headErr\n $quarErr\n $amtErr\n $yearErr\n");
 
		
		if($SnoErr == "" && $headErr == "" && $quarErr == "" && $amtErr == "" && $yearErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		$sno = $_REQUEST['sno'];
		$head = $_REQUEST['head'];
                $quarter = $_REQUEST['quarter_no'];
		$amount = $_REQUEST['amount'];
		$year = $_REQUEST['year'];
		

		
		// Performing insert query execution
		// here our table name is college
		
		$sql = "UPDATE budget_allotment SET Year = '$year', Quarter= '$quarter', Head= '$head',Amount ='$amount' WHERE Sno = '$sno'";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Record updated successfully!</h3>";
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);}
		?>
		<form action="data.php" method="POST">
		<input type="submit" value="Redirect to Dashboard" class="registerbtn"/>
		</form>
	</center>
</body>

</html>
