<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Kuning</title>
    <script src="<?=base_url()?>assets/jquery.min.js"></script>
    <script src="<?=base_url()?>assets/qrcode.min.js"></script>
    <script>
        $(document).ready(function(){
            var qrcode = new QRCode("qr", {
                text: "<?=base_url()?>validasikartu/id/<?=md5($kartu->id_kk)?>",
                width: 100,
                height: 100,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        });
    </script>
</head>
<body onload="window.print()">
<!--  -->
<br>
<table width="100%" align="center" cellpadding="2" style="background-color: #ffffff; filter: alpha(opacity=40); opacity: 0.95;border:1px black solid;">
<thead>
  <tr>
    <th></th>
    <th></th>
    <th>
    <img src="<?=base_url()?>assets/logo.png" width="50" alt=""></th>
    <th colspan="2">
    PEMERINTAH KABUPATEN TANGGAMUS<br>DINAS TENAGA KERJA</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td >Pendidikan Formal</td>
    <td >: <?=$kartu->pendidikan_terakhir?></td>
    <td align="center" style="font-size:10pt;border:1px solid black" colspan="3">KARTU TANDA BUKTI PENCARI KERJA</td>
  </tr>
  <tr>
    <td >Keterampilan</td>
    <td >: <?=$kartu->keterampilan?></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td align="center" colspan="2" rowspan="6">
        <div id="qr"></div>
    </td>
    <td rowspan="8" align="center">
      <img src="<?=base_url()?>uploads/<?=$kartu->foto?>" style="width:100px;120px;" alt="">
    </td>
    <td >No. Pendaftaran</td>
    <td >: <?=$kartu->no_pendaftaran?></td>
  </tr>
  <tr>
    <td >No. Induk Penduduk</td>
    <td >: <?=$kartu->nik?></td>
  </tr>
  <tr>
    <td >Nama Lengkap</td>
    <td >: <?=$kartu->nama_lengkap?></td>
  </tr>
  <tr>
    <td >Tempat, Tgl Lahir</td>
    <td >: <?=$kartu->tempat_lahir?>, <?=date("d M Y",strtotime($kartu->tanggal_lahir))?></td>
  </tr>
  <tr>
    <td >Jenis Kelamin</td>
    <td >: <?=$kartu->jenis_kelamin?></td>
  </tr>
  <tr>
    <td >Status</td>
    <td >: <?=$kartu->status_menikah?></td>
  </tr>
  <tr>
    <td align="center" style="font-size:10pt" colspan="2">Kepala Dinas Tenaga Kerja</td>
    <td >Agama</td>
    <td >: <?=$kartu->agama?></td>
  </tr>
  <tr>
    <td  align="center" style="font-size:10pt" colspan="2">Kabid Tenaga Kerja</td>
    <td >Alamat</td>
    <td >: <?=$kartu->alamat?></td>
  </tr>
  <tr>
    <td colspan="2" align="center" ><?=$kartu->name?></td>
    <td ></td>
    <td ></td>
  </tr>
  <tr>
    <td align="center" colspan="2">NIP : <?=$kartu->nip?> </td>
    <td colspan="2"></td>
  </tr>
</tbody>
</table>
    
</body>
</html>