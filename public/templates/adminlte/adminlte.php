<?php $assets = $this->assets; $url = $this->url; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>KUKANG Kecik V2.0</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    @css
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
      .color-palette {
        height: 50px;
        line-height: 50px;
        text-align: center;

      }
      .color-palette-set {
        margin-bottom: 15px;
      }
      .color-palette span {
        display: none;
      }
      .color-palette:hover span {
        display: block;
      }
    </style>

    <style type="text/css">
      /* FROM HTTP://WWW.GETBOOTSTRAP.COM
        * Glyphicons
        *
        * Special styles for displaying the icons and their classes in the docs.
        */

      .bs-glyphicons {
        padding-left: 0;
        padding-bottom: 1px;
        margin-bottom: 20px;
        list-style: none;
        overflow: hidden;
      }
      .bs-glyphicons li {
        float: left;
        width: 25%;
        height: 115px;
        padding: 10px;
        margin: 0 -1px -1px 0;
        font-size: 12px;
        line-height: 1.4;
        text-align: center;
        border: 1px solid #ddd;
      }
      .bs-glyphicons .glyphicon {
        margin-top: 5px;
        margin-bottom: 10px;
        font-size: 24px;
      }
      .bs-glyphicons .glyphicon-class {
        display: block;
        text-align: center;
        word-wrap: break-word; /* Help out IE10+ with class names */
      }
      .bs-glyphicons li:hover {
        background-color: rgba(86,61,124,.1);
      }

      @media (min-width: 768px) {
        .bs-glyphicons li {
          width: 12.5%;
        }
      }
    </style>

    <style>
      .example-modal .modal {
        position: relative;
        top: auto;
        bottom: auto;
        right: auto;
        left: auto;
        display: block;
        z-index: 1;
      }
      .example-modal .modal {
        background: transparent!important;
      }
    </style>

  </head>
  <body class="skin-blue <?php echo ( !empty($this->request->get('layout')) )? str_replace('_', ' ', $this->request->get('layout')):'' ?>">
    <div class="wrapper">
      
      <header class="main-header">
        <!-- Logo -->
        <a href="<?php $url->to('index2') ?>?p=index2" class="logo"><b>KUKANG</b>Kecik V2.0</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $assets->images('user2-160x160.jpg') ?>" class="user-image" alt="User Image"/>
                  <span class="hidden-xs"><?php echo Kecik\Auth::username() ?></span>
                  <i class="fa fa-angle-down pull-right"></i>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo $assets->images('user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
                    <p>
                      <?php echo Kecik\Auth::username() ?>
                      <small><?php echo Kecik\Auth::info('fullname') ?></small>
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!--
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li>
                  -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php $url->to('profile') ?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php $url->to(Kecik\Auth::logoutRoute()); ?>" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo $assets->images('user2-160x160.jpg') ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo Kecik\Auth::username() ?></p>

              <?php echo Kecik\Auth::info('fullname') ?>
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="<?php $url->to('') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-envelope fa-fw"></i> SMS<span class="fa arrow"></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="nav nav-second-level treeview-menu">
                    <li>
                        <a href="<?php $url->to('inbox') ?>"><i class="fa fa-inbox"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="<?php $url->to('outbox') ?>"><i class="fa fa-send"></i> Outbox</a>
                    </li>
                    <li>
                        <a href="<?php $url->to('sent') ?>"><i class="fa fa-envelope-o"></i> Sent</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            
            <li class="treeview">
                <a href="#"><i class="fa fa-book fa-fw"></i> Phonebook<span class="fa arrow"></span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="nav nav-second-level treeview-menu">
                    <li>
                        <a href="<?php $url->to('contact') ?>"><i class="fa fa-user"></i> Contact</a>
                    </li>
                    <li>
                        <a href="<?php $url->to('group') ?>"><i class="fa fa-list-ol"></i> Group</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>

            <li class="treeview">
                <a href="<?php $url->to('user') ?>"><i class="fa fa-group fa-fw"></i> Users</a>
            </li>

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      @response

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    @js


<?php /** <?php */ ?>
{{
$crud_config = $this->config->get('crud_config');
if (!empty($crud_config)) { //** Crud Config
}}
<?php /** ?> */ ?>

    <script type="text/javascript">
        kecik.init(
{{ echo $crud_config }}
        
        );

        <?php if ($this->route->is() == 'profile') { ?>

          kecik.Get({'username': '<?php echo Kecik\Auth::username() ?>'});
          kecik.afterSubmit(function() {
            kecik.Get({'username': '<?php echo Kecik\Auth::username() ?>'});
          });
        <?php } ?>

    </script>

<?php /** } ?> */ ?>
{{ } }}

<?php
if ($this->route->is() == 'user') {
?>
<script type="text/javascript">
    kecik.beforeSubmit(function() {
        if ($('#password').val() != $('#conf_password').val()) {
            alert('Password and Confirm Password Not Matched!!!');
            return false;
        } else
            return true;
    });
</script>
<?php
}
?>

<script type="text/javascript">
    $(document).ready(function() {
        getSignal();

        function getSignal() {
            $.post('{{ $this->url->to('service/getsignal') }}', {}, function(data){
                $('.sinyal').html(data);

                setTimeout(getSignal, 10000);
            });
        }
    });
</script>
<script src="{{ echo $this->url->baseUrl() }}assets/js/appInit"></script>
  </body>
</html>