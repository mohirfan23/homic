<aside class="right-side">
            <!-- Main content -->
            <section class="content-header">
                <h1>Data Pemesanan</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <a href="<?= site_url('C_pesanan/input_pesanan'); ?>" class="btn btn-responsive button-alignment btn-warning" style="margin-bottom:7px;" type="button">Input Pemesanan</a>
                            </div>
                            <div class="portlet-body flip-scroll">
                                <table class="table table-bordered table-striped table-condensed flip-content">
                                    <thead class="flip-content">
                                            <tr>
                                                <th>Nomer</th>
                                                <th>Nama Pemesan</th>
                                                <th>Barang</th>
                                                <th>Jumlah</th>
                                                <th>Pembayaran (Rp)</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                    </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach ($pesanan as $pesanan): ?>
                                      <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $pesanan->nama_pemesan  ?></td>
                                        <td><?= $pesanan->barang  ?></td>
                                        <td><?= $pesanan->jumlah  ?></td>
                                        <td>Rp. <?= $pesanan->pembayaran  ?></td>
                                        <td>
                                          <a href="<?= site_url('C_pesanan/get_data/'.
                                          $pesanan->id_pesanan); ?>" class="btn btn-primary btn-sm">Edit</a>
                                        </td>
                                        <td>
                                        <a href="<?= site_url('C_pesanan/delete_pesanan/'.$pesanan->id_pesanan); ?>" class="btn btn-danger btn-sm">Delete</a>
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