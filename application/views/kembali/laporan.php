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
?>
<script type="text/javascript">
    var css = '@page { size: landscape; }',
        head = document.head || document.getElementsByTagName('head')[0],
        style = document.createElement('style');

    style.type = 'text/css';
    style.media = 'print';

    if (style.styleSheet) {
        style.styleSheet.cssText = css;
    } else {
        style.appendChild(document.createTextNode(css));
    }

    head.appendChild(style);
    window.print();
</script>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title_web ?></title>
</head>

<body>
    <img src="<?= base_url() ?>/assets_style/image/logoabdi.jpg" align="left" width="10%">
    <p align="center"><b>

            <font size="5">MA Raudhatusysyubban</font> <br>
           
            <font size="2">Jl. Veteran No.223, RT.4, Sungai Lulut, Kec. Sungai Tabuk, Kabupaten Banjar, Kalimantan Selatan 70653</font> <br>
            <font size="2">Kabupaten Banjar, Kalimantan Selatan 70653</font> <br>
            <hr size="2px" color="black">
        </b></p>
    <br>
    <br>
    <h3>
        <center>
            <?php echo $title_web ?><br>
            <p><?= $label ?></p>
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
                <table border="1" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                                <th>No</th>
                                <th>No Pinjam</th>
                                <th>ID Anggota</th>
                                <th>Nama</th>
                                <th>Judul Buku</th>
                                <th>Tanggal Balik</th>
                                <th>Tanggal Dikembalikan</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
							$no=0;
							foreach($kembali->result_array() as $isi){
                                $anggota_id = $isi['anggota_id'];
                                $ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();

                                $pinjam_id = $isi['pinjam_id'];
                                $denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
                                $total_denda = $denda->row();
						?>
                            <tr>
                                <td><?= ++$no;?></td>
                                <td><?= $isi['pinjam_id'];?></td>
                                <td><?= $isi['anggota_id'];?></td>
                                <td><?= $ang->nama;?></td>
                                <td><?= $isi['title'];?></td>
                                <td><?= tgl_indo($isi['tgl_balik']);?></td>
                                <td>
									<?php 
										if($isi['tgl_kembali'] == '0')
										{
											echo '<p style="color:red;">belum dikembalikan</p>';
										}else{
											echo tgl_indo($isi['tgl_kembali']);
										}
									
									?>
								</td>
                            </tr>
                    </tbody>
                <?php } ?>


                </table>

            </div>
        </div>
    </div>
    <br>
    <br>
    <div style="text-align: center; display: inline-block; float: right;">
        <h5>
            Kab. Banjar, <?= tgl_indo(date('Y-m-d')); ?>
            <br><br><br><br><br><br>
            Kepala Sekolah MA Raudhatusysyubban
        </h5>

    </div>


</body>

</html>