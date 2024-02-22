<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-edit"></i>&nbsp;  <?= $title_web;?></li>
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
                    <form action="<?php echo base_url('data/pengadaaneditproses');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
								<div class="form-group">
									<label>Judul Buku</label>
									<select class="form-control select2" required="required"  name="id_buku">
										<option disabled selected value> -- Pilih Buku -- </option>
										<?php foreach($buku as $isi){?>
											<option value="<?= $isi['id_buku'];?>" <?php if($isi['id_buku'] == $pengadaan->id_buku){ echo 'selected';}?>><?= $isi['title'];?> / <?= $isi['isbn'];?></option>
										<?php }?>
									</select>
								</div>
                              
                                <div class="form-group">
                                    <label>Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" required value="<?php echo $pengadaan->tanggal_masuk ?>">
                                </div>
                                <div class="form-group">
                                    <label>Supplier</label>
                                    <input type="text" class="form-control" name="supplier" placeholder="Contoh : PT ANU" required value="<?php echo $pengadaan->supplier ?>">
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Masuk</label>
                                    <input type="number" class="form-control" name="jumlah" required value="<?php echo $pengadaan->jumlah ?>">
                                </div>	
                                <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                                <a href="<?= base_url('data/pengadaan');?>" class="btn btn-danger btn-md">Kembali</a>
                                </div>	
                            </div>

                        
							<input type="hidden" name="id_pengadaan" value="<?= $pengadaan->id_pengadaan;?>">
                            
                        </form>
                            

		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
