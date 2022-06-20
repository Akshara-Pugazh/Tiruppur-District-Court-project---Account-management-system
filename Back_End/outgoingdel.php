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
    $caseErr = "";
    $case_no="";;
   
    $name = "";
    	
	
	
    
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
       
      }
      
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    
    echo nl2br("\n$caseErr\n $nameErr\n  ");

		
		if($caseErr == "" && $nameErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		$case_no = $_REQUEST['case_no'];
		$name = $_REQUEST['name'];
		
		
              
		
		// Performing insert query execution
		// here our table name is college
		
		$sql = "DELETE FROM outgoing_reg WHERE case_no = '$case_no' AND name = '$name'";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Record deleted successfully!</h3>";
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
