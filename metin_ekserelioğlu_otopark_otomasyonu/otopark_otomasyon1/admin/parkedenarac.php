
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
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <script type="text/javascript">     
		    function PrintDiv() {    
		       var printInvoice = document.getElementById('printInvoice');
		       var popupWin = window.open('', '_blank', 'fullscreen=yes');
		       popupWin.document.open();
		       popupWin.document.write('<html><body onload="window.print()">' + printInvoice.innerHTML + '</html>');
		        popupWin.document.close();
		            }
	 	</script>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="arackayit.php"><?php echo $kaydet['kullanici_mail']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="arackayit.php">Araç Kaydet<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
      <a class="nav-link" href="parkedenarac.php">Park Edilen Araçlar<span class="sr-only">(current)</span></a>

      </li>
   
   
    </ul>
    <form class="form-inline my-2 my-lg-0 " method="post" >
    <input class="form-control mr-sm-2" type="search" placeholder="Plaka Arayın" name="plaka" aria-label="Search">
    <button class="btn bg-primary my-2 my-sm-0  " type="submit" style="margin:10px; color:white;"><i class="bi bi-search"></i>  Arama Yap</button>

      <button class="btn bg-danger my-2 my-sm-0 " type="submit"><a href="cikis.php" style ="color:white;text-decoration: none;font-size:25px;">Çıkış Yap </a><i class="bi bi-box-arrow-right" style="font-size:26px;color:white;"></i></button>
    </form>
  </div>
</nav>

<?php 

if ($_POST) {
$plakaa = $_POST['plaka'];
if (!$plakaa) {
  echo  '<div class="alert alert-dark text-center" role="alert">
  -----  Arama Yapabilmek İçin Birşeyler Yazın -----
</div>';
}
else {
  $sorguu =$db -> prepare('SELECT * FROM  arac_kayit WHERE arac_plaka LIKE :arac_plaka');
  $sorguu -> execute(array(':arac_plaka'=>'%'.$plakaa.'%'));
  if ($sorguu -> rowCount()) {
   foreach ($sorguu as $sorgula) {
    echo '<div class="alert alert-success " role="alert">'.
    $sorgula['arac_plaka'] .' Araç Daha Çıkış Yapmadı</b>
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
      <th scope="col">Sahip</th>
      <th scope="col">Plaka</th>
      <th scope="col">Marka</th>
      <th scope="col">Renk</th>
      <th scope="col">Tür</th>
      <th scope="col">Kat</th>
      <th scope="col">Blok</th>
      <th scope="col">Alan</th>
      <th scope="col">Ücret</th>
      <th scope="col">Giriş</th>
      <th scope="col">Çıkış</th>
      <th scope="col">Düzenle</th>
      <th scope="col">Sil</th>
      <th scope="col">Araç Çıkış</th>
      
  

    </tr>
  </thead>



  
  <?php
$sorgu = $db->query('SELECT * FROM arac_kayit');
$sirano = 0;
foreach ($sorgu as $kaydet ) {
 
    $sirano = ++$sirano;
    $id = $kaydet['arac_id'];
    $sahip = $kaydet['arac_sahip'];
    $plaka = $kaydet['arac_plaka'];
    $marka = $kaydet['arac_marka'];
    $renk = $kaydet['arac_renk'];
    $tur = $kaydet['arac_tur'];
    $kat = $kaydet['arac_kat'];
    $blok = $kaydet['arac_blok'];
    $alan = $kaydet['arac_alan'];
    $ucret = $kaydet['ucret'];
    $tarih = $kaydet['arac_giris_tarih'];
    $cikis = $kaydet['arac_cikis_tarih'];
?>
  <tbody>
    <tr>
      <th ><?php echo $sirano ?></th>
      <td><?php echo $sahip?></td>
      <td><?php echo $plaka?></td>
      <td><?php echo $marka?></td>
      <td><?php echo $renk?></td>
      <td><?php echo $tur?></td>
      <td><?php echo $kat?></td>
      <td><?php echo $blok?></td>
      <td><?php echo $alan?></td>
      <td><?php echo $ucret?></td>
      <td><?php echo $tarih?></td>
      <td><?php echo $cikis?></td>
      
      
      <td><a target="_blank" href="print-details.php?arac_id=<?=$row['arac_id']?>" class="btn btn-sm btn-primary"> <i class="fa fa-file-pdf-o"></i> Yazdır</a></td>
      <td><a href="sil.php?id=<?php echo $id; ?>" class="btn btn-danger p-3"><svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-trash3" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                            </svg></a></td>
                            <td><a href="araccikis.php?id=<?php echo $id; ?>" class="btn  btn-danger p-2">Çıkar</a></td>
      

    
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
    

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
