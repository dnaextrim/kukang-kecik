<?php
namespace Controller;

use Kecik\AuthController;

class Outbox extends AuthController {
	var $app;

	public function __construct(\Kecik\Kecik $app) {
		parent::__construct($app);

		$this->app = $app;
	}

	public function insert() {
		$hex_str = explode(',', '0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F');
        $pdu = new \PDU2;
        $request = $this->request;

        if (($request->post('GroupID') != '' || is_array($request->post('GroupID'))) || ($request->post('DestinationNumber3') != '' || is_array($request->post('DestinationNumber3')))) {
            
            if ($request->post('GroupID') != '' || is_array($request->post('GroupID'))) {
                $group_list = $request->post('GroupID');
                $group_query = array();
                if (is_array($group_list)) {
                    while(list($idx, $group) = each($group_list)) {
                        array_push($group_query, array('GroupID', '=', $group));
                    }

                    $group_filter = array(
                    	"where" => $group_query
                    );
                } else {
                    $group_filter = array(
                    	'where' => array(
                    		array('GroupID', '=', "$group_list")
                    	)
                    );
                }
                
                $jmlSMS = ceil(strlen($request->post('TextDecoded2'))/153);
                $pecah  = str_split($request->post('TextDecoded2'), 153);
                
                $udh_id = "050003".$hex_str[rand(10, 15)].$hex_str[rand(1, 9)];
                //$udh_id = "050003A7";

                $res = $this->db->Outbox->exec("SHOW TABLE STATUS LIKE 'outbox'");
                $ret = $this->db->Outbox->fetch($res);
                
                foreach ($ret as $d_ret)
                    $new_id = $d_ret->Auto_increment;

                $contact = \Model\Contact::find($group_filter);
                foreach ($contact as $data) {
                	for ($i=1; $i<=$jmlSMS; $i++) {
                        if ($jmlSMS > 1)
                            $udh = $udh_id.sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
                        else
                            $udh = '';

                        $msg = $pecah[$i-1];

                        if ($i == 1) {
                            $outbox = new \Model\Outbox();
                        	// field: Change with your field in your table
                        	// form-input: Change with input form in your view
                            $outbox->ID = $new_id;
	                        	$outbox->DestinationNumber = $data->Number;
	                            $outbox->Text = $pdu->user_data($msg);
	                            $outbox->TextDecoded = $msg;
	                            $outbox->udh = $udh;
	                            if ($jmlSMS > 1)
	                                $outbox->MultiPart = 'true';
	                            $outbox->DeliveryReport = 'yes';
	                            //$outbox->SendingTimeOut = date("Y-m-d H:i:s", strtotime("+5 min"));
	                            $outbox->RelativeValidity = 255;
	                            $outbox->SenderID = '';
	                            //$outbox->CreatorID = Users::getUser();
                        	$outbox->save();
                        } else {
                            $outbox = \Model\OutboxMultipart();
	                            $outbox->ID = $new_id;
	                            $outbox->Text = $pdu->user_data($msg);
	                            $outbox->TextDecoded = $msg;
	                            $outbox->udh = $udh;
	                            $outbox->SequencePosition = $i;
                            $outbox->save();
                        }

                        $new_id++;
                    }
                }
            } elseif ($request->post('DestinationNumber3') != '' || is_array($request->post('DestinationNumber3'))) {
                $numbers = $request->post('DestinationNumber3');
                while(list($idx, $number) = each($numbers)) {

                    $jmlSMS = ceil(strlen($request->post('TextDecoded3'))/153);
                    $pecah  = str_split($request->post('TextDecoded3'), 153);
                    
                    $udh_id = "050003".$hex_str[rand(10, 15)].$hex_str[rand(1, 9)];
                    //$udh_id = "050003A7";

                    $res = $this->db->Outbox->exec("SHOW TABLE STATUS LIKE 'outbox'");
                    $ret = $this->db->Outbox->fetch($res);
                    
                    foreach ($ret as $d_ret)
                        $new_id = $d_ret->Auto_increment;

                    for ($i=1; $i<=$jmlSMS; $i++) {
                        if ($jmlSMS > 1)
                            $udh = $udh_id.sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
                        else
                            $udh = '';

                        $msg = $pecah[$i-1];

                        if ($i == 1) {
                            $outbox = new \Model\Outbox();
	                            // field: Change with your field in your table
	                            // form-input: Change with input form in your view
	                            $outbox->ID = $new_id;
	                            $outbox->DestinationNumber = $number;
	                            $outbox->Text = $pdu->user_data($msg);
	                            $outbox->TextDecoded = $msg;
	                            $outbox->udh = $udh;
	                            if ($jmlSMS > 1)
	                                $outbox->MultiPart = 'true';
	                            $outbox->DeliveryReport = 'yes';
	                            //$outbox->SendingTimeOut = date("Y-m-d H:i:s", strtotime("+5 min"));
	                            $outbox->RelativeValidity = 255;
	                            $outbox->SenderID = '';
	                            //$outbox->CreatorID = Users::getUser();
                            $outbox->save();
                        } else {
                            $outbox = new \Model\OutboxMultipart();
	                            $outbox->ID = $new_id;
	                            $outbox->Text = $pdu->user_data($msg);
	                            $outbox->TextDecoded = $msg;
	                            $outbox->udh = $udh;
	                            $outbox->SequencePosition = $i;
                            $outbox->save();
                        }
                    }
                }
            }
        } else {
            $jmlSMS = ceil(strlen($request->post('TextDecoded'))/153);
            $pecah  = str_split($request->post('TextDecoded'), 153);
                         
            $udh_id = "050003".$hex_str[rand(10, 15)].$hex_str[rand(1, 9)];
            //$udh_id = "050003A7";

            $res = $this->db->Outbox->exec("SHOW TABLE STATUS LIKE 'outbox'");
            $ret = $this->db->Outbox->fetch($res);
            
            foreach ($ret as $d_ret)
                $new_id = $d_ret->Auto_increment;

            for ($i=1; $i<=$jmlSMS; $i++) {
                if ($jmlSMS > 1)
                    $udh = $udh_id.sprintf("%02s", $jmlSMS).sprintf("%02s", $i);
                else
                    $udh = '';

                $msg = $pecah[$i-1];

                if ($i == 1) {
                    $outbox = new \Model\Outbox();
	                    // field: Change with your field in your table
	                    // form-input: Change with input form in your view
	                    $outbox->ID = $new_id;
	                    $outbox->DestinationNumber = $request->post('DestinationNumber');
	                    $outbox->Text = $pdu->user_data($msg);
	                    $outbox->TextDecoded = $msg;
	                    $outbox->udh = $udh;
	                    if ($jmlSMS > 1)
	                        $outbox->MultiPart = 'true';
	                    $outbox->DeliveryReport = 'yes';
	                    //$outbox->SendingTimeOut = date("Y-m-d H:i:s", strtotime("+5 min"));
	                    $outbox->RelativeValidity = 255;
	                    $outbox->SenderID = '';
	                    //$outbox->CreatorID = Users::getUser();
                    $outbox->save();
                } else {
                    $outbox = new \Model\OutboxMultipart();
	                    $outbox->ID = $new_id;
	                    $outbox->Text = $pdu->user_data($msg);
	                    $outbox->TextDecoded = $msg;
	                    $outbox->udh = $udh;
	                    $outbox->SequencePosition = $i;
                    $outbox->save();
                }
            }
        }
	}

