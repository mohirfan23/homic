
<aside class="right-side">
            <!-- Main content -->
            <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success alert-dismissible margin5">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?= $this->session->flashdata('success') ?>
                </div>
            <?php } ?>

             <?php if($this->session->flashdata('info')){ ?>
                <div class="alert alert-warning alert-dismissible margin5">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong> <?= $this->session->flashdata('info') ?>
                </div>
            <?php } ?>

            <section class="content-header">
                <h1>Data Pemesanan</h1>
                <ol class="breadcrumb">
                </ol>
            </section>
            
            <div>
                <!-- BEGIN SAMPLE TABLE PORTLET-->
                    <div class="row">
                        <div class="col-md-5">
                            
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                                    Form Pemesanan
                                                </h3>
                                                
                                </div>
                                <div class="panel-body">
                                    <form action="<?= site_url('C_order/store'); ?>" method="POST" enctype="multipart/form-data">
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="formGroupExampleInput">Nama Pemesan</label>
                                                <input type="text" class="form-control" name="nama_pemesan" id="nama" placeholder="Nama Pemesanan" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" name="email" id="email" placeholder="examplae@email.com" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="no_hp">No HP</label>
                                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="087xxxxxxxx" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="alamat">Jumlah</label>
                                                <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Amount" min="1" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat">Total</label>
                                                <input type="text" class="form-control" id="total" placeholder="Total" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" name="alamat" id="alamat" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Latitude</label>
                                                <input type="text" class="form-control" name="lat" id="lat" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">longitude</label>
                                                <input type="text" class="form-control" name="lon" id="lon" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary" data-loading-text="<i class='fa fa-spinner fa-spin'></i> Sending .." id="kirim_komen">Submit</button>
                                            <a href="<?= site_url('C_order/tampil_order'); ?>" type="button" class="btn btn-danger">Cek data</a>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-7">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <i class="livicon" data-name="doc-portrait" data-c="#fff" data-hc="#fff" data-size="18" data-loop="true"></i>
                                            Map
                                        </h3>
                                </div>
                                <div class="panel-body" id="map" style="height:440px;">
                                
                                </div>
                            </div>
                        </div>
                    </div>
                        
                        <!-- END SAMPLE TABLE PORTLET-->
            </div>
    </aside>
        <!-- right-side -->
    <!-- global js -->
    <script src="<?= base_url() ?>/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>

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

        $('#kirim_komen').click(function(){
            $(this).button('loading');
        });
        
        var input = document.getElementById('alamat');
        var lat = document.getElementById('lat');
        var lon = document.getElementById('lon');
        var marker;

        function initMap() {
            var myLatLng = {lat: -6.917463899999999, lng: 107.61912280000001};

            // Create a map object and specify the DOM element
            // for display.
            var map = new google.maps.Map(document.getElementById('map'), {
            center: myLatLng,
            zoom: 10
            });

            var autocomplete = new google.maps.places.Autocomplete(input);

            map.addListener('click', eventClick);

            autocomplete.bindTo('bounds', map);

            marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });

            autocomplete.addListener('place_changed', function() {
                marker.setVisible(false);
                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    // User entered the name of a Place that was not suggested and
                    // pressed the Enter key, or the Place Details request failed.
                    window.alert("No details available for input: '" + place.name + "'");
                    return;
                }

                lat.value = autocomplete.getPlace().geometry.location.lat();
                lon.value = autocomplete.getPlace().geometry.location.lng();
                

                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

            });

        }

        function eventClick(e){
            lat.value = e.latLng.lat();
            lon.value = e.latLng.lng();
            
            marker.setVisible(false);

            var geocoder  = new google.maps.Geocoder();
            var address = '';
            var location  = new google.maps.LatLng(e.latLng.lat(), e.latLng.lng());
            var bounds = new google.maps.LatLngBounds(e.latLng);

            geocoder.geocode({'latLng': location}, function (results, status_code) {
                if(status_code == google.maps.GeocoderStatus.OK)
                {
                    address = results[0].formatted_address;
                    input.value = address;
                    
                    marker.setPosition(location);
                    marker.setVisible(true);
                }   
            });


        }
    </script>
    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpALWzkNO7VH_pCSX30bt43_7h3sIeqQI&libraries=places&callback=initMap&sensor=false">
</script>
</body>
</html>