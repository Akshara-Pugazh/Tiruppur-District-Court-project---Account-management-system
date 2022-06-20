<?php
$conn = mysqli_connect("localhost", "root", "", "ip");

// Check connection
if($conn === false){
	die("ERROR: Could not connect. "
		. mysqli_connect_error());
}

$word="WHERE";
$cheque_no =  ($_POST['cheque_no']);
$insurance_name = mysqli_real_escape_string($conn, $_POST['insurance_name']);
$case_no = mysqli_real_escape_string($conn, $_POST['case_no']);
$reward = mysqli_real_escape_string($conn, $_POST['reward_closed']);
$date = mysqli_real_escape_string($conn, $_POST['date']);



if (strcmp($cheque_no, "") !== 0)
{
$query = "SELECT * FROM cheque_receive WHERE cheque_no='$cheque_no' ";
}
else
{
$query = "SELECT * FROM cheque_receive ";
}
if (strcmp($insurance_name, "") !== 0)
{

	if(strpos($query, $word) !== false){
	    $query = $query . "and insurance_name='$insurance_name' ";
	  
	} 
	else{
    	    $query = $query . "WHERE insurance_name='$insurance_name' ";
	}
}
if (strcmp($date, "") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and date='$date' ";
	} else{
    	    $query = $query . "WHERE date='$date' ";
    	}
    	    
}
if (strcmp($case_no, "") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and case_no='$case_no' ";
	} else{
    	    $query = $query . "WHERE case_no='$case_no' ";
    	    }
}
if (strcmp($reward, "") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and reward_closed='$reward' ";
	} else{
    	    $query = $query . "WHERE reward_closed='$reward' ";
    	    }
}

$array_name='display_cheque';
$table='cheque_receive';
$result = mysqli_query($conn, $query);

mysqli_close($conn);
?>
	
<!DOCTYPE html>
<html lang="en">
<head>
	<style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
  
</head>
<body>

	<div class="container">
		    
	  <table class="table table-hover">
	    <thead>
	      <tr>
		<th>Cheque No</th>
	    	<th>Insurance Name</th>
	    	<th>Case NO</th>
	    	<th>Reward or Closed</th>
	    	<th>Date</th>
	      </tr>
	    </thead>  

	  <?php
	  if (mysqli_num_rows($result) > 0) {
	  	$sn=1;
	  	while($data = mysqli_fetch_assoc($result)) {
	  ?>
	  <tbody>
		 <tr>	   
		   <td><?php echo $data['cheque_no']; ?> </td>
		   <td><?php echo $data['insurance_name']; ?> </td>
		   <td><?php echo $data['case_no']; ?> </td>
		   <td><?php echo $data['reward_closed']; ?> </td>
		   <td><?php echo $data['date']; ?> </td>
		 <tr>
	  <tbody>
	</div>
	<?php
	  $sn++;}} else { ?>
	    <tr>
	     <td colspan="8">No data found</td>
	    </tr>

	 <?php } ?>
	 </table>
 
 <body>
 </html>
