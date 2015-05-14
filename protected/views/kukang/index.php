		<!-- Page Content -->
        <div id="page-wrapper" class="content-wrapper">
            <div class="row content-header">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->



            <!-- row -->
			<div class="row content">
				<!-- col-xs-12 -->
				<div class="col-xs-12">
					<!-- row -->
					<div class="row">

						<!-- INBOX -->
						<div class="col-lg-3 col-md-6">
							<div class="panel panel-primary">
		                        <div class="panel-heading">
		                            <div class="row">
		                                <div class="col-xs-3">
		                                    <i class="fa fa-envelope fa-5x"></i>
		                                </div>
		                                <div class="col-xs-9 text-right">
		                                    <div class="huge">
		                                    	<?php
												$inbox = \Model\Inbox::find();
												echo count($inbox);
												?>
		                                    </div>
		                                    <div>INBOX</div>
		                                </div>
		                            </div>
		                        </div>
		                        <!--<a href="#">
		                            <div class="panel-footer">
		                                <span class="pull-left">View Details</span>
		                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                                <div class="clearfix"></div>
		                            </div>
		                        </a>-->
		                    </div>
		                </div>
		                <!-- /INBOX -->

		                <!-- SENT -->
		                <div class="col-lg-3 col-md-6">
			                <div class="panel panel-green">
		                        <div class="panel-heading">
		                            <div class="row">
		                                <div class="col-xs-3">
		                                    <i class="fa fa-envelope-o fa-5x"></i>
		                                </div>
		                                <div class="col-xs-9 text-right">
		                                    <div class="huge">
		                                    	<?php
												$sent = \Model\Sent::find();
												echo count($sent);
												?>
		                                    </div>
		                                    <div>SENT</div>
		                                </div>
		                            </div>
		                        </div>
		                        <!--<a href="#">
		                            <div class="panel-footer">
		                                <span class="pull-left">View Details</span>
		                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		                                <div class="clearfix"></div>
		                            </div>
		                        </a>-->
			                </div>
			            </div>
						<!-- /SENT -->

					</div> 
					<!-- /row -->


					<!-- row -->
					<div class="row">
						<!-- col-sm-12 -->
						<div class="col-sm-12">
							<!-- Panel 5 INBOX-->
							<div class="panel panel-primary">
								<!-- panel-heading -->
								<div class="panel-heading">
									<i class="fa fa-envelope"></i>
									5 INBOX
								</div>
								<!-- /panel-heading -->

								<!-- panel-body -->
								<div class="panel-body">
									<table class="table table-bordered table-striped table-hover">
										<thead class="thin-border-bottom">
											<tr class="navbar-default">
												<th class="hidden-xs">
													<i class="icon-caret-right blue"></i>
													Date/Time
												</th>

												<th>
													<i class="icon-caret-right blue"></i>
													Phone Number
												</th>

												<th class="hidden-xs">
													<i class="icon-caret-right blue"></i>
													Name
												</th>

												<th>
													<i class="icon-caret-right blue"></i>
													Messages
												</th>
											</tr>
										</thead>

										<tbody>
											<?php
											$inbox = \Model\Inbox::find(array(), array(5));
											$contact = \Model\Contact::find();
											foreach ($inbox as $data):
												$Name = '';

												if (substr($data->SenderNumber, 0, 1) == '0')
							                        $real_number = substr($data->SenderNumber, 1);
							                    elseif (substr($data->SenderNumber, 0, 1) == '+')
							                        $real_number = substr($data->SenderNumber, 3);
							                    else
							                        $real_number = $data->SenderNumber;

												reset($contact);
							                    foreach ($contact as $data2) {
							                        
							                        if (substr($data2->Number, 0, 1) == '0')
							                            $real_number2 = substr($data2->Number, 1);
							                        elseif (substr($data2->Number, 0, 1) == '+')
							                            $real_number2 = substr($data2->Number, 3);
							                        else
							                            $real_number2 = $data2->Number;

							                        //echo $real_number.'='.$real_number2.'<br >';
							                        if ( $real_number == $real_number2) {
							                            $Name = $data2->Name;
							                            break;
							                        }
							                    }
											?>
											<tr>
												<td class="hidden-xs"><?php echo $data->ReceivingDateTime ?></td>

												<td>
													<strong><?php echo $data->SenderNumber ?></strong>
												</td>

												<td class="hidden-xs">
													<?php 
													if ($Name != '')
														echo $Name;
													else
														echo $data->SenderNumber;
													?>
												</td>

												<td><span class="visible-xs"><i><small>(<?php echo $data->ReceivingDateTime ?>)</small></i><br /></span><?php echo str_replace("\n", '<br>', $data->TextDecoded) ?></td>
											</tr>
											<?php
											endforeach;
											?>
										</tbody>
									</table>

								</div><!-- /panel-body -->
							</div><!-- /Panel 5 INBOX -->
						</div>
						<!-- /col-sm-12 -->


						<div class="hr hr32 hr-dotted"></div>

						
						<!-- col-sm-12 -->
						<div class="col-sm-12">
							<!-- Panel 5 SENT-->
							<div class="panel panel-green">
								<div class="panel-heading">
										<i class="fa fa-envelope-o"></i>
										5 SENT
								</div>

								<div class="panel-body">
										<table class="table table-bordered table-striped table-hover">
											<thead class="thin-border-bottom">
												<tr class="navbar-default">
													<th class="hidden-xs">
														<i class="icon-caret-right blue"></i>
														Date/Time
													</th>

													<th>
														<i class="icon-caret-right blue"></i>
														Phone Number
													</th>

													<th class="hidden-xs">
														<i class="icon-caret-right blue"></i>
														Name
													</th>

													<th>
														<i class="icon-caret-right blue"></i>
														Messages
													</th>
												</tr>
											</thead>

											<tbody>
												<?php
												$sent = \Model\Sent::find(array(), array(5));
												//$contact = $this->Contact->find();
												foreach ($sent as $data):
													$Name = '';

													if (substr($data->DestinationNumber, 0, 1) == '0')
								                        $real_number = substr($data->DestinationNumber, 1);
								                    elseif (substr($data->DestinationNumber, 0, 1) == '+')
								                        $real_number = substr($data->DestinationNumber, 3);
								                    else
								                        $real_number = $data->DestinationNumber;

													reset($contact);
								                    foreach ($contact as $data2) {
								                        
								                        if (substr($data2->Number, 0, 1) == '0')
								                            $real_number2 = substr($data2->Number, 1);
								                        elseif (substr($data2->Number, 0, 1) == '+')
								                            $real_number2 = substr($data2->Number, 3);
								                        else
								                            $real_number2 = $data2->Number;

								                        //echo $real_number.'='.$real_number2.'<br >';
								                        if ( $real_number == $real_number2) {
								                            $Name = $data2->Name;
								                            break;
								                        }
								                    }
												?>
												<tr>
													<td class="hidden-xs"><?php echo $data->SendingDateTime ?></td>

													<td>
														<strong><?php echo $data->DestinationNumber ?></strong>
													</td>

													<td class="hidden-xs">
														<?php 
														if ($Name != '')
															echo $Name;
														else
															echo $data->DestinationNumber;
														?>
													</td>

													<td><span class="visible-xs"><i><small>(<?php echo $data->SendingDateTime ?>)</small></i><br /></span><?php echo str_replace("\n", '<br>', $data->TextDecoded) ?></td>
												</tr>
												<?php
												endforeach;
												?>
											</tbody>
										</table>
								</div><!-- /panel-body -->
							</div><!-- /Panel 5 SENT -->
						</div>
						<!-- /col-xs-12 -->

					</div><!-- /row -->
				</div>
				<!-- /col-xs-12 -->
			</div>
			<!-- row -->




        </div>
        <!-- /#page-wrapper -->

