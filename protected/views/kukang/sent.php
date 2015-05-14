<?php $assets = $this->app->assets; $url = $this->app->url; ?>
		<!-- Page Content -->
        <div id="page-wrapper" class="content-wrapper">
            <div class="row content-header">
                <div class="col-lg-12">
                    <h1 class="page-header">SENT</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


            <!-- content -->
            <div class="content">

		        <div id="form_box">
		            <form id="form_data" class="well form-horizontal" role="form" data-async method="post" action="<?php echo $url->to("sent/insert") ?>" enctype="multipart/form-data">
		               <fieldset id="form_fieldset">
		                    
		                    <!--<div class="form-group">
		                        <label class="col-sm-3 control-label no-padding-right" for="created">CREATED</label>
		                        <div class="col-sm-3">
		                            <div class="input-group datetimepicker">
		                                <input type="text" id="created" name="created" required class="form-data form-control col-xs-5 col-sm-5" value="" />
		                                <span class="input-group-addon add-on"><i class="icon-calendar"></i></span>
		                            </div>
		                        </div>
		                    </div>-->
		                    <div class="form-group">
		                        <label class="col-sm-3 control-label no-padding-right" for="DestinationNumber">No. HP</label>
		                        <div class="col-sm-3">
		                            <input type="text" id="DestinationNumber" name="DestinationNumber" required class="form-data form-control" max-length="255" value="" />
		                        </div>
		                    </div>
		                    
		                    <div class="form-group">
		                        <label class="col-sm-3 control-label no-padding-right" for="TextDecoded">Pesan</label>
		                        <div class="col-sm-8">
		                            <textarea id="TextDecoded" name="TextDecoded" rows="5" required class="form-data form-control"></textarea>
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
		                    <input type="hidden" id="DeliveryReport" name="DeliveryReport" value="yes" />
		                    <!--<input type="hidden" id="MultiPart" name="MultiPart" value="false" />-->
		                    <input type="hidden" id="ID" name="ID" value="" />
		                    <input type="hidden" id="ID_old" name="ID_id" value="" />

		                    <!--
		                    <input type="hidden" id="{field_primary_key}_old" name="{field_primary_key}_old" value="" class="form-data" />
		                    -->
		                    <div class="clearfix form-actions">
		                        <div class="col-md-offset-3 col-md-9">
		                            <button type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
		                            <button type="reset" id="btn_cancel" class="btn btn-danger"><i class="fa fa-close"></i> Cancel</button>
		                        </div>
		                    </div>

		                </fieldset>
		            </form>
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
				                        <th width="30">&nbsp;</th>
				                        <th>Date/Time</th>
				                        <th>No. HP</th>
				                        <th>Pesan</th>
				                        <th>Status</th>

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
				                        <label class="col-sm-3 control-label no-padding-right" for="SenderNumber">Phone Number</label>
				                        <div class="col-sm-9">
				                            <p id="SenderNumber" class="form-view form-control-static" style="font-weight: bold;"></p>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-sm-3 control-label no-padding-right" for="ReceivingDateTime">Date/Time</label>
				                        <div class="col-sm-9">
				                            <p id="ReceivingDateTime" class="form-view form-control-static" style="font-weight: bold;"></p>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-sm-3 control-label no-padding-right" for="TextDecoded">Message</label>
				                        <div class="col-sm-9 pesanScroll">
				                            <p id="TextDecoded" class="form-view form-control-static" style="font-weight: bold;"></p>
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

				                <div class="well form-horizontal">
				                    <h4><strong>Reply Messages</strong></h4>

				                    <div class="pesanScroll">
				                        <span id="balasan" class="form-view form-control-static"><span>
				                    </div>

				                    <!--<div class="form-group">
				                        <label class="col-sm-3 control-label no-padding-right" for="TanggalBalasan">Tanggal</label>
				                        <div class="col-sm-9">
				                            <span id="TanggalBalasan" class="form-view" style="font-weight: bold;"></span>
				                        </div>
				                    </div>
				                    <div class="form-group">
				                        <label class="col-sm-3 control-label no-padding-right" for="PesanBalasan">Pesan</label>
				                        <div class="col-sm-9 pesanScroll">
				                            <span id="PesanBalasan" class="form-view" style="font-weight: bold;"></span>
				                        </div>
				                    </div>-->

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