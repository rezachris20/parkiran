<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Parkir</h1>       
            </div>
        </div>
    </div>

    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#mediumModal"> Pelanggan Baru
                </ol>
            </div>
        </div>
    </div>

</div>
<?php
$koderandom = random_string('numeric',9);
?>


<div class="content mt-3">
    <div class="col-md-12">
        <div class="card">                  
            <div class="card-body">
                <!-- Start Form Masuk-->
                <center><font color="red"><p id="pesan"></p></font></center>
                <div class="col-md-4">
                <form class="form-horizontal">
                    <legend><i class="fa fa-arrow-down"></i> Kendaraan Masuk</legend>
                    <div class="form-group">
                        <input name="kode" id="mkode" class="form-control" type="text" placeholder="Scan QR Code..." >
                    </div>

                    <div class="form-group"> 
                        <input name="mnama" class="form-control" type="text" placeholder="Nama Pelanggan..." readonly>  
                    </div>

                     <div class="form-group">
                        <input name="mmerk" class="form-control" type="text" placeholder="Merk Mobil..." readonly>
                    </div>

                    <div class="form-group">
                        <input name="mplat" class="form-control" type="text" placeholder="Plat Mobil..." readonly>
                    </div>

                    <div class="form-group">
                        <input type="button" class="btn btn-success" value="Masuk" onclick="masukparkir()">                        
                    </div>
                </form>
                </div>
                <!-- End Form Masuk-->

                <!-- Start Form Keluar-->
                <center><font color="red"><p id="pesan"></p></font></center>
                <div class="col-md-4">
                
                <form class="form-horizontal">
                    <legend><i class="fa fa-arrow-up"></i> Kendaraan Keluar</legend>
                    <div class="form-group">
                        <input name="kkode" id="kkode" class="form-control" type="text" placeholder="Scan QR Code..." >
                    </div>

                     <div class="form-group">
                        <input name="kmerk" class="form-control" type="text" placeholder="Merk Mobil..." readonly>
                    </div>

                    <div class="form-group">
                        <input name="kplat" class="form-control" type="text" placeholder="Plat Mobil..." readonly>
                    </div>

                    <div class="form-group"> 
                        <input name="ktgljam" class="form-control" type="text" placeholder="Tanggal & Jam Masuk..." readonly>  
                    </div>

                    <div class="form-group"> 
                        <input name="ktgljamkeluar" class="form-control" type="text" placeholder="Tanggal & Jam Keluar..." readonly>  
                    </div>

                    <div class="form-group"> 
                        <input name="klamaparkir" class="form-control" type="text" placeholder="Lama Parkir..." readonly>  
                    </div>

                    
                </form>
                </div>
                <div class="col-md-4">
                    <legend><i class="fa fa-shopping-cart"></i> Pembayaran</legend>
                    <form class="form-horizontal">
                        <div class="form-group"> 
                        <input name="kbayar" id="kbayar" class="form-control" type="text" placeholder="Biaya..." data-a-sign="Rp. " data-a-sep="." data-a-dec="," readonly>  
                    </div>

                    <div class="form-group"> 
                        <input name="kuangbayar" id="kuangbayar" class="form-control" type="text" placeholder="Uang Bayar..." onkeyup="sum()" data-a-sign="Rp. " data-a-sep="." data-a-dec=",">  
                    </div>

                    <div class="form-group"> 
                        <input name="kuangkembali" id="kuangkembali" class="form-control" type="text" placeholder="Kembali..." data-a-sign="Rp. " data-a-sep="." data-a-dec="," readonly>  
                    </div>

                    <div class="form-group">
                        <input type="button" class="btn btn-danger" value="Bayar" onclick="keluarparkir()">                       
                    </div>
                    </form>
                </div>
              


               
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No. HP</th>
                            <th>Brand Mobil</th>
                            <th>Merk Mobil</th>
                            <th>Plat Mobil</th>
                            <th>Masuk Parkir</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no = 1;
                        foreach ($parkir as $p) {
                            $kodeqr = $p->kode;
                            
                    ?>
                        <tr>
                            
                            <td>
                                <?php echo $no++ ?>
                                <input type="hidden" name="idkeluar" value="<?php echo $p->id_parkir; ?>">
                            </td>
                            <td><?php echo $p->nama_pelanggan ?></td>
                            <td><?php echo $p->alamat_pelanggan ?></td>
                            <td><?php echo $p->hp_pelanggan ?></td>
                            <td><?php echo $p->nama_brandmobil ?></td>
                            <td><?php echo $p->merk_mobil ?></td>
                            <td><?php echo $p->plat_mobil ?></td>
                            <td><?php echo date('d-m-Y H:i:s',strtotime($p->masuk)) ?></td>
                               
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="mediumModal" tabindex="-1" role="modal-dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Medium Modal</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <center><font color="red"><p id="pesan1"></p></font></center>
                <form>
                    <div class="form-group">
                        <label for="nama" class="control-label">Nama:</label>
                        <input type="text" name="nama" class="form-control" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="control-label">Alamat:</label>
                        <input type="text" name="alamat" class="form-control" id="alamat">
                    </div>
                    <div class="form-group">
                        <label for="hp" class="control-label">HP:</label>
                        <input type="text" name="hp" class="form-control" id="hp">
                    </div>
                    <div class="form-group">
                        <label for="brandmobil" class="control-label">Brand Mobil:</label>
                        <select name="brandmobil" id="brandmobil" class="form-control">
                            <option value="0">-PILIH-</option>
                            <?php foreach ($brandmobil as $b) {?>
                            <option value="<?php echo $b->id ?>"><?php echo $b->nama_brandmobil ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="merkmobil" class="control-label">Merk Mobil:</label>
                        <select name="merkmobil" id="merkmobil" class="form-control">
                            <option value="0">-PILIH-</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="plat" class="control-label">Plat:</label>
                        <input type="text" name="plat" class="form-control" id="plat">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="koderandom" class="form-control" id="plat" value="<?php echo $koderandom ?>">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary" onclick="tambahData()">Simpan</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
</div>


  
<script type="text/javascript">
    $(document).ready(function(){
        $('#mkode').on('input',function(){
                 
            var kode=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('parkir/get_data_masuk')?>",
                dataType : "JSON",
                data : {kode: kode},
                cache:false,
                success: function(data){
                    $.each(data,function(){
                        $('[name="mnama"]').val(data.nama_pelanggan);
                        $('[name="mmerk"]').val(data.merk_mobil);
                        $('[name="mplat"]').val(data.plat_mobil);
                                        
                    });           
                }
            });
            return false;
        });
    });

    $(document).ready(function(){
        $('#brandmobil').change(function(){
            var id=$(this).val();
            $.ajax({
                url : '<?php echo base_url().'parkir/get_merkmobil' ?>',
                method : "POST",
                data : {id: id},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option>'+data[i].nama_merkmobil+'</option>';
                    }
                    $('#merkmobil').html(html);
                     
                }
            });
        });
    });

    $(document).ready(function(){
        $('#kkode').on('input',function(){
                 
            var kkode=$(this).val();
            $.ajax({
                type : "POST",
                url  : "<?php echo base_url('parkir/get_data_keluar')?>",
                dataType : "JSON",
                data : {kkode: kkode},
                cache:false,
                success: function(data){
                    $.each(data,function(){
                        $('[name="kmerk"]').val(data.merk_mobil);
                        $('[name="kplat"]').val(data.plat_mobil);
                        $('[name="ktgljam"]').val(data.masuk);
                        $('[name="ktgljamkeluar"]').val(data.keluar);
                        $('[name="klamaparkir"]').val(data.lama_parkir);
                        $('[name="kbayar"]').val(data.bayar);

                                        
                    });           
                }
            });
            return false;
        });
    });

    function sum()
    {
        var biaya = $("#kbayar").autoNumeric('get');
        var bayar = $("#kuangbayar").autoNumeric('get');
        var result = parseInt(bayar)-parseInt(biaya);

        if (!isNaN(result))
        {
            $("#kuangkembali").val(result);
        }
    }

    function masukparkir()
    {
       var mkode = $("[name = 'kode']").val();

        $.ajax({
            type:'POST',
            data:'mkode='+mkode,
            url:'<?php echo base_url().'parkir/masukparkir' ?>',
            dataType:'json',
            success: function(hasil)
            {
                $("#pesan").html(hasil.pesan);

                if (hasil.pesan == '')
                {
                    location.reload();
                }
            }
        
        });
    }
    function keluarparkir()
    {
       var kode = $("[name = 'kkode']").val();
       var ktgljamkeluar = $("[name = 'ktgljamkeluar']").val();
       var klamaparkir = $("[name = 'klamaparkir']").val();
       var kbayar = $("[name = 'kbayar']").autoNumeric('get');
       var kuangbayar = $("[name = 'kuangbayar']").autoNumeric('get');
       var kuangkembali = $("[name = 'kuangkembali']").autoNumeric('get');
       var idkeluar = $("[name = 'idkeluar']").val();

        $.ajax({
            type:'POST',
            data:'kode='+kode+'&ktgljamkeluar='+ktgljamkeluar+'&klamaparkir='+klamaparkir+'&kbayar='+kbayar+'&kuangbayar='+kuangbayar+'&kuangkembali='+kuangkembali,
            url:'<?php echo base_url().'parkir/keluarparkir' ?>',
            dataType:'json',
            success: function(hasil)
            {
                $("#pesan").html(hasil.pesan);

                if (hasil.pesan == '')
                {
                    window.open('parkir/struk?id='+idkeluar,'mywindow','width=500px,height=400px,left=300px;');
                    location.reload();
                }
            }
        
        });
    }

    function tambahData() // menambahkan data
    {
        var nama = $("[name = 'nama']").val();
        var alamat = $("[name = 'alamat']").val();
        var hp = $("[name = 'hp']").val();
        var brandmobil = $("[name = 'brandmobil']").val();
        var merkmobil = $("[name = 'merkmobil']").val();
        var plat = $("[name = 'plat']").val();
        var koderandom = $("[name = 'koderandom']").val();
        

        $.ajax({
          type : 'POST',
          data:'nama='+nama+'&alamat='+alamat+'&hp='+hp+'&brandmobil='+brandmobil+'&merkmobil='+merkmobil+'&plat='+plat+'&koderandom='+koderandom,
          url : '<?php echo base_url().'parkir/simpan' ?>',
            dataType : 'json',
            success : function(hasil)
            {
              $("#pesan1").html(hasil.pesan1);

              if (hasil.pesan1 == '')
              {

                $("#mediumModal").modal('hide');
                
                window.open('parkir/cetak_qrcode?qr=<?php echo $koderandom ?>','mywindow','width=300px,height=500px,left=500px;');
                window.location.href='parkir';
                          

                var pesan = $("[id = 'pesan']").val('');
                var nama = $("[name = 'nama']").val('');
                var alamat = $("[name = 'alamat']").val('');
                var hp = $("[name = 'hp']").val('');
                var brandmobil = $("[name = 'brandmobil']").val('');
                var merkmobil = $("[name = 'merkmobil']").val('');
                var plat = $("[name = 'plat']").val('');
                var koderandom = $("[name = 'koderandom']").val('');

              }
            }
        });
    }
</script>
</body>
</html>