<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Data Registrasi Alat</h1>
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
                                                <th>Id Socket</th>
                                                <th>Ip Gateway</th>
                                                <th>Ip Socket</th>
                                                <th>Akses</th>
                                                <th>Delete</th>
                                            </tr>
                                    </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($regisalat as $alat): ?>
                                      <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $alat->id_gateway ?></td>
                                        <td><?= $alat->id_socket  ?></td>
                                        <td><?= $alat->ip_gateway  ?></td>
                                        <td><?= $alat->ip_socket  ?></td>
                                        <td><?= $alat->akses  ?></td>
                                        <td>
                                        <a href="<?= site_url('C_regisalat/delete_regalat/'.$alat->id_reggt); ?>" class="btn btn-danger btn-sm">Delete</a>
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