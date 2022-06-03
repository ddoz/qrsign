<section class="content-header">
      <h1>
        Form Pelanggan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Form Pelanggan</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk menambahkan Pelanggan.
        <div class="pull-right">
            <a href="<?=base_url()?>pekerja" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status_crud')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>pekerja/update" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=@$pekerja->id?>">
            <div class="form-group">
                <label for="">Pas Poto</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Scan KTP</label>
                <input type="file" name="scan_ktp" class="form-control">
            </div>
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" name="nik" value="<?=$pekerja->nik?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?=$pekerja->nama_lengkap?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="<?=$pekerja->tempat_lahir?>" required class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="text" required name="tanggal_lahir" value="<?=$pekerja->tanggal_lahir?>" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option <?=($pekerja->jenis_kelamin=="Laki-Laki")?"selected":""?> value="Laki-Laki">Laki-Laki</option>
                    <option <?=($pekerja->jenis_kelamin=="Perempuan")?"selected":""?> value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Status Menikah</label>
                <select name="status_menikah" id="status_menikah" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option <?=($pekerja->status_menikah=="Belum Kawin")?"selected":""?> value="Belum Kawin">Belum Kawin</option>
                    <option <?=($pekerja->status_menikah=="Kawin")?"selected":""?> value="Kawin">Kawin</option>
                    <option <?=($pekerja->status_menikah=="Janda")?"selected":""?> value="Janda">Janda</option>
                    <option <?=($pekerja->status_menikah=="Duda")?"selected":""?> value="Duda">Duda</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Agama</label>
                <select name="agama" id="agama" value="<?=$pekerja->agama?>" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option <?=($pekerja->agama=="Islam")?"selected":""?> value="Islam">Islam</option>
                    <option <?=($pekerja->agama=="Kristen")?"selected":""?> value="Kristen">Kristen</option>
                    <option <?=($pekerja->agama=="Katolik")?"selected":""?> value="Katolik">Katolik</option>
                    <option <?=($pekerja->agama=="Hindu")?"selected":""?> value="Hindu">Hindu</option>
                    <option <?=($pekerja->agama=="Budha")?"selected":""?> value="Budha">Budha</option>
                    <option <?=($pekerja->agama=="Konghucu")?"selected":""?> value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea type="text" name="alamat" required class="form-control"><?=$pekerja->alamat?></textarea>
            </div>
            <div class="form-group">
                <label for="">Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" id="pendidikan_terakhir" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option  <?=($pekerja->pendidikan_terakhir=="SD")?"selected":""?> value="SD">SD</option>
                    <option <?=($pekerja->pendidikan_terakhir=="SMP")?"selected":""?> value="SMP">SMP</option>
                    <option <?=($pekerja->pendidikan_terakhir=="SMA")?"selected":""?> value="SMA">SMA</option>
                    <option <?=($pekerja->pendidikan_terakhir=="D1")?"selected":""?> value="D1">D1</option>
                    <option <?=($pekerja->pendidikan_terakhir=="D2")?"selected":""?> value="D2">D2</option>
                    <option <?=($pekerja->pendidikan_terakhir=="D3")?"selected":""?> value="D3">D3</option>
                    <option <?=($pekerja->pendidikan_terakhir=="S1")?"selected":""?> value="S1">S1</option>
                    <option <?=($pekerja->pendidikan_terakhir=="S2")?"selected":""?> value="S2">S2</option>
                    <option <?=($pekerja->pendidikan_terakhir=="S3")?"selected":""?> value="S3">S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tahun Lulus</label>
                <input type="text" name="tahun_lulus" value="<?=$pekerja->tahun_lulus?>" required class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 1 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan" value="<?=$pekerja->keterampilan?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan" value="<?=$pekerja->tahun_keterampilan?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 2 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan_2" value="<?=$pekerja->keterampilan_2?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan2" value="<?=$pekerja->tahun_keterampilan2?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 3 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan_3" value="<?=$pekerja->keterampilan_3?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan3" value="<?=$pekerja->tahun_keterampilan3?>" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" value="simpan" class="btn btn-success"><span class="fa fa-pencil"></span> Ubah</button>
            </div>
        </form>
    </div>
</div>
</section>
