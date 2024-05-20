<?php
include('config.php');
?>
<?php include 'header.php'; ?>
<!doctype html>
<html lang="tr">

<head>
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
  
  <title>OTOPARK OTOMASYONU</title>
</head>

<body>
  <div class="container">

  
  
  <h1 class="text-center">GÜVENLİ VE PREMİUM PARK YERLERİ</h1>

  <div class="card">
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Araç Sahibi:</th>
            <th scope="col">Plaka :</th>
            <th scope="col">Ücret</th>
            <th scope="col">Araç Çıkış Tarih</th>
            
          </tr>
        </thead>
        <tbody>
          <?php $query = mysqli_query($con,"SELECT * FROM arac_kayit "); 
          $i=1;
          while($row = mysqli_fetch_assoc($query))
          {
          ?>
          <tr>
            <th scope="row"><?=$i++?>.</th>
            <td><?=$row['arac_sahip']?></td>
            <td><?=$row['arac_plaka']?></td>
            <td><?=$row['ucret']?></td>
            <td><?=$row['arac_cikis_tarih']?></td>
            <td>
              <a target="_blank" href="print-details.php?arac_id=<?=$row['arac_id']?>" class="btn btn-sm btn-primary"> <i class="fa fa-file-pdf-o"></i> Yazdır</a>
            </td>
          </tr>
         <?php } ?>
        </tbody>
      </table>
    </div>
  </div>

  </div>

  <div class="text-center">
   <div class="card p-4">
     <b>Tüm hakları saklıdır  &copy; <?php  echo date("Y"); ?> </b>
   </div>
 </div>








  

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
 
</body>

</html>