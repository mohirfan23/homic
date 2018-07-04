<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Data Pembayaran Listrik</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                            <tr>
                                                <th>Nomer</th>
                                                <th>Id Data Socket</th>
                                                <th>Id TDL</th>
                                                <th>Harga</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                    </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($datapengukuran as $ukur): ?>
                                      <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $ukur->id_datasocket  ?></td>
                                        <td><?= $ukur->id_tdl ?></td>
                                        <td><?= $ukur->harga  ?></td>
                                        <td>
                                        <a href="<?= site_url('C_bayar_listrik/getukur/'.$ukur->id_pengukuran); ?>" class="btn btn-danger btn-sm">Edit</a>
                                        </td>
                                        <td>
                                        <a href="<?= site_url('C_bayar_listrik/delete_ukur/'.$ukur->id_pengukuran); ?>" class="btn btn-danger btn-sm">Delete</a>
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