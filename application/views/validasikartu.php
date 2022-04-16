<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi Kartu Kuning</title>
</head>
<body>

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-bzci{font-size:20px;text-align:center;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
</style>
<table class="tg" align="center">
<thead>
  <tr>
    <th class="tg-bzci" colspan="2"><span style="font-weight:bold">INFORMASI KARTU KUNING</span></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-baqh" colspan="2">Kartu ini merupakan <b>Kartu Kuning</b> asli yang diterbitkan oleh Dinas Tenaga Kerja Tanggamus</td>
  </tr>
  <tr>
    <td class="tg-0lax">Nama Lengkap</td>
    <td class="tg-0lax">: <?=$kartu->nama_lengkap?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Tanggal Ditanda Tangani</td>
    <td class="tg-0lax">: <?=date("d M Y",strtotime($kartu->signed_date))?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Kadaluarsa</td>
    <td class="tg-0lax">: <?=date("d M Y",strtotime($kartu->expired_date))?></td>
  </tr>
  <tr>
    <td class="tg-amwm" colspan="2">Halaman ini merupakan halaman validasi kartu kuning untuk mengamankan data asli</td>
  </tr>
</tbody>
</table>
    
</body>
</html>