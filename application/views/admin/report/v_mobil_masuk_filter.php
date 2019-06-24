<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<div class="breadcrumbs">

    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Report Mobil Masuk/ Keluar</h1>                 
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            	<div class="col-md-3">
            		<form class="form-inline" method="POST" action="<?php echo base_url().'rmobilmasuk' ?>">
            			<div class="form-group">
            				<label>Dari Tanggal : </label>&nbsp
            				<input type="date" name="dari" class="form-control" value="<?php echo set_value('dari'); ?>">
            				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            				<label>Sampai Tanggal : </label>&nbsp
            				<input type="date" name="sampai" class="form-control" value="<?php echo set_value('sampai'); ?>">
            				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            				<input type="submit" class="btn btn-primary" value="Cari" name="cari">
            			</div>            			
            		</form>
            		<br/>
            
                    <a href="<?php echo base_url().'rmobilmasuk/laporan_pdf/?dari='.set_value('dari').'&sampai='.set_value('sampai')?>">
                        <button type="button" class="btn btn-sm social reddit" style="margin-bottom: 4px;border-radius: 4px;padding: 2%;">
                            <i class="fa fa-file-pdf-o"></i>
                            <span>Save as PDF</span>
                        </button>
                    </a>
                     &nbsp&nbsp
                    <a href="<?php echo base_url().'rmobilmasuk/laporan_excel/?dari='.set_value('dari').'&sampai='.set_value('sampai')?>">
                        <button type="button" class="btn btn-sm social spotify" style="margin-bottom: 4px;border-radius: 4px;padding: 2%;">
                            <i class="fa fa-file-excel-o"></i>
                            <span>Save as XLSX</span>
                        </button>
                    </a>
            		<br><br>
            	</div>

            	<div class="col-md-12">
            		<table id="bootstrap-data-table" class="table table-striped table-bordered">
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
                        <?php $no=1; foreach ($laporan as $l) { ?>
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
            	</div>
            </div>
        </div>
    </div>
</div>