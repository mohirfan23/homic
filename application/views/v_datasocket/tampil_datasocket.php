<aside class="right-side">
            <!-- Main content -->
  <section class="content-header">
    <h1>Data Socket</h1>
    <ol class="breadcrumb"></ol>
  </section>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Atur alat
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <button class="btn btn-danger hide" id="trun_off" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Cekking">Trun Off</button>
                                <button class="btn btn-success" id="trun_on" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Cekking">Trun On</button>
                            </div>
                        </div>
                        <div class="col-md-8">
                                    <div class="form-group input-group">
                                        <input type="text" class="form-control" placeholder="Set kwh .." id="set_kwh">
                                        <span class="input-group-btn">
                                            <button class="btn btn-success" type="button" id="btn_set_kwh">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </span>
                                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Grafik Daya
                </h3>
            </div>
            <div class="panel-body" id="grafik_daya">

            </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                    Arus Grafik
                </h3>
            </div>
            <div class="panel-body" id="grafik_arus">

            </div>
            </div>
        </div>
    </div>

  
</aside>
<!-- right-side -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">

var chart1, chart2;

function get_data() {
    
    $.ajax({
        url:"<?= base_url('C_datasocket/cek_kondisi_alat') ?>",
        method:"GET",
        beforeSend:function(){
            $("#trun_on").button('loading');
            $("#trun_off").button('loading');
        },
        success:function(data){
            ubah_tombol(JSON.parse(data));
            tampil_kwh(JSON.parse(data));
        }
    });
}

function tampil_kwh(data){
    $('#set_kwh').val(data.set_kwh);
}

function ubah_tombol(data) {
    if(data.set_switch == "off"){
        $('#trun_off').addClass('hide');
        $("#trun_on").button('reset').removeClass('hide');

    }else{

        $("#trun_on").addClass('hide');
        $('#trun_off').button('reset').removeClass('hide');

    }
}

function update_data(data){
    $.ajax({
        url:'<?= base_url('C_datasocket/update_data') ?>',
        method:"POST",
        data:{status:data},
        success:function(){
            get_data();
        }
    });
}

$('#trun_on').on('click', function(){
    update_data('on');
});

$('#trun_off').on('click', function(){
    update_data('off')
});

$('#btn_set_kwh').on('click', function(){

    var data_kwh = $('#set_kwh').val();

    $.ajax({
        url:'<?= base_url('C_datasocket/update_kwh') ?>',
        method:"POST",
        data:{kwh:data_kwh},
        success:function(){
            get_data();
        }
    })
});


$(document).ready(function() {

    get_data();

Highcharts.theme = {
   colors: ['#f45b5b', '#8085e9', '#8d4654', '#7798BF', '#aaeeee', '#ff0066', '#eeaaee',
      '#55BF3B', '#DF5353', '#7798BF', '#aaeeee'],
   chart: {
      backgroundColor: null,
      style: {
         fontFamily: 'Signika, serif'
      }
   },
   title: {
      style: {
         color: 'black',
         fontSize: '16px',
         fontWeight: 'bold'
      }
   },
   subtitle: {
      style: {
         color: 'black'
      }
   },
   tooltip: {
      borderWidth: 0
   },
   legend: {
      itemStyle: {
         fontWeight: 'bold',
         fontSize: '13px'
      }
   },
   xAxis: {
      labels: {
         style: {
            color: '#6e6e70'
         }
      }
   },
   yAxis: {
      labels: {
         style: {
            color: '#6e6e70'
         }
      }
   },
   plotOptions: {
      series: {
         shadow: true
      },
      candlestick: {
         lineColor: '#404048'
      },
      map: {
         shadow: false
      }
   },

   // Highstock specific
   navigator: {
      xAxis: {
         gridLineColor: '#D0D0D8'
      }
   },
   rangeSelector: {
      buttonTheme: {
         fill: 'white',
         stroke: '#C0C0C8',
         'stroke-width': 1,
         states: {
            select: {
               fill: '#D0D0D8'
            }
         }
      }
   },
   scrollbar: {
      trackBorderColor: '#C0C0C8'
   },

   // General
   background2: '#E0E0E8'

};

// Apply the theme
Highcharts.setOptions(Highcharts.theme);
    chart1 = Highcharts.stockChart('grafik_daya', {
        chart: {
          zoomType: 'x',
           events: {
                // load: requestData // it should be just function name instead of calling the function
            }
        },
        title: {
            text: 'Grafik Daya Dari Alat 1'
        },
        subtitle: {
            text: 'Penggunaan daya dari rumah anda'
        },
        xAxis: {
            type: 'datetime'
        },
        yAxis: {
            title: {
                text: 'Exchange rate'
            }
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: {
                        x1: 0,
                        y1: 0,
                        x2: 0,
                        y2: 1
                    },
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                marker: {
                    radius: 2
                },
                lineWidth: 1,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },

        series: [{
            type: 'area',
            name: 'Daya',
            data: []
        }]
    });

    chart2 = Highcharts.stockChart('grafik_arus', {
        chart: {
           type:"line",
           events: {
                // load: requestData // it should be just function name instead of calling the function
            }
        },

        title: {
            text: 'Grafik Arus Dari Alat 1'
        },

        subtitle: {
            text: 'Penggunaan arus dari rumah anda'
        },
        yAxis: {
            title: {
                text: 'Arus'
            }
        },
         plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },

        series: [{
            name: 'Arus',
            data: []
        }],

    });



});
</script>
