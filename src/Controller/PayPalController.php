<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;

class PayPalController extends AppController
{
	public function initialize()
	{
		parent::initialize();
		/*
	        * Config for PayPal specific values
	    */

	    //Whether Sandbox environment is being used, Keep it true for testing
	    define("SANDBOX_FLAG", true);

	    //PayPal REST API endpoints
	    define("SANDBOX_ENDPOINT", "https://api.sandbox.paypal.com");
	    define("LIVE_ENDPOINT", "https://api.paypal.com");

	    //Merchant ID
	    define("MERCHANT_ID","E9GCL5FX4TU2C");

	    //PayPal REST App SANDBOX Client Id and Client Secret
	    define("SANDBOX_CLIENT_ID" , "businesstest@rubysgifts.com");
	    define("SANDBOX_CLIENT_SECRET", "rubysgifts");

	    //Environments -Sandbox and Production/Live
	    define("SANDBOX_ENV", "sandbox");
	    define("LIVE_ENV", "production");

	    //PayPal REST App SANDBOX Client Id and Client Secret
	    define("LIVE_CLIENT_ID" , "businesstest_api2.rubysgifts.com");
	    define("LIVE_CLIENT_SECRET" , "ZC3JAETT7FF7N43Z");

	    //ButtonSource Tracker Code
	    define("SBN_CODE","PP-DemoPortal-EC-IC-php-REST");
	}

