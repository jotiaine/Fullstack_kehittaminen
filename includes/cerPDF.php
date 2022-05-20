<?php
/**
 *  file:   cerPDF.php
 *  desc:   Tulostaa PDF-dokumentin 
 */

if(!empty($_GET['pID'])) $id=$_GET['pID'];else header('location: index.php?page=faq');

include('fpdf/fpdf.php');  //otetaan käyttöön fpdf.php -luokka

class PDF extends FPDF{
    function Header(){
        //Jokaisen sivun otsakemäärittelyt
        $this->SetFont('Arial', 'B', 15);
        $this->SetFillColor(230,247,247);
        $this->SetTextColor(26,106,156);
        $title=iconv('UTF-8','windows-1252','Todistus suoritetusta tentistä');
        $this->Cell(0,25,$title,0,1,'C',true);
        //$this->Image('img/hero.jpg',10,10);   // hieman liian iso, peittää myös otsikon
        $this->Ln(5); //5 tyhjää riviä
        $this->Cell(20,10, 'ID',0,0,'C');
        $this->Cell(20,10, 'Etunimi',0,0,'C');
        $this->Cell(30,10, 'Sukunimi', 0,0, 'L');
        $this->Cell(30,10, 'Email', 0,0, 'L');
        $this->Ln(10);

    }
    function Footer(){
        //Jokaisen sivun footerimäärittelyt
        $this->SetFont('Arial','',8);
        $this->SetY(-15); //sivun alareunasta ylöspäin
        $this->Cell(0,2,'','B',1); //viiva
        $this->Cell(0,5,'Sivu '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
//pdf-dokumentin
$pdf=new PDF();
$pdf->AliasNbPages(); //sivunumerointi
$pdf->AddPage();        //lisätään sivu
//tähän väliin esim tietokantajutut eli sivulle tulevan sisällön tekeminen
$pdf->SetFont('Arial','',10);
include('dbConnect.php');
//tällä erää studentID tulee about.php sivun listauksesta, väliaikainen toimivuuden kokeilu
$sql="SELECT studentID, first_name, last_name, email FROM student WHERE studentID = '$id' ORDER by last_name, first_name";
$tulos=$conn->query($sql);
$lkm=0; //rivien lukumäärä
$rivilaskuri=0;
while($rivi=$tulos->fetch_assoc()){
    $pdf->Cell(20,10, $rivi['studentID'],0,0,'C');
    $first_name=iconv('UTF-8','windows-1252',$rivi['first_name']);
    $pdf->Cell(30,10, $first_name, 0,0, 'L');
    $last_name=iconv('UTF-8','windows-1252',$rivi['last_name']);
    $pdf->Cell(30,10, $last_name, 0,0, 'L');
    $pdf->Cell(60,10, $rivi['email'], 0,0, 'L');
    $lkm++;
    $rivilaskuri++;
    if($rivilaskuri==5){
        $pdf->Addpage();
        $rivilaskuri=0;
    }
}
//tulostetaan yhteenveto
$pdf->Ln(5);
//$pdf->Cell(0,1,'',1);
//$otsikko=iconv('UTF-8','windows-1252','Oppilaita tietokannassa yhteensä: ').$lkm;
$pdf->Cell(0,10,$otsikko,0,1,'R');
//sivun näyttäminen/tallentaminen
$pdf->Output(); //tulostaa selaimelle
//talletus tiedostona
$lista='oppilaat_'.date('Y-m-d').'.pdf';
$pdf->Output('files/'.$lista,'F');
?>