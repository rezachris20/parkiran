<style type="text/css">
    @media print{
        input.noPrint{
            display: none;
        }
        /*p.noPrintkode{
            display: none;
        }*/
    }
</style>
    <div class="content mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
	               <?php
                        $qrcode = $_GET['qr'];
                    ?>
                    <!--<p class="noPrintkode" style="text-align: center;"><?php echo $qrcode ?></p>-->
                    <center><img style="width: 500px 500px;" src="<?php echo base_url().'assets/images/'.$qrcode.'.png';?>"></center>
                    <center>
                        <P>SECURE PARKING</P>
                        <p>BOTANI SQUARE MALL</p>
                        <p>Jl. Raya Pajajaran No. 23 Tegalega Bogor Selatan</p>
                    </center>
                    <input type="submit" class="noPrint" value="Print" class="btn" onclick="window.print()">
	           </div>
            </div>
        </div>
    </div> <!-- .content -->
</div><!-- /#right-panel -->

    <!-- Right Panel -->

    
