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
    $empErr = ""; 
    $passErr = "";  
    $cpassErr = "";   
    $name = "";  
    $empid="";
    $password="";
    $cpassword="";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
      if (empty($_POST["name"])) {  
        $nameErr = "Name Field is required";  
      } else {  
       
        $name = test_input($_POST["name"]);  
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {  
          $nameErr = "Only letters and white space allowed";  
        }  
      }
      if (empty($_POST["empid"])) {  
        $empErr = "Employee id Field is required";  
      } 
      else
      {
      $empid = test_input($_POST["password"]);   
      }
      if (empty($_POST["password"])) {  
        $passErr = "Password Field is required";  
      } 
      else
      {
      $password = test_input($_POST["password"]); 
  
      }
      if (empty($_POST["cpassword"])) {  
        $cpassErr = "Confirm password Field is required";  
      } 
      else
      {
      $cpassword = test_input($_POST["cpassword"]);  
      if($password!=$cpassword)
      {
      $cpassErr = "Confirm password and password must be same"; 
      }
      }
      }
      
      
      
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    }  
    echo nl2br("\n$nameErr\n $empErr\n $passErr\n $cpassErr\n");
		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		if($nameErr == "" && $empErr == "" && $passErr == "" && $cpassErr == "" ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$name = $_REQUEST['name'];
		$empid = $_REQUEST['empid'];
        $password = $_REQUEST['password'];
		$cpassword = $_REQUEST['cpassword'];
		
		
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO user VALUES ('$empid',
			'$name','$password')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>You are now successfully registered!</h3>";
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);}
		?>
		<form action="home.php" method="POST">
		<input type="submit" value="Redirect to home page" class="registerbtn"/>
		</form>
	</center>
</body>

</html>
