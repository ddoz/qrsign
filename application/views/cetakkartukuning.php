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
            var qrcode = new QRCode("qr2", {
                text: "<?=base_url()?>validasikartu/id/<?=md5($kartu->id_kk)?>",
                width: 50,
                height: 50,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        });
    </script>
    <style>
      body {
        -webkit-print-color-adjust: exact !important;
      }
    </style>
</head>
<body onload="" style="background-color: rgb(175,169,123)">
<!--  -->
<br>
<table width="100%" align="center" cellpadding="2"  style="background-color: rgb(175,169,123); filter: alpha(opacity=40); opacity: 0.95;border:1px black solid;">
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
    <td >PENDIDIKAN FORMAL :</td>
    <td></td>
    <td align="center" style="font-size:10pt;border:1px solid black" colspan="3">KARTU TANDA BUKTI PENCARI KERJA</td>
  </tr>
  <tr>
    <td colspan="3"><?=$kartu->pendidikan_terakhir?> : Th <?=$kartu->tahun_lulus?></td>
    <td >No. Pendaftaran</td>
    <td >: <?=$kartu->no_pendaftaran?></td>
  </tr>
  <tr>
  <td colspan="3">KETERAMPILAN :</td>
    <td >No. Induk Penduduk</td>
    <td >: <?=$kartu->nik?></td>
  </tr>
  <tr>
    <td >1. <?=$kartu->keterampilan?> Th : <?=$kartu->tahun_keterampilan?></td>
    <td></td>
    <td></td>
    <td >Nama Lengkap</td>
    <td >: <?=$kartu->nama_lengkap?></td>
  </tr>
  <tr>
    <td >2. <?=($kartu->keterampilan_2=="")?"........":$kartu->keterampilan_3?> Th : <?=$kartu->tahun_keterampilan2?></td>
    <td ></td>
    <td></td>
    <td >Tempat, Tgl Lahir</td>
    <td >: <?=$kartu->tempat_lahir?>, <?=date("d M Y",strtotime($kartu->tanggal_lahir))?></td>
  </tr>
  <tr>
    <td>3. <?=($kartu->keterampilan_3=="")?"........":$kartu->keterampilan_3?> Th : <?=$kartu->tahun_keterampilan3?></td>
    <td ></td>
    <td></td>
    <td >Jenis Kelamin</td>
    <td >: <?=$kartu->jenis_kelamin?></td>
  </tr>
  <tr>
    <td align="center" colspan="2" rowspan="6">
        <div id="qr"></div>
    </td>
    <td rowspan="8" align="center">
      <img src="<?=base_url()?>uploads/<?=$kartu->foto?>" style="width:100px;120px;" alt="">
    </td>
    <td >Status</td>
    <td >: <?=$kartu->status_menikah?></td>
  </tr>
  <tr>
    <td >Agama</td>
    <td >: <?=$kartu->agama?></td>
  </tr>
  <tr>
    <td >Alamat</td>
    <td >: <?=$kartu->alamat?></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td></td>
  </tr>
  <tr>
    <td align="center" style="font-size:10pt" colspan="2">Kepala Dinas Tenaga Kerja</td>
    
  </tr>
  <tr>
    <td  align="center" style="font-size:10pt" colspan="2">Kabid Tenaga Kerja</td>
    
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
<br>
<table border="1" cellpadding="2" cellspacing="0" width="100%" align="center" style="background-color: rgb(175,169,123);">
<thead>
  <tr>
    <th>LAPORAN</th>
    <th></th>
    <th>Tgl-Bln-Thn</th>
    <th>Tanda Tangan</th>
    <th>KETENTUAN</th>
  </tr>
</thead>
<tbody>
  <tr>
    <td rowspan="4">Cetak</td>
    <td rowspan="4"></td>
    <td rowspan="4"><?=date('d/m/y',strtotime($kartu->signed_date))?></td>
    <td rowspan="4" align="center"><div id="qr2"></div></td>
    <td>1 Berlaku Nasional.</td>
  </tr>
  <tr>
    <td>2 Bila ada penambahan data / keterangan lainnya atau telah mendapatkan pekerjaan, harap segera melapor</td>
  </tr>
  <tr>
    <td>3 Apabila pencari kerja yang bersangkutan telah diterima bekerja maka instansi yang menerima agar mengembalikan AK-1 kepada Dinas Tenaga Kerja.</td>
  </tr>
  <tr>
    <td>4 Kartu ini berlaku selama 2 tahun dengan melapora setiap 6 bulan sekali bagi pencari kerja yang belum mendapat pekerjaan.</td>
  </tr>
  <tr>
    <td>Diterima di </td>
    <td></td>
    <td colspan="2">KOTA AGUNG</td>
    <td rowspan="2"></td>
  </tr>
  <tr>
    <td>Terhitung Mulai tanggal</td>
    <td></td>
    <td colspan="2"><?=date('d/m/y',strtotime($kartu->signed_date))?></td>
  </tr>
</tbody>
</table>  
</body>
</html>