	public function delete() {
		$inbox = new \Model\Outbox(array('ID'=>$this->request->post('ID')));
		$inbox->delete();

        $OutboxMultipart = new \Model\OutboxMultipart(array('ID'=>$this->request->post('ID')));
        $OutboxMultipart->delete();
	}

	public function find() {
		$ret = array('data'=>array());

		$rows = \Model\Outbox::find(array(), array(), array('desc'=>array('SendingDateTime')));
		if ($rows) {
       		$filter = array();
       		$limit = array();
       		$order = array();
       		$res = $rows;
            $res2 = \Model\Contact::find();
            $row_num = 1;
            foreach($res as $data) {
                $dclass = new \stdclass;
                $dclass->actions = "{ID: '$data->ID'}";
                $dclass->no = $row_num;
                $dclass->SendingDateTime = $data->SendingDateTime;
                if (substr($data->DestinationNumber, 0, 1) == '0')
                    $real_number = substr($data->DestinationNumber, 1);
                elseif (substr($data->DestinationNumber, 0, 1) == '+')
                    $real_number = substr($data->DestinationNumber, 3);
                else
                    $real_number = $data->DestinationNumber;

                $Name = '';
                reset($res2);
                foreach ($res2 as $data2) {
                    if (substr($data2->Number, 0, 1) == '0')
                        $real_number2 = substr($data2->Number, 1);
                    elseif (substr($data2->Number, 0, 1) == '+')
                        $real_number2 = substr($data2->Number, 3);
                    else
                        $real_number2 = $data2->Number;

                    if ( $real_number == $real_number2) {
                        $Name = $data2->Name;
                    }
                }
                if ($Name == '')
                    $dclass->DestinationNumber = "<strong>$data->DestinationNumber</strong>";
                else
                    $dclass->DestinationNumber = "<strong>$Name</strong>";
                $dclass->TextDecoded = '<span class="visible-xs"><i><small>'.$data->SendingDateTime.'</small></i><br /></span>'.$data->TextDecoded;

                /*$notif = \Model\Notification::find(array(
                	'where' => array (
                		array("notification_type", '=', "'inbox'"),
                		array("type_id", '=', $data->ID ),
                		//array("user", '=', "'SYSTEM'")
                	)
                ));*/
                //$status = $data->Processed;
                /*foreach ($notif as $data3) {
                    $status = $data3->processed;
                }*/
                $dclass->status = true;
                $ret["data"][] =  $dclass;
         		$row_num++;  	
            }

		}

		return json_encode($ret);
	}
}