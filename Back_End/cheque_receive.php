<!DOCTYPE html>
<html>
<head>
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
<body>

	<center>
    <?php
		
    $chequeErr = "";   
    $insErr = ""; 
    $caseErr = "";  
    $rewErr = ""; 
    $dateErr = "";  
  
   
    $cheque_no = "";
    	$insurance_name = "";
	$case_no = "";
	$reward_closed = "";
	$date = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
      if (empty($_POST["cheque_no"])) {  
        $chequeErr = "Cheque no field is required";  
      } else {  
       
        $cheque_no = test_input($_POST["cheque_no"]);  
      }
       if (empty($_POST["insurance_name"])) {  
        $insErr = "Insurance name Field is required";  
      } else {  
       
        $insurance_name = test_input($_POST["insurance_name"]);  
      }
      if (empty($_POST["case_no"])) {  
        $caseErr = "Case no Field is required!";  
      } 
      else
      {
      $case_no = test_input($_POST["case_no"]);   
      }
      if (empty($_POST["reward_closed"])) {  
        $rewErr = "Reward or Closed Field is required";  
      } 
      else
      {
      $reward_closed = test_input($_POST["reward_closed"]); 
  
      }
      if (empty($_POST["date"])) {  
        $dateErr = "Date Field is required";  
      } 
      else
      {
      $date = test_input($_POST["date"]);  
      }
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    echo nl2br("\n$chequeErr\n $insErr\n $caseErr\n $rewErr\n $dateErr\n");
    
		if($chequeErr == "" && $insErr == "" && $caseErr == "" && $rewErr == "" && $dateErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		$cheque_no = $_REQUEST['cheque_no'];
		$insurance_name= $_REQUEST['insurance_name'];
                $case_no = $_REQUEST['case_no'];
		$reward_closed = $_REQUEST['reward_closed'];
		$date = $_REQUEST['date'];
		

		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO cheque_receive VALUES ('$cheque_no','$insurance_name','$case_no','$reward_closed','$date')";
		
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
