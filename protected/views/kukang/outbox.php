<?php $assets = $this->app->assets; $url = $this->app->url; ?>
		<!-- Page Content -->
        <div id="page-wrapper" class="content-wrapper">
            <div class="row content-header">
                <div class="col-lg-12">
                    <h1 class="page-header">OUTBOX
                    	<button type="button" id="btn_add" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Add New</button>
                    </h1>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            
            <!-- content -->
            <div class="content">

	            <!-- form_box -->
	            <div id="form_box">

		            <!-- #myTab -->
		        	<ul class="nav nav-tabs" id="myTab">
		                <li class="active">
		                    <a data-toggle="tab" href="#single_number">
		                        <i class="green icon-envelope bigger-110"></i>
		                        Kirim ke Satu Nomor
		                    </a>
		                </li>

		                <li>
		                    <a data-toggle="tab" href="#group">
		                        <i class="green icon-group bigger-110"></i>
		                        Kirim ke Kelompok
		                    </a>
		                </li>

		                <li>
		                    <a data-toggle="tab" href="#custom">
		                        <i class="green icon-th-list bigger-110"></i>
		                        Kirim Bedasarkan Pilihan
		                    </a>
		                </li>
		            </ul>
		            <!-- /#myTab -->

	            
		            
		            <!-- tab-content -->
		           	<div class="tab-content">

	            	<!-- #single_number -->
	                <div id="single_number" class="tab-pane in active">

	                	<!-- form -->
	                	<form id="form_input" class="well form-horizontal" role="form" data-async method="post" action="<?php $url->to('outbox/insert') ?>" enctype="multipart/form-data">
	                        <fieldset class="form_fieldset">
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
		                        <input type="hidden" id="SenderID" name="SenderID" value="" />
		                        <input type="hidden" id="CreatorID" name="CreatorID" value="" />

		                        <!--
		                        <input type="hidden" id="{field_primary_key}_old" name="{field_primary_key}_old" value="" class="form-data" />
		                        -->
		                        <div class="clearfix form-actions">
		                            <div class="col-md-offset-3 col-md-9">
		                                <button type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
		                                <button type="reset" id="btn_cancel" class="btn btn-danger btn_cancel"><i class="fa fa-close"></i> Cancel</button>
		                            </div>
		                        </div>
		                    </fieldset>
	                    </form>
	                    <!-- /form -->

	                </div>
	                <!-- /#single_number -->

	                <!-- #group -->
	                <div id="group" class="tab-pane">

	                	<!-- form -->
	                    <form id="form_input" class="well form-horizontal" role="form" data-async method="post" action="<?php $url->to('outbox/insert') ?>" enctype="multipart/form-data">
	                        <fieldset class="form_fieldset">
		                        <div class="form-group">
		                            <label class="col-sm-3 control-label no-padding-right" for="GroupID">No. HP</label>
		                            <div class="col-sm-3">
		                                <select id="GroupID" name="GroupID[]" data-placeholder="Pilih Kelompok" required class="select2 width-100 form-data" style="width: 100%"  multiple>
		                                    <?php 
		                                    $group = \Model\Group::find();
		                                    foreach($group as $data):
		                                    ?>
		                                    <option value="<?php echo $data->ID ?>"><?php echo $data->Name ?></option>
		                                    <?php endforeach ?>
		                                </select>
		                            </div>
		                        </div>
		                        
		                        <div class="form-group">
		                            <label class="col-sm-3 control-label no-padding-right" for="TextDecoded2">Pesan</label>
		                            <div class="col-sm-8">
		                                <textarea id="TextDecoded2" name="TextDecoded2" rows="5" required class="form-data form-control"></textarea>
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
		                        <input type="hidden" id="DeliveryReport2" name="DeliveryReport" value="yes" />
		                        <!--<input type="hidden" id="MultiPart" name="MultiPart" value="false" />-->
		                        <input type="hidden" id="SenderID2" name="SenderID2" value="" />
		                        <input type="hidden" id="CreatorID2" name="CreatorID2" value="" />

		                        <!--
		                        <input type="hidden" id="{field_primary_key}_old" name="{field_primary_key}_old" value="" class="form-data" />
		                        -->
		                        <div class="clearfix form-actions">
		                            <div class="col-md-offset-3 col-md-9">
		                                <button type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
		                                <button type="reset" id="btn_cancel" class="btn btn-danger btn_cancel"><i class="fa fa-close"></i> Cancel</button>
		                            </div>
		                        </div>
		                    </fieldset>
	                    </form>
	                    <!-- /form -->

	                </div>
	                <!-- /#group -->

	                <!-- #custom -->
	                <div id="custom" class="tab-pane">

	                	<!-- form -->
	                    <form id="form_input" class="well form-horizontal" role="form" data-async method="post" action="<?php $url->to('outbox/insert') ?>" enctype="multipart/form-data">
	                        <fieldset class="form_fieldset">
		                        <div class="form-group">
		                            <label class="col-sm-3 control-label no-padding-right" for="DestinationNumber">No. HP</label>
		                            <div class="col-sm-3">
		                                <select id="DestinationNumber3" name="DestinationNumber3[]" data-placeholder="Pilih No.HP" required class="select2 form-data width-100" style="width: 100%" multiple>
		                                    <?php 
		                                    $contact = \Model\Contact::find(array(
		                                    	'where' => array(
		                                    		array('GroupID','=', -1),
		                                    		array('GroupID', '=', 0)
		                                    	)
		                                    ));
		                                    foreach($contact as $data):
		                                    ?>
		                                    <option value="<?php echo $data->Number ?>"><?php echo $data->Name ?></option>
		                                    <?php 
		                                    endforeach; 
		                                    $group = \Model\Group::find();
		                                    foreach($group as $data):
		                                    ?>
		                                    <optgroup label="<?php echo $data->Name ?>">
		                                        <?php 
		                                        $contact = \Model\Contact::findGroupID($data->ID);
		                                        foreach($contact as $data2):
		                                        ?>
		                                        <option value="<?php echo $data2->Number ?>"><?php echo $data2->Name ?></option>
		                                        <?php endforeach ?>
		                                    </optgroup>
		                                    <?php endforeach ?>
		                                </select>
		                            </div>
		                        </div>
		                        
		                        <div class="form-group">
		                            <label class="col-sm-3 control-label no-padding-right" for="TextDecoded">Pesan</label>
		                            <div class="col-sm-8">
		                                <textarea id="TextDecoded3" name="TextDecoded3" rows="5" required class="form-data form-control"></textarea>
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
		                        <input type="hidden" id="DeliveryReport3" name="DeliveryReport3" value="yes" />
		                        <!--<input type="hidden" id="MultiPart" name="MultiPart" value="false" />-->
		                        <input type="hidden" id="SenderID3" name="SenderID" value="" />
		                        <input type="hidden" id="CreatorID3" name="CreatorID" value="" />

		                        <!--
		                        <input type="hidden" id="{field_primary_key}_old" name="{field_primary_key}_old" value="" class="form-data" />
		                        -->
		                        <div class="clearfix form-actions">
		                            <div class="col-md-offset-3 col-md-9">
		                                <button type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
		                                <button type="reset" id="btn_cancel" class="btn btn-danger btn_cancel"><i class="fa fa-close"></i> Cancel</button>
		                            </div>
		                        </div>
		                    </fieldset>
	                    </form>
	                    <!-- /form -->

	                </div>
	                <!-- /#custom -->

		            </div>
		            <!-- /.tab-content -->

		        </div>
		        <!-- /#form_box -->

	            <!-- row -->
	            <div class="row">
				    <div class="col-xs-12">
				        <!--<div class="table-header">
				            Results for "Latest Registered Domains"
				        </div>-->
				        <div class="table-responsive">
				            <table id="list" class="table table-striped table-bordered table-hover">
				                <thead>
				                    <tr class="navbar-default">
				                        <th width="10">&nbsp;</th>
				                        <th class="hidden-xs" width="20">#</th>
				                        <th width="150">No. HP</th>
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
				<!-- /.row -->

			</div>
			<!-- /.content -->


        </div>
        <!-- /#page-wrapper -->