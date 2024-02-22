<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 	//validasi jika user belum login
     $this->data['CI'] =& get_instance();
     $this->load->helper(array('form', 'url'));
     $this->load->model('M_Admin');
		if($this->session->userdata('masuk_sistem_rekam') != TRUE){
				$url=base_url('login');
				redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC");
        $this->data['title_web'] = 'Data Buku';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/buku_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function laporanbuku()
	{

		$bulan = $_POST['bulan'];
    	$tahun = $_POST['tahun'];

		if (isset($_POST['cetaksemua'])) {
			$this->data['label'] = "Semua Periode";
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC");
			$this->data['title_web'] = 'Laporan Data Buku';	
		} else {
			$this->data['label'] = "Bulan $bulan Tahun $tahun";
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku WHERE MONTH(tgl_masuk) = '$bulan' AND YEAR(tgl_masuk) = '$tahun' ORDER BY id_buku DESC");
			$this->data['title_web'] = 'Laporan Data Buku';
		}
		
        $this->load->view('buku/laporan',$this->data);
	}

	public function laporanbuku_tanggal()
	{

		$awal = $_POST['awal'];
    	$akhir = $_POST['akhir'];

			$this->data['label'] = "Tanggal $awal s/d $akhir";
			$this->data['idbo'] = $this->session->userdata('ses_id');
			$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku WHERE tgl_masuk BETWEEN '$awal' AND '$akhir' ORDER BY id_buku DESC");
			$this->data['title_web'] = 'Laporan Data Buku';
		
        $this->load->view('buku/laporan',$this->data);
	}

	public function pengadaan()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['pengadaan'] =  $this->db->query("SELECT * FROM tbl_pengadaan 
		INNER JOIN tbl_buku ON tbl_buku.id_buku = tbl_pengadaan.id_buku");
        $this->data['title_web'] = 'Data Pengadaan';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('pengadaan/pengadaan_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function anggaran()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['anggaran'] =  $this->db->query("SELECT * FROM tbl_anggaran");
        $this->data['title_web'] = 'Data Anggaran';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('anggaran/anggaran_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function bukudetail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_buku','id_buku',$this->uri->segment('3'));
		if($count > 0)
		{
			$this->data['buku'] = $this->M_Admin->get_tableid_edit('tbl_buku','id_buku',$this->uri->segment('3'));
			$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
			$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();

		}else{
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Data Buku Detail';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/detail',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function bukuedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_buku','id_buku',$this->uri->segment('3'));
		if($count > 0)
		{
			
			$this->data['buku'] = $this->M_Admin->get_tableid_edit('tbl_buku','id_buku',$this->uri->segment('3'));
	   
			$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
			$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();

		}else{
			echo '<script>alert("BUKU TIDAK DITEMUKAN");window.location="'.base_url('data').'"</script>';
		}

		$this->data['title_web'] = 'Data Buku Edit';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function pengadaanedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_pengadaan','id_pengadaan',$this->uri->segment('3'));
		if($count > 0)
		{
			$this->data['pengadaan'] = $this->M_Admin->get_tableid_edit('tbl_pengadaan','id_pengadaan',$this->uri->segment('3'));
			$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC")->result_array();
		}else{
			echo '<script>alert("DATA TIDAK DITEMUKAN");window.location="'.base_url('data/pengadaan').'"</script>';
		}

		$this->data['title_web'] = 'Data Pengadaan Edit';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('pengadaan/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function anggaranedit()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('tbl_anggaran','id_anggaran',$this->uri->segment('3'));
		if($count > 0)
		{
			$this->data['anggaran'] = $this->M_Admin->get_tableid_edit('tbl_anggaran','id_anggaran',$this->uri->segment('3'));
			//$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC")->result_array();
		}else{
			echo '<script>alert("DATA TIDAK DITEMUKAN");window.location="'.base_url('data/anggaran').'"</script>';
		}

		$this->data['title_web'] = 'Data Anggaran Edit';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('anggaran/edit_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function bukutambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['kats'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC")->result_array();
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC")->result_array();


        $this->data['title_web'] = 'Tambah Buku';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('buku/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function pengadaantambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC")->result_array();

        $this->data['title_web'] = 'Tambah Pengadaan';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('pengadaan/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function anggarantambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

        $this->data['title_web'] = 'Tambah Anggaran';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('anggaran/tambah_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}


	public function prosesbuku()
	{
		if(!empty($this->input->get('buku_id')))
		{
        
			$buku = $this->M_Admin->get_tableid_edit('tbl_buku','id_buku',htmlentities($this->input->get('buku_id')));
			
			$sampul = './assets_style/image/buku/'.$buku->sampul;
			if(file_exists($sampul))
			{
				unlink($sampul);
			}
			
			$lampiran = './assets_style/image/buku/'.$buku->lampiran;
			if(file_exists($lampiran))
			{
				unlink($lampiran);
			}
			
			$this->M_Admin->delete_table('tbl_buku','id_buku',$this->input->get('buku_id'));
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Berhasil Hapus Buku !</p>
			</div></div>');
			redirect(base_url('data'));  
		}
		if(!empty($this->input->post('tambah')))
		{

			$post= $this->input->post();
			// setting konfigurasi upload
			$config['upload_path'] = './assets_style/image/buku/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|doc'; 
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			// load library upload
			$this->load->library('upload',$config);
			$buku_id = $this->M_Admin->buat_kode('tbl_buku','BK','id_buku','ORDER BY id_buku DESC LIMIT 1'); 

			// upload gambar 1
			if(!empty($_FILES['gambar']['name'] && $_FILES['lampiran']['name']))
			{

				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}
				$data = array(
					'buku_id'=>$buku_id,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
                    'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']), 
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),  
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				

			}elseif(!empty($_FILES['gambar']['name'])){
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}
				$data = array(
					'buku_id'=>$buku_id,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
                    'lampiran' => '0',
					'title'  => htmlentities($post['title']), 
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),  
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

			}elseif(!empty($_FILES['lampiran']['name'])){

				$this->upload->initialize($config);

				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				// script uplaod file kedua
				$this->upload->do_upload('lampiran');
				$file2 = array('upload_data' => $this->upload->data());
				$data = array(
					'buku_id'=>$buku_id,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => '0',
                    'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']), 
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),  
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				
			}else{
				$data = array(
					'buku_id'=>$buku_id,
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => '0',
                    'lampiran' => '0',
					'title'  => htmlentities($post['title']), 
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),    
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);
			}

			$this->db->insert('tbl_buku', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data')); 
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			// setting konfigurasi upload
			$config['upload_path'] = './assets_style/image/buku/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png'; 
			$config['encrypt_name'] = TRUE; //nama yang terupload nantinya
			// load library upload
        	$this->load->library('upload',$config);
			// upload gambar 1
			if(!empty($_FILES['gambar']['name'] && $_FILES['lampiran']['name']))
			{

				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				$gambar = './assets_style/image/buku/'.htmlentities($post['gmbr']);
				if(file_exists($gambar))
				{
					unlink($gambar);
				}

				$lampiran = './assets_style/image/buku/'.htmlentities($post['lamp']);
				if(file_exists($lampiran))
				{
					unlink($lampiran);
				}

				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
                    'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']),
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),  
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				

			}elseif(!empty($_FILES['gambar']['name'])){
				$this->upload->initialize($config);

				if ($this->upload->do_upload('gambar')) {
					$this->upload->data();
					$file1 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}


				$gambar = './assets_style/image/buku/'.htmlentities($post['gmbr']);
				if(file_exists($gambar))
				{
					unlink($gambar);
				}

				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'sampul' => $file1['upload_data']['file_name'],
					'title'  => htmlentities($post['title']),
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),  
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

			}elseif(!empty($_FILES['lampiran']['name'])){

				$this->upload->initialize($config);

				// script uplaod file kedua
				if ($this->upload->do_upload('lampiran')) {
					$this->upload->data();
					$file2 = array('upload_data' => $this->upload->data());
				} else {
					return false;
				}

				$lampiran = './assets_style/image/buku/'.htmlentities($post['lamp']);
				if(file_exists($lampiran))
				{
					unlink($lampiran);
				}

				// script uplaod file kedua
				$this->upload->do_upload('lampiran');
				$file2 = array('upload_data' => $this->upload->data());

				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
                    'lampiran' => $file2['upload_data']['file_name'],
					'title'  => htmlentities($post['title']),
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),  
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);

				
			}else{
				$data = array(
					'id_kategori'=>htmlentities($post['kategori']), 
					'id_rak' => htmlentities($post['rak']), 
					'isbn' => htmlentities($post['isbn']), 
					'title'  => htmlentities($post['title']), 
					'pengarang'=> htmlentities($post['pengarang']), 
					'penerbit'=> htmlentities($post['penerbit']),    
					'thn_buku' => htmlentities($post['thn']), 
					'isi' => $this->input->post('ket'), 
					'jml'=> htmlentities($post['jml']),  
					'tgl_masuk' => date('Y-m-d H:i:s')
				);
			}

			$this->db->where('id_buku',htmlentities($post['edit']));
			$this->db->update('tbl_buku', $data);

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data')); 
		}
		
	}

	public function kategori()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kategori'] =  $this->db->query("SELECT * FROM tbl_kategori ORDER BY id_kategori DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_kategori','id_kategori',$id);
			if($count > 0)
			{			
				$this->data['kat'] = $this->db->query("SELECT *FROM tbl_kategori WHERE id_kategori='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/kategori').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data Kategori ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('kategori/kat_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function katproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);

			$this->db->insert('tbl_kategori', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_kategori'=>htmlentities($post['kategori']),
			);
			$this->db->where('id_kategori',htmlentities($post['edit']));
			$this->db->update('tbl_kategori', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 		
		}

		if(!empty($this->input->get('kat_id')))
		{
			$this->db->where('id_kategori',$this->input->get('kat_id'));
			$this->db->delete('tbl_kategori');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Kategori Sukses !</p>
			</div></div>');
			redirect(base_url('data/kategori')); 
		}
	}

	public function prosespengadaan()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'id_buku'=>htmlentities($post['id_buku']),
				'tanggal_masuk'=>htmlentities($post['tanggal_masuk']),
				'supplier'=>htmlentities($post['supplier']),
				'jumlah'=>htmlentities($post['jumlah'])
			);

			$this->db->insert('tbl_pengadaan', $data);
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Pengadaan Sukses !</p>
			</div></div>');
			redirect(base_url('data/pengadaan'));  
		}
	}

	public function prosesanggaran()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_barang'=>htmlentities($post['nama_barang']),
				'tanggal_pengajuan'=>htmlentities($post['tanggal_pengajuan']),
				'harga'=>htmlentities($post['harga']),
				'jumlah_barang'=>htmlentities($post['jumlah_barang']),
				'status'=>'Belum Disetujui',
			);

			$this->db->insert('tbl_anggaran', $data);
			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Anggaran Sukses !</p>
			</div></div>');
			redirect(base_url('data/anggaran'));  
		}
	}

	public function rak()
	{
		
        $this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['rakbuku'] =  $this->db->query("SELECT * FROM tbl_rak ORDER BY id_rak DESC");

		if(!empty($this->input->get('id'))){
			$id = $this->input->get('id');
			$count = $this->M_Admin->CountTableId('tbl_rak','id_rak',$id);
			if($count > 0)
			{	
				$this->data['rak'] = $this->db->query("SELECT *FROM tbl_rak WHERE id_rak='$id'")->row();
			}else{
				echo '<script>alert("KATEGORI TIDAK DITEMUKAN");window.location="'.base_url('data/rak').'"</script>';
			}
		}

        $this->data['title_web'] = 'Data Rak Buku ';
        $this->load->view('header_view',$this->data);
        $this->load->view('sidebar_view',$this->data);
        $this->load->view('rak/rak_view',$this->data);
        $this->load->view('footer_view',$this->data);
	}

	public function rakproses()
	{
		if(!empty($this->input->post('tambah')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);

			$this->db->insert('tbl_rak', $data);

			
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Tambah Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak'));  
		}

		if(!empty($this->input->post('edit')))
		{
			$post= $this->input->post();
			$data = array(
				'nama_rak'=>htmlentities($post['rak']),
			);
			$this->db->where('id_rak',htmlentities($post['edit']));
			$this->db->update('tbl_rak', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Rak Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak')); 		
		}

		if(!empty($this->input->get('rak_id')))
		{
			$this->db->where('id_rak',$this->input->get('rak_id'));
			$this->db->delete('tbl_rak');

			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Rak Buku Sukses !</p>
			</div></div>');
			redirect(base_url('data/rak')); 
		}
	}

	public function pengadaanhapus($id){
		$this -> db -> where('id_pengadaan', $id);
		$this -> db -> delete('tbl_pengadaan');
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Pengadaan Sukses !</p>
			</div></div>');
			redirect(base_url('data/pengadaan')); 
	}


	public function anggaranhapus($id){
		$this -> db -> where('id_anggaran', $id);
		$this -> db -> delete('tbl_anggaran');
		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p> Hapus Anggaran Sukses !</p>
			</div></div>');
			redirect(base_url('data/anggaran')); 
	}

	public function pengadaaneditproses() {
			$post= $this->input->post();
			$data = array(
				'id_buku'=>htmlentities($post['id_buku']),
				'tanggal_masuk'=>htmlentities($post['tanggal_masuk']),
				'supplier'=>htmlentities($post['supplier']),
				'jumlah'=>htmlentities($post['jumlah'])
			);
			$this->db->where('id_pengadaan',htmlentities($post['id_pengadaan']));
			$this->db->update('tbl_pengadaan', $data);


			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
			<p> Edit Pengadaan Sukses !</p>
			</div></div>');
			redirect(base_url('data/pengadaan')); 		
	}

	public function anggaraneditproses() {
		$post= $this->input->post();
		$data = array(
				'nama_barang'=>htmlentities($post['nama_barang']),
				'tanggal_pengajuan'=>htmlentities($post['tanggal_pengajuan']),
				'harga'=>htmlentities($post['harga']),
				'jumlah_barang'=>htmlentities($post['jumlah_barang'])
		);
		$this->db->where('id_anggaran',htmlentities($post['id_anggaran']));
		$this->db->update('tbl_anggaran', $data);


		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
		<p> Edit Anggaran Sukses !</p>
		</div></div>');
		redirect(base_url('data/anggaran')); 		
	}

	public function accanggaran($id) {
		
		$data = array(
				'status'=>'Disetujui',
		);
		$this->db->where('id_anggaran',$id);
		$this->db->update('tbl_anggaran', $data);

		$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-success">
		<p> Anggaran Disetujui !</p>
		</div></div>');
		redirect(base_url('data/anggaran')); 		
	}

	public function laporanstok()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['buku'] =  $this->db->query("SELECT * FROM tbl_buku");
		$this->data['title_web'] = 'LAPORAN STOK BUKU';
		
        $this->load->view('buku/laporan_stok',$this->data);
	}

	public function laporanpengadaan()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if(isset($_POST['cetaksemua'])) {
			$this->data['pengadaan'] =  $this->db->query("SELECT * FROM tbl_pengadaan 
			INNER JOIN tbl_buku ON tbl_buku.id_buku = tbl_pengadaan.id_buku");
			$this->data['label'] = "Semua Data";
		} else {
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];

			$this->data['pengadaan'] =  $this->db->query("SELECT * FROM tbl_pengadaan 
			INNER JOIN tbl_buku ON tbl_buku.id_buku = tbl_pengadaan.id_buku
			WHERE MONTH(tanggal_masuk) = '$bulan' AND YEAR(tanggal_masuk) = '$tahun'");
			$this->data['label'] = "Bulan $bulan Tahun $tahun";
		}
		
        $this->data['title_web'] = 'LAPORAN DATA PENGADAAN';
        $this->load->view('pengadaan/laporan',$this->data);
	}

	public function laporanpengadaan_tanggal()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

			$awal = $_POST['awal'];
			$akhir = $_POST['akhir'];

			$this->data['pengadaan'] =  $this->db->query("SELECT * FROM tbl_pengadaan 
			INNER JOIN tbl_buku ON tbl_buku.id_buku = tbl_pengadaan.id_buku
			WHERE tanggal_masuk BETWEEN '$awal' AND '$akhir'");
			$this->data['label'] = "Tanggal $awal s/d $akhir";
		
        $this->data['title_web'] = 'LAPORAN DATA PENGADAAN';
        $this->load->view('pengadaan/laporan',$this->data);
	}

	public function laporananggaran()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if(isset($_POST['cetaksemua'])) {
			$this->data['anggaran'] =  $this->db->query("SELECT * FROM tbl_anggaran");
			$this->data['label'] = "Semua Data";
		} else {
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];

			$this->data['anggaran'] =  $this->db->query("SELECT * FROM tbl_anggaran
			WHERE MONTH(tanggal_pengajuan) = '$bulan' AND YEAR(tanggal_pengajuan) = '$tahun'");
			$this->data['label'] = "Pengajuan Bulan $bulan Tahun $tahun";
		}
		
        $this->data['title_web'] = 'LAPORAN DATA ANGGARAN';
        $this->load->view('anggaran/laporan',$this->data);
	}

	public function laporananggaran_tanggal()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		
		$awal = $_POST['awal'];
		$akhir = $_POST['akhir'];

			$this->data['anggaran'] =  $this->db->query("SELECT * FROM tbl_anggaran
			WHERE tanggal_pengajuan BETWEEN '$awal' AND '$akhir'");
			$this->data['label'] = "Tanggal $awal s/d $akhir";
		
		
        $this->data['title_web'] = 'LAPORAN DATA ANGGARAN';
        $this->load->view('anggaran/laporan',$this->data);
	}

	public function suratanggaran($id)
	{
		$this->data['anggaran'] =  $this->db->query("SELECT * FROM tbl_anggaran WHERE id_anggaran = '$id'");		
        $this->data['title_web'] = 'SURAT PERMOHONAN ANGGARAN';

        $this->load->view('anggaran/surat',$this->data);
	}

	public function laporanpinjam()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if(isset($_POST['cetaksemua'])) {
			$this->data['pinjam'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			WHERE status = 'Dipinjam'");
			$this->data['label'] = "Semua Data";
		} else {
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];

			$this->data['pinjam'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			WHERE status = 'Dipinjam' AND MONTH(tgl_pinjam) = '$bulan' AND YEAR(tgl_pinjam) = '$tahun'");
			$this->data['label'] = "Peminjaman Bulan $bulan Tahun $tahun";
		}
		
        $this->data['title_web'] = 'LAPORAN DATA PEMINJAMAN BUKU';
        $this->load->view('pinjam/laporan',$this->data);
	}

	public function laporanpinjam_tanggal()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

			$awal = $_POST['awal'];
			$akhir = $_POST['akhir'];

			$this->data['pinjam'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			WHERE status = 'Dipinjam' AND tgl_pinjam BETWEEN '$awal' AND '$akhir'");
			$this->data['label'] = "Peminjaman Tanggal $awal s/d $akhir";
		
		
        $this->data['title_web'] = 'LAPORAN DATA PEMINJAMAN BUKU';
        $this->load->view('pinjam/laporan',$this->data);
	}

	public function laporanpinjam_user()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

			$awal = $_POST['id_user'];

			$this->data['pinjam'] =  $this->db->query("SELECT *, tbl_pinjam.status as status FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			INNER JOIN tbl_login on tbl_login.anggota_id = tbl_pinjam.anggota_id
			WHERE id_login='$awal'");
			$this->data['label'] = " ";
		
		
        $this->data['title_web'] = 'LAPORAN DATA PEMINJAMAN BUKU';
        $this->load->view('pinjam/laporan',$this->data);
	}


	public function laporankembali()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if(isset($_POST['cetaksemua'])) {
			$this->data['kembali'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			WHERE status = 'Di Kembalikan'");
			$this->data['label'] = "Semua Data";
		} else {
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];

			$this->data['kembali'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			WHERE status = 'Di Kembalikan' AND MONTH(tgl_kembali) = '$bulan' AND YEAR(tgl_kembali) = '$tahun'");
			$this->data['label'] = "Pengembalian Bulan $bulan Tahun $tahun";
		}
		
        $this->data['title_web'] = 'LAPORAN DATA PENGEMBALIAN BUKU';
        $this->load->view('kembali/laporan',$this->data);
	}

	public function laporankembali_tanggal()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

			$awal = $_POST['awal'];
			$akhir = $_POST['akhir'];

			$this->data['kembali'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			WHERE status = 'Di Kembalikan' AND tgl_kembali BETWEEN '$awal' AND '$akhir'");
			$this->data['label'] = "Pengembalian Tanggal $awal s/d $akhir";
		
		
        $this->data['title_web'] = 'LAPORAN DATA PENGEMBALIAN BUKU';
        $this->load->view('kembali/laporan',$this->data);
	}

	public function qrbuku($id) {
		
		$this->load->library('ciqrcode'); //pemanggilan library QR CODE
 
		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']             = './assets_style/'; //string, the default is application/cache/
		$config['errorlog']             = './assets_style/'; //string, the default is application/logs/
		$config['imagedir']             = './assets_style/image/'; //direktori penyimpanan qr code
		$config['quality']              = true; //boolean, the default is true
		$config['size']                 = '1024'; //interger, the default is 1024
		$config['black']                = array(224,255,255); // array, default is array(255,255,255)
		$config['white']                = array(70,130,180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name=$id.'.png'; //buat name dari qr code sesuai dengan nim

		$params['data'] = $id; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params);
		redirect(''.base_url().'assets_style/image/'.$image_name.'');
	}

	public function laporandenda_tanggal()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		
		$awal = $_POST['awal'];
		$akhir = $_POST['akhir'];

			$this->data['kembali'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			INNER JOIN tbl_denda on tbl_denda.pinjam_id = tbl_pinjam.pinjam_id
			WHERE status = 'Di Kembalikan' AND tgl_denda BETWEEN '$awal' AND '$akhir' AND denda > 0");
			$this->data['label'] = "Denda Tanggal $awal s/d $akhir";
		
		
        $this->data['title_web'] = 'LAPORAN DATA DENDA';
        $this->load->view('denda/laporan',$this->data);
	}

	public function laporandenda()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');

		if(isset($_POST['cetaksemua'])) {
			$this->data['kembali'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			INNER JOIN tbl_denda on tbl_denda.pinjam_id = tbl_pinjam.pinjam_id
			WHERE status = 'Di Kembalikan' AND denda > 0");
			$this->data['label'] = "Semua Data";
		} else {
			$bulan = $_POST['bulan'];
			$tahun = $_POST['tahun'];

			$this->data['kembali'] =  $this->db->query("SELECT * FROM tbl_pinjam
			INNER JOIN tbl_buku on tbl_buku.buku_id = tbl_pinjam.buku_id
			INNER JOIN tbl_denda on tbl_denda.pinjam_id = tbl_pinjam.pinjam_id
			WHERE status = 'Di Kembalikan' AND MONTH(tgl_denda) = '$bulan' AND YEAR(tgl_denda) = '$tahun' AND denda > 0");
			$this->data['label'] = "Bayar Denda Bulan $bulan Tahun $tahun";
		}
		
        $this->data['title_web'] = 'LAPORAN DATA DENDA';
        $this->load->view('denda/laporan',$this->data);
	}


}
