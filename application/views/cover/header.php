<?php
$level = $this->session->userdata('level');
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Josh Admin Template</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <link href='<?= base_url() ?>/assets/assets_dashgum/img/icon.png' rel='shortcut icon'>
    <!-- global css -->
    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?= base_url() ?>/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/styles/black.css" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="<?= base_url() ?>/assets/css/panel.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/metisMenu.css" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <link href="<?= base_url() ?>/assets/vendors/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/vendors/datatables/extensions/Responsive/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/pages/tables.css" rel="stylesheet" type="text/css" />
    <!-- end of page level css-->
    <!--page level css -->
    <link href="<?= base_url() ?>/assets/vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets/css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" media="all" href="<?= base_url() ?>/assets/vendors/jvectormap/jquery-jvectormap.css" />
    <link rel="stylesheet" href="<?= base_url() ?>/assets/vendors/animate/animate.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/only_dashboard.css" />
    <!--end of page level css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/tab.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.25.0/sweetalert2.min.css">
    <style>
        .headings {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            padding-bottom: 10px;
        }
        .hr-flex {
            border-top: 1px dashed #d8d8d8;
            color: #ffffff;
            background-color: #ffffff;
            height: 1px;
            margin: 10px 0;
            display: block;
            flex: 1;
        }
    </style>
</head>

<body class="skin-josh">
    <header class="header">
        <a href="<?= site_url('dashboard') ?>" class="logo">
            <img src="<?= base_url() ?>/assets/img/Homic Logo web.png" alt="Logo">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">
                        <ul class="dropdown-menu dropdown-messages pull-right">
                            <li class="dropdown-title">4 New Messages</li>
                            <li class="unread message">
                                <a href="javascript:;" class="message"> <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                    <img src="<?= base_url() ?>/assets/img/authors/avatar.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>Riot Zeast</strong>
                                        <br>Hello, You there?
                                        <br>
                                        <small>8 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read"><span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span></i>
                                    <img src="<?= base_url() ?>/assets/img/authors/avatar1.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>John Kerry</strong>
                                        <br>Can we Meet ?
                                        <br>
                                        <small>45 minutes ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                        <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                    </i>
                                    <img src="<?= base_url() ?>/assets/img/authors/avatar5.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>Jenny Kerry</strong>
                                        <br>Dont forgot to call...
                                        <br>
                                        <small>An hour ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="unread message">
                                <a href="javascript:;" class="message">
                                    <i class="pull-right" data-toggle="tooltip" data-placement="top" title="Mark as Read">
                                        <span class="pull-right ol livicon" data-n="adjust" data-s="10" data-c="#287b0b"></span>
                                    </i>
                                    <img src="<?= base_url() ?>/assets/img/authors/avatar4.jpg" class="img-responsive message-image" alt="icon" />
                                    <div class="message-body">
                                        <strong>Ronny</strong>
                                        <br>Hey! sup Dude?
                                        <br>
                                        <small>3 Hours ago</small>
                                    </div>
                                </a>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown notifications-menu">
                        
                        <ul class=" notifications dropdown-menu">
                            <li class="dropdown-title">You have 7 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <i class="livicon danger" data-n="timer" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">after a long time</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Just Now
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="gift" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Jef's Birthday today</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Few seconds ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="dashboard" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">out of space</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            8 minutes ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon bg-aqua" data-n="hand-right" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">New friend request</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            An hour ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon danger" data-n="shopping-cart-in" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">On sale 2 products</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            3 Hours ago
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon success" data-n="image" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">Lee Shared your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            Yesterday
                                        </small>
                                    </li>
                                    <li>
                                        <i class="livicon warning" data-n="thumbs-up" data-s="20" data-c="white" data-hc="white"></i>
                                        <a href="#">David liked your photo</a>
                                        <small class="pull-right">
                                            <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                                            2 July 2014
                                        </small>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown user user-menu">
                        <?php  
                            $gambar = $level == 'Admin' ? 'admin.png' : 'user.png';
                        ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url() ?>/assets/img/authors/<?= $gambar ?>" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                            <div class="riot">
                                <div>
                                    <?= $this->session->userdata('username') ?>
                                    <span>
                                        <i class="caret"></i>
                                    </span>
                                </div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->

                            <li class="user-header bg-light-blue">
                                <img src="<?= base_url() ?>/assets/img/authors/<?= $gambar ?>" class="img-responsive img-circle" alt="User Image">
                                <p class="topprofiletext">Aditiya Fadillah</p>
                            </li>
                            <!-- Menu Body -->
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="user" data-s="18"></i> My Profile
                                </a>
                            </li>
                            <li role="presentation"></li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="gears" data-s="18"></i> Account Settings
                                </a>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="lockscreen.html">
                                        <i class="livicon" data-name="lock" data-s="18"></i> Lock
                                    </a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= site_url('Auth/logout'); ?>">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i> Logout
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="nav_icons">
                        <ul class="sidebar_threeicons">
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="hammer" title="Form Builder 1" data-loop="true" data-color="#42aaca" data-hc="#42aaca" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="list-ul" title="Form Builder 2" data-loop="true" data-color="#e9573f" data-hc="#e9573f" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="vector-square" title="Button Builder" data-loop="true" data-color="#f6bb42" data-hc="#f6bb42" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="new-window" title="Page Builder" data-loop="true" data-color="#37bc9b" data-hc="#37bc9b" data-s="25"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li class="active">
                            <a href="<?= site_url('dashboard'); ?>">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <?php if($level == 'Admin' ){ ?>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                    <span class="title">Data alat</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="<?= site_url('C_datasocket/tambah_data'); ?>">
                                            <i class="fa fa-angle-double-right"></i>Tambah alat
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= site_url('C_datasocket/tampil_data'); ?>">
                                            <i class="fa fa-angle-double-right"></i> Data alat
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                    <a href="#">
                                        <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                        <span class="title">Data akun pembeli</span>
                                        <span class="fa arrow"></span>
                                    </a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="<?= site_url('C_pesanan/input_pesanan'); ?>">
                                                <i class="fa fa-angle-double-right"></i> Tambah pembeli
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?= site_url('C_order/tampil_order'); ?>">
                                                <i class="fa fa-angle-double-right"></i> Daftar pembeli
                                            </a>
                                        </li>
                                    </ul>
                                
                            </li>
                        <?php } ?>
                        <?php if($level == 'Pengguna'){ ?>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="doc-portrait" data-c="#5bc0de" data-hc="#5bc0de" data-size="18" data-loop="true"></i>
                                    <span class="title">Data Pengeluaran</span>
                                    <span class="fa arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                        <li>
                                            <a href="<?= site_url('C_bayar_listrik'); ?>">
                                                <i class="fa fa-angle-double-right"></i> Data Pembayaran Listrik
                                            </a>
                                        </li>
                                        
                                        <li>
                                        <a href="<?= site_url('C_datasocket'); ?>">
                                            <i class="fa fa-angle-double-right"></i> Data penggunaan alat
                                        </a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="<?= site_url('C_datasocket'); ?>">
                                    <i class="livicon" data-name="medal" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                    <span class="title">Data penggunaan alat</span>
                                </a>
                            </li    
                        <?php } ?>    
                        >
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- Right side column. Contains the navbar and content of the page -->