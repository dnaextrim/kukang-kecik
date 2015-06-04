<?php $assets = $this->app->assets; $url = $this->app->url; ?>
<?php 

    if (substr($sender, 0, 1) == '0') {
        $senderName = $sender;
        $sender = substr($sender, 1);
    } else {
        $senderName = '+'.$sender;
        $sender = substr($sender, 2);
    }

    $rows = \Model\Contact::find(array(
        'where' => array(
            array('Number', 'like', "%$sender")
        ),
    ));

    foreach ($rows as $row) {
        $senderName = $row->Name;
    }
?>
        <!-- Page Content -->
        <div id="page-wrapper" class="content-wrapper">
            <div class="row content-header">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $senderName ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <!-- content -->
            <div class="content">
                
                <div>

                <?php 
                    $rows = \Model\Inbox::find(array(
                        'where' => array(
                            array('SenderNumber', 'like', "%$sender")
                        ),
                        'union' => array(
                            "SELECT * FROM sentitems WHERE DestinationNumber LIKE '%$sender'"
                        ),
                    ));

                    foreach ($rows as $row) {
                    ?>
                    <div class="form-group">
                        <small><i><?php echo $row->ReceivingDateTime ?></i></small>
                        <div class="form-control">
                            <?php echo $row->TextDecoded ?>
                        </div>
                    </div>

                    <?php
                    }
                ?>

                </div>

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
                            <label class="col-sm-3 control-label no-padding-right" for="TextDecoded">Message</label>
                            <div class="col-sm-8">
                                <textarea id="TextDecoded" name="TextDecoded" required class="form-data form-control" rows="5"></textarea>
                            </div>
                        </div>

                        <input type="hidden" id="DestinationNumber" name="DestinationNumber" required value="" />
                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" id="btn_save" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
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
        <!-- /#page-wrapper -->