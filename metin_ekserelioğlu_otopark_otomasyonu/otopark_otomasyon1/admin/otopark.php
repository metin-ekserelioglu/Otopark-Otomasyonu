<?php include 'header.php'; ?>

<?php
if (isset($_POST['otoparkkat'])) {
  $otopark_kat = $_POST['otopark_kat'];
 
 
  if (!$otopark_kat) {
    echo  '<div class="alert alert-primary text-center" role="alert">
----- Boş ALanları Doldurunuz-----
</div>';
  }
  else {
    $kaydet =$db ->prepare('INSERT INTO otopark_kat SET
    otopark_kat= ?
    
 ');
    $kaydet ->execute([
      $otopark_kat
    ]);
    if ($kaydet) {
      echo  '<div class="alert alert-success text-center" role="alert">
      ----- KAYIT BAŞARILI YÖNLENDİRİLİYORSUNUZ-----
      </div>';
      header('Refresh:1; otopark.php');
      
    }
  }
}


// bu kısım otopark bilgi sayfasında kayıtlı alanları görmemizi sağlıyacak

$conn = mysqli_connect("localhost", "root", "", "dersler");

// Hata kontrolü
if (!$conn) {
    die("Veritabanı bağlantısı başarısız: " . mysqli_connect_error());
}

// Alanlar için sorgu
$sql_alan = "SELECT otopark_alan, otopark_alan FROM otopark_alan";
$result_alan = mysqli_query($conn, $sql_alan);

// Hata kontrolü
if (!$result_alan) {
    die("Alanlar için sorgu hatası: " . mysqli_error($conn));
}

// Bloklar için sorgu
$sql_blok = "SELECT otopark_blok, otopark_blok FROM otopark_blok";
$result_blok = mysqli_query($conn, $sql_blok);

// Hata kontrolü
if (!$result_blok) {
    die("Bloklar için sorgu hatası: " . mysqli_error($conn));
}

// Katlar için sorgu
$sql_kat = "SELECT otopark_kat, otopark_kat FROM otopark_kat";
$result_kat = mysqli_query($conn, $sql_kat);

// Hata kontrolü
if (!$result_kat) {
    die("Katlar için sorgu hatası: " . mysqli_error($conn));
}

// Dropdown listelerini oluştur
echo "<div style='position: fixed; bottom: 0; right: 0; margin: 20px;'>";

echo "<select name='arac_kat' id='kat_seciniz' class='form-control text-center mb-3' style='font-weight: bold; font-size:22px'>";
echo "<option value=''>Kat Seçiniz</option>";
while ($row = mysqli_fetch_assoc($result_kat)) {
    echo "<option value='" . $row['otopark_kat'] . "'>" . $row['otopark_kat'] . "</option>";
}
echo "</select>";


echo "<select name='arac_blok' id='blok_seciniz' class='form-control text-center mb-3' style='font-weight: bold; font-size:22px;'>";
echo "<option value=''>Blok Seçiniz</option>";
while ($row = mysqli_fetch_assoc($result_blok)) {
    echo "<option value='" . $row['otopark_blok'] . "'>" . $row['otopark_blok'] . "</option>";
}
echo "</select>";

echo "<select name='arac_alan' id='alan_seciniz' class='form-control text-center mb-3' style='font-weight: bold; font-size:22px;'>";
echo "<option value=''>Alan Seçiniz</option>";
while ($row = mysqli_fetch_assoc($result_alan)) {
    echo "<option value='" . $row['otopark_alan'] . "'>" . $row['otopark_alan'] . "</option>";
}
echo "</select>";



echo "</div>";

// Veritabanı bağlantısını kapat
mysqli_close($conn);



?>

<?php
if (isset($_POST['otoparkblok'])) {
  $otopark_blok = $_POST['otopark_blok'];
 
 
  if (!$otopark_blok) {
    echo  '<div class="alert alert-primary text-center" role="alert">
----- Boş ALanları Doldurunuz-----
</div>';
  }
  else {
    $kaydet =$db ->prepare('INSERT INTO otopark_blok SET
    otopark_blok= ?
    
 ');
    $kaydet ->execute([
      $otopark_blok
    ]);
    if ($kaydet) {
      echo  '<div class="alert alert-success text-center" role="alert">
      ----- KAYIT BAŞARILI YÖNLENDİRİLİYORSUNUZ-----
      </div>';
      header('Refresh:1; otopark.php');
      
    }
  }
}




?>

<?php
if (isset($_POST['otoparkalan'])) {
  $otopark_alan = $_POST['otopark_alan'];
 
 
  if (!$otopark_alan) {
    echo  '<div class="alert alert-primary text-center" role="alert">
----- Boş ALanları Doldurunuz-----
</div>';
  }
  else {
    $kaydet =$db ->prepare('INSERT INTO otopark_alan SET
    otopark_alan= ?
    
 ');
    $kaydet ->execute([
      $otopark_alan
    ]);
    if ($kaydet) {
      echo  '<div class="alert alert-success text-center" role="alert">
      ----- KAYIT BAŞARILI YÖNLENDİRİLİYORSUNUZ-----
      </div>';
      header('Refresh:1; otopark.php');
      
    }
  }
}




?>
--
<?php
if (isset($_POST['otoparkatagori'])) {
  $otopark_kategori = $_POST['otopark_kategori'];
 
 
  if (!$otopark_kategori) {
    echo  '<div class="alert alert-primary text-center" role="alert">
----- Boş ALanları Doldurunuz-----
</div>';
  }
  else {
    $kaydet =$db ->prepare('INSERT INTO otopark_kategori SET
    otopark_kategori= ?
    
 ');
    $kaydet ->execute([
      $otopark_kategori
    ]);
    if ($kaydet) {
      echo  '<div class="alert alert-success text-center" role="alert">
      ----- KAYIT BAŞARILI YÖNLENDİRİLİYORSUNUZ-----
      </div>';
      header('Refresh:1; otopark.php');
      
    }
  }
}




?>

      <div id="rrr" class="container p-8">

         <div id="card" class="card p-4">
           <h1 id="baslik" class="text-center">Otopark<b>Bilgi</b></h1>
           <form action="otopark.php" method="post">
               <div class="mb-3">
                 <input type="text" name="otopark_kat" class="form-control text-center mb-1" style="font-weight: bold; font-size:22px;" placeholder="Kat Giriniz">
                 <div class="text-center p-2">                   
             <button type="submit" name="otoparkkat" class="bi bi-door-open-fill btn bg-primary p-1" id="adminGirisYap"> Kayıt Yap</button>
               </div>
                   <input type="text" name="otopark_blok" class="form-control text-center mb-1" style="font-weight: bold; font-size:22px;" placeholder="Blok Giriniz ">
                   <div class="text-center p-2">                   
             <button type="submit" name="otoparkblok" class="bi bi-door-open-fill btn bg-primary p-1" id="adminGirisYap"> Kayıt Yap</button>
               </div>
                   <input type="text" name="otopark_alan" class="form-control text-center mb-1" style="font-weight: bold; font-size:22px;" placeholder="Alan Giriniz">
                   <div class="text-center p-2">                   
             <button type="submit" name="otoparkalan" class="bi bi-door-open-fill btn bg-primary p-1" id="adminGirisYap"> Kayıt Yap</button>
              
            </div>
               <input type="text" name="otopark_kategori" class="form-control text-center mb-1" style="font-weight: bold; font-size:22px;" placeholder="Kategori Giriniz">
                   <div class="text-center p-2">                   
             <button type="submit" name="otoparkatagori" class="bi bi-door-open-fill btn bg-primary p-1" id="adminGirisYap"> Kayıt Yap</button>
               </div>
               </div>
             
               <!--bu alanda otoparkın kayıtlı bilgilerini görcez -->
   
  <!--bu alanda otoparkın kayıtlı bilgilerini görcez -->

             
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