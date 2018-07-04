<!DOCTYPE html>
<html>

<head>
    <title>Admin Login | Josh Admin Template</title> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- global level css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- end of global level css -->
    <!-- page level css -->
    <link href="<?= base_url() ?>/assets/css/pages/login2.css" rel="stylesheet" />
    <link href="<?= base_url() ?>/assets/vendors/iCheck/skins/minimal/blue.css" rel="stylesheet" />
    <!-- styles of the page ends-->
</head>

<body>
    <div class="container">
        <div class="row vertical-offset-100">
            <div class=" col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Wellcome To Homic</h3>
                    </div>
                    <div class="panel-body">
                        
                        <?php if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Success!</strong> <?= $this->session->flashdata('success'); ?>
                            </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('error')){ ?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>Error!</strong> <?= $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>    

                        <form action="<?= site_url('Auth'); ?>" accept-charset="UTF-8" role="form" method="post" >
                            <fieldset>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="at" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                                    </div>
                                    <input class="form-control" placeholder="Username" name="username" type="text"  required>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-addon">
                                        <i class="livicon" data-name="key" data-size="18" data-c="#484848" data-hc="#484848" data-loop="true"></i>
                                    </div>
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                </div>
                                <div class="form-group">
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- global js -->
    <script src="<?= base_url() ?>/assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>
    <!--livicons-->
    <script src="<?= base_url() ?>/assets/vendors/livicons/minified/raphael-min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/vendors/livicons/minified/livicons-1.4.min.js" type="text/javascript"></script>
    <!-- end of global js -->
    <!-- begining of page level js-->
    <script src="<?= base_url() ?>/assets/js/TweenLite.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendors/iCheck/icheck.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets/js/pages/login2.js" type="text/javascript"></script>
    <!-- end of page level js-->
</body>
</html>