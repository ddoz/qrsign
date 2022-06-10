<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Kartu Kuning</title>
    <style>
      @media print {
        footer {page-break-after: always;}
        body {
          font-family: Arial, Helvetica, sans-serif;
        }
      }
    </style>
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
        font-family: Arial, Helvetica, sans-serif;
      }
    </style>
</head>
<body onload="window.print()" style="background-color: #f4f279">
<!--  -->
<br>
<!-- <table width="100%" align="center" cellpadding="2"  style="background-color: #f4f279; filter: alpha(opacity=40); opacity: 0.95;border:1px black solid;">
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
      <img src="<?=base_url()?>uploads/<?=$kartu->foto?>" style="width:100px;height100px;" alt="">
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
</table> -->
<table  width="100%" align="center" cellpadding="2"  style="background-color: #f4f279; filter: alpha(opacity=40); opacity: 0.95;border:1px black solid;">
<thead>
  <tr>
    <th style="text-align:left" colspan="3"></th>
    <th width="60"> <img src="<?=base_url()?>assets/logo.png" width="50" alt=""></th>
    <th colspan="3">PEMERINTAH KABUPATEN TANGGAMUS<br>DINAS TENAGA KERJA</th>
  </tr>
</thead>
<tbody>
  <tr>
    <th style="text-align:left" colspan="3">PENDIDIKAN FORMAL :</th>
    <td></td>
    <td></td>
    <td align="right" colspan="4">Kartu AK/1</td>
  </tr>
  <tr>
    <td><?=$kartu->pendidikan_terakhir?> </td>
    <td>: Th <?=$kartu->tahun_lulus?></td>
    <td></td>
    <td align="center" colspan="4" style="border:1px solid black;">KARTU TANDA BUKTI PENDAFTARAN PENCARI KERJA</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="3">No. Pendaftaran Pencaker</td>
    <td>: <?=$kartu->no_pendaftaran?></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td colspan="3">No. Induk Penduduk</td>
    <td>: <?=$kartu->nik?></td>
  </tr>
  <tr>
    <td>KETERAMPILAN</td>
    <td></td>
    <td></td>
    <td colspan="3">Nama Lengkap</td>
    <td>: <?=$kartu->nama_lengkap?></td>
  </tr>
  <tr>
    <td>1  <?=($kartu->keterampilan=="")?"................................":$kartu->keterampilan?> </td>
    <td>Th <?=$kartu->tahun_keterampilan?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>2 <?=($kartu->keterampilan_2=="")?"................................":$kartu->keterampilan_2?> </td>
    <td>Th <?=$kartu->tahun_keterampilan2?></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>3  <?=($kartu->keterampilan_2=="")?"................................":$kartu->keterampilan_3?> </td>
    <td>Th <?=$kartu->tahun_keterampilan3?></td>
    <td></td>
    <td colspan="2" rowspan="9" style="vertical-align: top;width:110px !important">
    <img src="<?=base_url()?>uploads/<?=$kartu->foto?>" style="width:100px;height100px;" alt="">
    </td>
    <td>Tempat, Tgl Lahir</td>
    <td>: <?=$kartu->tempat_lahir?>, <?=date("d M Y",strtotime($kartu->tanggal_lahir))?></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center">an. Kepala Dinas Tenaga Kerja</td>
    <td>Jenis Kelamin</td>
    <td>: <?=$kartu->jenis_kelamin?></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center">Kabid Tenaga Kerja</td>
    <td>Status</td>
    <td>: <?=$kartu->status_menikah?></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center"></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center"></td>
    <td>Agama</td>
    <td>: <?=$kartu->agama?></td>
  </tr>
  <tr>
    <td colspan="3" align="center" rowspan="2"><div id="qr"></div></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>Alamat</td>
    <td>:  <?=$kartu->alamat?></td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center"><?=$kartu->name?></td>
    <td></td>
    <td>KEC</td>
  </tr>
  <tr>
    <td colspan="3" style="text-align:center">NIP. <?=$kartu->nip?></td>
    <td></td>
    <td>KAB. TANGGAMUS</td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
  </tr>
</tbody>
</table>
<br>
<footer></footer>
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
.tg .tg-73oq{border-color:#000000;text-align:left;vertical-align:top}
</style>
<table class="tg" width="100%" style="background-color: #f4f279;">
  <tbody>
  <tr>
    <th class="tg-0lax" rowspan="2">LAPORAN</th>
    <th class="tg-0lax" rowspan="2"></th>
    <th class="tg-baqh" rowspan="2">Tgl-Bln-Thn</th>
    <th class="tg-baqh" rowspan="2">Tanda tangan pengantar kerja / <br>petugas pendaftar <br>Cantumkan NIP</th>
    <th class="tg-0lax" colspan="2">KETENTUAN</th>
  </tr>
  <tr>
    <th class="tg-0lax" colspan="2"><span style="font-weight:400;font-style:normal">1. Berlaku Nasional.</span></th>
  </tr>
  <tr>
    <td class="tg-0lax">Pertama</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax" colspan="2">2. Bila ada penambahan data / keterangan lainnya atau <br>&nbsp;&nbsp;&nbsp;&nbsp;telah mendapatkan pekerjaan, harap segera melapor.</td>
  </tr>
  <tr>
    <td class="tg-0lax">Kedua</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax" colspan="2"><span style="font-weight:400;font-style:normal">3. Apabila pencari kerja yang bersangkutan telah diterima </span><br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:400;font-style:normal">bekerja maka instansi yang menerima agar </span><br><span style="font-weight:400;font-style:normal">&nbsp;&nbsp;&nbsp;&nbsp;mengembalikan AK-1 kepada Dinas Tenaga Kerja.</span></td>
  </tr>
  <tr>
    <td class="tg-0lax">Ketiga</td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax"></td>
    <td class="tg-0lax" colspan="2"><span style="font-weight:400;font-style:normal">4. Kartu ini berlaku selama 2 tahun dengan melapora setiap </span><br>&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight:400;font-style:normal">6 bulan sekali bagi pencari kerja yang belum mendapat </span><br><span style="font-weight:400;font-style:normal">&nbsp;&nbsp;&nbsp;&nbsp;pekerjaan.</span></td>
  </tr>
  <tr>
    <td class="tg-0lax" style="border-left:0;border-right:0" colspan="6"></td>
  </tr>
  <tr>
    <td style="border:none;border-left:1px solid black;" class="">Diterima di</td>
    <td  style="border:none;" class=""></td>
    <td  style="border:none;" class=""></td>
    <td  style="border:none;" class="">: KOTA AGUNG</td>
    <td  style="border:none;" class=""></td>
    <td style="border:none;border-right:1px solid black;" class=""></td>
  </tr>
  <tr>
    <td  style="border:none;border-bottom:1px solid black;border-left:1px solid black;">Terhitung Mulai Tanggal</td>
    <td  style="border:none;border-bottom:1px solid black"></td>
    <td  style="border:none;border-bottom:1px solid black"></td>
    <td  style="border:none;border-bottom:1px solid black"></td>
    <td  style="border:none;border-bottom:1px solid black"></td>
    <td  style="border:none;border-bottom:1px solid black;border-right:1px solid black;"></td>
  </tr>
</tbody>
</table> 
</body>
</html>