<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Tagihan Data Listrik</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <a href="<?= site_url('C_tdl/input_tdl'); ?>" class="btn btn-responsive button-alignment btn-warning" style="margin-bottom:7px;" type="button">Input Pemesanan</a>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                            <tr>
                                                <th>Nomer</th>
                                                <th>Daya</th>
                                                <th>Golongan Tarif</th>
                                                <th>Biaya Pemakaian</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                    </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($tarif_dasar_listrik as $tdl): ?>
                                      <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $tdl->gol_tarif  ?></td>
                                        <td><?= $tdl->kelas_daya  ?></td>
                                        <td><?= $tdl->tarif_daya_listrik  ?></td>
                                        <td>
                                          <a href="<?= site_url('C_tdl/get_data/'.
                                          $tdl->id_tdl); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                        <a href="<?= site_url('C_tdl/delete_tdl/'.$tdl->id_tdl); ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                      </tr>
                                    <?php endforeach ?>
                              </tbody>
                        </table>
                    </div>
                </div>
                        <!-- END SAMPLE TABLE PORTLET-->
        </aside>
        <!-- right-side -->
    </div>