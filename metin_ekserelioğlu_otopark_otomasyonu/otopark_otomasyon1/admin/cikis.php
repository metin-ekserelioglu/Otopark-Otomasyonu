

<?php   

include 'baglan.php';
ob_start();
session_destroy();
echo '<h1 style=\'text-align:center; margin-top:45px; color:red; font-weight:bold;\'>BAŞARI BİR ŞEKİLDE ÇIKIŞ YAPTINIZ. ANASAYFAYA
YÖNLENDİRİLİYORSUNUZ.. </h1>';
header('Refresh:2; url=../index.php?durum=exit');



?>