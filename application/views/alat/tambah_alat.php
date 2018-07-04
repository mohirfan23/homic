
<aside class="right-side">
            <!-- Main content -->
            <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success alert-dismissible margin5">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?= $this->session->flashdata('success') ?>
                </div>
            <?php } ?>

             <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissible margin5">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?= $this->session->flashdata('info') ?>
                </div>
            <?php } ?>

            <section class="content-header">
                <h1>Data Pemesanan</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            
            <div>
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="row">
                        <div class="col-md-5 col-md-offset-3">
                            
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                        Insert Alat
                                    </h3>                
                                </div>
                                <div class="panel-body">
                                    <form action="<?= site_url('C_datasocket/insert_alat'); ?>" method="POST">
                                    
                                    <div class="row">
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">ID Alat</label>
                                                <input type="text" class="form-control" name="id_alat" id="id_alat" placeholder="ID Alat" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group" style="padding-top:25px;padding-right:20px;">
                                                <button class="btn btn-warning btn-sm" id="generet" type="button">Generet ID</button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat">Status</label>
                                                <input type="text" class="form-control" placeholder="Total" value="tidak aktif" name="status" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending .." id="kirim_komen">Daftar</button>
                                            <a href="<?= site_url('C_pesanan'); ?>" type="button" class="btn btn-danger">Cek data</a>
                                        </div>
                                    </div>
                                    

                                    
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                        
                        <!-- END SAMPLE TABLE PORTLET-->
            </div>
    </aside>
        <!-- right-side -->
    <!-- global js -->
    <script src="<?= base_url() ?>/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script>
        $('#generet').on('click', function(){
            var tempat_id = $('#id_alat');

            $.ajax({
                url:"<?= base_url('C_datasocket/kombinasi_acak') ?>",
                method:"GET",
                success:function(data){
                    tempat_id.val(data);
                }
            })
        });
    </script>
</body>
</html>