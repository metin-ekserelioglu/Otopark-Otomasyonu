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
   exit;
}



?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="abonelik.php"><?php echo $kaydet['kullanici_mail']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="abonelik.php">Abone Kaydet<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="aboneler.php">Kayıtlı Aboneler<span class="sr-only">(current)</span></a>

      </li>
   
   
    </ul>
    <form class="form-inline my-2 my-lg-0 " method="post" >
    <input class="form-control mr-sm-2" type="search" placeholder="Abone Arayın" name="aboneler" aria-label="Search">
    <button class="btn bg-primary my-2 my-sm-0  " type="submit" style="margin:10px; color:white;"><i class="bi bi-search"></i>  Arama Yap</button>

      <button class="btn bg-danger my-2 my-sm-0 " type="submit"><a href="cikis.php" style ="color:white;text-decoration: none;font-size:25px;">Çıkış Yap </a><i class="bi bi-box-arrow-right" style="font-size:26px;color:white;"></i></button>
    </form>
  </div>
</nav>


<?php 

if ($_POST) {
$abonelerr = $_POST['aboneler'];
if (!$abonelerr) {
  echo  '<div class="alert alert-dark text-center" role="alert">
  -----  Arama Yapabilmek İçin Birşeyler Yazın -----
</div>';
}
else {
  $sorguu =$db -> prepare('SELECT * FROM  abonelik WHERE abone_plaka LIKE :abone_plaka');
  $sorguu -> execute(array(':abone_plaka'=>'%'.$abonelerr.'%'));
  if ($sorguu -> rowCount()) {
   foreach ($sorguu as $sorgula) {
    echo '<div class="alert alert-success " role="alert">'.
    $sorgula['abone_plaka'] .' Araç Daha Çıkış Yapmadı</b>
  </div>';
   }
  }else {
    echo'<div class="alert alert-danger text-center" role="alert">
  Girilen Plakaya ait Araç Otoparkta Yoktur...
  </div>';
   }
}
}

?>


<table class="table">
  <thead>
    <tr>
      <th scope="col">Sıra</th>
      <th scope="col">Ad</th>
      <th scope="col">Soyad</th>
      <th scope="col">Telefon No</th>
      <th scope="col">Plaka</th>
      <th scope="col">Marka</th>
      <th scope="col">Renk</th>
      <th scope="col">Tür</th>
    
      

      <th scope="col">Düzenle</th>
      <th scope="col">Sil</th>
   

    </tr>
  </thead>



  
  <?php
$sorgu = $db ->query('SELECT * FROM abonelik');
$sirano=0;
foreach ($sorgu as $kaydet ) {
  

    $sirano=++$sirano;
   $id=$kaydet['abone_id'];
   $ad=$kaydet['abone_ad'];
   $soyad=$kaydet['abone_soyad'];
   $tel=$kaydet['abone_tel'];
   $plaka=$kaydet['abone_plaka'];
   $marka=$kaydet['abone_marka'];
   $renk=$kaydet['abone_renk'];
   $tur=$kaydet['abone_tur'];

 

?>
  <tbody>
    <tr>
      <th ><?php echo $sirano ?></th>
      <td><?php echo $ad?></td>
      <td><?php echo $soyad?></td>
      <td><?php echo $tel?></td>
      <td><?php echo $plaka?></td>
      <td><?php echo $marka?></td>
      <td><?php echo $renk?></td>
      <td><?php echo $tur?></td>
    

  
      <td><a href="aduzenle.php?id=<?php echo $id; ?>" class="btn  btn-primary p-2">Düzenle</a></td>
      <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger p-3"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg></a></td>
   
    
    </tr>

  
  </tbody>
  
  <?php }?>
  <!-- kayıt ettiğimiz araç sürekli döngü şeklinde veri tabanına gönderip ve çağırmak için aşağıdaki kodlar kullanılır bitiş. -->
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
