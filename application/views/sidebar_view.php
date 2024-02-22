<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
            $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login='$idbo'")->row();
            if(!empty($d->foto)){
          ?>
          <br/>
          <img src="<?php echo base_url();?>assets_style/image/<?php echo $d->foto;?>" alt="#" c
          lass="user-image" style="border:2px solid #fff;height:auto;width:100%;"/>
          <?php }else{?>
            <!--<img src="" alt="#" class="user-image" style="border:2px solid #fff;"/>-->
            <i class="fa fa-user fa-4x" style="color:#fff;"></i>
          <?php }?>
        </div>
        <div class="pull-left info" style="margin-top: 5px;">
          <p><?php echo $d->nama;?></p>
          <p><?= $d->level;?>
          </p>
          <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
        </div>
        <br/>
        <br/>
        <br/>
        <br/>
		</div>
        <ul class="sidebar-menu" data-widget="tree">
			<?php if($this->session->userdata('level') == 'Petugas'){?>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if($this->uri->uri_string() == 'dashboard'){ echo 'active';}?>">
                <a href="<?php echo base_url('dashboard');?>">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'user'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'user/tambah'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="<?php echo base_url('user');?>" class="cursor">
                    <i class="fa fa-id-card"></i> <span>Data Anggota</span></a>
			</li>
            <li class="<?php if($this->uri->uri_string() == 'user/pengguna'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'user/penggunatambah'){ echo 'active';}?>
                ">
                <a href="<?php echo base_url('user/pengguna');?>" class="cursor">
                    <i class="fa fa-user-circle"></i> <span>Data Pengguna</span></a>
			</li>

            
			<li class="treeview">
                <a href="#">
                    <i class="fa fa-file-archive-o"></i>
                    <span>Pengadaan </span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class=" <?php if($this->uri->uri_string() == 'data/pengadaan'){ echo 'active';}?>">
                        <a href="<?php echo base_url("data/pengadaan");?>" class="cursor">
                            <span class="fa fa-truck"></span> Pengadaan Buku
                            
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'data/anggaran'){ echo 'active';}?>">
                        <a href="<?php echo base_url("data/anggaran");?>" class="cursor">
                            <span class="fa fa-money"></span> Anggaran
                            
                        </a>
                    </li>
                </ul>
            </li>

			<li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil-square"></i>
                    <span>Data </span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukutambah'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'data/bukuedit/'.$this->uri->segment('3')){ echo 'active';}?>">
                        <a href="<?php echo base_url("data");?>" class="cursor">
                            <span class="fa fa-book"></span> Data Buku
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'data/kategori'){ echo 'active';}?>">
                        <a href="<?php echo base_url("data/kategori");?>" class="cursor">
                            <span class="fa fa-tags"></span> Kategori
                            
                        </a>
                    </li>
                    <li class=" <?php if($this->uri->uri_string() == 'data/rak'){ echo 'active';}?>">
                        <a href="<?php echo base_url("data/rak");?>" class="cursor">
                            <span class="fa fa-list"></span> Rak
                            
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview 
                <?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/detailpinjam/'.$this->uri->segment('3')){ echo 'active';}?>
                <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">
                <a href="#">
                    <i class="fa fa-exchange"></i>
                    <span>Transaksi</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/pinjam'){ echo 'active';}?>
                        <?php if($this->uri->uri_string() == 'transaksi/kembalipinjam/'.$this->uri->segment('3')){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi");?>" class="cursor">
                            <span class="fa fa-upload"></span> Peminjaman
                            
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi/kembali");?>" class="cursor">
                            <span class="fa fa-download"></span> Pengembalian
                        </a>
                    </li>
                    <li class="<?php if($this->uri->uri_string() == 'transaksi/tabel_denda'){ echo 'active';}?>">
                        <a href="<?php echo base_url("transaksi/tabel_denda");?>" class="cursor">
                            <span class="fa fa-money"></span> Data Denda
                        </a>
                    </li>
                </ul>
            </li>
            <li class="<?php if($this->uri->uri_string() == 'transaksi/denda'){ echo 'active';}?>">
                <a href="<?php echo base_url("transaksi/denda");?>" class="cursor">
                    <i class="fa fa-money"></i> <span>Denda</span>
                    
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-print"></i>
                    <span>Laporan </span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a data-toggle="modal" data-target="#lap_data_buku" class="cursor">
                            <span class="fa fa-file-pdf-o"></span> Laporan Data Buku   
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url("data/laporanstok");?>" class="cursor">
                            <i class="fa fa-file-pdf-o"></i> <span>Laporan Stok Buku</span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#lap_data_anggota" class="cursor">
                            <span class="fa fa-file-pdf-o"></span> Laporan Data Anggota/User   
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#lap_data_pengadaan" class="cursor">
                            <span class="fa fa-file-pdf-o"></span> Laporan Data Pengadaan   
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#lap_data_anggaran" class="cursor">
                            <span class="fa fa-file-pdf-o"></span> Laporan Data Anggaran   
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#lap_data_pinjam" class="cursor">
                            <span class="fa fa-file-pdf-o"></span> Laporan Data Peminjaman   
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#lap_data_kembali" class="cursor">
                            <span class="fa fa-file-pdf-o"></span> Laporan Data Pengembalian   
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#lap_data_denda" class="cursor">
                            <span class="fa fa-file-pdf-o"></span> Laporan Data Denda   
                        </a>
                    </li>
                </ul>
            </li>


			<?php }?>
			<?php if($this->session->userdata('level') == 'Anggota'){?>
				<li class="<?php if($this->uri->uri_string() == 'transaksi'){ echo 'active';}?>">
					<a href="<?php echo base_url("transaksi");?>" class="cursor">
						<i class="fa fa-upload"></i> <span>Data Peminjaman </span>
					</a>
				</li>
				
				<li class="<?php if($this->uri->uri_string() == 'data'){ echo 'active';}?>
				<?php if($this->uri->uri_string() == 'data/bukudetail/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="<?php echo base_url("data");?>" class="cursor">
						<i class="fa fa-search"></i>  <span>Cari Buku</span>
					</a>
				</li>
				<li class="<?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="<?php echo base_url('user/edit/'.$this->session->userdata('ses_id'));?>" class="cursor">
						<i class="fa fa-user"></i>  <span>Data Anggota</span>
					</a>
				</li>
				<li class="">
					<a href="<?php echo base_url('user/detail/'.$this->session->userdata('ses_id'));?>" target="_blank" class="cursor">
						<i class="fa fa-print"></i> <span>Cetak kartu Anggota</span>
					</a>
				</li>
                <li class="<?php if($this->uri->uri_string() == 'transaksi/kembali'){ echo 'active';}?>">
					<a href="<?php echo base_url("transaksi/kembali");?>" class="cursor">
						<i class="fa fa-upload"></i> <span>History Peminjaman</span>
					</a>
				</li>
			<?php }?>
            <?php if($this->session->userdata('level') == 'Kepsek'){?>
				
				<li class="<?php if($this->uri->uri_string() == 'user/edit/'.$this->uri->segment('3')){ echo 'active';}?>">
					<a href="<?php echo base_url('user/edit/'.$this->session->userdata('ses_id'));?>" class="cursor">
						<i class="fa fa-user"></i>  <span>Edit Profil</span>
					</a>
				</li>
                <li class=" <?php if($this->uri->uri_string() == 'data/anggaran'){ echo 'active';}?>">
                        <a href="<?php echo base_url("data/anggaran");?>" class="cursor">
                            <span class="fa fa-money"></span> Anggaran     
                        </a>
                </li>
               
			<?php }?>
        </ul>
        <div class="clearfix"></div>
        <br/>
        <br/>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Modal Lap. Data Buku -->
	<div id="lap_data_buku" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Laporan Data Buku</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Berdasarkan Periode Masuk Buku</p>
                    
                    <form action="<?php echo base_url("data/laporanbuku");?>" method="post">
                        <label for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <?php
                            // Membuat pilihan bulan secara dinamis
                            for ($i = 1; $i <= 12; $i++) {
                                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                                echo "<option value='$i'>$bulan</option>";
                            }
                            ?>
                        </select>

                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            // Membuat pilihan tahun secara dinamis (contoh: 10 tahun terakhir)
                            $tahun_sekarang = date('Y');
                            for ($tahun = $tahun_sekarang; $tahun >= $tahun_sekarang - 10; $tahun--) {
                                echo "<option value='$tahun'>$tahun</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
                    <br>
                    <p>Berdasarkan Tanggal Masuk Buku</p>
                    
                    <form action="<?php echo base_url("data/laporanbuku_tanggal");?>" method="post">
                        <label for="bulan">Tanggal Awal:</label>
                        <input type="date" id="awal" name="awal" class="form-control" required>

                        <label for="tahun">Tanggal Akhir:</label>
                        <input type="date" id="akhir" name="akhir" class="form-control" required>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

     <!-- Modal Lap. Data Anggota -->
	<div id="lap_data_anggota" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Laporan Data Anggota</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Berdasarkan Level</p>
                    
                    <form action="<?php echo base_url("user/laporanuser");?>" method="post">
                        <label for="role">Pilih Level:</label>
                            <select class="form-control" id="level" name="level">
                                <option value="Anggota">Anggota</option>
                                <option value="Petugas">Petugas</option>
                            </select>

                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal Lap. Data Pengadaan -->
	<div id="lap_data_pengadaan" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Laporan Data Pengadaan</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Berdasarkan Periode Masuk</p>
                    
                    <form action="<?php echo base_url("data/laporanpengadaan");?>" method="post">
                        <label for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <?php
                            // Membuat pilihan bulan secara dinamis
                            for ($i = 1; $i <= 12; $i++) {
                                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                                echo "<option value='$i'>$bulan</option>";
                            }
                            ?>
                        </select>

                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            // Membuat pilihan tahun secara dinamis (contoh: 10 tahun terakhir)
                            $tahun_sekarang = date('Y');
                            for ($tahun = $tahun_sekarang; $tahun >= $tahun_sekarang - 10; $tahun--) {
                                echo "<option value='$tahun'>$tahun</option>";
                            }
                            ?>
                        </select>
                        
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
                    <br>
                        <p>Berdasarkan Tanggal</p>
                        
                        <form action="<?php echo base_url("data/laporanpengadaan_tanggal");?>" method="post">
                            <label for="bulan">Tanggal Awal:</label>
                            <input type="date" id="awal" name="awal" class="form-control" required>

                            <label for="tahun">Tanggal Akhir:</label>
                            <input type="date" id="akhir" name="akhir" class="form-control" required>
                            <br>
                            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

    
<!-- Modal Lap. Data Anggaran -->
<div id="lap_data_anggaran" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Laporan Data Anggaran</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Berdasarkan Periode Pengajuan</p>
                    
                    <form action="<?php echo base_url("data/laporananggaran");?>" method="post">
                        <label for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <?php
                            // Membuat pilihan bulan secara dinamis
                            for ($i = 1; $i <= 12; $i++) {
                                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                                echo "<option value='$i'>$bulan</option>";
                            }
                            ?>
                        </select>

                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            // Membuat pilihan tahun secara dinamis (contoh: 10 tahun terakhir)
                            $tahun_sekarang = date('Y');
                            for ($tahun = $tahun_sekarang; $tahun >= $tahun_sekarang - 10; $tahun--) {
                                echo "<option value='$tahun'>$tahun</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
                    <br>
                    <p>Berdasarkan Tanggal</p>
                    
                    <form action="<?php echo base_url("data/laporananggaran_tanggal");?>" method="post">
                        <label for="bulan">Tanggal Awal:</label>
                        <input type="date" id="awal" name="awal" class="form-control" required>

                        <label for="tahun">Tanggal Akhir:</label>
                        <input type="date" id="akhir" name="akhir" class="form-control" required>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

<!-- Modal Lap. Data Pinjam -->
<div id="lap_data_pinjam" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Laporan Data Peminjaman</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Berdasarkan Periode Peminjaman</p>
                    
                    <form action="<?php echo base_url("data/laporanpinjam");?>" method="post">
                        <label for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <?php
                            // Membuat pilihan bulan secara dinamis
                            for ($i = 1; $i <= 12; $i++) {
                                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                                echo "<option value='$i'>$bulan</option>";
                            }
                            ?>
                        </select>

                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            // Membuat pilihan tahun secara dinamis (contoh: 10 tahun terakhir)
                            $tahun_sekarang = date('Y');
                            for ($tahun = $tahun_sekarang; $tahun >= $tahun_sekarang - 10; $tahun--) {
                                echo "<option value='$tahun'>$tahun</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
                    <br>
                    <p>Berdasarkan Tanggal Peminjaman</p>
                    
                    <form action="<?php echo base_url("data/laporanpinjam_tanggal");?>" method="post">
                        <label for="bulan">Tanggal Awal:</label>
                        <input type="date" id="awal" name="awal" class="form-control" required>

                        <label for="tahun">Tanggal Akhir:</label>
                        <input type="date" id="akhir" name="akhir" class="form-control" required>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
                    <br>
                    <p>Berdasarkan Nama Anggota Peminjam</p>
                    
                    <form action="<?php echo base_url("data/laporanpinjam_user");?>" method="post">
                        <label for="id_user">Nama Peminjam:</label>
                        <select name="id_user" class="form-control">
                            <?php
                                if(!empty($data_pengguna)){
                                    foreach($data_pengguna as $u){
                            ?>            
                                        <option value="<?php echo $u['id_login']; ?>"><?php echo $u['nama']; ?> / <?php echo $u['anggota_id']; ?></option>
                            <?php 
                                    }
                                }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

    <!-- Modal Lap. Data Kembali -->
<div id="lap_data_kembali" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Laporan Data Pengembalian</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Berdasarkan Periode Pengembalian</p>
                    
                    <form action="<?php echo base_url("data/laporankembali");?>" method="post">
                        <label for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <?php
                            // Membuat pilihan bulan secara dinamis
                            for ($i = 1; $i <= 12; $i++) {
                                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                                echo "<option value='$i'>$bulan</option>";
                            }
                            ?>
                        </select>

                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            // Membuat pilihan tahun secara dinamis (contoh: 10 tahun terakhir)
                            $tahun_sekarang = date('Y');
                            for ($tahun = $tahun_sekarang; $tahun >= $tahun_sekarang - 10; $tahun--) {
                                echo "<option value='$tahun'>$tahun</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
                    <br>
                    <p>Berdasarkan Tanggal Pengembalian</p>
                    
                    <form action="<?php echo base_url("data/laporankembali_tanggal");?>" method="post">
                        <label for="bulan">Tanggal Awal:</label>
                        <input type="date" id="awal" name="awal" class="form-control" required>

                        <label for="tahun">Tanggal Akhir:</label>
                        <input type="date" id="akhir" name="akhir" class="form-control" required>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

        <!-- Modal Lap. Data Denda -->
<div id="lap_data_denda" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- konten modal-->
			<div class="modal-content">
				<!-- heading modal -->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Laporan Data Denda</h4>
				</div>
				<!-- body modal -->
				<div class="modal-body">
					<p>Berdasarkan Periode Denda</p>
                    
                    <form action="<?php echo base_url("data/laporandenda");?>" method="post">
                        <label for="bulan">Pilih Bulan:</label>
                        <select name="bulan" id="bulan" class="form-control">
                            <?php
                            // Membuat pilihan bulan secara dinamis
                            for ($i = 1; $i <= 12; $i++) {
                                $bulan = date('F', mktime(0, 0, 0, $i, 1));
                                echo "<option value='$i'>$bulan</option>";
                            }
                            ?>
                        </select>

                        <label for="tahun">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" class="form-control">
                            <?php
                            // Membuat pilihan tahun secara dinamis (contoh: 10 tahun terakhir)
                            $tahun_sekarang = date('Y');
                            for ($tahun = $tahun_sekarang; $tahun >= $tahun_sekarang - 10; $tahun--) {
                                echo "<option value='$tahun'>$tahun</option>";
                            }
                            ?>
                        </select>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                        <input type="submit" name="cetaksemua" value="Cetak Semua" class="btn btn-warning">
                    </form>
                    <br>
                    <p>Berdasarkan Tanggal Denda</p>
                    
                    <form action="<?php echo base_url("data/laporandenda_tanggal");?>" method="post">
                        <label for="bulan">Tanggal Awal:</label>
                        <input type="date" id="awal" name="awal" class="form-control" required>

                        <label for="tahun">Tanggal Akhir:</label>
                        <input type="date" id="akhir" name="akhir" class="form-control" required>
                        <br>
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </form>
				</div>
				<!-- footer modal -->
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>

    
