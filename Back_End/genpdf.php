<?php
//include connection file 
//include_once("connection.php");
include_once('fpdf.php');
/*Class dbObj{

var $dbhost = "localhost";
var $username = "root";
var $password = "";
var $dbname = "ip";
var $conn;
function getConnstring() {
echo "hi";
$con = mysqli_connect($this->dbhost, $this->username, $this->password, $this->dbname) or die("Connection failed: " . mysqli_connect_error());


if (mysqli_connect_errno()) {
printf("Connect failed: %s\n", mysqli_connect_error());
exit();
} else {
$this->conn = $con;
}
echo "hi";
return $this->conn;
}
}*/
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,-1,70);
    $this->SetFont('Arial','B',13);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(80,10,'Daily statement records',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
echo "hii";
$conn = mysqli_connect("localhost", "root", "", "ip");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
//$db = new dbObj();
echo "hii";
//$connString =  $db->getConnstring();
$display_heading = array('utr_no'=>'UTR_NO', 'amount'=> 'Amount', 'date'=> 'Date','insurance' => 'Insurance company');
echo "hii";
$result = mysqli_query($conn, "SELECT * FROM daily_reg");
$header = mysqli_query($conn, "SHOW columns FROM daily_reg");
echo "hiii";
$pdf = new PDF();
//header
echo "hiiii";
$pdf->AddPage();
//foter page
echo "hiiiii";
$pdf->AliasNbPages();
$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
echo "hello";
$pdf->Cell(40,12,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
echo "hello";
$pdf->Ln();
foreach($row as $column)
{
echo "hi";
$pdf->Cell(40,12,$column,1);}
}
echo"hello";
$pdf->Output('S');
echo"final";
mysqli_close($conn);

?>
