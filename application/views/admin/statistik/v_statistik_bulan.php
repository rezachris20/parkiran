<div class="breadcrumbs">

    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Data Statistik Perbulan</h1>                 
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
            labels: [ 
            <?php foreach($bulan as $b)
                {
                    if (date('m',strtotime($b->date))=='1')
                    {
                        echo '"' . "Januari ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='2')
                    {
                         echo '"' . "Februari ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='3')
                    {
                         echo '"' . "Maret ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='4')
                    {
                         echo '"' . "April ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='5')
                    {
                         echo '"' . "Mei ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='6')
                    {
                         echo '"' . "Juni ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='7')
                    {
                         echo '"' . "Juli ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='8')
                    {
                         echo '"' . "Agustus ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='9')
                    {
                         echo '"' . "September ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='10')
                    {
                         echo '"' . "Oktober ".date('Y') . '",';
                    }
                    else if (date('m',strtotime($b->date))=='11')
                    {
                         echo '"' . "November ".date('Y'). '",';
                    }
                    else 
                    {
                         echo '"' . "Desember ".date('Y') . '",';
                    }
                    
                } 
            ?> 
            ],
            datasets: [
                {
                    label: "Mobil Masuk",
                    borderColor: "rgba(0,0,0,.09)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0,0,0,.07)",
                    data: [ <?php foreach($bulan as $b){echo '"' . $b->count . '",';} ?> ]
                            },
                {
                    label: "Mobil Keluar",
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "1",
                    backgroundColor: "rgba(0, 123, 255, 0.5)",
                    pointHighlightStroke: "rgba(26,179,148,1)",
                    data: [ <?php foreach($kbulan as $b){echo '"' . $b->count . '",';} ?> ]
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
