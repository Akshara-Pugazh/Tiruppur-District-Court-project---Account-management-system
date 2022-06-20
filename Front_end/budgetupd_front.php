<! Doctype html>  
    <html lang="en">  
    <head>  
    <title>User Registration</title>

      <meta charset="utf-8">  
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">  
      <style>  
      label{
            cursor: pointer;
            display: inline-block;
            padding: 3px 6px;
            text-align: right;
            width: 150px;
            vertical-align: top;
        } 
    	.error {  
    		color: white;  
        	font-family: lato;  
        	color:red; 
        	display: inline-block;  
        	padding: 2px 10px;  
    	}
	input{

	}  
    

/* Add padding to containers */
#form1 {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=number] {
  /*width: 20%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;*/

    height: 30px;
    width: 735px;
    text-align: center;
    clear: both;
    margin-bottom:0px;
    padding-top:5px;
}

input[type=text]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
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
  width:120px;
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



/* Set a grey background color and center the text of the "sign in" section */
#form1 {
  background-color: #f1f1f1;
  text-align: center;
}
    </style>  
    <center>
    </head>  
    <body style="background-color:white;">    
    <h1 style="
    text-align: center;
    color: #fff;
    font-size: 1.6em;
    background: #616161;
    display: block;
    border-radius: 5px;
    margin-bottom: 0px;
    width: 700px;
    padding: 30px 0px 30px 0px;
    line-height: 0px !important;">  <br />Update record in Budget Allotment Register</h1>  
    <form method="post" action="budget_upd.php" style="
	background:#f7f7f7;
	width: 700px;
	border:1px solid #ccc;
	padding:30px 0px 30px 0px;
	box-shadow: 0px 5px 5px rgba(0,0,0,0.2);
	margin-top:10px;">    
      <label> Serial no: &nbsp;&nbsp;</label> <input type="number" name="sno" style="width: 150px" autocomplete="off" value="<?php echo $sno;?>">  
      <span class="error"><?php echo $SnoErr;?></span>  
      <br> <br>  
      <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Head:&nbsp;&nbsp; </label> <input type="text" name="head" style="width: 150px" autocomplete="off" value="<?php echo $head;?>">  
      <span class="error"><?php echo $headErr;?></span>  
      <br> <br>  
      <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Quarter: &nbsp;&nbsp;</label>
       <select style="width: 150px" type="number" name="quarter_no">
              <option value="1">1</option>
              <option value="2">2</option>
               <option value="3">3</option>
               <option value="4">4</option>
            
            </select>
      
      <span class="error"><?php echo $quarErr;?></span>  
      <br> <br>  
      <label> &nbsp;&nbsp;Amount: &nbsp;&nbsp;</label> <input type="float" name="amount" style="width: 150px" autocomplete="off" value="<?php echo $amount;?>">  
      <span class="error"><?php echo $amtErr;?></span>  
      <br> <br> 
      <label> &nbsp;&nbsp;Year: &nbsp;&nbsp;</label> <input type="text" name="year" style="width: 150px" autocomplete="off" value="<?php echo $year;?>">  
      <span class="error"><?php echo $yearErr;?></span>  
      <br> <br>  
      <input class="registerbtn" type="submit" name="submit" value="update">    
    </form>  
    </center>
    </body>
    </html>
