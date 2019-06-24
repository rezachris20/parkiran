<div class="breadcrumbs">

    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Statistik Perhari</h1>                 
            </div>
        </div>
    </div>

</div>

<div class="content mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Line Chart </h4>
                <canvas id="lineChart"></canvas>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var ctx = document.getElementById( "lineChart" );
    ctx.height = 100;
   
    var myChart = new Chart( ctx, {
        type: 'line',
        data: {
            labels: [ <?php foreach($tanggal as $t){echo '"' . date('d-m-Y',strtotime($t->masuk)) . '",';} ?> ],
            datasets: [
                {
                    label: "Mobil Masuk",
                    borderColor: "rgba(0,0,0,.09)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0,0,0,.07)",
                    data: [ <?php foreach($tanggal as $t){echo '"' . $t->jml . '",';} ?> ]
                            },
                {
                    label: "Mobil Keluar",
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [ <?php foreach($keluar as $k){echo '"' . $k->bayar . '",';} ?> ]
                            }
                        ]
        },
        options: {
            responsive: true,
            tooltips: {
                mode: 'index',
                intersect: false
            },
            hover: {
                mode: 'nearest',
                intersect: true
            }
        }
    } );
</script>
