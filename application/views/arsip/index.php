<section class="content-header">
      <h1>
        Arsip Kartu Kuning
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-archive"></i> Arsip Kartu Kuning</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Kartu Kuning.
        <div class="pull-right">
        </div>
      </div>
      <div class="box-body">
      <div id="info-alert"><?=@$this->session->flashdata('status_crud')?></div>
        <div class="table-responsive">
        <table class="table table-hover exporting-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Tahun</th>
                    <th>Status Pendaftaran</th>
                    <th>Status Kartu Kuning</th>
                    <th>Tanggal Tanda Tangan</th>
                    <th>Tanggal Kadaluarsa</th>
                    <th>Penandatangan</th>
                    <?php if($this->session->userdata('userLevel')=="1") { ?>
                    <th>Aksi</th>
                    <?php }?>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; if(!empty($kartu)) { 
              foreach($kartu as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->nama_lengkap?></td>
                    <td><?=$row->tahun_cetak?></td>
                    <td><?=ucfirst($row->status_pendaftaran)?></td>
                    <td><?=ucfirst($row->status_kartu)?></td>
                    <td><?=$row->signed_date?></td>
                    <td><?=$row->expired_date?></td>
                    <td><?=$row->name?></td>
                    <?php if($this->session->userdata('userLevel')=="1") { ?>
                    <td>
                        <a target="_blank" href="<?=base_url()?>pekerja/cetakkartukuning/<?=md5($row->id_kk)?>" class="btn btn-warning btn-xs"><i class="fa fa-print"></i> Cetak Kartu</a>
                        <a onclick="return confirm('Hapus Data?')" href="<?=base_url()?>pekerja/hapuskartukuning/<?=md5($row->id_pekerja)?>/<?=md5($row->id_kk)?>" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</a>
                    </td>
                    <?php }?>
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