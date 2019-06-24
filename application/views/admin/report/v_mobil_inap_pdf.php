<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table tr th,
        .table tr td {
            border:1px solid black;
            font-size: 10pt;
        }
    </style>
</head>
<body>
    <h3 style="text-align: center;">Report Mobil Inap</h3>
    <table>
        <tr>
            <td>Dari Tgl</td>
            <td>:</td>
            <td><?php echo date('d-m-Y',strtotime($_GET['dari'])); ?></td>
        </tr>
        <tr>
            <td>Sampai Tgl</td>
            <td>:</td>
            <td><?php echo date('d-m-Y',strtotime($_GET['sampai'])); ?></td>
        </tr>
    </table>
    <br/><br/>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No.HP</th>
                <th>Brand Mobil</th>
                <th>Merk Mobil</th>
                <th>Plat Mobil</th>
                <th>Masuk Parkir</th>
                <th>Keluar Parkir</th>
                <th>Lama Parkir</th>
                <th>Biaya</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach ($laporan as $l)
                { 
                    $total=$total+$l->bayar;
                ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $l->nama_pelanggan ?></td>
                <td><?php echo $l->alamat_pelanggan ?></td>
                <td><?php echo $l->hp_pelanggan ?></td>
                <td><?php echo $l->nama_brandmobil ?></td>
                <td><?php echo $l->merk_mobil ?></td>
                <td><?php echo $l->plat_mobil ?></td>
                <td><?php echo $l->masuk ?></td>
                <td><?php echo $l->keluar ?></td>
                <td><?php echo $l->lama_parkir." Jam" ?></td>
                <td><?php echo "Rp. ".number_format($l->bayar,0,",",".") ?></td>
            </tr>
            <?php } ?>
        </tbody>    
    </table>
    <br><br>
    <table>
        <tr>
            <td style="font-size: 16px; text-align: left;">Total Pendapatan :</td>
            <td style="font-size: 16px; text-align: right;"><?php echo "Rp. ".number_format($total,0,",",".") ?></td>
        </tr>
    </table>
</body>
</html>
