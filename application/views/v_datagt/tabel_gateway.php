<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Data Pemesanan</h1>
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
                                                <th>Id Gateway</th>
                                                <th>Suhu</th>
                                                <th>Kelembaban</th>
                                                <th>Gas</th>
                                                <th>Tanggal</th>
                                                <th>Delete</th>
                                            </tr>
                                    </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($datagt as $datagt): ?>
                                      <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $datagt->id_gateway  ?></td>
                                        <td><?= $datagt->suhu  ?></td>
                                        <td><?= $datagt->kelembaban  ?></td>
                                        <td><?= $datagt->gas  ?></td>
                                        <td><?= $datagt->tanggal  ?></td>
                                        <td>
                                        <a href="<?= site_url('C_tabel_gateway/delete_gateway/'.$datagt->id_datagt); ?>" class="btn btn-danger btn-sm">Delete</a>
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