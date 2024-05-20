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
      <div id="rr" class="container p-5">

         <div id="card" class="card p-4">
           <h1 id="baslik" class="text-center">Yönetici <b>Girişi</b></h1>
           <form action="islem.php" method="post">
               <div class="mb-3">
                   <input type="text" name="kullanici_mail" class="form-control text-center mb-3" placeholder="Giriş Numarasını Tıkla" required>
               </div>
               <div class="mb-3">
               <input type="password"  name="kullanici_sifre" class="form-control text-center mb-3" placeholder="Giriş Numarasını Tıkla" required>
               </div>
               <div class="text-center p-4">  
               <button type="submit" name="admingiris" class="bi bi-arrow-left btn bg-danger p-3" id="adminGirisYap"> <a href="../index.php" style="color:white;"> Geri Dön</a></button>
                 
             <button type="submit" name="admingiris" class="bi bi-door-open-fill btn bg-primary p-3" id="adminGirisYap"> Giriş Yap</button>
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