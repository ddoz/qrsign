<section class="content-header">
      <h1>
        Form Data Pribadi
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Pekerja</li>
        <li class="active"><i class="fa fa-plus"></i> Form Data Pribadi</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Form untuk mengubah data pribadi.
        <div class="pull-right">

        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status_crud')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>datapribadi/save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Pas Poto</label>
                <input type="file" name="foto" <?php if(@$profil->foto==""){ ?> required <?php } ?> class="form-control">
                <?php if(@$profil->foto!=""){ ?> 
                    <img src="<?=base_url()?>uploads/<?=$profil->foto?>" width="150" alt="">    
                <?php } ?> 
            </div>
            <div class="form-group">
                <label for="">Scan KTP</label>
                <input type="file" name="scan_ktp"  <?php if(@$profil->scan_ktp==""){ ?> required <?php } ?> class="form-control">
                <?php if(@$profil->scan_ktp!=""){ ?> 
                    <img src="<?=base_url()?>uploads/<?=$profil->scan_ktp?>" width="150" alt="">    
                <?php } ?> 
            </div>
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" name="nik" value="<?=@$profil->nik?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="<?=@$profil->nama_lengkap?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" required value="<?=@$profil->tempat_lahir?>" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="text" required name="tanggal_lahir" value="<?=@$profil->tanggal_lahir?>" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option value="Laki-Laki" <?=@$profil->jenis_kelamin=="Laki-Laki"?"selected":""?>>Laki-Laki</option>
                    <option value="Perempuan" <?=@$profil->jenis_kelamin=="Perempuan"?"selected":""?>>Perempuan</option>
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
                <select name="agama" id="agama" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option value="Islam" <?=@$profil->agama=="Islam"?"selected":""?>>Islam</option>
                    <option value="Kristen" <?=@$profil->agama=="Kristen"?"selected":""?>>Kristen</option>
                    <option value="Katolik" <?=@$profil->agama=="Katolik"?"selected":""?>>Katolik</option>
                    <option value="Hindu" <?=@$profil->agama=="Hindu"?"selected":""?>>Hindu</option>
                    <option value="Budha" <?=@$profil->agama=="Budha"?"selected":""?>>Budha</option>
                    <option value="Konghucu" <?=@$profil->agama=="Konghucu"?"selected":""?>>Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea type="text" name="alamat" required class="form-control"><?=@$profil->alamat?></textarea>
            </div>
            <div class="form-group">
                <label for="">Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" id="pendidikan_terakhir" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option value="SD" <?=@$profil->pendidikan_terakhir=="SD"?"selected":""?>>SD</option>
                    <option value="SMP" <?=@$profil->pendidikan_terakhir=="SMP"?"selected":""?>>SMP</option>
                    <option value="SMA" <?=@$profil->pendidikan_terakhir=="SMA"?"selected":""?>>SMA</option>
                    <option value="D1" <?=@$profil->pendidikan_terakhir=="D1"?"selected":""?>>D1</option>
                    <option value="D2" <?=@$profil->pendidikan_terakhir=="D2"?"selected":""?>>D2</option>
                    <option value="D3" <?=@$profil->pendidikan_terakhir=="D3"?"selected":""?>>D3</option>
                    <option value="S1" <?=@$profil->pendidikan_terakhir=="S1"?"selected":""?>>S1</option>
                    <option value="S2" <?=@$profil->pendidikan_terakhir=="S2"?"selected":""?>>S2</option>
                    <option value="S3" <?=@$profil->pendidikan_terakhir=="S3"?"selected":""?>>S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tahun Lulus</label>
                <input type="text" name="tahun_lulus" value="<?=$profil->tahun_lulus?>" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Scan Ijazah (jpg/png)</label>
                <input type="file" name="ijazah" class="form-control">
            </div>
            <?php if(@$profil->ijazah!=""){ ?> 
                    <img src="<?=base_url()?>uploads/<?=$profil->ijazah?>" width="150" alt="">    
            <?php } ?> 
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 1 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan" value="<?=$profil->keterampilan?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan" value="<?=$profil->tahun_keterampilan?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 2 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan_2" value="<?=$profil->keterampilan_2?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan2" value="<?=$profil->tahun_keterampilan2?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 3 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan_3" value="<?=$profil->keterampilan_3?>" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan3" value="<?=$profil->tahun_keterampilan3?>" class="form-control">
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" value="simpan" class="btn btn-success"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
