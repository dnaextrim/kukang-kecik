<?php
namespace Controller;

use Kecik\AuthController;

class Inbox extends AuthController {
	var $app;

	public function __construct(\Kecik\Kecik $app) {
		parent::__construct($app);

		$this->app = $app;
	}

	public function reply() {
		$hex_str = explode(',', '0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F');
        $pdu = new \PDU2();

        $jmlSMS = ceil(strlen($this->request->post('TextDecoded'))/153);
        $pecah  = str_split($this->request->post('TextDecoded'), 153);
                     
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
	                $outbox->ID 				= $new_id;
	                $outbox->DestinationNumber	= $this->request->post('DestinationNumber');
	                $outbox->Text 				= $pdu->user_data($msg);
	                $outbox->TextDecoded 		= $msg;
	                $outbox->udh 				= $udh;
	                if ($jmlSMS > 1)
	                    $outbox->MultiPart 		= 'true';
	                $outbox->DeliveryReport 	= 'yes';
	                //$outbox->SendingTimeOut 	= date("Y-m-d H:i:s", strtotime("+5 min"));
	                $outbox->RelativeValidity 	= 255;
	                $outbox->SenderID 			= ''; //Input::post('ID');
	                //$outbox->CreatorID = json_encode(array('replier'=>Users::getUser(), 'inbox_id'=>Input::post('ID')));
                $outbox->save();
            } else {
                $outbox = new \Model\OutboxMultipart();
	                $outbox->ID 				= $new_id;
	                $outbox->Text 				= $pdu->user_data($msg);
	                $outbox->TextDecoded 		= $msg;
	                $outbox->udh 				= $udh;
	                $outbox->SequencePosition 	= $i;
                $outbox->save();
            }
        }

        $notif = new \Model\Notification(array('type_id'=>$this->request->post('ID')/*, 'user'=>Users::getUser()*/));
            $notif->processed = true;
        $notif->save();
	}

	public function delete() {
		$inbox = new \Model\Inbox(array('ID'=>$this->request->post('ID')));
		$inbox->delete();
	}

	public function get() {
		$res = \Model\Inbox::findID($this->request->post('ID'));

        $seq_number = '';
        $irow = 1;
        $sent = \Model\Sent::findCreatorIDLike("'%\"inbox_id\":\":".$this->request->post('ID')."\"%'", 
        		array(), array('asc'=>array('ID', 'SequencePosition')) );
        foreach ($sent as $data) {

            if (!isset($pesan))
                $pesan = $data->TextDecoded;
            else
                $pesan .= $data->TextDecoded;

            if ($seq_number == 1 || $irow >= count($sent)) {
                $res[0]->balasan .= '<div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">'.$data->SendingDateTime.'</label>
                    <div class="col-sm-9">
                        '.$pesan.'
                    </div>
                </div>
                <hr />
                '."\n";

                $pesan = '';
            }

            $seq_number = $data->SequencePosition;
            $irow++;
        }

        if (count($sent)<=0) $res[0]->balasan = '';

        $res[0]->DestinationNumber = $res[0]->SenderNumber;
        return json_encode($res);
	}

	public function find() {
        $ret = array('data'=>array());

		$rows = \Model\Inbox::find(array(), array(), array('desc'=>array('ReceivingDateTime')));
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
                $dclass->ReceivingDateTime = $data->ReceivingDateTime;
                if (substr($data->SenderNumber, 0, 1) == '0')
                    $real_number = substr($data->SenderNumber, 1);
                elseif (substr($data->SenderNumber, 0, 1) == '+')
                    $real_number = substr($data->SenderNumber, 3);
                else
                    $real_number = $data->SenderNumber;

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
                    $dclass->SenderNumber = "<strong>$data->SenderNumber</strong>";
                else
                    $dclass->SenderNumber = "<strong>$Name</strong>";
                $dclass->TextDecoded = '<span class="visible-xs"><i><small>'.$data->ReceivingDateTime.'</small></i><br /></span>'.$data->TextDecoded;

                /*$notif = \Model\Notification::find(array(
                	'where' => array (
                		array("notification_type", '=', "'inbox'"),
                		array("type_id", '=', $data->ID ),
                		//array("user", '=', "'SYSTEM'")
                	)
                ));*/
                $status = $data->Processed;
                /*foreach ($notif as $data3) {
                    $status = $data3->processed;
                }*/
                $dclass->status = $status;
                $ret["data"][] =  $dclass;
         		$row_num++;  	
            }
            
		}

        return json_encode($ret);
	}
}