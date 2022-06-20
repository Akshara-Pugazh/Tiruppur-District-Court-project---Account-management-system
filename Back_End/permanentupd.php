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
	$pidErr = ""; 	
    $paamtErr = "";   
    $paloanErr = ""; 
    $empErr = "";  
     $moninstallmentErr = "";  
     $mon_installment = "";
    	$pa_amount = "";
	$pa_loan = "";
	$empid = "";
	
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      if (empty($_POST["pid"])) {  
        $pidErr = "Pid field is required!";  
      } 
      else
      {
      $pid = test_input($_POST["pid"]);   
      }
      if (empty($_POST["pa_loan"])) {  
        $paloanErr = "PA loan field is required";  
      } else {  
       
        $pa_loan = test_input($_POST["pa_loan"]);  
      }
       if (empty($_POST["pa_amount"])) {  
        $paamtErr = "PA amount field is required";  
      } else {  
       
        $pa_amount = test_input($_POST["pa_amount"]);  
      }
      if (empty($_POST["empid"])) {  
        $empErr = "Employee id field is required!";  
      } 
      else
      {
      $emp_id = test_input($_POST["empid"]);   
      }
      if (empty($_POST["mon_installment"])) {  
        $moninstallmentErr = "Monthly installment field is required";  
      } 
      else
      {
      $mon_installment = test_input($_POST["mon_installment"]); 
  
      }
      }
      
      
      
      function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    

    echo nl2br("\n$paloanErr\n $paamtErr\n $monintallmentErr\n $empErr\n $pidErr\n");
   
		
		if($paloanErr == "" && $paamtErr == "" && $moninstallmentErr == "" && $empErr == "" && $pidErr==""){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		$pid = $_REQUEST['pid'];
		$pa_amount = $_REQUEST['pa_amount'];
		$pa_loan = $_REQUEST['pa_loan'];
                $mon_installment = $_REQUEST['mon_installment'];
		$empid = $_REQUEST['empid'];
		

		
		// Performing insert query execution
		// here our table name is college
		$sql = "UPDATE permanent_advance SET pa_amount = '$pa_amount',pa_loan = '$pa_loan',mon_installment = '$mon_installment',empid='$empid' WHERE pid = '$pid'";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Record updated successfully!</h3>";
		} 
		else{
			echo "ERROR: Hush! Sorry the record doesn't exist or the values are invalid! Could not able to execute $sql. " 
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
		
