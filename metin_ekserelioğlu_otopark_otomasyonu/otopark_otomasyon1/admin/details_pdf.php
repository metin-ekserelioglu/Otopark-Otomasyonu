<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTOPARK OTOMASYONU</title>
</head>
<body>
    <p style="text-align: center;">Park Fisi</p>
    <table  width="100%" border="1">
        <tr>
            <td><b>Araç Sahip:</b></td>
            <td><?=$user['arac_sahip']?></td>
            <td><b>Plaka:</b></td>
            <td><?=$user['arac_plaka']?></td>
            <td><b>Marka:</b></td>
            <td><?=$user['arac_marka']?></td>
        </tr>
        <tr>
            <td><b>Kategori:</b></td>
            <td><?=$user['arac_tur']?></td>
            <td><b>Araç Giris Tarih:</b></td>
            <td><?=$user['arac_giris_tarih']?></td>
            <td><b>Araç Çikis Tarih:</b></td>
            <td><?=$user['arac_cikis_tarih']?></td>
        </tr>
        <tr>
        <td><b>Ücret:</b></td>
            <td><?=$user['ucret']?></td>
        </tr>
    </table>
</body>
</html>

