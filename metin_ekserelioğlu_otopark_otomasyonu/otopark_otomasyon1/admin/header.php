<?php

include 'baglan.php';
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



<!doctype html>
<html lang="en">
  <head>
    <title>Araç Takip</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 <link rel="stylesheet" href="adminn.css">

    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
  <body>

  
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="arackayit.php"><?php echo $kaydet['kullanici_mail']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="arackayit.php">Araç Parket<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="parkedenarac.php">Park Edilen Araçlar<span class="sr-only">(current)</span></a>

      </li>

      <li class="nav-item active">
      <a class="nav-link" href="otopark.php">Otopark<span class="sr-only">(current)</span></a>

      </li>

      <li class="nav-item active">
      <a class="nav-link" href="abonelik.php">Abone Ekle<span class="sr-only">(current)</span></a>

      </li>

      <li class="nav-item active">
      <a class="nav-link" href="aboneler.php">Aboneler<span class="sr-only">(current)</span></a>

      </li>

      <li class="nav-item active">
      <a class="nav-link" href="arsiv.php">Arşiv<span class="sr-only">(current)</span></a>

      </li>
   
   
      
      <li class="nav-item active">
      <a class="nav-link" href="tum.php">Fiş<span class="sr-only">(current)</span></a>

      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">

      <button class="btn bg-danger my-2 my-sm-0 " type="submit"><a href="cikis.php" style ="color:white;text-decoration: none;font-size:25px;">Çıkış Yap </a><i class="bi bi-box-arrow-right" style="font-size:26px;color:white;"></i></button>
    </form>
  </div>
</nav>
<?php 


