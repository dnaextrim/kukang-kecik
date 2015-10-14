<?php $assets = $this->assets; $url = $this->url; ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>KUKANG KECIK Version 2.0</title>

    @css
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php $url->to('sb-admin') ?>"><b>KUKANG</b>Kecik V2.0</a>
            </div>
            <!-- /.navbar-header -->


            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <?php echo Kecik\Auth::username() ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php $url->to('profile') ?>"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php $url->to('logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->


            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <div style="padding-left: 10px;" class="text-left">
                                    <i class="fa fa-signal"></i>
                                    <span style="font-weight: bold;" class="sinyal">0 %</span>
                                </div>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php $url->to('') ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope fa-fw"></i> SMS<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
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
                        
                        <li>
                            <a href="#"><i class="fa fa-book fa-fw"></i> Phonebook<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php $url->to('contact') ?>"><i class="fa fa-user"></i> Contact</a>
                                </li>
                                <li>
                                    <a href="<?php $url->to('group') ?>"><i class="fa fa-list-ol"></i> Group</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        <li>
                            <a href="<?php $url->to('user') ?>"><i class="fa fa-group fa-fw"></i> Users</a>
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @response

    </div>
    <!-- /#wrapper -->

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

if ($this->route->is() == 'sms') {
?>
    <script type="text/javascript">
        kecik.SMS = function(id) {
            window.location.href="<?php $this->url->to('sms') ?>/view/"+id.Sender;
        };
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
<!-- <script src="{{ echo $this->url->baseUrl() }}assets/js/appInit"></script> -->

</body>

</html>
