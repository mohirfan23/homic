<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Data Pemesanan</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?= site_url('dashboard'); ?>">
                            <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">DataTables</a>
                    </li>
                    <li class="active">Responsive Datatables</li>
                </ol>
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="col-lg-6">
                                        <div class="panel panel-success">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                                    Form Registration
                                                </h3>
                                                <span class="pull-right">
                                                    <i class="fa fa-fw fa-chevron-up clickable"></i>
                                                    <i class="fa fa-fw fa-times removepanel clickable"></i>
                                                </span>
                                            </div>
                                            <div class="panel-body">
                                    <form action="<?= site_url('C_pesanan/update_pesanan'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                    <label for="formGroupExampleInput">Nama Pemesan</label>
                                        <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" value="<?php echo $pesanan->nama_pemesan; ?>" placeholder="Nama Pemesan">
                                        <input type="hidden" name="id" value="<?php echo $pesanan->id_pesanan; ?>">
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Barang</label>
                                        <input type="text" class="form-control" name="barang" id="barang" value="<?php echo $pesanan->barang; ?>" placeholder="Barang">
                                    </div>

                                    <div class="form-group">
                                        <label for="example-date-input">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?php echo $pesanan->jumlah; ?>" placeholder="Garansi">
                                    </div>

                                    <div class="form-group">
                                        <label for="example-date-input">Pembayaran</label>
                                        <input type="text" class="form-control" name="pembayaran" id="pembayaran" value="<?php echo $pesanan->pembayaran; ?>" placeholder="Pembayaran">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="<?= site_url('C_pesanan'); ?>" type="button" class="btn btn-danger">Back</a>
                                    </form>
                                            </div>
                                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>
                </div>
            </section>
            <!-- content -->
        </aside>
        <!-- right-side -->
    </div>
    <!-- ./wrapper -->