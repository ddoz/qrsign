<section class="content-header">
      <h1>
        Ubah Password
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Pengguna</li>
        <li class="active"><i class="fa fa-lock"></i> Ubah Password</li>
      </ol>
    </section>

<section class="content">
<div class="box box-primary">
    <div class="box-header with-border">
        Form untuk mengubah password.
        <div class="pull-right">
        </div>
     <div id="info-alert"><?=@$this->session->flashdata('status_crud')?></div>
    </div>
    <div class="box-body">
        <form method="POST" action="<?=base_url()?>pengguna/updatepassword" target="" enctype="multipart/form-data">
           
            <div class="form-group">
                <label>Password Lama</label>
                <input type="password" name="old" required class="form-control">
            </div>
            <div class="form-group">
                <label>Password Baru</label>
                <input type="password" name="new" required class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" name="cetak" class="btn btn-primary"><span class="fa fa-save"></span> Simpan</button>
            </div>
        </form>
    </div>
</div>
</section>
