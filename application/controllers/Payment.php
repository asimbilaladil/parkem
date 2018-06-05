<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment  extends CI_Controller {

    public function __construct(){
        parent::__construct();

        $this->load->model('AdminModel');
        $this->load->library('session');

        
      
    }	
	   public function index(){
        $data['payment'] = $this->AdminModel->getAllCitations();
        $this->loadView('website/payment', $data);
    }
    public function findCitation(){
        if($this->input->post()) {
            $id = $this->input->post('id');
            $data['citation'] = $this->AdminModel->findCitation( $id );
            
            return $this->load->view('website/payment-find-citation', array('data' => $data));
        }
    }
   
    /**
     * Load view 
     * @param 1 : view name
     * @param 2 : data to be render on view. If no data pass null
     */
    function loadView($view, $data) {
        //error_reporting(0);
        $this->load->view('common/header');


        $this->load->view($view, array('data' => $data));
        $this->load->view('common/footer');

    }   	
    function thankyou(){

    }

    function cancel(){
        
    }
    function process(){
        error_log("I AM INSIDE process");

        // PayPal settings
        $paypal_email = 'asimbilal0292-facilitator@gmail.com';
        $return_url = site_url('Payment/thankyou'); 
        $cancel_url = site_url('Payment/cancel'); 
        $notify_url = site_url('Payment/verify'); 

        $item_name = 'Citation Payment';

       
        $citationNO = $this->input->get('citationNO');
        $citationData = $this->AdminModel->findCitation( $citationNO );
        if(count($citationData) == 0){
            redirect('Payment');
        }
        foreach ($citationData as $key => $value) {
            $item_amount = ( strtotime('+14 days', $value->timestamp) >  strtotime(date('Y-m-d')) ? 75 : 150 ) ;
            // Check if paypal request or response
            if (!isset($_POST["txn_id"]) && !isset($_POST["txn_type"])){
                $querystring = '';

                // Firstly Append paypal account to querystring
                $querystring .= "?business=".urlencode($paypal_email)."&";

                $querystring .= "item_name=".urlencode($item_name)."&";
                $querystring .= "amount=".urlencode($item_amount)."&";
                $querystring .= "cmd=_xclick&";
                $querystring .= "no_note=1&";
                $querystring .= "lc=UK&";
                $querystring .= "currency_code=USD&";
                $querystring .= "item_number=C-$citationNO&";
                $querystring .= "return=".urlencode(stripslashes($return_url))."&";
                $querystring .= "cancel_return=".urlencode(stripslashes($cancel_url))."&";
                $querystring .= "notify_url=".urlencode($notify_url);

                // Append querystring with custom field
                $querystring .= "&custom=".$citationNO;

                header('location:https://ipnpb.sandbox.paypal.com/cgi-bin/webscr'.$querystring);
                exit();
            } 
  
        }


    }
    function verify(){
          
     error_log("I AM INSIDE verify");
        // Response from Paypal

        // read the post from PayPal system and add 'cmd'
        $req = 'cmd=_notify-validate';
        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $value = preg_replace('/(.*[^%^0^D])(%0A)(.*)/i','${1}%0D%0A${3}',$value);// IPN fix
            $req .= "&$key=$value";
        }

        // assign posted variables to local variables
        $data['item_name']          = $_POST['item_name'];
        $data['item_number']        = $_POST['item_number'];
        $data['payment_status']     = $_POST['payment_status'];
        $data['payment_amount']     = $_POST['mc_gross'];
        $data['payment_currency']   = $_POST['mc_currency'];
        $data['txn_id']             = $_POST['txn_id'];
        $data['receiver_email']     = $_POST['receiver_email'];
        $data['payer_email']        = $_POST['payer_email'];
        $data['custom']             = $_POST['custom'];

        // post back to PayPal system to validate
        $header = "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";

        $fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);

        if (!$fp) {
            // HTTP ERROR

        } else {
            fputs($fp, $header . $req);
            while (!feof($fp)) {
                $res = fgets ($fp, 1024);
                if (strcmp($res, "VERIFIED") == 0) {
                    $data = array(
                        'payment_status' => "P"
                    );
                    $id = $data['custom'];
                    $data['citation'] = $this->AdminModel->update('citation', $id, $data);

                } else if (strcmp ($res, "INVALID") == 0) {

                    $data = array(
                        'payment_status' => "U"
                    );
                    $id = $data['custom'];
                    $data['citation'] = $this->AdminModel->update('citation', $id, $data);
                }
            }
        fclose ($fp);
        }
            
    }
}
