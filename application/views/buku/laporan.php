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
    <title>LAPORAN DATA BUKU</title>
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
            LAPORAN DATA BUKU<br>
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
                                <th>ISBN</th>
                                <th>Title</th>
                                <th>Penerbit</th>
                                <th>Tahun Buku</th>
                                <th>Tanggal Masuk</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                    $no=0;
                    foreach($buku->result_array() as $isi)
                    {
                    ?>
                            <tr>
                                <td><?= ++$no; ?></td>
                                <td><?= $isi['isbn'];?></td>
                                <td><?= $isi['title'];?></td>
                                <td><?= $isi['penerbit'];?></td>
                                <td><?= $isi['thn_buku'];?></td>
                                <td><?= $isi['tgl_masuk'];?></td>
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