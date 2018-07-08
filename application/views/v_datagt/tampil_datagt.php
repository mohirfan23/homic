<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Table pengiriman alat</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="signal" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Table pengiriman alat
                        </h3>
                    </div>
                    <div class="panel-body">
                        <button class="btn btn-danger" type="button" onclick="refresh()"><i class="fa fa-refresh"></i> Refresh</button>
                        <br><br>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Arus</th>
                                    <th>Daya</th>
                                    <th>Tegangan</th>
                                    <th>KWH</th>
                                    <th>Kondisi</th>
                                    <th>Tanggal</th>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($datagt as $al){ ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $al->arus ?></td>
                                            <td><?= $al->daya ?></td>
                                            <td><?= $al->tegangan ?></td>
                                            <td><?= $al->kwh ?></td>
                                            <td><?= $al->relay == 1 ? "On" : "Off"; ?></td>
                                            <td><?= $al->tanggal ?></td>
                                        </tr>    
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>
<script>
    function refresh(){
        window.location.reload();
    }
</script>
       