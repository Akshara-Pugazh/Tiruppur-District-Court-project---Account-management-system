<!DOCTYPE html>
<html>
<body>
<center>
<?php  
    $empErr = "";
    $passErr = "";  
    
    $empid="";
    $password="";
    
    function test_input($data) {  
      $data = trim($data);  
      $data = stripslashes($data);  
      $data = htmlspecialchars($data);  
      return $data;  
    }  
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      if (empty($_POST["empid"])) {  
        $empErr = "Employee id Field is required";  
      }
      else
      {
      $empid = test_input($_POST["empid"]);  
      }
      if (empty($_POST["password"])) {  
        $passErr = "Password Field is required";  
      }
      else
      {
      $password = test_input($_POST["password"]);
      }
      
    
    echo nl2br("\n $empErr\n $passErr\n ");
		// servername => localhost
		// username => root
		// password => empty
		// database name => staff
		if($nameErr == ""  && $passErr == ""  ){
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
      
        //to prevent from mysqli injection  
        $empid = stripcslashes($empid);  
        $password = stripcslashes($password);  
        $empid = mysqli_real_escape_string($conn, $empid);  
        $password = mysqli_real_escape_string($conn, $password);  
      
        $sql = "SELECT empid,password from user where empid = '$empid' and password='$password'"; 
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
        if(mysqli_query($conn, $sql)){
        if($count == 1){  
            echo "<h1><center> Login successful </center></h1>";   
            header("location: data.php");
        }  
        else{  
            echo "<h1> Login failed.No account found</h1>";  
        }  } 
        // Close connection
		mysqli_close($conn);  }}
?>  
		
</center>
</body>
</html>
    
     
