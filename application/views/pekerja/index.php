<section class="content-header">
      <h1>
        Pencari Kerja
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Pencari Kerja</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Pencari Kerja.
        <div class="pull-right">
            <?php if($this->session->userdata('userLevel')=="1") { ?>
            <a href="<?=base_url()?>pekerja/form" class="btn btn-success"><i class="fa fa-plus"></i></a>
            <?php }?>
        </div>
      </div>
      <div class="box-body">
      <div id="info-alert"><?=@$this->session->flashdata('status_crud')?></div>
        <div class="table-responsive">
        <table class="table table-hover exporting-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pas Poto</th>
                    <th>Scan KTP</th>
                    <th>No Pendaftaran</th>
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Status</th>
                    <th>Agama</th>
                    <th>Alamat</th>
                    <th>Pendidikan Terakhir</th>
                    <th>Keterampilan</th>
                    <th>Waktu Pendaftaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($table)) { 
              foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td>
                      <a target="_blank" href="<?=base_url()?>uploads/<?=$row->foto?>">Pas Poto</a>
                    </td>
                    <td>
                      <a target="_blank" href="<?=base_url()?>uploads/<?=$row->scan_ktp?>">Scan KTP</a>
                    </td>
                    <td><?=$row->no_pendaftaran?></td>
                    <td><?=$row->nik?></td>
                    <td><?=$row->nama_lengkap?></td>
                    <td><?=$row->tempat_lahir?> - <?=$row->tanggal_lahir?></td>
                    <td><?=$row->jenis_kelamin?></td>
                    <td><?=$row->status_menikah?></td>
                    <td><?=$row->agama?></td>
                    <td><?=$row->alamat?></td>
                    <td><?=$row->pendidikan_terakhir?></td>
                    <td><?=$row->keterampilan?></td>
                    <td><?=$row->waktu_pendaftaran?></td>
                    <td>
                         <a href="<?=base_url()?>pekerja/kartukuning/<?=md5($row->id)?>" class="btn btn-success btn-xs"><i class="fa fa-list"></i> Kartu Kuning</a>
                        <a href="<?=base_url()?>pekerja/edit/<?=md5($row->id)?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Ubah</a>
                        <a onclick="return confirm('Hapus Data?')" href="<?=base_url()?>pekerja/hapus/<?=md5($row->id)?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</a>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <form action="<?=base_url()?>kriteria/update" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Form Edit</h4>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="">Nama Penilaian</label>
                <input type="hidden" name="id" id="id" required>
                <input type="text" name="nama_kriteria" id="nama_kriteria" required class="form-control">
            </div>
            <div class="form-group">
                <label for="">Keterangan dibagian input</label>
                <input type="text" name="keterangan" id="keterangan" required class="form-control">
            </div>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
</form>

  </div>
</div>