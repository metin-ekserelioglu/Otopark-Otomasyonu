<?php include 'header.php'; ?>

<!---->
<?php  

ob_start();
error_reporting(0);

echo "<title>Z-API</title>";

if ($_POST) {

	if ($_POST['name']) {

		$postname = $_POST['name'];

		$spexcon = new mysqli(

			'localhost',

			'root',

			'',

			'dersler'

		);

		$db_data = $spexcon->query("SELECT * FROM abonelik WHERE abone_plaka='".$postname."'");

			foreach ($db_data as $db) {
				
				$id = $db['abone_id'];
				$ad = $db['abone_ad'];
				$soy = $db['abone_plaka'];
				$tel = $db['abone_tel'];
				$pi = $db['abone_plaka'];
				$mar = $db['abone_marka'];
				$re = $db['abone_renk'];
				$tur = $db['abone_tur'];
        $kat = $db['abone_kat'];
        $blok = $db['abone_blok'];
        $alan = $db['abone_alan'];

			}

			$postdata = json_encode(array('ID :' => "$id",'abone_ad :' => "$ad",'abone_plaka :' => "$soy",'abone_tel :' => "$tel",'abone_plaka :' => "$pi",'abone_marka :' => "$mar",'abone_renk :' => "$re",'abone_tur :' => "$tur",'abone_kat :' => "$kat",'abone_blok :' => "$blok",'abone_alan :' => "$alan",));

		

	} 
}




?>
<?php
// Veritabanı bağlantısı
$conn = mysqli_connect("localhost", "root", "", "dersler");

// Hata kontrolü
if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

// Kat bilgilerini al
$query_kat_sayisi = "SELECT COUNT(*) as kat_sayisi FROM otopark_kat";
$result_kat_sayisi = mysqli_query($conn, $query_kat_sayisi);
$row_kat_sayisi = mysqli_fetch_assoc($result_kat_sayisi);
$kat_sayisi = $row_kat_sayisi['kat_sayisi'];

// Alan bilgilerini al
$query_alanlar = "SELECT DISTINCT otopark_alan FROM otopark_alan";
$result_alanlar = mysqli_query($conn, $query_alanlar);
$alanlar = array();
while ($row_alan = mysqli_fetch_assoc($result_alanlar)) {
    $alanlar[] = $row_alan['otopark_alan'];
}

// Blok harflerini al
$query_blok_harfler = "SELECT DISTINCT otopark_blok FROM otopark_blok";
$result_blok_harfler = mysqli_query($conn, $query_blok_harfler);
$blok_harfler = array();
while ($row_blok_harf = mysqli_fetch_assoc($result_blok_harfler)) {
    $blok_harfler[] = $row_blok_harf['otopark_blok'];
}

// Dolu olan alanları bulmak için sorgu yapın
$query_dolu = "SELECT arac_kat, arac_blok, arac_alan FROM arac_kayit WHERE arac_cikis_tarih IS NULL OR arac_cikis_tarih = ''";
$result_dolu = mysqli_query($conn, $query_dolu);

