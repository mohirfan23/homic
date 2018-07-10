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
                            Data pesanan
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped">
                                <thead>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Amount</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Confirmation</th>
                                </thead>
                                <tbody>
                                <?php $no=1;foreach($konten as $data){?>
                                    <tr>
                                        <td><?php echo $no; ?></td>
                                        <td><?php echo $data['nama']; ?></td>
                                        <td><?= $data['jumlah'] ?></td>
                                        <td>Rp. <?php echo number_format($data['total']) ?></td>
                                        <td>
                                            <?php if ($data['status_bayar'] != "kosong"){ ?>
                                                <button type="button" data-id="<?= $data['id_akun'] ?>" class="btn btn-success btn-xs show_detail">alredy paid</button>
                                            <?php }else{ ?>
                                                <span class="label label-danger">not yet paid</span>
                                            <?php } ?>
                                                            </td>
                                            <td align="center">
                                            <?php if ($data['konfirmasi']){ ?>
                                                <span class="label label-warning">Confirmed</span>
                                            <?php }else{
                                                    $disabled = '';
                                                $link = '';

                                                if ($data['status_bayar'] == "kosong") {
                                                    $disabled = 'disabled';
                                                    $link = '#';
                                                }else{
                                                        $link = site_url('C_order/konfirmasi/'.$data['id_order']);
                                                }

                                            ?>
                                            <a href="<?= $link ?>" class="btn btn-danger btn-xs" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending .." id="kirim_confrim"
                                                <?= $disabled ?>
                                            >Confirmation</button>
                                            <?php } ?>
                                         </td>
                                    </tr>
                                 <?php $no++;} ?>
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

    <script src="<?= base_url() ?>/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script> 
    <script>
        $('#kirim_confrim').click(function(){
            $(this).button('loading');
        });
    </script>
    