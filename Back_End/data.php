<?php 
echo '<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body {
  font-family: "Lato", sans-serif;
  background-image: url("https://media.istockphoto.com/vectors/law-and-justice-related-objects-and-elements-hand-drawn-vector-doodle-vector-id1369694008?b=1&k=20&m=1369694008&s=612x612&w=0&h=fGPhU5XDRQjoecRy59Ynn-GD-egywBegqW_-utOXEKQ=");
  background-attachment: fixed;
  background-position: 70% 50%; background-repeat: no-repeat;
}

/* Fixed sidenav, full height */
.sidenav {
  height: 100%;
  width: 300px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #0059b3;
  overflow-x: hidden;
  padding-top: 20px;
}

/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 20px;
  color: rgb(239, 239, 239);
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: none;
}

/* On mouse-over */
.sidenav a:hover, .dropdown-btn:hover {
  color: #111;
}

/* Main content */
.main {
  margin-left: 200px; /* Same as the width of the sidenav */
  font-size: 20px; /* Increased text to enable scrolling */
  padding: 20px 10px;
}

/* Add an active class to the active dropdown button */
.active {
  background-color: #79a6d2;
  color: white;
}

/* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
.dropdown-container {
  display: none;
  background-color: lightblue;
  padding-left: 8px;
}

/* Optional: Style the caret down icon */
.fa-caret-down {
  float: right;
  padding-right: 8px;
}

/* Some media queries for responsiveness */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div class="sidenav">
  
  <button class="dropdown-btn"><strong>General Court Accounts</strong><i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="budgetfront.php">Budget Allotment Register</a>
    <a href="scfront.php">SC Budget Allotment Register</a>
    <a href="permanentFront.php">Permanent Advance Register</a>
    <a href="loanSanctionFront.php">Loan Sanction Register</a>
    
  </div>
  
  <button class="dropdown-btn">Update record in general court accounts<i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="budgetupd_front.php">Budget Allotment Register</a>
    <a href="scupd_front.php">SC Budget Allotment Register</a>
    <a href="permanentupdfront.php">Permanent Advance Register</a>
    <a href="loanupdfront.php">Loan Sanction Register</a>
    
  </div>
   <button class="dropdown-btn">Delete record from general court accounts<i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="budgetdelfront.php">Budget Allotment Register</a>
    <a href="sc_budgetdelfront.php">SC Budget Allotment Register</a>
    <a href="permanentdelfront.php">Permanent Advance Register</a>
    <a href="loandelfront.php">Loan Sanction Register</a>
    
  </div>
  <button class="dropdown-btn"><strong>MCOP</strong><i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="deposit_ccdfront.php">CCD Deposit Register</a>
    <a href="cheque_receivefront.php">Cheque receive Register</a>
     <a href="daily_front.php">Daily statement Register</a>
      <a href="investment_front.php">Investment Register</a>
        <a href="outgoing_front.php">Outgoing Register</a>
   </div>
 
   <button class="dropdown-btn">Update record in MCOP<i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="depositupdfront.php">CCD Deposit Register</a>
    <a href="chequeupdfront.php">Cheque receive Register</a>
     <a href="dailyupd_front.php">Daily statement Register</a>
      <a href="investmentupd_front.php">Investment Register</a>
       <a href="outgoingupdfront.php">Outgoing Register</a>
      
   </div>
   <button class="dropdown-btn">Delete record from MCOP<i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="depositdelfront.php">CCD Deposit Register</a>
    <a href="chequedelfront.php">Cheque receive Register</a>
     <a href="dailydelfront.php">Daily statement Register</a>
      <a href="investdelfront.php">Investment Register</a>
      <a href="outgoingdelfront.php">Outgoing Register</a>
   </div>
   <button class="dropdown-btn"><strong>Report generation</strong><i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-container">
    <a href="loanrepfront.php">Loan sanction register</a>
    <a href="chequerepfront.php">Cheque receive register</a>
     <a href="ccdrepfront.php">CCD deposit register</a>
   </div>
  <a href="home.php"><strong>Log out<strong></a>
  
  <script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;
  
  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
  </script>
  
  </body>
  </html> ';
