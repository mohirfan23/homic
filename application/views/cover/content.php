<?php
$level = $this->session->userdata('level');
 ?>
<aside class="right-side">
            <?php if($level == 'Admin'){ ?>
            <div class="alert alert-success alert-dismissable margin5">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Success:</strong> You have successfully logged in.
            </div>
            <?php } ?>
            <!-- Main content -->
            <section class="content-header">
                <h1>Welcome to Dashboard</h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <a href="#">
                            <i class="livicon" data-name="home" data-size="14" data-color="#333" data-hovercolor="#333"></i> Dashboard
                        </a>
                    </li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="lightbluebg no-radius">
                        <?php if($level == 'Admin' or $level == 'Pengguna'){ ?>
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 text-right">
                                            <span>Pembayaran Listrik</span>
                                            <div class="number" id="myTargetElement1"></div>
                                        </div>
                                        <a href="<?= site_url('C_bayar_listrik'); ?>">
                                        <i class="livicon  pull-right" data-name="eye-open" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                        </a>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="redbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Tarif Dasar Listrik</span>
                                            <div class="number" id="myTargetElement2"></div>
                                        </div>
                                        <a href="<?= site_url('C_tdl'); ?>">
                                        <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                        </a>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="goldbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Data Registrasi Alat</span>
                                            <div class="number" id="myTargetElement3"></div>
                                        </div>
                                        <a href="<?= site_url('C_regisalat'); ?>">
                                        <i class="livicon pull-right" data-name="archive-add" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                        </a>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                        <!-- Trans label pie charts strats here-->
                        <div class="palebluecolorbg no-radius">
                            <div class="panel-body squarebox square_boxs">
                                <div class="col-xs-12 pull-left nopadmar">
                                    <div class="row">
                                        <div class="square_box col-xs-7 pull-left">
                                            <span>Total Users</span>
                                            <div class="number" id="myTargetElement4"></div>
                                        </div>
                                        <a href="<?= site_url('C_user'); ?>">
                                        <i class="livicon pull-right" data-name="users" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                                        </a>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if($level == 'Admin'){ ?>
                    <div class="col-md-8 col-sm-6">
                        <div class="panel panel-border">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="dashboard" data-size="20" data-loop="true" data-c="#F89A14" data-hc="#F89A14"></i>
                                    Realtime Server Load
                                    <small>- Load on the Server</small>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div id="realtimechart" style="height:350px;"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="panel blue_gradiant_bg">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="linechart" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Server Stats
                                    <small class="white-text">- Monthly Report</small>
                                </h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="sparkline-chart">
                                            <div class="number" id="sparkline_bar"></div>
                                            <h3 class="title">Network</h3>
                                        </div>
                                    </div>
                                    <div class="margin-bottom-10 visible-sm"></div>
                                    <div class="margin-bottom-10 visible-sm"></div>
                                    <div class="col-sm-6">
                                        <div class="sparkline-chart">
                                            <div class="number" id="sparkline_line"></div>
                                            <h3 class="title">Load Rate</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- BEGIN Percentage monitor -->
                        <div class="panel green_gradiante_bg ">
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <i class="livicon" data-name="spinner-six" data-size="16" data-loop="false" data-c="#fff" data-hc="white"></i>
                                    Result vs Target
                                </h3>
                            </div>
                            <div class="panel-body nopadmar">
                                <div class="row">
                                    <div class="col-sm-6 text-center">
                                        <h4 class="small-heading">Sales</h4>
                                        <span class="chart cir chart-widget-pie" data-percent="45"><span class="percent">45</span>
                                        </span>
                                    </div>
                                    <!-- /.col-sm-4 -->
                                    <div class="col-sm-6 text-center">
                                        <h4 class="small-heading">Reach</h4>
                                        <span class="chart cir chart-widget-pie widget-easy-pie-3" data-percent="25">
                                            <span class="percent">25</span>
                                        </span>
                                    </div>
                                    <!-- /.col-sm-4 -->
                                </div>

                                <!-- /.row -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- END BEGIN Percentage monitor-->
                    </div>
                    <?php } ?>
                </div>
            </section>
        </aside>
        <!-- right-side -->
    </div>