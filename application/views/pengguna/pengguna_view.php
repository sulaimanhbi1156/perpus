<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  <?php echo $title_web ?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?php echo $title_web ?></li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                    <a href="penggunatambah"><button class="btn btn-primary"><i class="fa fa-plus"> </i> Tambah User</button></a>

                </div>
				<!-- /.box-header -->
				<div class="box-body">
				<div class="table-responsive">
                    <br/>
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID Anggota</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Status</th>
                                <th>Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach($user as $isi){?>
                            <tr>
                                <td><?= $no;?></td>
                                <td><?= $isi['anggota_id'];?></td>
                                <td><?= $isi['user'];?></td>
                                <td><?= $isi['level'];?></td>
                                <td><?= $isi['status'];?></td>
                                <td style="width:20%;">
                                <?php
                                    if($isi['status']==="Tidak Aktif") {
                                ?>
                                    <a href="<?= base_url('user/aktifkanpengguna/'.$isi['id_login']);?>" onclick="return confirm('Anda ingin mengaktifkan akun ?');">
                                    <button class="btn btn-primary"><i class="fa fa-check-square-o"></i></button></a>
                                <?php } ?>
                                    <!-- <a href="<?= base_url('user/penggunaedit/'.$isi['id_login']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a> -->
                                    <a href="<?= base_url('user/penggunadel/'.$isi['id_login']);?>" onclick="return confirm('Anda yakin user akan dihapus ?');">
									<button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr>
                        <?php $no++;}?>
                        </tbody>
                    </table>
			    </div>
			    </div>
	        </div>
    	</div>
    </div>
</section>
</div>
