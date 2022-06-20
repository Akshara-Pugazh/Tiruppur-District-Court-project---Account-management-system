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
		
    $scyrErr = "";   
    $scquarErr = ""; 
    $scamtErr = "";  
    $scnameErr = ""; 
    
  
   
    $sc_year = "";
    $sc_quarter_no = "";
    $sc_name = "";
    $sc_amount = "";
     $sc_head = "";
	
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
      if (empty($_POST["sc_year"])) {  
        $scyrErr = "Year field is required";  
      } else {  
       
        $sc_year = test_input($_POST["sc_year"]);  
      }
       if (empty($_POST["sc_quarter_no"])) {  
        $scquarErr = "Quarter field is required";  
      } else {  
       
        $sc_quarter_no = test_input($_POST["sc_quarter_no"]);  
      }
      if (empty($_POST["sc_name"])) {  
        $scnameErr = "Subordinate-Court name field is required!";  
      } 
      else
      {
      $sc_name = test_input($_POST["sc_name"]);   
      }
      if (empty($_POST["sc_amount"])) {  
        $scamtErr = "Amount Field is required";  
      } 
      else
      {
      $sc_amount = test_input($_POST["sc_amount"]); 
  
      }
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    echo nl2br("\n$scyrErr\n $scquarErr\n $scnameErr\n $scamtErr\n");
    
		
		if($scyrErr == "" && $scquarErr == "" && $scnameErr == "" && $scamtErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		$sc_year = $_REQUEST['sc_year'];
		$sc_quarter_no = $_REQUEST['sc_quarter_no'];
                $sc_name= $_REQUEST['sc_name'];
		$sc_amount = $_REQUEST['sc_amount'];
		$sc_head = $_REQUEST['sc_head'];
		

		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO sc_budget_allotment (sc_year,sc_quarter_no,sc_name,sc_amount,sc_head) VALUES ('$sc_year','$sc_quarter_no','$sc_name','$sc_amount','$sc_head')";
		
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
