<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Data Registrasi Socket</h1>
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
                                                <th>Id Socket</th>
                                                <th>Id Gateway</th>
                                                <th>Golongan Daya</th>
                                                <th>Ip Socket</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                    </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($regsocket as $regsocket): ?>
                                      <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $regsocket->id_socket  ?></td>
                                        <td><?= $regsocket->id_gateway ?></td>
                                        <td><?= $regsocket->gol_daya  ?></td>
                                        <td><?= $regsocket->ip_socket  ?></td>
                                        <td>
                                        <a href="<?= site_url('C_regsocket/getsocket/'.$regsocket->id_regsocket); ?>" class="btn btn-danger btn-sm">Edit</a>
                                        </td>
                                        <td>
                                        <a href="<?= site_url('C_regsocket/delete_socket/'.$regsocket->id_regsocket); ?>" class="btn btn-danger btn-sm">Delete</a>
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