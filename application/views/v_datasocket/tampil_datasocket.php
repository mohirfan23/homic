<aside class="right-side">
            <!-- Main content -->
    <div class="alert alert-danger alert-dismissible margin5" id="error" style="display:none;">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Error!</strong><i id="tempat_error"></i> 
    </div>         
  <section class="content-header">
    <h1>Data Socket</h1>
    <ol class="breadcrumb"></ol>
  </section>
  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-danger">
            <div class="panel-heading">
            <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Atur alat
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-7 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12 headings">
                                                <span class="badge badge-success">
                                                SETTING ALAT
                                                </span>
                                                <hr class="hr-flex">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button class="btn btn-default" id="tombol_cek" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Cek alat">Cekking server</button>
                                                <button class="btn btn-danger hide" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending" id="trun_off">Trun Off</button>
                                                <button class="btn btn-success hide" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending" id="trun_on">Trun On</button>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        
                                        <div class="form-group input-group">
                                            <input type="text" class="form-control" placeholder="Set kwh .." id="set_kwh">
                                            <span class="input-group-btn">
                                                <button class="btn btn-success" type="button" id="btn_set_kwh" data-loading-text="<i class='fa fa-spinner fa-spin'></i>Cek konksi">
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
                    <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12 headings">
                                                <span class="badge badge-success">
                                                G R A F I K  D A Y A
                                                </span>
                                                <hr class="hr-flex">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="grafik_daya">

                                </div>

                    </div>
                    <div class="col-md-6">
                        
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12 headings">
                                                    <span class="badge badge-success">
                                                    G R A F I K   A R U S
                                                    </span>
                                                    <hr class="hr-flex">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="grafik_arus">

                                    </div>
                             
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-sm-12 headings">
                                                <span class="badge badge-success">
                                                G R A F I K  T E G A N G A N
                                                </span>
                                                <hr class="hr-flex">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div id="grafik_tegangan">

                                </div>

                    </div>
                    <div class="col-md-6">
                        
                                <div class="row">
                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-sm-12 headings">
                                                    <span class="badge badge-success">
                                                    G R A F I K   KWH
                                                    </span>
                                                    <hr class="hr-flex">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div id="grafik_kwh">

                                    </div>
                             
                        </div>
                    </div>
                </div>
                  
            </div>
        </div>
    </div>
  </div>   

</aside>
<!-- right-side -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.0/sweetalert2.min.js"></script>
<script>
    var tempat_daya = [];
    var tempat_arus = [];
    var tempat_tegangan = [];
    var tempat_kwh = [];
    var url = "<?php echo base_url('C_datagt/insert_data') ?>";
    var no_seri = '<?= $this->session->userdata('no_seri') ?>';

    usurname = 'xnyssfic';
    password = '5g07JJLkpZy9';
</script>

<script type="text/javascript">

var chart1, chart2, chart3, chart4, set_kwh, set_tombol;

function get_data() {
    
    $.ajax({
        url:"<?= base_url('C_datasocket/cek_kondisi_alat') ?>",
        method:"GET",
        success:function(data){
            var data_parser = JSON.parse(data);
            
            set_kwh = data_parser.set_kwh;

            tampil_kwh(data_parser);
        }
    });
}

function tampil_kwh(data){
    $('#set_kwh').val(data.set_kwh);
}

function ubah_tombol(data) {
    
    $("#tombol_cek").button("reset").addClass('hide');
    

    if(data == 0){
        $('#trun_off').addClass('hide');
        $("#trun_on").button("reset").removeClass('hide');

    }else{
        $("#trun_on").addClass('hide');
        $('#trun_off').button("reset").removeClass('hide');

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
    OnOff("1");
    set_tombol = 1;
    $(this).button("loading");
    // ubah_tombol(1);
});

$('#trun_off').on('click', function(){
    OnOff("0");
    set_tombol = 0;
    $(this).button("loading");
    // ubah_tombol(0)
});

$('#btn_set_kwh').on('click', function(){

    var data_kwh = $('#set_kwh').val();

    set_kwh = data_kwh;

    $.ajax({
        url:'<?= base_url('C_datasocket/update_kwh') ?>',
        method:"POST",
        data:{kwh:data_kwh},
        success:function(data){
            var data_parser = JSON.parse(data);
            tampil_kwh(data_parser);
        }
    })
});


$(document).ready(function() {

    get_data();

    $('#btn_set_kwh').button("loading");

    $("#tombol_cek").button("loading");

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
                name: 'watt',
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
                name: 'amper',
                data: []
            }],

        });

        chart3 = Highcharts.stockChart('grafik_tegangan', {
            chart: {
            zoomType: 'x',
            events: {
                    // load: requestData // it should be just function name instead of calling the function
                }
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
                name: 'volt',
                data: []
            }]
        });

        chart4 = Highcharts.stockChart('grafik_kwh', {
            chart: {
            zoomType: 'x',
            events: {
                    // load: requestData // it should be just function name instead of calling the function
                }
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
                name: 'kwh',
                data: []
            }]
        });



    });
</script>

<script src="<?= base_url() ?>assets/js/mqttws31.js"></script>
<script src="<?= base_url() ?>assets/js/mqtt.js"></script>