	public function index(){
		$access_token = $this->getAccessToken();
		echo $access_token; exit;
		if($this->verify_nonce()){
			if(isset($this->request->data['markFlow']) && $this->request->data['markFlow'] == "true"){ //Proceed to Checkout or Mark flow
				$markFlowArray = json_decode($_SESSION['markFlowPaymentData'], true);
        		$markFlowArray['transactions'][0]['amount']['total'] = (float)$markFlowArray['transactions'][0]['amount']['total'] + (float)$_POST['shipping_method'] - (float)$markFlowArray['transactions'][0]['amount']['details']['shipping'];
        		$markFlowArray['transactions'][0]['amount']['details']['shipping'] = $_POST['shipping_method'];
        		$markFlowArray['transactions'][0]['item_list']['shipping_address']['recipient_name'] =  filter_input( INPUT_POST, 'recipient_name', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['line1'] =  filter_input( INPUT_POST, 'line1', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['line2'] =  filter_input( INPUT_POST, 'line2', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['city'] =  filter_input( INPUT_POST, 'city', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['country_code'] =  filter_input( INPUT_POST, 'country_code', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['postal_code'] =  filter_input( INPUT_POST, 'postal_code', FILTER_SANITIZE_SPECIAL_CHARS );
                $markFlowArray['transactions'][0]['item_list']['shipping_address']['state'] =  filter_input( INPUT_POST, 'state', FILTER_SANITIZE_SPECIAL_CHARS );
        		$markFlowJson = json_encode($markFlowArray);
        		$approval_url = $this->getApprovalURL($access_token, $markFlowJson). "&useraction=commit";
			}else { //Express checkout flow
				$expressCheckoutArray = json_decode($_SESSION['expressCheckoutPaymentData'], true);
           		$expressCheckoutArray['transactions'][0]['amount']['details']['subtotal'] = $_POST['camera_amount'];
           		$expressCheckoutArray['transactions'][0]['item_list']['items'][0]['price'] = $_POST['camera_amount'];
           		$expressCheckoutArray['transactions'][0]['item_list']['items'][0]['currency'] = $_POST['currencyCodeType'];
           		$expressCheckoutArray['transactions'][0]['amount']['details']['tax'] = $_POST['tax'];
           		$expressCheckoutArray['transactions'][0]['amount']['details']['insurance'] = $_POST['insurance'];
           		$expressCheckoutArray['transactions'][0]['amount']['details']['shipping'] = $_POST['estimated_shipping'];
           		$expressCheckoutArray['transactions'][0]['amount']['details']['handling_fee'] = $_POST['handling_fee'];
           		$expressCheckoutArray['transactions'][0]['amount']['details']['shipping_discount'] = $_POST['shipping_discount'];
           		$expressCheckoutArray['transactions'][0]['amount']['total'] = (float)$_POST['camera_amount'] + (float)$_POST['estimated_shipping'] + (float)$_POST['tax'] + (float)$_POST['insurance'] + (float)$_POST['handling_fee'] + (float)$_POST['shipping_discount'];
           		$expressCheckoutArray['transactions'][0]['amount']['currency'] = $_POST['currencyCodeType'];

           		$_SESSION['expressCheckoutPaymentData'] = json_encode($expressCheckoutArray);
           		$approval_url = $this->getApprovalURL($access_token, $_SESSION['expressCheckoutPaymentData']);
           	}

           	//redirect user to the Approval URL
           	header("Location:".$approval_url);
		} else {
			 die('Session expired');
		}
    }

	public function getAccessToken(){
		$curlServiceUrl = (SANDBOX_FLAG ? SANDBOX_ENDPOINT : LIVE_ENDPOINT);
		$curlServiceUrl = $curlServiceUrl. "/v1/oauth2/token";
		$clientId = (SANDBOX_FLAG ? SANDBOX_CLIENT_ID : LIVE_CLIENT_ID);
		$clientSecret = (SANDBOX_FLAG ? SANDBOX_CLIENT_SECRET : LIVE_CLIENT_SECRET);
		$curlHeader = array(
			 "Content-type" => "application/json",
			 "Authorization: Basic ". base64_encode( $clientId .":". $clientSecret),
			 "PayPal-Partner-Attribution-Id" => SBN_CODE
			 );
		$postData = array(
			 "grant_type" => "client_credentials"
			 );

		$curlPostData = http_build_query($postData);
		$curlResponse = $this->curlCall($curlServiceUrl, $curlHeader, $curlPostData);
		print_r($curlResponse); exit;
		$access_token = $curlResponse['json']['access_token'];
		//$access_token = $curlResponse['access_token'];
	    return $access_token;
	}

	/*
		* Purpose: 	Gets the PayPal approval URL to redirect the user to.
		* Inputs:
		*		access_token    : The access token received from PayPal
		* Returns:              approval URL
		*/
	public function getApprovalURL($access_token, $postData){
		$curlServiceUrl = (SANDBOX_FLAG ? SANDBOX_ENDPOINT : LIVE_ENDPOINT);
		$curlServiceUrl = $curlServiceUrl. "/v1/payments/payment";
		$curlHeader = array("Content-Type:application/json", "Authorization:Bearer ".$access_token, "PayPal-Partner-Attribution-Id:".SBN_CODE);

		$curlResponse = curlCall($curlServiceUrl, $curlHeader, $postData);
		$jsonResponse = $curlResponse['json'];

		foreach ($jsonResponse['links'] as $link) {
		//foreach ($curlResponse['links'] as $link) {
			if($link['rel'] == 'approval_url'){
				$approval_url = $link['href'];
				echo($approval_url);
				return $approval_url;
			}
		 }

	}

	/*
		* Purpose: 	Look up a payment resource, to get details about payments that have not yet been completed
		* Inputs:
		*		paymentID    : The id of the created payment
		* Returns:              the payment object
		*/
	public function lookUpPaymentDetails($paymentID, $access_token){
		$curlServiceUrl = (SANDBOX_FLAG ? SANDBOX_ENDPOINT : LIVE_ENDPOINT);
		$curlServiceUrl = $curlServiceUrl. "/v1/payments/payment/". $paymentID;
		$curlHeader = array("Content-Type:application/json", "Authorization:Bearer ".$access_token, "PayPal-Partner-Attribution-Id:".SBN_CODE);

		$curlResponse = curlCall($curlServiceUrl, $curlHeader, NULL);
		return $curlResponse['json'];

	}


	/*
		* Purpose: 	Executes the previously created payment for a given paymentID for a specific user's payer id.
		* Inputs:
		*		paymentID    : The id of the previously created PayPal payment
		*       payerID      : The id of the user received from PayPal
		*       transactionAmountArray   : amount array if updating the payment amount
		* Returns:
		*		array["http_code"]   : the http status code
		*		array["jason"]       : the response string
		*/
	public function doPayment($paymentID, $payerID, $transactionAmountArray){
		$curlServiceUrl = (SANDBOX_FLAG ? SANDBOX_ENDPOINT : LIVE_ENDPOINT);
	    $curlServiceUrl = $curlServiceUrl. "/v1/payments/payment/". $paymentID ."/execute";
	    $curlHeader = array("Content-Type:application/json", "Authorization:Bearer ".$_SESSION['access_token'], "PayPal-Partner-Attribution-Id:".SBN_CODE);

		$postData = array(
	                    "payer_id" => $payerID
	                    );

	    if(!is_null($transactionAmountArray)){
	    	$postData ["transactions"][0] = $transactionAmountArray;
	    }

	    $curlPostData = json_encode($postData);
	    $curlResponse = curlCall($curlServiceUrl, $curlHeader, $curlPostData);
	    return $curlResponse;
	}

	public function curlCall($curlServiceUrl, $curlHeader, $curlPostData) {

		// response container
		$resp = array(
			"http_code" => 0,
			"jason"     => ""
		);

		//set the cURL parameters
		$ch = curl_init($curlServiceUrl);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		//turning off the server and peer verification(TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		curl_setopt($ch, CURLOPT_SSLVERSION , 'CURL_SSLVERSION_TLSv1_2');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		//curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $curlHeader);

		if(!is_null($curlPostData)) {
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPostData);
		}
		//getting response from server
		$response = curl_exec($ch);

		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		curl_close($ch); // close cURL handler

		// some kind of an error happened
		if (empty($response)) {
			return $resp;
		}

		$resp["http_code"] = $http_code;
		$resp["json"] = json_decode($response, true);

		return $resp;
	}

	public function verify_nonce() {
		if( isset($this->request->data['csrf']) && $this->request->data['csrf'] == $this->request->session()->read('paypal.csrf') ) {
			return true;
		}
		return false;
	}

}
?>
