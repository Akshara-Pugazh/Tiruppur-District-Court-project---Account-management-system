<!DOCTYPE html>
<html>
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
</style>
<body>
	<center>
    <?php
		
    $sancamtErr = "";   
    $sancdateErr = ""; 
    $sancorderErr = "";  
    $sancborErr = ""; 
   
   
    $sanction_amount = "";
    $sanction_order = "";
    $sanction_date = "";
    $sanction_borrower = "";
	
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
      if (empty($_POST["sanction_amount"])) {  
        $sancamtErr = "Sanction amount is required";  
      } else {  
       
        $sanction_amount = test_input($_POST["sanction_amount"]);  
      }
       if (empty($_POST["sanction_date"])) {  
        $sancdateErr = "Sanction date is required";  
      } else {  
       
        $sanction_date = test_input($_POST["sanction_date"]);  
      }
      if (empty($_POST["sanction_order"])) {  
        $sancorderErr = "Sanction order is required!";  
      } 
      else
      {
      $sanction_order = test_input($_POST["sanction_order"]);   
      }
      if (empty($_POST["sanction_borrower"])) {  
        $sancborErr = "Sanction borrower is required";  
      } 
      else
      {
      $sanction_borrower = test_input($_POST["sanction_borrower"]); 
  
      }
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    
    echo nl2br("\n$sancamtErr\n $sancdateErr\n $sancorderErr\n $sancborErr\n");
    

		if($sancamtErr == "" && $sancdateErr == "" && $sancorderErr == "" && $sancborErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		$sanction_amount = $_REQUEST['sanction_amount'];
		$sanction_date = $_REQUEST['sanction_date'];
                $sanction_order = $_REQUEST['sanction_order'];
		$sanction_borrower = $_REQUEST['sanction_borrower'];
		
		

		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO load_sanction (sanction_amount,sanction_date,sanction_order,sanction_borrower) VALUES ('$sanction_amount','$sanction_date','$sanction_order','$sanction_borrower')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Data has been added successfully!</h3>";
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
