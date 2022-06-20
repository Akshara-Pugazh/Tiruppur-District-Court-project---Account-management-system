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
		
    $utrErr = "";   
    $amountErr = ""; 
    $dateErr = "";  
    $insuranceErr = ""; 
    
   
    $utr_no = "";
    	$amount = "";
	
	$date = "";
	
	$insurance = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
      if (empty($_POST["utr_no"])) {  
        $utrErr = "UTR no Field is required";  
      } else {  
       
        $utr_no = test_input($_POST["utr_no"]);  
      }
       if (empty($_POST["amount"])) {  
        $amountErr = "Amount Field is required";  
      } else {  
       
        $amount = test_input($_POST["amount"]);  
      }
      
      
      if (empty($_POST["date"])) {  
        $dateErr = "Date Field is required";  
      } 
      else
      {
      $date = test_input($_POST["date"]);  
      }
      if (empty($_POST["insurance"])) {  
        $insuranceErr = "Insurance Company Field is required";  
      }
      else
      {
      $insurance = test_input($_POST["insurance"]);  
      }
      
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    
    echo nl2br("\n$utrErr\n $amountErr\n $dateErr\n $insuranceErr\n ");

		
		if($utrErr == "" && $amountErr == "" && $dateErr == "" && $insuranceErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		$utr_no = $_REQUEST['utr_no'];
		$amount = $_REQUEST['amount'];
		
                $date = $_REQUEST['date'];
		$insurance = $_REQUEST['insurance'];
		
		

		
		// Performing insert query execution
		// here our table name is college
		
		$sql = "UPDATE daily_reg SET amount = '$amount', date= '$date',insurance='$insurance' WHERE utr_no = '$utr_no'";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Record Updated successfully!</h3>";
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
