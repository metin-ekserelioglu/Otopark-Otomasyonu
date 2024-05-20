<?php include 'header.php'; ?>

<?php
if (isset($_POST['abonelik'])) {
  $abone_ad = $_POST['abone_ad'];
  $abone_soyad = $_POST['abone_soyad'];
  $abone_tel = $_POST['abone_tel'];
  $abone_plaka = $_POST['abone_plaka'];
  $abone_marka = $_POST['abone_marka'];
  $abone_renk = $_POST['abone_renk'];
  $abone_tur = $_POST['abone_tur'];
 

 
  if (!$abone_ad || !$abone_soyad || !$abone_tel || !$abone_plaka || !$abone_marka || !$abone_marka || !$abone_renk || !$abone_tur ) {
    echo  '<div class="alert alert-primary text-center" role="alert">
----- Boş ALanları Doldurunuz-----
</div>';
  }
  else {
    $kaydet =$db ->prepare('INSERT INTO abonelik SET
    abone_ad= ?,
    abone_soyad = ?,
    abone_tel = ?,
    abone_plaka = ?,
    abone_marka = ?,
    abone_renk = ?,
    abone_tur = ?
   
 
   
    
    ');
    $kaydet ->execute([
      $abone_ad , $abone_soyad , $abone_tel, $abone_plaka, $abone_marka, $abone_renk , $abone_tur 
    ]);
    if ($kaydet) {
      echo  '<div class="alert alert-success text-center" role="alert">
      ----- KAYIT BAŞARILI YÖNLENDİRİLİYORSUNUZ-----
      </div>';
      header('Refresh:1; abonelik.php');
      
    }
  }
}




?>

      <div id="rrr" class="container p-8">

         <div id="card" class="card p-4">
           <h1 id="baslik" class="text-center">Abone <b>Kayıt</b></h1>
           <form action="abonelik.php" method="post">
               <div class="mb-3">
                 <input type="text" name="abone_ad" class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;" placeholder="Adınızı Giriniz ">
                   <input type="text" name="abone_soyad" class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;" placeholder="Soyadınızı  Giriniz ">
                   <input type="text" name="abone_tel" class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;" placeholder="Telefon Numaranızı Giriniz">
                   <input type="text" name="abone_plaka" class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;" placeholder="Araç Plakasını Giriniz ">
                   <div class="mb-3">
                  <select name="abone_marka"  class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;"id="" >
            <option  value="<?php echo $mar; ?>" >Marka Seçiniz</option>
            <option value="fiat">Fiat</option>
            <option value="opel">Opel</option>
            <option value="bmw">Bmw</option>
            <option value="mercedes">Mercedes</option>
            <option value="audi">Audi</option>
                  </select>
               </div>
               <div class="mb-3">
                  <select name="abone_renk"  class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;"id="" >
            <option  value="<?php echo $mar; ?>" >Renk Seçiniz Seçiniz</option>
            <option value="Sarı">Sarı</option>
            <option value="Kırmızı">Kırmızı</option>
            <option value="Mavi">Mavi</option>
            <option value="Siyah">Siyah</option>
            <option value="Gri">Gri</option>
                  </select>
               </div>
                   <div class="mb-3">
                  <select name="abone_tur"  class="form-control text-center mb-3" style="font-weight: bold; font-size:22px;"id="" >
            <option  value="<?php echo $mar; ?>" >Kategori Seçiniz</option>
            <option value="otomobil">Otomobil</option>
            <option value="kasalı">Kasalı</option>
            <option value="ticari">Ticari</option>
                  </select>
               </div>
             
               </div>
   
               <div class="text-center p-4">                   
             <button type="submit" name="abonelik" class="bi bi-door-open-fill btn bg-primary p-3" id="adminGirisYap"> Kayıt Yap</button>
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