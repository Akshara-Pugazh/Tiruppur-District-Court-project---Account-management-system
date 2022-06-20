<?php
		$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}




$word="WHERE";
$sno =  ($_POST['sanction_id']);
$amount = mysqli_real_escape_string($conn, $_POST['sanction_amount']);
$date = mysqli_real_escape_string($conn, $_POST['sanction_date']);
$order = mysqli_real_escape_string($conn, $_POST['sanction_order']);
$borrower = mysqli_real_escape_string($conn, $_POST['sanction_borrower']);



if (strcmp($sno, "") !== 0)
{
$query = "SELECT * FROM load_sanction WHERE sanction_id='$sno' ";
}
else
{
$query = "SELECT * FROM load_sanction ";

}

if (strcmp($amount, "") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and sanction_amount='$amount' ";
	  
	} 
	else{
    	    $query = $query . "WHERE sanction_amount='$amount' ";
	}
}
if (strcmp($date, "") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and sanction_date='$date' ";
	} else{
    	    $query = $query . "WHERE sanction_date='$date' ";
    	}
    	    
}
if (strcmp($order, "") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and sanction_order='$order' ";
	} else{
    	    $query = $query . "WHERE sanction_order='$order' ";
    	    }
}
if (strcmp($borrower, "") !== 0)
{
	if(strpos($query, $word) !== false){
	    $query = $query . "and sanction_borrower='$borrower' ";
	} else{
    	    $query = $query . "WHERE sanction_borrower='$borrower' ";
    	    }
}

$array_name='display_loan';
$table='loan_sanction';
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
		<th>Sanctionid</th>
	    	<th>Amount</th>
	    	<th>Date</th>
	    	<th>Order</th>
	    	<th>Borrower Name</th>
	      </tr>
	    </thead>  

	  <?php
	  if (mysqli_num_rows($result) > 0) {
	  	$sn=1;
	  	while($data = mysqli_fetch_assoc($result)) {
	  ?>
	  <tbody>
		 <tr>	   
		   <td><?php echo $data['sanction_id']; ?> </td>
		   <td><?php echo $data['sanction_amount']; ?> </td>
		   <td><?php echo $data['sanction_date']; ?> </td>
		   <td><?php echo $data['sanction_order']; ?> </td>
		   <td><?php echo $data['sanction_borrower']; ?> </td>
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
