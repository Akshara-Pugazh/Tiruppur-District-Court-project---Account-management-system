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
		
     
    $sancorderErr = "";  
    
    $sanction_order = "";
    
	
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
      
      if (empty($_POST["sanction_order"])) {  
        $sancorderErr = "Sanction order is required!";  
      } 
      else
      {
      $sanction_order = test_input($_POST["sanction_order"]);   
      }
      
      }
      function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    } 
    
    
    echo nl2br("\n$sancorderErr\n \n");
    

		if( $sancorderErr == ""  ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		
		
                $sanction_order = $_REQUEST['sanction_order'];
		
		
		

		// Performing insert query execution
		// here our table name is college
		$sql = "DELETE FROM load_sanction WHERE sanction_order = '$sanction_order' ";
		
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
		
