<aside class="right-side">
            <!-- Main content -->
    <section class="content-header">
        <h1>Pembayaran Listrik</h1>
        <ol class="breadcrumb"></ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="signal" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            List Tagihan Listrik Per Hari
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        <i class="fa fa-calendar"></i>
                                        Tanggal
                                    </th>
                                    <th class="hidden-xs">
                                        <i class="fa fa-calendar-o"></i>
                                        Hari
                                    </th>
                                    <th>
                                        <i class="fa fa-usd"></i>
                                        Total
                                    </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="tampil">
                                
                                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="signal" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            List Tagihan Listrik Per Bulan
                        </h3>
                        <span class="pull-right clickable">
                            <i class="glyphicon glyphicon-chevron-up"></i>
                        </span>
                    </div>
                    <div class="panel-body">
                        <div class="panel-group tempat_bulan" id="accordion">
                                
                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>                          
    </section>
                
</aside>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        get_data()
        get_data_bulan()

        function get_data(){
            $.ajax({
                url:"<?= base_url('C_bayar_listrik'); ?>/get_data_tanggal",
                method:"GET",
                success:function(data){
                    $('#tampil').html(data);

                    setTimeout(get_data, 1000);
                }
            });    
        }

        function get_data_bulan(){
            $.ajax({
                url:"<?= base_url('C_bayar_listrik'); ?>/get_data_bulan",
                method:"GET",
                success:function(data){
                    $('.tempat_bulan').html(data);

                    setTimeout(get_data_bulan, 1000);
                }
            });    
        }


    });
</script>
        