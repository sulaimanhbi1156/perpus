<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      <i class="fa fa-edit" style="color:green"> </i>  <?= $title_web;?>
    </h1>
    <ol class="breadcrumb">
			<li><a href="<?php echo base_url('dashboard');?>"><i class="fa fa-dashboard"></i>&nbsp; Dashboard</a></li>
			<li class="active"><i class="fa fa-file-text"></i>&nbsp; <?= $title_web;?></li>
    </ol>
  </section>
  <section class="content">
	<?php if(!empty($this->session->flashdata())){ echo $this->session->flashdata('pesan');}?>
	<div class="row">
	    <div class="col-md-12">
	        <div class="box box-primary">
                <div class="box-header with-border">
					<?php if($this->session->userdata('level') == 'Petugas'){?>
                    <a href="anggarantambah"><button class="btn btn-primary">
						<i class="fa fa-plus"> </i> Tambah Anggaran</button></a>
					<?php }?>
                </div>
				<!-- /.box-header -->
				<div class="box-body">
                    <br/>
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah Barang</th>
                                <th>Total</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status Pengajuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $no=1;foreach($anggaran->result_array() as $isi){?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $isi['nama_barang'];?></td>
                                <td><?= $isi['harga'];?></td>
                                <td><?= $isi['jumlah_barang'];?></td>
                                <td><?= $isi['jumlah_barang']*$isi['harga'];?></td>
                                <td><?= $isi['tanggal_pengajuan'];?></td>
                                <td><?= $isi['status'];?></td>
									<td <?php if($this->session->userdata('level') == 'Petugas'){?>style="width:17%;"<?php }?>>
								
									<?php if($this->session->userdata('level') == 'Petugas'){?>
                                   
									<a href="<?= base_url('data/anggaranedit/'.$isi['id_anggaran']);?>"><button class="btn btn-success"><i class="fa fa-edit"></i></button></a>
                                    <a href="<?= base_url('data/anggaranhapus/'.$isi['id_anggaran']);?>"><button class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
									<?php }?>
                                    <?php if($this->session->userdata('level') == 'Kepsek'){
                                    if($isi['status']=='Belum Disetujui') {
                                    ?>
                                    <a href="<?= base_url('data/accanggaran/'.$isi['id_anggaran']);?>"><button class="btn btn-success" onclick="return confirm('Setujui Anggaran?')"><i class="fa fa-check"></i></button></a>
                                    <?php } } ?>
                                    <?php if($isi['status']=='Disetujui') { ?>
                                    <a href="<?= base_url('data/suratanggaran/'.$isi['id_anggaran']);?>"><button class="btn btn-primary"><i class="fa fa-print"></i></button></a>
                                    <?php } ?>
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
