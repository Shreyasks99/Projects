
<?php
session_start();
include("config.php");
 

$contents ='';
require_once('tcpdf/tcpdf.php');  
if(isset($_GET['mid']))
{
    $mid=$_GET['mid'];
 $query = "select * from medicine  where mid='$mid'"; 
 $result = mysqli_query($con,$query); 
     require_once('tcpdf/tcpdf.php');  
    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  
    $pdf->SetCreator(PDF_CREATOR);  
    $pdf->SetTitle('Invoice: ');  
    $pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);  
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));  
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));  
    $pdf->SetDefaultMonospacedFont('helvetica');  
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);  
    $pdf->SetMargins(PDF_MARGIN_LEFT, '10', PDF_MARGIN_RIGHT);  
    $pdf->setPrintHeader(false);  
    $pdf->setPrintFooter(false);  
    $pdf->SetAutoPageBreak(TRUE, 10);  
    $pdf->SetFont('helvetica', '', 11);  
    $pdf->AddPage();  
    $content = ''; 
   
     
        while(  $row =mysqli_fetch_array($result))
        {
            echo "string";
        $contents .= '
            <h2 align="center">MedicineNGO Invoice</h2>
        
            <table cellspacing="0" cellpadding="3">  
                <tr>  
                    <td width="25%" align="right">Member Name: </td>
                    <td width="25%"><b>'.$row['donor_name'].'</b></td>
                    <td width="25%" align="right">contactnumber: </td>
                    <td width="25%" align="right">'.$row['donor_number'].'</td>
                </tr>
                <tr>
                <td></td> 
                    <td></td>
                    <td width="25%" align="right">Medicine Name: </td>
                    <td width="25%" align="right">'.$row['medicine_name'].'</td>   
                 
                </tr>
                <tr> 
                    <td></td> 
                    <td></td>
                    <td width="25%" align="right"><b>medicine brand: </b></td>
                    <td width="25%" align="right"><b>'.($row['medicine_brand']).'</b></td> 
                </tr>
                <tr> 
                    <td></td> 
                    <td></td>
                    <td width="25%" align="right">type: </td>
                    <td width="25%" align="right">'.($row['type']).'</td> 
                </tr>
                <tr> 
                    <td></td> 
                    <td></td>
                    <td width="25%" align="right">manufacture date: </td>
                    <td width="25%" align="right">'.($row['man_date']).'</td> 
                </tr>
                <tr> 
                    <td></td> 
                    <td></td>
                    <td width="25%" align="right"><b>expiry date :</b></td>
                    <td width="25%" align="right"><b>'.($row['exp_date']).'</b></td> 
                </tr>
                <tr> 
                    <td></td> 
                    <td></td>
                    <td width="25%" align="right"><b>Quantity:</b></td>
                    <td width="25%" align="right"><b>'.($row['quantity']).'</b></td> 
                </tr>
                    <tr> 
                    <td></td> 
                    <td></td>
                    <td width="25%" align="right"><b>Status:</b></td>
                    <td width="25%" align="right"><b>'.($row['status']).'</b></td> 
                </tr>
                    <tr> 
                    <td></td> 
                    <td></td>
                    <td width="25%" align="right"><b>final donation status:</b></td>
                    <td width="25%" align="right"><b>'.($row['donated']).'</b></td> 
                </tr>
            </table>
            Approved by MedicineNGO
            <br><hr>
        ';

  ob_end_clean();
$pdf->writeHTML($contents);  

    $pdf->Output('invoice.pdf', 'I');
     
}

}

 ?>