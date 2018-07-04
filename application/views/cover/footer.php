<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
        <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
    </a>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <!-- global js -->
    <script src="<?= base_url() ?>/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/vendors/fullcalendar/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?= base_url() ?>/assets/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/js/josh.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/js/metisMenu.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets/vendors/holder/holder.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js -->
    <!--  todolist-->
    <script src="<?= base_url() ?>/assets/js/todolist.js"></script>
    <!-- EASY PIE CHART JS -->
    <script src="<?= base_url() ?>/assets/vendors/charts/easypiechart.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/charts/jquery.easypiechart.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/charts/jquery.easingpie.js"></script>
    <!--for calendar-->
    <script src="<?= base_url() ?>/assets/vendors/fullcalendar/moment.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
    <!--   Realtime Server Load  -->
    <script src="<?= base_url() ?>/assets/vendors/charts/jquery.flot.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/vendors/charts/jquery.flot.resize.min.js" type="text/javascript"></script>
    <!--Sparkline Chart-->
    <script src="<?= base_url() ?>/assets/vendors/charts/jquery.sparkline.js"></script>
    <!-- Back to Top-->
    <script type="text/javascript" src="<?= base_url() ?>/assets/vendors/countUp/countUp.js"></script>
    <!--   maps -->
    <script src="<?= base_url() ?>/assets/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/jscharts/Chart.js"></script>
    <script src="<?= base_url() ?>/assets/js/dashboard.js" type="text/javascript"></script>
    <!-- end of page level js -->

    <!--datatables-->
    <script src="<?= base_url() ?>/assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/datatables/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/pages/table-responsive.js"></script>
    <script src="<?= base_url() ?>/assets/js/pages/tabs_accordions.js" type="text/javascript"></script>
    <!--end datatables-->

    <script type="text/javascript">

        Number.prototype.format = function(n, x, s, c) {
            var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\D' : '$') + ')',
                num = this.toFixed(Math.max(0, ~~n));

            return (c ? num.replace('.', c) : num).replace(new RegExp(re, 'g'), '$&' + (s || ','));
        };

        $('#jumlah').bind('change blur', function(){
        var harga = 500000;
        var jumlah = $(this).val();
        var data = $('#total');
        var total = harga * jumlah;
        var gabung = 'Rp. '+ total.format(2, 3, '.', ',');

        if (jumlah == 0 || jumlah < 0 ) {
            data.val('Rp. -');
        }else{
            data.val(gabung);
        }
        });

    </script>

    <script>
	$('.show_detail').on('click', function(){
			var id = $(this).data('id');
			$.ajax({
				url:'<?= base_url() ?>C_order/get_where_pengguna',
				method:"POST",
				data:{id_akun:id},
				dataType:'JSON',
				success:function(data){
                    $('#tempat_alat').text(data.no_seri);
					$('#tempat_alamat').text(data.alamat);
					$('#tempat_kontak').text(data.no_hp);
					$('#tempat_email').text(data.email);
                    $('#tempat_total').text('Rp. '+data.total);
                    $('#tempat_tanggal').text(data.updated_at);
					$('#tempat_gambar').prop('src', '<?= base_url() ?>assets/img/upload/'+data.status_bayar);
					$('#detail').modal({show:true});
				}
			});
	});

</script>
</body>
</html>
