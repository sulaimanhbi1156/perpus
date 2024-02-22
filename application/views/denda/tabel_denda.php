<?php if(! defined('BASEPATH')) exit('No direct script acess allowed');?>
<?php
        function tgl_indo($tanggal)
        {
        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $pecahkan = explode('-', $tanggal);

        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun

        return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }

	$bulan_tes =array(
		'01'=>"Januari",
		'02'=>"Februari",
		'03'=>"Maret",
		'04'=>"April",
		'05'=>"Mei",
		'06'=>"Juni",
		'07'=>"Juli",
		'08'=>"Agustus",
		'09'=>"September",
		'10'=>"Oktober",
		'11'=>"November",
		'12'=>"Desember"
	);
?>
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

                </div>
				<!-- /.box-header -->
				<div class="box-body">
					<div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped table" width="100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <th>ID Anggota</th>
                                <th>Nama</th>
                                <th>Lama Telat</th>
                                <th>Jumlah Denda</th>
                                <th>Tanggal Denda</th>
                                <th>Status Denda</th>
                                <th>Aksi</th>
                            </tr>
						</thead>
						<tbody>
						<?php 
							$no=1;
							foreach($kembali->result_array() as $isi){
                                $anggota_id = $isi['anggota_id'];
                                $ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();

                                $pinjam_id = $isi['pinjam_id'];
                                $denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
                                $total_denda = $denda->row();
						?>
                            <tr>
                                <td><?= $no;
                                $no++?></td>
                                <td><?= $isi['pinjam_id'];?></td>
                                <td><?= $isi['anggota_id'];?></td>
                                <td><?= $ang->nama;?></td>
                                <td><?= $isi['lama_waktu'];?> Hari</td>
                                <td>Rp <?= $isi['denda'];?></td>
                                <td><?= tgl_indo($isi['tgl_denda']);?></td>
                                <td><?= $isi['status_denda'];?></td>
                                <td align="center">
                                  <?php if($isi['status_denda'] == 'Belum Dibayar') { ?>
                                    <a data-toggle="modal" data-target="#modal-edit<?=$isi['pinjam_id'];?>" class="btn btn-primary btn-circle" data-popup="tooltip" data-placement="top" title="Edit Data"><i class="fa fa-pencil"></i></a>
                                  <?php } else { ?>
                                    <a href="<?= base_url('transaksi/notadenda/'.$isi['pinjam_id']);?>">
											              <button class="btn btn-warning"><i class="fa fa-print"></i></button></a>
                                  <?php } ?>
                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
					</table>
			    </div>
			    </div>
	        </div>
    	</div>
    </div>
</section>
</div>

<!-- MODAL EDIT -->
<?php $no=0; foreach($kembali->result_array() as $isi): $no++; ?>
<div class="row">
  <div id="modal-edit<?=$isi['pinjam_id'];?>" class="modal fade">
    <div class="modal-dialog">
      <form action="<?php echo site_url('transaksi/edit_status_denda'); ?>" method="post">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ubah Status</h4>
        </div>
        <div class="modal-body">
 
          <input type="hidden" readonly value="<?=$isi['pinjam_id'];?>" name="pinjam_id" class="form-control" >
 
          <div class="form-group">
          <label for="status_denda">Ubah status pembayaran denda:</label>
          <select name="status_denda" id="status_denda" class="form-control">
            <option value="Belum Dibayar">Belum Dibayar</option>
            <option value="Sudah Dibayar">Sudah Dibayar</option>
          </select>
          </div>
          <br>
        </div>
          <div class="modal-footer">
          <button type="submit" class="btn btn-warning"><i class="icon-pencil5"></i> Edit</button>  
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
    </div>
  </div>
</div>
<?php endforeach; ?>