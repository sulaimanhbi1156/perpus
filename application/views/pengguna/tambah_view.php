<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-plus" style="color:green"> </i>  Tambah Anggota
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-plus"></i>&nbsp; Tambah Anggota</li>
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
                    <form action="<?php echo base_url('user/penggunaadd');?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-6">
                            <div class="form-group"> 
                            <label>Nama Anggota</label> 
                            <select class="form-control" name="id_login" required>
                                <?php 
                                foreach($user as $each)
                                { ?><option value="<?php echo $each['id_login']; ?>"><?php echo $each['nama']; ?></option>';
                                <?php }
                                ?>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="pass" required="required" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Level</label>
                                    <select name="level" class="form-control" required="required">
                                    <option>Petugas</option>
                                    <option>Anggota</option>
                                    <option>Kepsek</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-md">Submit</button> 
                    </form>
                            <a href="<?= base_url('user/pengguna');?>" class="btn btn-danger btn-md">Kembali</a>
                            </div>
                           
                        
                           
                        </div>
		        </div>
	        </div>
	    </div>
    </div>
</section>
</div>
