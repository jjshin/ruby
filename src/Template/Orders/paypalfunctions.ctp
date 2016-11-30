<?php
	$PROXY_HOST = '127.0.0.1';
	$PROXY_PORT = '808';

	$SandboxFlag = true;

	//Credentials
	//Credentials
$API_UserName     = "businesstest_api2.rubysgifts.com";
$API_Password     = "ZC3JAETT7FF7N43Z";
$API_Signature    = "AFcWxV21C7fd0v3bYYYRCpSSRl31AvNW2Xn2rht8ONGTNfSScYy4rfRl";

	$sBNCode = "PP-ECWizard";


	//Defines redirect URLs
	if ($SandboxFlag == true)
	{
		$API_Endpoint = "https://api-3t.sandbox.paypal.com/nvp";
		$PAYPAL_URL = "https://www.sandbox.paypal.com/webscr?cmd=_express-checkout&token=";
	}
	else
	{
		$API_Endpoint = "https://api-3t.paypal.com/nvp";
		$PAYPAL_URL = "https://www.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token=";
	}

	$USE_PROXY = false;
	$version="93";

	if (session_id() == "")
		session_start();

	//When a token is recognised, an authorisation has already been made. If no token, no authorization therefore the
	//next step is to generate one for transaction authorisation.

	function CallShortcutExpressCheckout( $paymentAmount, $currencyCodeType, $paymentType, $returnURL, $cancelURL)
	{
		// Construct the parameter string that describes the SetExpressCheckout API call in the shortcut implementation
		$nvpstr="&PAYMENTREQUEST_0_AMT=". $paymentAmount;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_PAYMENTACTION=" . $paymentType;
		$nvpstr = $nvpstr . "&RETURNURL=" . $returnURL;
		$nvpstr = $nvpstr . "&CANCELURL=" . $cancelURL;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_CURRENCYCODE=" . $currencyCodeType;

		$_SESSION["currencyCodeType"] = $currencyCodeType;
		$_SESSION["PaymentType"] = $paymentType;

	//If the API call succeded, then redirect the buyer to PayPal to begin to authorize payment.
	  $resArray=hash_call("SetExpressCheckout", $nvpstr);
		$ack = strtoupper($resArray["ACK"]);
		if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")
		{
			$token = urldecode($resArray["TOKEN"]);
			$_SESSION['TOKEN']=$token;
		}

	    return $resArray;
	}

	//Prepares the parameters for the SetExpressCheckout API Call.
	function CallMarkExpressCheckout( $paymentAmount, $currencyCodeType, $paymentType, $returnURL,
									  $cancelURL, $shipToName, $shipToaddress2, $shipToCity, $shipToState,
									  $shipToCountryCode, $shipToZip, $shipToaddress22, $phoneNum
									)
	{
		// Construct the parameter string that describes the SetExpressCheckout API call in the shortcut implementation
		$nvpstr="&PAYMENTREQUEST_0_AMT=". $paymentAmount;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_PAYMENTACTION=" . $paymentType;
		$nvpstr = $nvpstr . "&RETURNURL=" . $returnURL;
		$nvpstr = $nvpstr . "&CANCELURL=" . $cancelURL;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_CURRENCYCODE=" . $currencyCodeType;
		$nvpstr = $nvpstr . "&ADDROVERRIDE=1";
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTONAME=" . $shipToName;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOaddress2=" . $shipToaddress2;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOaddress22=" . $shipToaddress22;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOCITY=" . $shipToCity;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOSTATE=" . $shipToState;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOCOUNTRYCODE=" . $shipToCountryCode;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOZIP=" . $shipToZip;
		$nvpstr = $nvpstr . "&PAYMENTREQUEST_0_SHIPTOPHONENUM=" . $phoneNum;

		$_SESSION["currencyCodeType"] = $currencyCodeType;
		$_SESSION["PaymentType"] = $paymentType;

		//If the API call succeded, then redirect the buyer to PayPal to begin to authorize payment.
	    $resArray=hash_call("SetExpressCheckout", $nvpstr);
		$ack = strtoupper($resArray["ACK"]);
		if($ack=="SUCCESS" || $ack=="SUCCESSWITHWARNING")
		{
			$token = urldecode($resArray["TOKEN"]);
			$_SESSION['TOKEN']=$token;
		}

	    return $resArray;
	}

	//Prepares the parameters for the GetExpressCheckoutDetails API Call.
    //Returns: The NVP Collection object of the GetExpressCheckoutDetails Call Response.
	function GetShippingDetails( $token )
	{
		//The buyer has completed authorizing the payment at PayPal.  The function will call PayPal to obtain the details
		//of the authorization, including any shipping information of the buyer.  Remember, the authorization is not a completed transaction
		//at this state - the buyer still needs an additional step to finalize the transaction

		//Builds a second API request to PayPal, using the token as the ID to get the details on the payment authorization
	    $nvpstr="&TOKEN=" . $token;

		//Store the results in an array. If the call was a success, show the authorization details, and provide an action to complete
		//the payment. If failed, show error.
	    $resArray=hash_call("GetExpressCheckoutDetails",$nvpstr);
	    $ack = strtoupper($resArray["ACK"]);
		if($ack == "SUCCESS" || $ack=="SUCCESSWITHWARNING")
		{
			$_SESSION['payer_id'] =	$resArray['PAYERID'];
		}
		return $resArray;
	}

	//Prepares the parameters for the GetExpressCheckoutDetails API Call.
    //Returns: The NVP Collection object of the GetExpressCheckoutDetails Call Response.

	function ConfirmPayment( $FinalPaymentAmt )
	{
		//Gather the information to make the final call to finalize the PayPal payment. The variable nvpstr
		//holds the name value pairs

		//Format the other parameters that were stored in the session from the previous calls
		$token 				= urlencode($_SESSION['TOKEN']);
		$paymentType 		= urlencode($_SESSION['PaymentType']);
		$currencyCodeType 	= urlencode($_SESSION['currencyCodeType']);
		$payerID 			= urlencode($_SESSION['payer_id']);

		$serverName 		= urlencode($_SERVER['SERVER_NAME']);

		$nvpstr  = '&TOKEN=' . $token . '&PAYERID=' . $payerID . '&PAYMENTREQUEST_0_PAYMENTACTION=' . $paymentType . '&PAYMENTREQUEST_0_AMT=' . $FinalPaymentAmt;
		$nvpstr .= '&PAYMENTREQUEST_0_CURRENCYCODE=' . $currencyCodeType . '&IPADDRESS=' . $serverName;

		 //Make the call to PayPal to finalize payment
		$resArray=hash_call("DoExpressCheckoutPayment",$nvpstr);

		//Display the API response back to the browser.
		//If the response from PayPal was a success, display the response parameters'
		//If the response was an error, display the errors received using APIError.php.
		$ack = strtoupper($resArray["ACK"]);

		return $resArray;
	}

	//This function makes a DoDirectPayment API call
	//Returns: The NVP Collection object of the DoDirectPayment Call Response.

	function DirectPayment( $paymentType, $paymentAmount, $creditCardType, $creditCardNumber,
							$expDate, $cvv2, $firstName, $lastName, $address2, $city, $state, $zip,
							$countryCode, $currencyCode )
	{
		//Construct the parameter string that describes DoDirectPayment
		$nvpstr = "&AMT=" . $paymentAmount;
		$nvpstr = $nvpstr . "&CURRENCYCODE=" . $currencyCode;
		$nvpstr = $nvpstr . "&PAYMENTACTION=" . $paymentType;
		$nvpstr = $nvpstr . "&CREDITCARDTYPE=" . $creditCardType;
		$nvpstr = $nvpstr . "&ACCT=" . $creditCardNumber;
		$nvpstr = $nvpstr . "&EXPDATE=" . $expDate;
		$nvpstr = $nvpstr . "&CVV2=" . $cvv2;
		$nvpstr = $nvpstr . "&FIRSTNAME=" . $firstName;
		$nvpstr = $nvpstr . "&LASTNAME=" . $lastName;
		$nvpstr = $nvpstr . "&address2=" . $address2;
		$nvpstr = $nvpstr . "&CITY=" . $city;
		$nvpstr = $nvpstr . "&STATE=" . $state;
		$nvpstr = $nvpstr . "&COUNTRYCODE=" . $countryCode;
		$nvpstr = $nvpstr . "&IPADDRESS=" . $_SERVER['REMOTE_ADDR'];

		$resArray=hash_call("DoDirectPayment", $nvpstr);

		return $resArray;
	}


	/**
	  '-------------------------------------------------------------------------------------------------------------------------------------------
	  * hash_call: Function to perform the API call to PayPal using API signature
	  * @methodName is name of API  method.
	  * @nvpStr is nvp string.
	  * returns an associtive array containing the response from the server.
	  '-------------------------------------------------------------------------------------------------------------------------------------------
	*/
	function hash_call($methodName,$nvpStr)
	{
		//declaring of global variables
		global $API_Endpoint, $version, $API_UserName, $API_Password, $API_Signature;
		global $USE_PROXY, $PROXY_HOST, $PROXY_PORT;
		global $gv_ApiErrorURL;
		global $sBNCode;

		//setting the curl parameters.
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$API_Endpoint);
		curl_setopt($ch, CURLOPT_VERBOSE, 1);

		//turning off the server and peer verification(TrustManager Concept).
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_POST, 1);

	    //if USE_PROXY constant set to TRUE in Constants.php, then only proxy will be enabled.
	    //Set proxy name to PROXY_HOST and port number to PROXY_PORT in constants.php
		if($USE_PROXY)
			curl_setopt ($ch, CURLOPT_PROXY, $PROXY_HOST. ":" . $PROXY_PORT);

		//NVPRequest for submitting to server
		$nvpreq="METHOD=" . urlencode($methodName) . "&VERSION=" . urlencode($version) . "&PWD=" . urlencode($API_Password) . "&USER=" . urlencode($API_UserName) . "&SIGNATURE=" . urlencode($API_Signature) . $nvpStr . "&BUTTONSOURCE=" . urlencode($sBNCode);

		//setting the nvpreq as POST FIELD to curl
		curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

		//getting response from server
		$response = curl_exec($ch);

		//convrting NVPResponse to an Associative Array
		$nvpResArray=deformatNVP($response);
		$nvpReqArray=deformatNVP($nvpreq);
		$_SESSION['nvpReqArray']=$nvpReqArray;

		if (curl_errno($ch)){
			// moving to display page to display curl errors
			  $_SESSION['curl_error_no']=curl_errno($ch) ;
			  $_SESSION['curl_error_msg']=curl_error($ch);

			  //Execute the Error handling module to display errors.
		} else {
			 //closing the curl
		  	curl_close($ch);
		}

		return $nvpResArray;
	}

	//Purpose: Redirects to PayPal.com site.
	function RedirectToPayPal ( $token )
	{
		global $PAYPAL_URL;

		// Redirect to paypal.com here
		$payPalURL = $PAYPAL_URL . $token;
		header("Location: ".$payPalURL);
		exit;
	}


	//takes NVPString and convert it to an Associative Array and it will decode the response.
	//It is usefull to search for a particular key and displaying arrays.
	function deformatNVP($nvpstr)
	{
		$intial=0;
	 	$nvpArray = array();

		while(strlen($nvpstr))
		{
			//postion of Key
			$keypos= strpos($nvpstr,'=');
			//position of value
			$valuepos = strpos($nvpstr,'&') ? strpos($nvpstr,'&'): strlen($nvpstr);

			/*getting the Key and Value values and storing in a Associative Array*/
			$keyval=substr($nvpstr,$intial,$keypos);
			$valval=substr($nvpstr,$keypos+1,$valuepos-$keypos-1);
			//decoding the respose
			$nvpArray[urldecode($keyval)] =urldecode( $valval);
			$nvpstr=substr($nvpstr,$valuepos+1,strlen($nvpstr));
	     }
		return $nvpArray;
	}

?>
