<?php  
try {
    $db = New PDO ('mysql:host=localhost;dbname=dersler','root','');
    // echo 'Veri Tabanı Başarılı';
} catch (Exception $th) {
    $th -> getMessage();
}
ob_start();
session_start();


$kullanicicek = $db -> prepare('SELECT * FROM admingiris WHERE kullanici_mail=:kullanici_mail');
$kullanicicek -> execute([
    'kullanici_mail' => $_SESSION['userkullanici_mail']
]);

$say = $kullanicicek -> rowCount();
$kaydet = $kullanicicek -> fetch(PDO::FETCH_ASSOC);
if ($say == 0) {
   header('location:index.php?izinsizGiris');
   
}




?>
