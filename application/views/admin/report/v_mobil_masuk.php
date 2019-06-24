<div class="breadcrumbs">

    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Report Mobil Masuk</h1>                 
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
            				<input type="date" name="dari" id="dari" class="form-control">
                            <?php echo form_error('dari'); ?>
            				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            				<label>Sampai Tanggal : </label>&nbsp
            				<input type="date" name="sampai" id="sampai" class="form-control">
                            <?php echo form_error('sampai') ?>
            				&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            				<input type="submit" class="btn btn-primary" value="Cari" name="cari">
            			</div>            			
            		</form>
            	</div>
            </div>
        </div>
    </div>
</div>
