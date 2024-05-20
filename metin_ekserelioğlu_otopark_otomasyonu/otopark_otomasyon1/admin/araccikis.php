<?php 
include 'baglan.php'; 

$kullanicicek = $db ->prepare('SELECT * FROM admingiris WHERE kullanici_mail=:kullanici_mail ');
$kullanicicek ->execute([
    
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<?php
$sorgu = $db -> query("SELECT * FROM arac_kayit WHERE arac_id= ".(int)$_GET['id']);
$sonuc = $sorgu ->fetch(PDO::FETCH_ASSOC);

?>

      
<!-- header başlangıc -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="arackayit.php">Oto Park Otomasyonu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="arackayit.php">Araç Kaydet<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="parkedenarac.php">Park Edilen Araçlar<span
                            class="sr-only">(current)</span></a>

                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Plaka ara" aria-label="Search">

                <button class="btn bg-danger my-2 my-sm-0 " type="submit"><a href="cikis.php"
                        style="color:white;text-decoration: none;font-size:25px;">Çıkış Yap </a><i
                        class="bi bi-box-arrow-right" style="font-size:26px;color:white;"></i></button>
            </form>

        </div>
    </nav>
<!-- header Bitiş -->


<!-- dene -->
    <div class="container">
        <div class="card-body p-4">

            <form action="" method="post">

                <table class="table">




                    <?php date_default_timezone_set('Europe/Istanbul'); ?>
                    <tr>
                        <td>Araç Çıkış Tarih</td>
                        <td><textarea name="arac_cikis_tarih"
                                class="form-control"><?php echo date("d-m-Y H:i:s"); ?></textarea></td>
                                
                    </tr>
          
               
  


                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-danger" name="cikis" value="GERİ GEL"></td>
                        <td><input type="submit" class="btn btn-primary"   value="Kaydet"></td>
                        <form action="kaydet.php" method="post">
  <label for="ucret">Ücret:</label>
  <input type="text" id="ucret" name="ucret"><br><br>
  
</form>
                    </tr>
  
<?php

if ($_POST) {
    $cikis = $_POST['arac_cikis_tarih'];
    $ucret = $_POST['ucret'];
    
    if (isset($_POST['cikis'])) {
        header('location: parkedenarac.php');
    }
    elseif ($cikis <> "" && $ucret <> "") {
        if ($db->query("UPDATE arac_kayit SET arac_cikis_tarih = '$cikis', ucret = '$ucret' WHERE arac_id = ".$_GET['id'])) {
            echo '<div class="alert alert-primary text-center" role="alert">
                <----- Başarılı Bir Şekilde Araç Çıkış Yaptı Anasayfa Yönlendiriliyorsunuz ----->
            </div>';
            header('Refresh:2; parkedenarac.php?araccikisbasarili');
            exit;
        }
    }
    else {
        echo '<div class="alert alert-primary text-center" role="alert">
                ----- Boş Alanları Doldurunuz -----
            </div>';
    }
}
?>

                </table>

            </form>

        </div>



        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>
</body>

</html>