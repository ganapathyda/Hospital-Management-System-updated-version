<?php
$con=mysqli_connect('localhost','root','','hms');
$userid = $_POST['userid'] ;
$fullname=$_POST['fullname'];
$mail=$_POST['mail'];
$mobile=$_POST['mobile'];
$apdate=$_POST['appointdate'];
$aptime=$_POST['appointtime'];
$gender=$_POST['gen'];
$docid = $_POST['docid'] ;
$dis =  $_POST['disease'];
$medicine =  $_POST['medicine'];
$meeting=$_POST['meeting'];
$message=$_POST['message'];



$fees=$_POST['fees'];
require("assets/fpdf/fpdf.php");
$db=new PDO('mysql:host=localhost;dbnme=hms','root','');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont("Arial","B",16);
		$pdf->SetFont('Arial','B',30);
		$pdf->Cell(200,5,"WE CARE HOSPITAL ",0,0,'C');
		$pdf->Ln(15);
		
		$pdf->SetFont('Times','',20);
		$pdf->Cell(180,5,"Doctor Prescription",0,0,'C');
        $pdf->Ln(30);
	    
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(100,5,"PATIENT ID",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$userid",0,0);
		$pdf->Ln(12);
		
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(100,5,"PATIENT NAME",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$fullname",0,0);
		$pdf->Ln(12);
		
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(100,5,"PATIENT EMAILID",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$mail",0,0);
		$pdf->Ln(12);
		
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(100,5,"PATIENT MOBILENO",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$mobile",0,0);
		$pdf->Ln(12);
		
		$pdf->SetFont('Arial','',15);
		$pdf->Cell(100,5,"PATIENT GENDER",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$gender",0,0);
		$pdf->Ln(12);
		
		
		$pdf->Cell(100,5,"APPOINTMENT DATE",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$apdate",0,0);
		$pdf->Ln(12);
		
		$pdf->Cell(100,5,"APPOINTMENT TIME",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$aptime",0,0);
		$pdf->Ln(12);
		
		$pdf->Cell(100,5,"DISEASE",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$dis",0,0);
		$pdf->Ln(12);
		
		$pdf->Cell(100,5,"DOCTOR ID",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$docid",0,0);
		$pdf->Ln(12);
		
		$pdf->Cell(100,5,"MEDICINE",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$medicine",0,0);
		$pdf->Ln(12);
		
		$pdf->Cell(100,5,"CURE",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$message",0,0);
		$pdf->Ln(12);
		
	    $pdf->Cell(100,5,"MEET",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$meeting",0,0);
		$pdf->Ln(12);

		$pdf->Cell(100,5,"FEES",0,0,'C');
		$pdf->Cell(20,5,":",0,0);
		$pdf->Cell(50,5,"$fees",0,0);
		$pdf->Ln(12);
		
		
       
$pdf->output();
?>