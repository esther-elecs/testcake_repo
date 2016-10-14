<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $this->Html->charset(); ?>
    <?php echo $this->Html->meta(null, null, array('name' => 'viewport', 'content' => 'width=device-width, initial-scale=1')); ?>
    <?php echo $this->Html->meta('description', ''); ?>
    <?php echo $this->Html->meta('keywords', ''); ?>
    <?php echo $this->fetch('meta'); ?>
    <?php echo $this->Html->meta('favicon.ico', 'favicon.ico', array('type' => 'icon')); ?>
    <?php echo $this->Html->meta(null, '/img/apple-touch-icon-precomposed.png', array('rel' => 'apple-touch-icon-precomposed')); ?>

    <!-- CSS sytle -->
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('font-awesome.min'); ?>
    <?php echo $this->Html->css('animate.min'); ?>
    <?php echo $this->Html->css('DataTable/dataTables.tableTools'); ?>
    <?php echo $this->Html->css('custom'); ?>
    <?php echo $this->Html->css('icheck/green'); ?>

    <!-- JS sytle -->
    <?php echo $this->Html->script('jquery-1.10.2'); ?>
    <?php echo $this->Html->script('autokana'); ?>
    <style type="text/css">
        .site_title {
            font-size:16px;
        }
        body.nav-sm .navbar.nav_title a span {
            display: none;
        }
    </style>
    <title>保育士管理データベース / アドミン</title>
    <link rel="shortcut icon" type="image/x-icon" href="/img/logo.png">
</head>

<body class="nav-md">

    <div class="container body">


        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                    <?php echo $this->Html->link('<img src="/img/logo.png" alt=""><span class="right-side-menu"> 保育士管理データベース</span>', array('controller' => 'adminaccounts', 'action' => 'index'), array('class' => 'site_title', 'escape' => false)) ?>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_info">
                            <!-- <span>ようこそ</span> -->
                            <!-- <h2>沖縄 太郎 様</h2> -->
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3><!--管理者--></h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-group"></i> <span class="right-side-menu">アカウント管理</span> <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><?php echo $this->Html->link('アカウント一覧', array('controller' => 'adminaccounts', 'action' => 'index')); ?>
                                        </li>
                                        <li><?php echo $this->Html->link('アカウント登録', array('controller' => 'adminaccounts', 'action' => 'add')); ?>
                                        </li>
                                    </ul>
                                </li>

                                <li><a><i class="fa fa-shield"></i> <span class="right-side-menu">権限設定</span><span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><?php echo $this->Html->link('権限設定', array('controller' => 'adminpermissions', 'action' => 'index')); ?>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <?php echo $this->Session->read('Auth.admins.name'); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li>
                                         <?php echo $this->Html->link('<i class="fa fa-user pull-right"></i>プロフィール', array('controller' => 'adminprofiles', 'action' => 'edit'), array('escape' => false)); ?>
                                    </li>
                                    <li>
                                        <?php echo $this->Html->link('<i class="fa fa-sign-out pull-right"></i> ログアウト', array('controller' => 'adminusers', 'action' => 'logout'), array('escape' => false)); ?>
                                    </li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                   <!--  <i class="fa fa-bell"></i>
                                    <span class="badge bg-green">6</span> -->
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span>
                                                <span>John Smith</span>
                                                <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                                Film festivals used to be do-or-die moments for movie makers. They were where...
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong><a href="inbox.html">See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->


            <!-- page content -->
            <div class="right_col" role="main">
                <?php echo $this->fetch('content'); ?>
            </div>
            <!-- /page content -->

        </div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>

    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('icheck.min'); ?>
    <?php echo $this->Html->script('custom'); ?>
    <?php echo $this->Html->script('acl'); ?>

</body>

</html>