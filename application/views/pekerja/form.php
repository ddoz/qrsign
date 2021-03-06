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
        Form untuk menambahkan Pencari Kerja.
        <div class="pull-right">
            <a href="<?=base_url()?>pekerja" class="btn btn-warning"><i class="fa fa-arrow-left"></i></a>
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status_crud')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>pekerja/save" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Pas Poto (jpg/png)</label>
                <input type="file" name="foto" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Scan KTP (jpg/png)</label>
                <input type="file" name="scan_ktp" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">NIK</label>
                <input type="text" name="nik" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" required class="form-control">
            </div>
            
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="text" required name="tanggal_lahir" class="form-control datepicker">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select name="status_menikah" id="status_menikah" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Janda">Janda</option>
                    <option value="Duda">Duda</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Agama</label>
                <select name="agama" id="agama" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Alamat</label>
                <textarea type="text" name="alamat" required class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Pendidikan Terakhir</label>
                <select name="pendidikan_terakhir" id="pendidikan_terakhir" required class="form-control select2">
                    <option value="">Pilih</option>
                    <option value="SD">SD</option>
                    <option value="SMP">SMP</option>
                    <option value="SMA">SMA</option>
                    <option value="D1">D1</option>
                    <option value="D2">D2</option>
                    <option value="D3">D3</option>
                    <option value="S1">S1</option>
                    <option value="S2">S2</option>
                    <option value="S3">S3</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Tahun Lulus</label>
                <input type="text" name="tahun_lulus" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Scan Ijazah (jpg/png)</label>
                <input type="file" name="ijazah" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 1 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 2 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan_2" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan2" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Keterampilan 3 (Photoshop, Microsoft Word, dll)</label>
                        <input type="text" name="keterampilan_3" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tahun </label>
                        <input type="text" name="tahun_keterampilan3" class="form-control">
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
