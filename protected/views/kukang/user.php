<?php $assets = $this->app->assets; $url = $this->app->url; ?>
		<!-- Page Content -->
        <div id="page-wrapper" class="content-wrapper">
            <div class="row content-header">
                <div class="col-lg-12">
                    <h1 class="page-header">USERS
                    	<button type="button" id="btn_add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New</button>
                    </h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <!-- content -->
            <div class="content">

	            <div class="page-header">
				            
		            <div id="form_box">
		                <form id="form_data" class="well form-horizontal" role="form" data-async method="post" action="<?php $url->to("group/insert") ?>" enctype="multipart/form-data">
		                    <fieldset id="form_fieldset">
			                    <div class="form-group">
			                        <label class="col-sm-3 control-label no-padding-right" for="username">Nama</label>
			                        <div class="col-sm-3">
			                            <input type="text" id="username" name="username" required class="form-data form-control" max-length="255" value="" />
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
			                            <select id="level" name="level" required class="form-data select2">
			                            	<option value="admin">Admin</option>
			                            	<option value="user">User</option>
			                            </select>
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
			                            <button type="reset" id="btn_cancel" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</button>
			                        </div>
			                    </div>
			                </fieldset>
		                </form>
		            </div>

				</div>

				<div class="row">
				    <div class="col-xs-12">
				        <!--<div class="table-header">
				            Results for "Latest Registered Domains"
				        </div>-->
				        <div class="table-responsive">
				            <table id="list" class="table table-striped table-bordered table-hover">
				                <thead>
				                    <tr class="navbar-default">
				                        <th width="100">&nbsp;</th>
				                        <th>Username</th>
				                        <th>Fullname</th>
				                        <th>Level</th>

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

				<div id="form_view" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				        <div class="modal-content">
				            <div class="modal-header">
				                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				                <h3 id="myModalLabel">VIEW</h3>
				            </div>

				            <div class="modal-body">

				                <div class="well form-horizontal">
				                    <div class="form-group">
				                        <label class="col-sm-3 control-label no-padding-right" for="username">Username</label>
				                        <div class="col-sm-9">
				                            <p id="username" class="form-view form-control-static"></p>
				                        </div>
				                    </div>
				                    
				                    <div class="form-group">
				                        <label class="col-sm-3 control-label no-padding-right" for="fullname">Fullname</label>
				                        <div class="col-sm-9">
				                            <p id="fullname" class="form-view form-control-static"></p>
				                        </div>
				                    </div>

				                    <div class="form-group">
				                        <label class="col-sm-3 control-label no-padding-right" for="level">Level</label>
				                        <div class="col-sm-9">
				                            <p id="level" class="form-view form-control-static"></p>
				                        </div>
				                    </div>

				                    <!--
				                    <div class="control-group">
				                        <label class="control-label" for="field">FIELD LABEL</label>
				                        <div class="controls">
				                            <span id="field" class="view-form" style="font-weight: bold;"></span>
				                        </div>
				                    </div>
				                    -->
				                </div>
				            </div>

				            <div class="modal-footer">
				                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i> Close</button>
				            </div>
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