// Dolu alanları içeren bir dizi oluşturun
$dolu_alanlar = array();
while ($row = mysqli_fetch_assoc($result_dolu)) {
    $dolu_alanlar[$row['arac_kat'] . "-" . $row['arac_blok'] . "-" . $row['arac_alan']] = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otopark Alanları</title>
    <style>
        .kat-blok {
            margin-bottom: 20px;
        }

        .alan {
            width: 50px;
            height: 50px;
            display: inline-block;
            border: 1px solid #ccc;
            margin: 2px;
            position: relative;
        }

        .numara {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .dolu {
            background-color: red;
        }
    </style>
</head>
<body>

<?php
// Sayfa numarasını al
$sayfa = isset($_GET['sayfa']) ? $_GET['sayfa'] : 1;

// Gösterilecek katı belirle
$gosterilecek_kat = ($sayfa > 0 && $sayfa <= $kat_sayisi) ? $sayfa : 1;


// Kat bilgilerine göre alanları oluştur
echo "<div class='kat-blok'>";
for ($kat = $gosterilecek_kat; $kat <= $gosterilecek_kat; $kat++) {
    echo "<h3>Kat: " . $kat . "</h3>";

    foreach ($blok_harfler as $blok_harf) {
        echo "<div class='blok'>";
        echo "<h4>Blok: " . $blok_harf . "</h4>";

        foreach ($alanlar as $alan) {
            $alan_key = $kat . "-" . $blok_harf . "-" . $alan;
            $css_class = isset($dolu_alanlar[$alan_key]) ? "dolu" : "";
            echo "<div class='alan $css_class'><span class='numara'>$alan</span></div>";
        }

        echo "</div>";
    }
}
echo "</div>";

// Sayfalama linklerini oluştur
echo "<div>";
for ($i = 1; $i <= $kat_sayisi; $i++) {
    echo "<a href='?sayfa=$i'>$i</a> ";
}
echo "</div>";
?>
    <style>
        .kat-blok {
            margin-bottom: 20px;
            text-align: center;
        }

        .alan {
            width: 40px;
            height: 40px;
            display: inline-block;
            border: 1px solid #ccc;
            margin: 2px;
            position: relative;
            font-size: 0.8em;
        }

        .numara {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .dolu {
            background-color: red;
        }

        .pagination {
            text-align: center;
        }

        .pagination a {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            text-decoration: none;
            color: #333;
        }
    </style>
</body>
</html>

<?php
// Veritabanı bağlantısını kapat
mysqli_close($conn);
?>

<!---->

<?php
if (isset($_POST['arackayit'])) {
  $arac_sahip = $_POST['arac_sahip'];
  $arac_Plaka = $_POST['arac_plaka'];
  $arac_marka = $_POST['arac_marka'];
  $arac_renk = $_POST['arac_renk'];
  $arac_tur = $_POST['arac_tur'];
  $arac_Kat= $_POST['arac_kat'];
  $arac_Blok = $_POST['arac_blok'];
  $arac_alan = $_POST['arac_alan'];
  if (!$arac_Plaka || !$arac_Kat || !$arac_Blok) {
    echo  '<div class="alert alert-primary text-center" role="alert">
----- Boş ALanları Doldurunuz-----
</div>';
  }
  else {
    $kaydet =$db ->prepare('INSERT INTO arac_kayit SET
    arac_sahip= ?,
    arac_plaka = ?,
    arac_marka = ?,
    arac_renk = ?,
    arac_tur = ?,
    arac_kat = ?,
    arac_blok = ?,
    arac_alan = ?
    
    ');
    $kaydet ->execute([
      $arac_sahip , $arac_Plaka , $arac_marka, $arac_renk, $arac_tur, $arac_Kat , $arac_Blok , $arac_alan
    ]);
    if ($kaydet) {
      echo  '<div class="alert alert-success text-center" role="alert">
      ----- KAYIT BAŞARILI YÖNLENDİRİLİYORSUNUZ-----
      </div>';
      header('Refresh:1; parkedenarac.php');
      
    }
  }
}




?>
<!---->

<!---->



      <div id="rrr" class="container p-8">

   

         <div id="card" class="card p-4">
           <h1 id="baslik" class="text-center">Araç <b>Kayıt</b></h1>

           <form method="POST" action="arackayit.php">
	<input type="text" name="name" placeholder="Kayıt Plakayı Giriniz">
	<br>
	<input type="submit" name="submit" value="Gönder">
</form>

           <form action="arackayit.php" method="post">
               <div class="mb-3">
                 <input type="text" name="arac_sahip" class="form-control text-center mb-3" value="<?php echo $ad; ?>" style="font-weight: bold; font-size:22px;" placeholder="Ad Soyad Giriniz ">
                   <input type="text" name="arac_plaka" class="form-control text-center mb-3" value="<?php echo $soy; ?>" style="font-weight: bold; font-size:22px;" placeholder="Araç Plaka Giriniz " >
                   <input type="text" name="arac_marka" class="form-control text-center mb-3" value="<?php echo $mar; ?>"style="font-weight: bold; font-size:22px;" placeholder="Araç Marka Giriniz ">
                 
                   <input type="text" name="arac_renk" class="form-control text-center mb-3" value="<?php echo $re; ?>" style="font-weight: bold; font-size:22px;" placeholder="Araç Rengini Giriniz ">
                   <input type="text" name="arac_tur" class="form-control text-center mb-3" value="<?php echo $tur; ?>" style="font-weight: bold; font-size:22px;" placeholder="Araç Türünü Giriniz ">
               <div class="mb-3">


               <?php
    // Veritabanı bağlantısı
    $conn = mysqli_connect("localhost", "root", "", "dersler");

    // Hata kontrolü
    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    // Seçenekleri seç
    $sql = "SELECT otopark_kat, otopark_kat FROM otopark_kat";
    $result = mysqli_query($conn, $sql);

    // Hata kontrolü
    if (!$result) {
        die("Sorgu hatası: " . mysqli_error($conn));
    }

    // Dropdown listesi oluştur
    echo "<select name='arac_kat' id='kat_seciniz' class='form-control text-center mb-3'style='font-weight: bold; font-size:22px'>";
    echo "<option value=''>Kat Seçiniz</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['otopark_kat'] . "'>" . $row['otopark_kat'] . "</option>";
    }
    echo "</select>";

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
?>

               </div>
               <div class="mb-3">
               <?php
    // Veritabanı bağlantısı
    $conn = mysqli_connect("localhost", "root", "", "dersler");

    // Hata kontrolü
    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    // Seçenekleri seç
    $sql = "SELECT otopark_blok, otopark_blok FROM otopark_blok";
    $result = mysqli_query($conn, $sql);

    // Hata kontrolü
    if (!$result) {
        die("Sorgu hatası: " . mysqli_error($conn));
    }

    // Dropdown listesi oluştur
    echo "<select name='arac_blok' id='blok_seciniz' class='form-control text-center mb-3'style='font-weight: bold; font-size:22px'>";
    echo "<option value=''>Blok Seçiniz</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['otopark_blok'] . "'>" . $row['otopark_blok'] . "</option>";
    }
    echo "</select>";

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
?>
                  </select>
               </div> 
               <div class="mb-3">
          
    
  <?php
    // Veritabanı bağlantısı
    $conn = mysqli_connect("localhost", "root", "", "dersler");

    // Hata kontrolü
    if (!$conn) {
        die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
    }

    // Seçenekleri seç
    $sql = "SELECT otopark_alan, otopark_alan FROM otopark_alan";
    $result = mysqli_query($conn, $sql);

    // Hata kontrolü
    if (!$result) {
        die("Sorgu hatası: " . mysqli_error($conn));
    }

    // Dropdown listesi oluştur
    echo "<select name='arac_alan' id='alan_seciniz' class='form-control text-center mb-3'style='font-weight: bold; font-size:22px'>";
    echo "<option value=''>Alan Seçiniz</option>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<option value='" . $row['otopark_alan'] . "'>" . $row['otopark_alan'] . "</option>";
    }
    echo "</select>";

    // Veritabanı bağlantısını kapat
    mysqli_close($conn);
?>
               </div>               
               </div>
               
           
               <div class="text-center p-4">                   
             <button type="submit" name="arackayit" class="bi bi-door-open-fill btn bg-primary p-3" id="adminGirisYap"> Kayıt Yap</button>
               </div>

            
               
           </form>

</div>
         </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
