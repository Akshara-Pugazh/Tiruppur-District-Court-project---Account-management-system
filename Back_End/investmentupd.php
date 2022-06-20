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
		
     
    $amountErr = ""; 
    $camtErr = "";  
    $date_depositErr = ""; 
    $maturity_dateErr = ""; 
    $interestErr=""; 
  $snoErr = "";
   
   $sno="";
    	$amount = "";
	$case_amount= "";
	$date_deposit = "";
	$maturity_date = "";
	$interest = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    
    if (empty($_POST["sno"])) {  
        $pidErr = "Serial no field is required!";  
      } 
      else
      {
      $pid = test_input($_POST["sno"]);   
      } 
      
      
       if (empty($_POST["amount"])) {  
        $amountErr = "Amount Field is required";  
      } else {  
       
        $amount = test_input($_POST["amount"]);  
      }
      
      if (empty($_POST["case_amount"])) {  
        $camtErr = "Case amount Field is required";  
      } 
      else
      {
      $case_amount = test_input($_POST["case_amount"]); 
  
      }
      if (empty($_POST["date_deposit"])) {  
        $date_depositErr = "Date deposited Field is required";  
      } 
      else
      {
      $date_deposit = test_input($_POST["date_deposit"]);  
      }
      if (empty($_POST["maturity_date"])) {  
        $maturity_dateErr = "Maturity date Field is required";  
      }
      else
      {
      $maturity_date = test_input($_POST["maturity_date"]);  
      }
      if (empty($_POST["interest"])) {  
        $interestErr = "Interest Field is required";  
      }
      else
      {
      $interest = test_input($_POST["interest"]);  
      }
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    
    echo nl2br("\n $amountErr\n $camtErr\n $date_depositErr\n $maturity_dateErr\n $interestErr\n $snoErr");

		
		if(  $amountErr == "" && $camtErr == "" && $date_depositErr == "" && $maturity_dateErr == "" && $interestErr == "" && $snoErr==""){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		$sno = $_REQUEST['sno'];
		
		$amount = $_REQUEST['amount'];
		$case_amount = $_REQUEST['case_amount'];
                $date_deposit = $_REQUEST['date_deposit'];
		$maturity_date = $_REQUEST['maturity_date'];
		$interest = $_REQUEST['interest'];
		

		
		// Performing insert query execution
		// here our table name is college
		
		$sql = "UPDATE investment_reg SET amount = '$amount', case_amount= '$case_amount', date_deposit= '$date_deposit',maturity_date='$maturity_date',interest='$interest' WHERE serial_no = '$sno'";
		
		
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
