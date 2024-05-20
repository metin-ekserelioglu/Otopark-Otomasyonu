<?php



include 'baglan.php';



if (isset($_POST['admingiris'])) {

    $mail = $_POST['kullanici_mail'];
    $sifre =$_POST['kullanici_sifre'];
    $sorgu=$db -> prepare('SELECT * FROM admingiris WHERE kullanici_mail=:kullanici_mail and kullanici_sifre=:kullanici_sifre ');
    $sorgu -> execute([
        'kullanici_mail'=>$mail,
        'kullanici_sifre'=>$sifre
    ]);
    $say =$sorgu -> rowCount();
    if ($say == 1 ) { 
        $_SESSION['userkullanici_mail']=$mail;
        header('location:arackayit.php?Durum=ok');
        exit;
    }
    else {
        header('location:index.php?durum=basarısız');
      
    }
}















?>