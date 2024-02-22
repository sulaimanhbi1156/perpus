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
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Jumlah Barang</th>
                                <th>Total</th>
                                <th>Tanggal Pengajuan</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                    $no=0;
                    foreach($anggaran->result_array() as $isi)
                    {
                    ?>
                            <tr>
                                <td align="center"><?= ++$no ?></td>
                                <td><?= $isi['nama_barang'];?></td>
                                <td align="center">Rp <?= $isi['harga'];?></td>
                                <td align="center"><?= $isi['jumlah_barang'];?></td>
                                <td align="center">Rp <?= $isi['jumlah_barang']*$isi['harga'];?></td>
                                <td align="center"><?= tgl_indo($isi['tanggal_pengajuan']);?></td>
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