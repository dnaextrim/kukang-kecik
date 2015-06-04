<?php
namespace Controller;

use Kecik\AuthController;

class SMS extends AuthController {
    var $app;

    public function __construct(\Kecik\Kecik $app) {
        parent::__construct($app);

        $this->app = $app;
    }

    public function find($id='') {
        $ret = array('data'=>array());

        if ($id == '') {
            $rows = \Model\Inbox::find(array(
                'group by'=>array(
                    array('SenderNumber')
                )
            ), array(), array('desc'=>array('ReceivingDateTime')));
        } else {
            $rows = \Model\Inbox::find(array(
                'where'=>array(
                    array('SenderNumber', '=', $id)
                )
            ), array(), array('desc'=>array('ReceivingDateTime')));
        }

        if ($rows) {
            $filter = array();
            $limit = array();
            $order = array();
            $res = $rows;
            $res2 = \Model\Contact::find();
            $row_num = 1;
            foreach($res as $data) {
                $dclass = new \stdclass;
                $dclass->actions = "{Sender: '".substr($data->SenderNumber, 1)."'}";
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

    public function read($id) {
        return $this->view('kukang/read_sms', array('sender'=>$id));
    }
}