<?php $assets = $this->app->assets; $url = $this->app->url; ?>
        <!-- Page Content -->
        <div id="page-wrapper" class="content-wrapper">
            <div class="row content-header">
                <div class="col-lg-12">
                    <h1 class="page-header">SMS
                    <button class="btn btn-success pull-right"><i class="fa fa-plus"></i> Create SMS</button>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            
            <!-- content -->   
            <div class="content">

                <div class="row">
                    <div class="col-xs-12">
                        <!--<div class="table-header">
                            Results for "Latest Registered Domains"
                        </div>-->
                        <div class="table-responsive">
                            <table id="list" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr class="navbar-default">
                                        <th width="20">&nbsp;</th>
                                        <th>#</th>
                                        <th>Pengirim</th>
                                        <th>Pesan</th>

                                        <!--
                                        <th>{FIELD}</th>
                                        -->
                                    </tr>
                                </thead>
                                
                                <tbody id="grid">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

               

                <div id="loading" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 id="myModalLabel">In Progress.....</h3>
                            </div>

                            <div class="modal-body">
                                <img src="<?php echo $assets->images('gear_loader.gif') ?>" />
                                <b>Please Wait.....</b>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.content -->


        </div>
        <!-- /#page-wrapper -->