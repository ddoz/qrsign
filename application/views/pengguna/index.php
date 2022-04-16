<section class="content-header">
      <h1>
        Pengguna
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-envelope"></i> Admin</li>
        <li class="active"><i class="fa fa-plus"></i> Pengguna</li>
      </ol>
    </section>

<section class="content">
<div class="box box-secondary">
    <div class="box-header with-border">
        Data Pengguna.
        <div class="pull-right">
            <a href="<?=base_url()?>pengguna/form" class="btn btn-success"><i class="fa fa-plus"></i></a>
        </div>
    </div>
    <div class="box-body">
        <div id="info-alert"><?=@$this->session->flashdata('status_crud')?></div>
        <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Waktu Terverifikasi Akun</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Grup Pengguna</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; $arr_level = ["0"=>"Pimpinan","1"=>"Admin"]; if(!empty($table)){ foreach($table as $row){ ?>
                <tr>
                    <td><?=$i++?></td>
                    <td><?=$row->email?></td>
                    <td><?=$row->email_verified_at?></td>
                    <td><?=$row->name?></td>
                    <td><?=$row->nip?></td>
                    <td><?=$arr_level[$row->user_level]?></td>
                    <td>
                        <button onclick="var w = confirm('Hapus Data Ini?'); if(w){ window.location.href='<?=base_url()?>pengguna/delete/<?=$row->id?>'; }" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i> Hapus Data</button>
                        <button title="Reset Password" onclick="var w = confirm('Reset Password menjadi 12345678?'); if(w){ window.location.href='<?=base_url()?>pengguna/resetpassword/<?=$row->id?>'; }"class="btn btn-success btn-xs"><i class="fa fa-refresh"></i> Reset Password</button>
                    </td>
                </tr>
            <?php }}?>
            </tbody>
        </table>
        </div>
    </div>
</div>
</section>
