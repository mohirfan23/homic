<aside class="right-side">
    <section class="content-header">
        <h1>Data pesanan</h1>
        <ol class="breadcrumb"></ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="livicon" data-name="signal" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                            Data alat
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Name Pengguna</th>
                                    <th>No Seri</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach($alat as $al){ ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <?php if($al->level == "Admin"){ ?>
                                                    <?= "kosong" ?>
                                                <?php }else{ ?>
                                                    <?= $al->nama ?>
                                                <?php } ?>
                                            </td>
                                            <td><?= $al->no_seri ?></td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm">Edit</a>
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</aside>
    <div id="detail" class="modal fade" tabindex="-1" role="dialog" aria-hidden="false">
	  <div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Detail</h4>
	      </div>
	      <div class="modal-body">
		        <div class="row">
							<div class="col-md-4 text-center">
									<img src="<?= base_url() ?>assets/img/default-avatar1.png" class="img-thumbnail" id="tempat_gambar" alt="Cinque Terre" width="200px" height="200px">
							</div>

							<div class="col-md-4">

                                <div class="form-group">
									<label>ID Alat : <span id="tempat_alat"></span> </label>
								</div>               
								<div class="form-group">
									<label>Alamat : <span id="tempat_alamat"></span> </label>
								</div>
								<div class="form-group">
									<label>No HP : <span id="tempat_kontak"></span> </label>
								</div>
								<div class="form-group">
									<label>Email : <span id="tempat_email"></span> </label>
								</div>
                                <div class="form-group">
									<label>Total : <span id="tempat_total"></span> </label>
								</div> 
                                <div class="form-group">
									<label>Tanggal Bayar : <br><span id="tempat_tanggal"></span> </label>
								</div> 
							</div>


		        </div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	      </div>
	    </div>

	  </div>
	</div>

    