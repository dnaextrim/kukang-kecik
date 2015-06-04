<?php
namespace Controller;

use Kecik\Controller;

class Service extends Controller {
	var $app;
	var $splitter = '#'; //** Default Splitter is # you can change with space or other

	public function __construct(\Kecik\Kecik $app) {
		parent::__construct($app);

		$this->app = $app;
	}

    public function SMSMessage($key, $keys) {
        $msgReply = '';

        switch (strtolower($key)) {
            case 'key': //** Auto Replay key word
                $msgReply = ''; //** Auto Replay Message
            break;
            
            

            default:
                $msgReply = 'Wrong Format...';
            break;
        }

        return $msgReply;
    }

	public function autoReplay() {

		$inbox = \Model\Inbox::findProcessed("false");
        $msgReply = '';

        $pdu = new PDU2();
        $inbox_id = 0;
        $SenderNumber = '';
        $pesan = '';
        foreach ($inbox as $data) {
            $key = explode($this->splitter, trim($data->TextDecoded));
            $inbox_id = $data->ID;
            $SenderNumber = $data->SenderNumber;
            $pesan = $data->TextDecoded;

            if (isset($key[0])) {
                $msgReply = $this->SMSMessage($key[0], $key);  
            }

            if ($msgReply != '') {
                $jmlSMS = ceil(strlen($msgReply)/153);
                $pecah  = str_split($msgReply, 153);
                
                $hex_str = explode(',', '0,1,2,3,4,5,6,7,8,9,A,B,C,D,E,F');
                
                $udh_id = "050003".$hex_str[rand(10, 15)].$hex_str[rand(1, 9)];
                //$udh_id = "050003A7";

                $res = $this->app->db->query("SHOW TABLE STATUS LIKE 'outbox'");
                $ret = $this->app->db->fetch($res);
                
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
                        $outbox->ID = $new_id;
                        $outbox->DestinationNumber = $data->SenderNumber;
                        $outbox->Text = $pdu->user_data($msg);
                        $outbox->TextDecoded = $msg;
                        $outbox->udh = $udh;
                        if ($jmlSMS > 1)
                            $outbox->MultiPart = 'true';
                        $outbox->DeliveryReport = 'yes';
                        //$outbox->SendingTimeOut = date("Y-m-d H:i:s", strtotime("+5 min"));
                        $outbox->RelativeValidity = 255;
                        $outbox->SenderID = ''; //$inbox_id;
                        $outbox->CreatorID = json_encode(array('replier'=>"System", 'inbox_id'=>$inbox_id));
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

            $ibx = new \Model\Inbox(array('ID'=>$data->ID));
            $ibx->Processed = 'true';
            $ibx->save();

            $user = \Model\User::find();
            foreach ($user as $data) {
                $notif = $this->Notification->add();
                    $notif->notification_type = 'inbox';
                    $notif->type_id = $inbox_id;
                    $notif->title = 'SMS Masuk';
                    $notif->desc = $pesan;
                    $notif->user = $data->username;
                    if ($msgReply!= '')
                        $notif->processed = 'true';
                    else
                        $notif->processed = 'false';
                $notif->save();
            }

        }

        $user = \Model\User::find();
        $sent = \Model\Sent::findProcessed("false");

        foreach ($sent as $data) {  
            if ($data->Status == 'SendingOK')
                $status = 'SMS Sent';
            elseif ($data->Status == 'SendingOKNoReport')
                $status = 'SMS Sent';
            elseif ($data->Status == 'SendingError')
                $status = 'SMS Fail';
            elseif ($data->Status == 'DeliveryOK')
                $status = 'SMS Sent';
            elseif ($data->Status == 'DeliveryFailed')
                $status = 'SMS Fail';
            elseif ($data->Status == 'DeliveryPending')
                $status = 'SMS Fail';
            elseif ($data->Status == 'DeliveryUnknown')
                $status = 'SMS Fail';
            elseif ($data->Status == 'Error')
                $status = 'SMS Fail';

            reset($user);
            foreach ($user as $data2) {
                $notif = new \Model\Notification();
                    $notif->notification_type = 'sent';
                    $notif->type_id = $data->ID;
                    $notif->title = $status;
                    $notif->desc = $pesan;
                    $notif->user = $data2->username;
                    $notif->processed = 'false';
                $notif->save();
            }

            $sentupdate = new \Model\Sent(array('ID'=>$data->ID));
            $sentupdate->processed='true';
            $sentupdate->save();
        }

	}

    public function getSignal() {
        $sinyal = 0;

        $phone = \Model\Phone::find(array(
            'where' => array(
                array("TimeOut", '>=', array("NOW()", FALSE))
            )
        ));
        foreach ($phone as $data) {
            $sinyal = $data->Signal;
        }

        echo $sinyal.' %';
    }
}
