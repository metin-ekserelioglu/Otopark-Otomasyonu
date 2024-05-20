<?php

try {
  $db = New PDO ('mysql:host=localhost;dbname=dersler','root','');
  // echo 'Veri Tabanı Başarılı';
} catch (Exception $th) {
  $th -> getMessage();
}
ob_start();
session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <title>OTOPARK OTOMASYONU</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Oto Park Otomasyonu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Anasayfa <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="admin/index.php">Giris</a>
      </li>
   
   
    </ul>
   
  </div>
</nav>
<h1 class="text-center">OTOPARK OTOMASYONU</h1>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Sıra</th>
      <th scope="col">Araç Plaka</th>
      <th scope="col">Araç Kat Numarası</th>
      <th scope="col">Araç Blok </th>
      <th scope="col">Giriş Tarih Ve Saat</th>
      <th scope="col">Çıkış Tarih Ve Saat</th>
     

    </tr>
  </thead>



  
  
  <?php
$sorgu = $db -> query('SELECT * FROM arac_kayit');
$sirano=0;
while ($kaydet = $sorgu -> fetch(PDO::FETCH_ASSOC)) {
    $sirano=++$sirano;
   $id=$kaydet['arac_id'];
   $plaka=$kaydet['arac_plaka'];
   $kat=$kaydet['arac_kat'];
   $blok=$kaydet['arac_blok'];
   $tarih=$kaydet['arac_giris_tarih'];
   $cikis=$kaydet['arac_cikis_tarih'];


?>
  <tbody>
    <tr>
      <th ><?php echo $sirano ?></th>
      <td><?php echo $plaka?></td>
      <td><?php echo $kat?></td>
      <td><?php echo $blok?></td>
      <td><?php echo $tarih?></td>
      <td><?php echo $cikis?></td>

    
    </tr>

  
  </tbody>
  
  <?php }?>
</table>
<div class="text-center">
   <div class="card p-4">
     <b>Tüm hakları saklıdır  &copy; <?php  echo date("Y"); ?> </b>
   </div>
 </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>