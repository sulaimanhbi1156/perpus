<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-plus" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-plus"></i>&nbsp;  <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
                </div>
			    <!-- /.box-header -->
			    <div class="box-body">
                    <form action="<?php echo base_url('data/prosesanggaran');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label>Tanggal Pengajuan</label>
                                    <input type="date" class="form-control" name="tanggal_pengajuan" required>
                                </div>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" placeholder="Contoh : Kursi" required>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Barang</label>
                                    <input type="number" class="form-control" name="jumlah_barang" required>
                                </div>

                                <div class="form-group">
                                    <label>Harga Barang</label>
                                    <input type="number" class="form-control" name="harga" required>
                                </div>
                            </div>
                        </div>
                        <div class="pull-left">
							<input type="hidden" name="tambah" value="tambah">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                    </form>
                            <a href="<?= base_url('data/anggaran');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
