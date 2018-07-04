<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Data Pengukuran Gateway</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            <div class="col-lg-6">
                <div class="panel panel-success">
                  <div class="panel-heading">
                      <h3 class="panel-title">
                         <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                          Grafik Suhu
                      </h3>        
                  </div>         
                  <div class="panel-body" id="grafik_suhu">
                  
                  </div>               
                </div>              
              </div> 
              <div class="col-lg-6">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Grafik Gas
                    </h3>
                  </div>
                  <div class="panel-body" id="grafik_gas">
                    
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                     <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                        Grafik Kelembaban
                    </h3>
                  </div>
                  <div class="panel-body" id="grafik_kelembaban">
                    
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
     var chart1,chart2, chart3;
    function requestData(){
        $.ajax({
            url: '<?= base_url() ?>C_datagt/get_data',
            datatype: "json",
            success: function(data) {
            var data1 = jQuery.parseJSON(data);
            var data2 = jQuery.parseJSON(data);
            var data3 = jQuery.parseJSON(data);
            chart1.series[0].setData(data1[0]['suhu']);
            chart2.series[0].setData(data2[0]['gas']);
            chart3.series[0].setData(data3[0]['kelembaban']);
            setTimeout(requestData, 1000);    
            }
        });
    }

    $(document).ready(function() {
    

    chart1 = Highcharts.stockChart('grafik_suhu', {
        chart: {
           type:"line",
           events: {
                load: requestData // it should be just function name instead of calling the function
            }
        },

        title: {
            text: 'Grafik Suhu Dari Alat 1'
        },

        subtitle: {
            text: 'Temperatur suhu dari rumah anda'
        },
        yAxis: {
            title: {
                text: 'Suhu'
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
            name: 'Suhu',
            data: []
        }],

    });

    chart2 = Highcharts.stockChart('grafik_gas', {
        chart: {
           type:"line",
           events: {
                load: requestData // it should be just function name instead of calling the function
            }
        },

        title: {
            text: 'Grafik Gas Dari Alat 1'
        },

        subtitle: {
            text: 'Temperatur gas dari rumah anda'
        },
        yAxis: {
            title: {
                text: 'Gas'
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
            name: 'Gas',
            data: []
        }],

    });

    chart3 = Highcharts.stockChart('grafik_kelembaban', {
        chart: {
           type:"line",
           events: {
                load: requestData // it should be just function name instead of calling the function
            }
        },

        title: {
            text: 'Grafik Kelembaban Dari Alat 1'
        },

        subtitle: {
            text: 'Kelembaban dari rumah anda'
        },
        yAxis: {
            title: {
                text: 'Kelembaban'
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
            name: 'Kelembaban',
            data: []
        }],

    });

    

});  

    </script>