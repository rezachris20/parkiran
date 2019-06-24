<div class="breadcrumbs">

    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Pelanggan</h1>                 
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">

        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
		                    <th>No</th>
		                    <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Brand Mobil</th>
                            <th>Merk Mobil</th>
                            <th>No. Polisi</th>
                        	<th>QR Code</th>
                            <th>Kode</th>
                            <th>Aksi</th>    
                        </tr>
	                </thead>
	                <tbody>
                        <?php
                            $no = 1; 
                            foreach($pelanggan as $p):
                        ?>
	                    <tr>
	                        <td><?php echo $no++ ?></td>
                            <td><?php echo $p->nama_pelanggan;?></td>
                            <td><?php echo $p->alamat_pelanggan;?></td>
                            <td><?php echo $p->hp_pelanggan;?></td>
                            <td><?php echo $p->nama_brandmobil;?></td>
                            <td><?php echo $p->merk_mobil;?></td>
                            <td><?php echo $p->plat_mobil;?></td>
                            <td style="cursor: pointer;" onclick="window.open('pelanggan/cetak_qrcode?qr=<?php echo $p->qr_code ?>','mywindow','width=300px,height=300px,left=500px;')"><img style="width: 50px;" src="<?php echo base_url().'assets/images/'.$p->qr_code;?>"></td>
                            <td><?php echo $p->kode ?></td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="hapus('<?php echo $p->id_pelanggan ?>')">Delete
                                </button>    
                            </td>
	                    </tr>
                        <?php endforeach;?>
	                </tbody>
	            </table>
	        </div>
        </div>
    </div>

    
</div> <!-- .content -->
</div><!-- /#right-panel -->

    <!-- Right Panel -->
    
    
        
<script type="text/javascript">
    function hapus(id)
    {
        var tanya = confirm("Apakah Anda Yakin??")

        if (tanya)
        {
            $.ajax({
                type:'POST',
                data:'id='+id,
                url:'<?php echo base_url().'pelanggan/hapusdata' ?>',
                success:function()
                {
                    window.location.href = 'pelanggan';
                }
            });
        }
    }
    
</script>

    
