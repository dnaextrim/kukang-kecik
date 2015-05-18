<?php $assets = $this->app->assets; $url = $this->app->url; ?>
		<!-- Page Content -->
        <div id="page-wrapper" class="content-wrapper">
            <div class="row content-header">
                <div class="col-lg-12">
                    <h1 class="page-header">PROFILE</h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- content -->
            <div class="content">


		        <form id="form_data" class="well form-horizontal" role="form" data-async method="post" action="<?php $url->to("group/insert") ?>" enctype="multipart/form-data">
                    <fieldset id="form_fieldset">
	                    <div class="form-group">
	                        <label class="col-sm-3 control-label no-padding-right" for="username">Nama</label>
	                        <div class="col-sm-3">
	                            <p id="username" name="username" class="form-data form-control-static" max-length="255" ><strong><?php echo Kecik\Auth::username() ?></strong></p>
	                        </div>
	                    </div>
	                   	
	                   	<div class="form-group">
	                        <label class="col-sm-3 control-label no-padding-right" for="password">Password</label>
	                        <div class="col-sm-3">
	                            <input type="password" id="password" name="password" required class="form-data form-control" max-length="255" value="" />
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label no-padding-right" for="conf_password">Confirm Password</label>
	                        <div class="col-sm-3">
	                            <input type="password" id="conf_password" name="conf_password" required class="form-data form-control" max-length="255" value="" />
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label no-padding-right" for="fullname">Fullname</label>
	                        <div class="col-sm-3">
	                            <input type="text" id="fullname" name="fullname" required class="form-data form-control" max-length="255" value="" />
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label class="col-sm-3 control-label no-padding-right" for="level">Level</label>
	                        <div class="col-sm-3">
	                            <p id="level" name="level" class="form-data form-control-static" max-length="255" ><strong><?php echo Kecik\Auth::info('level') ?></strong></p>
	                        </div>
	                    </div>


	                    <!--
	                    <div class="control-group">
	                        <label class="control-label" for="{field}">{FIELD}</label>
	                        <div class="controls">
	                            <input type="text" id="{field}" name="{field}" required class="form-data" />
	                        </div>
	                    </div>
	                    -->
	                    <input type="hidden" id="username_old" name="username_old" value="" />

	                    <!--
	                    <input type="hidden" id="{field_primary_key}_old" name="{field_primary_key}_old" value="" class="form-data" />
	                    -->
	                    <div class="clearfix form-actions">
	                        <div class="col-md-offset-3 col-md-9">
	                            <button type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-floppy"></i> Save</button>
	                        </div>
	                    </div>
	                </fieldset>
                </form>


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
		<!-- /#page-content -->