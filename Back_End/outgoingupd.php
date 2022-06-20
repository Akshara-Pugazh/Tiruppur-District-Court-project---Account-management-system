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
		
    $nameErr = "";   
    $chequeErr = ""; 
    $dateErr = "";  
    $amountErr = ""; 
    $caseErr = "";
    $case_no="";;
   
    $name = "";
    	$cheque = "";
	
	$date = "";
	
	$amount = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
     
       if (empty($_POST["case_no"])) {  
        $caseErr = "Case no Field is required";  
      } else {  
       
        $case_no = test_input($_POST["case_no"]);  
      } 
      if (empty($_POST["name"])) {  
        $nameErr = "Client name Field is required";  
      } else {  
       
        $name = test_input($_POST["name"]);  
      }
       if (empty($_POST["cheque"])) {  
        $chequeErr = "Cheque no Field is required";  
      } else {  
       
        $cheque = test_input($_POST["cheque"]);  
      }
      
      
      if (empty($_POST["date"])) {  
        $dateErr = "Case Date Field is required";  
      } 
      else
      {
      $date = test_input($_POST["date"]);  
      }
      if (empty($_POST["amount"])) {  
        $amountErr = "Total case amount Field is required";  
      }
      else
      {
      $amount= test_input($_POST["amount"]);  
      }
      
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    
    echo nl2br("\n$caseErr\n $nameErr\n $chequeErr\n $dateErr\n $amountErr\n ");

		
		if($caseErr == "" && $nameErr == "" && $chequeErr == "" && $dateErr == "" && $amountErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		$case_no = $_REQUEST['case_no'];
		$name = $_REQUEST['name'];
		$cheque = $_REQUEST['cheque'];
		
                $date = $_REQUEST['date'];
		$amount = $_REQUEST['amount'];
		
		
               
		
		// Performing insert query execution
		// here our table name is college
		
		$sql = "UPDATE outgoing_reg SET amount = '$amount', date= '$date',cheque='$cheque' WHERE name = '$name' AND case_no= '$case_no'";
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
