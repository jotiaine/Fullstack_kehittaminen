<?php
/**
 *  file:   cerPDF.php
 *  desc:   Prints a PDF document which tells that the student has done the exam
 */

if(!empty($_GET['pID'])) $id=$_GET['pID'];else header('location: index.php?page=faq');

include('fpdf/fpdf.php');

class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial', 'B', 15);
        $this->SetFillColor(144, 122, 137);
        $this->SetTextColor(255, 255, 255);
        $title=iconv('UTF-8','windows-1252','Todistus suoritetusta kokeesta');
        $this->Cell(0,25,$title,0,1,'C',true);
        $this->Ln(10); 
        $this->SetTextColor(105,105,105);
        $this->Cell(30,10, 'Oppilas',0,0,'L');
        $this->Cell(30,10, 'Etunimi',0,0,'L');      
        $this->Cell(35,10, 'Sukunimi', 0,0, 'L');
        $this->Cell(60,10, 'Email', 0,0, 'L');
        $date=iconv('UTF-8','windows-1252','Päivämäärä');
        $this->Cell(30,10, $date, 0,0, 'L');
        $this->Ln(10);
    }

    function Footer(){
        $this->SetFont('Arial','',10);
        $this->SetY(-15); 
        $this->Cell(0,2,'','B',1); 
        $this->Cell(40,10, 'Datadrivers', 0,0, 'L');
    }
}

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);
include('dbConnect.php');
$sql="SELECT studentID, first_name, last_name, email FROM student WHERE studentID = '$id'";
$tulos=$conn->query($sql);
$rivi=$tulos->fetch_assoc();
$pdf->Cell(30,10, "Nro: ".$rivi['studentID'],0,0,'L');
$first_name=iconv('UTF-8','windows-1252',$rivi['first_name']);
$pdf->Cell(30,10, $first_name, 0,0, 'L');
$last_name=iconv('UTF-8','windows-1252',$rivi['last_name']);
$pdf->Cell(35,10, $last_name, 0,0, 'L');
$pdf->Cell(60,10, $rivi['email'], 0,0, 'L');
$pdf->Cell(30,10, date('Y-m-d'), 0,0, 'L');
$pdf->Output();
$lista='paivays'.date('Y-m-d').'.pdf';
$pdf->Output('files/'.$lista,'F');
?>