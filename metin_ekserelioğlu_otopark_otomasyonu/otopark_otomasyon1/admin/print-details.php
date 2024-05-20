<?php 
include('config.php');
require 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$id = $_GET['arac_id'];
$sql = mysqli_query($con,"SELECT * FROM arac_kayit WHERE arac_id='$id'");
$user = mysqli_fetch_assoc($sql);


$dompdf = new Dompdf();
ob_start();
require('details_pdf.php');
$html =ob_get_contents();
ob_get_clean();

$dompdf->loadHtml($html);


$dompdf->setPaper('A4', 'portrait');


$dompdf->render();


$dompdf->stream('print-details.pdf',['Attachment'=>false]);

?>
