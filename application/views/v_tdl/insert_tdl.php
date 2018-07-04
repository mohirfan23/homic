<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Tagihan Data Listrik</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            <div class="col-lg-12">
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
                                                <form action="<?= site_url('C_tdl/create_tdl'); ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Golongan Tarif</label>
                                    <select name="gol_tarif" class="form-control">
                                        <option value="R1/Konsumen rumah tangga kecil">R-1/rumah tangga kecil</option>
                                        <option value="R-1/Konsumen rumah tangga kecil">R-1/rumah tangga kecil</option>
                                        <option value="R-2/Konsumen rumah tangga menengah">R-2/rumah tangga menengah</option>
                                        <option value="R3/Konsumen rumah tangga besar">R3/rumah tangga besar</option>
                                        <option value="B-2/Konsumen bisnis sedang">B-2/Konsumen bisnis sedang</option>
                                            option
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Kelas Daya</label>
                                    <select name="kelas_daya" class="form-control">
                                        <option value="1300 VA">1300 VA</option>
                                        <option value="2200 VA">2200 VA</option>
                                        <option value="3500 VA sd 5500 VA">3500 VA sd 5500 VA</option>
                                        <option value="6600 VA ke atas">6600 VA ke atas</option>
                                        <option value="6600 VA sd 200kVA">6600 VA sd 200kVA</option>
                                            option
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="formGroupExampleInput">Tarif Daya Listrik</label>
                                    <select name="tarif_daya_listrik" class="form-control">
                                        <option value="1352">1352</option>
                                        <option value="1467">1467</option>
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
    </aside>
        <!-- right-side -->
    </div>