<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Responsive Datatables</h1>
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
                        <form action="<?= site_url('C_tdl/update_tdl'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="formGroupExampleInput">Pilih Daya</label>
                                  <select class="form-control" name="id_pengukuran">
                                    <?php foreach ($data_pengukuran as $isi): ?>
                                      <?php if ($isi->id_pengukuran == $tdl->id_pengukuran) { ?>
                                        <option value="<?= $isi->id_pengukuran; ?>" selected><?= $isi->daya; ?></option>
                                      <?php }else{ ?>
                                        <option value="<?= $isi->id_pengukuran; ?>" ><?= $isi->daya; ?></option>
                                      <?php } ?>
                                    <?php endforeach ?>
                                  </select>
                              </div>

                                    <div class="form-group">
                                    <label for="formGroupExampleInput">Golongan Tarif</label>
                                    <select name="gol_tarif" class="form-control">
                                        <option value="" disabled>Tarif Dasar Listrik Rumah Tangga R1</option>
                                        <option value="R-1/450 VA ">R-1/450 VA</option>
                                        <option value="R-1/900 VA">R-1/900 VA</option>
                                        <option value="R-1/900 VA-RTM">R-1/900 VA-RTM</option>
                                        <option value="R-1/1300 VA">R-1/1300 VA</option>
                                        <option value="R-1/2200 VA">R-1/2200 VA</option>
                                        <option value="R-2/3500 VA">R-2/3500 VA</option>
                                        <option value="R-2/4400 VA">R-2/4400 VA</option>
                                        <option value="R-2/5500 VA">R-2/5500 VA</option>
                                        <option value="R-3/6600 VA ke atas">R-3/6600 VA ke atas</option>

                                        <option value="" disabled>Tarif Dasar Listrik Bisnis B1 (Subsidi)</option>
                                        <option value="B-1/450 VA">B-1/450 VA</option>
                                        <option value="B-1/900 VA">B-1/900 VA</option>
                                        <option value="B-1/1300 VA">B-1/1300 VA</option>
                                        <option value="B-1/2200 VA">B-1/2200 VA</option>
                                        <option value="B-1/3500 VA">B-1/3500 VA</option>
                                        <option value="B-1/4400 VA">B-1/4400 VA</option>
                                        <option value="B-1/5500 VA">B-1/5500 VA</option>

                                        <option value="" disabled>Tarif Dasar Listrik Sosial (Subsidi)</option>
                                        <option value="S-1/220 VA">S-1/220 VA</option>
                                        <option value="S-2/450 VA">S-2/450 VA</option>
                                        <option value="S-2/900 VA">S-2/900 VA</option>
                                        <option value="S-2/1300 VA">S-2/1300 VA</option>
                                        <option value="S-2/2200 VA">S-2/2200 VA</option>
                                        <option value="S-2/3500 VA s.d 200 kVA">S-2/3500 VA s.d 200 kVA</option>
                                        <option value="S-3/ di atas 200 kVA">S-3/ di atas 200 kVA</option>

                                        <option value="" disabled>Tarif Dasar Listrik Industri (Subsidi)</option>
                                        <option value="I-1/450 VA">I-1/450 VA</option>
                                        <option value="I-1/900 VA">I-1/900 VA</option>
                                        <option value="I-1/1300 VA">I-1/1300 VA</option>
                                        <option value="I-1/2200 VA">I-1/2200 VA</option>
                                        <option value="I-1/3500 VA s.d 14 kVA">I-1/3500 VA s.d 14 kVA</option>
                                        <option value="I-2/14 kVA s.d 200 kVA">I-2/14 kVA s.d 200 kVA</option>

                                        <option value="" disabled>Tarif Dasar Listrik Publik (Subsidi)</option>
                                        <option value="P-1/450 VA">P-1/450 VA</option>
                                        <option value="P-1/900 VA">P-1/900 VA</option>
                                        <option value="P-1/1300 VA">P-1/1300 VA</option>
                                        <option value="P-1/2200 VA">P-1/2200 VA</option>
                                        <option value="P-1/3500 VA">P-1/3500 VA</option>
                                        <option value="I-1/450 VA">I-1/450 VA</option>
                                        <option value="P-1/5500 VA">P-1/5500 VA</option>
                                            option
                                    </select>
                                </div>
                                    
                                    <div class="form-group">
                                        <label for="example-date-input">Biaya Pemakaian</label>
                                        <select name="biaya_pemakaian" class="form-control">
                                        <option value="" disabled>Biaya Listrik Rumah Tangga R1</option>
                                        <option value="415 ">415</option>
                                        <option value="586">586</option>
                                        <option value="1352">1352</option>
                                        <option value="1467,28">1467,28</option>
                                        <option value="1467,28">1467,28</option>
                                        <option value="1467,28">1467,28</option>
                                        <option value="1467,28">1467,28</option>
                                        <option value="1467,28">1467,28</option>
                                        <option value="1467,28">1467,28</option>

                                        <option value="" disabled>Biaya Listrik Bisnis B1 (Subsidi)</option>
                                        <option value="535">535</option>
                                        <option value="630">630</option>
                                        <option value="966">966</option>
                                        <option value="1100">1100</option>
                                        <option value="1100">1100</option>
                                        <option value="1100">1100</option>
                                        <option value="1100">1100</option>

                                        <option value="" disabled>Biaya Listrik Sosial (Subsidi)</option>
                                        <option value="325">325</option>
                                        <option value="325">325</option>
                                        <option value="455">455</option>
                                        <option value="708">708</option>
                                        <option value="760">760</option>
                                        <option value="900">900</option>
                                        <option value="900">900</option>

                                        <option value="" disabled>Biaya Listrik Industri (Subsidi)</option>
                                        <option value="485">485</option>
                                        <option value="600">600</option>
                                        <option value="930">930</option>
                                        <option value="960">960</option>
                                        <option value="1112">1112</option>
                                        <option value="1112">1112</option>

                                        <option value="" disabled>Biaya Listrik Publik (Subsidi)</option>
                                        <option value="685">685</option>
                                        <option value="760">760</option>
                                        <option value="1049">1049</option>
                                        <option value="1076">1076</option>
                                        <option value="1076">1076</option>
                                        <option value="1076">1076</option>
                                        <option value="1076">1076</option>
                                            option
                                    </select>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="<?= site_url('C_tdl'); ?>" type="button" class="btn btn-danger">Back</a>
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