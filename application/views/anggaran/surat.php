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
    var css = '@page { size: potrait; }',
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
            <!-- <p><?= $label ?></p> -->
        </center>
    </h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box table-responsive">
            <div>Yang Terhormat</div>
            <div>Bapak Kepala MA Raudhatusysyubban</div>
            <div>Di Tempat</div>
            <br>
            <p>Assalamualaikum Wr Wb </p>
            <div>Kami, pengelola perpustakaan sekolah, dengan ini mengajukan permohonan anggaran untuk pengadaan barang atau kebutuhan perpustakaan sekolah. Perpustakaan ini memiliki peran penting dalam meningkatkan minat baca dan wawasan literasi bagi para siswa. Tujuan permohonan ini adalah untuk meningkatkan kualitas dan pelayanan perpustakaan, sehingga memberikan manfaat maksimal bagi seluruh siswa.</div>
            <p>Berikut adalah pengajuan anggaran barang : </p>
                <table cellspacing="0" width="100%">
                    <tbody>
                    <?php 
                    foreach($anggaran->result_array() as $isi)
                    {
                    ?>
                            
                                <tr>
                                    <td>Nama Barang</td>
                                    <td>:</td>
                                    <td><?= $isi['nama_barang'];?></td>
                                </tr>
                                <tr>
                                    <td>Harga Barang</td>
                                    <td>:</td>
                                    <td>Rp <?= $isi['harga'];?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Barang</td>
                                    <td>:</td>
                                    <td><?= $isi['jumlah_barang'];?></td>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <td>Rp <?= $isi['jumlah_barang']*$isi['harga'];?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pengajuan</td>
                                    <td>:</td>
                                    <td><?= tgl_indo($isi['tanggal_pengajuan']);?></td>
                                </tr>
                        </tbody>
                <?php } ?>


                </table>

            </div>
        </div>
    </div>
    <br>
    <br>
                    <p>   Kami berkomitmen untuk memberikan laporan dan pertanggungjawaban penggunaan anggaran secara berkala kepada pihak sekolah. Dukungan anggaran ini diharapkan dapat membantu kami dalam memberikan layanan yang lebih baik kepada para siswa.</p>
            </div>
            <p>Kami mengucapkan terima kasih atas perhatian dan dukungan Bapak/Ibu terhadap pengembangan perpustakaan sekolah.</p>
    <br>
    <div style="text-align: center; display: inline-block; float: right;">
        <h5>
            Kab. Banjar, <?= tgl_indo(date('Y-m-d')); ?>
            <br><img src="<?= base_url() ?>/assets_style/image/ttdkepsek.png" alt=""><br>
            Kepala Sekolah MA Raudhatusysyubban
        </h5>

    </div>


</body>

</html>