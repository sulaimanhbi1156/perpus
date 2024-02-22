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
                    <form action="<?php echo base_url('data/prosespengadaan');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
								<div class="form-group">
									<label>Judul Buku</label>
									<select class="form-control select2" required="required"  name="id_buku">
										<option disabled selected value> -- Pilih Buku -- </option>
										<?php foreach($buku as $isi){?>
											<option value="<?= $isi['id_buku'];?>"><?= $isi['title'];?> / <?= $isi['isbn'];?> </option>
										<?php }?>
									</select>
								</div>
                                
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" required>
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input type="text" class="form-control" name="supplier" placeholder="Contoh : PT ANU" required>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input type="number" class="form-control" name="jumlah" required>
                                </div>
                            </div>
                        </div>
                        <div class="pull-right">
							<input type="hidden" name="tambah" value="tambah">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                    </form>
                            <a href="<?= base_url('data/pengadaan');?>" class="btn btn-danger btn-md">Kembali</a>
                        </div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
