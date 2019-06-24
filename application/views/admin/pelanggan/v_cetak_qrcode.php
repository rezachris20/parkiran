<style type="text/css">
    @media print{
        input.noPrint{
            display: none;
        }
    }
</style>
    <div class="content mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
	               <?php
                        $qrcode = $_GET['qr'];
                    ?>
                    <img style="width: 300px 300px;" src="<?php echo base_url().'assets/images/'.$qrcode;?>"></td>
                    <input type="submit" class="noPrint" value="Print" class="btn" onclick="window.print()">
	           </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

    <!-- Right Panel -->

    
