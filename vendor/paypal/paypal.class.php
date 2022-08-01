<?php


	class MyPayPal {


		function GetItemTotalPrice($item){

			return $item['ItemPrice'] * $item['ItemQty'];
		}

		function GetProductsTotalAmount($products){

			$ProductsTotalAmount=0;

			foreach($products as $p => $item){

				$ProductsTotalAmount = $ProductsTotalAmount + $this -> GetItemTotalPrice($item);
			}

			return $ProductsTotalAmount;
		}

		function GetGrandTotal($products, $charges){

			$GrandTotal = $this -> GetProductsTotalAmount($products);

			foreach($charges as $charge){

				$GrandTotal = $GrandTotal + $charge;
			}

			return $GrandTotal;
		}

		function SetExpressCheckout($products, $charges, $noshipping='1'){


			$padata  = 	'&METHOD=SetExpressCheckout';

			$padata .= 	'&RETURNURL='.urlencode(PPL_RETURN_URL);
			$padata .=	'&CANCELURL='.urlencode(PPL_CANCEL_URL);
			$padata .=	'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE");

			foreach($products as $p => $item){

				$padata .=	'&L_PAYMENTREQUEST_0_NAME'.$p.'='.urlencode($item['ItemName']);
				$padata .=	'&L_PAYMENTREQUEST_0_NUMBER'.$p.'='.urlencode($item['ItemNumber']);
				$padata .=	'&L_PAYMENTREQUEST_0_DESC'.$p.'='.urlencode($item['ItemDesc']);
				$padata .=	'&L_PAYMENTREQUEST_0_AMT'.$p.'='.urlencode($item['ItemPrice']);
				$padata .=	'&L_PAYMENTREQUEST_0_QTY'.$p.'='. urlencode($item['ItemQty']);
			}

			$padata .=	'&NOSHIPPING='.$noshipping;

			$padata .=	'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($this -> GetProductsTotalAmount($products));

			$padata .=	'&PAYMENTREQUEST_0_TAXAMT='.urlencode($charges['TotalTaxAmount']);
			$padata .=	'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($charges['ShippinCost']);
			$padata .=	'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($charges['HandalingCost']);
			$padata .=	'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($charges['ShippinDiscount']);
			$padata .=	'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($charges['InsuranceCost']);
			$padata .=	'&PAYMENTREQUEST_0_AMT='.urlencode($this->GetGrandTotal($products, $charges));
			$padata .=	'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode(PPL_CURRENCY_CODE);


			$padata .=	'&LOCALECODE='.PPL_LANG;
			$padata .=	'&LOGOIMG='.PPL_LOGO_IMG;
			$padata .=	'&CARTBORDERCOLOR=FFFFFF';
			$padata .=	'&ALLOWNOTE=1';

			$_SESSION['ppl_products'] =  $products;
			$_SESSION['ppl_charges'] 	=  $charges;

			$httpParsedResponseAr = $this->PPHttpPost('SetExpressCheckout', $padata);

			if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){

				$paypalmode = (PPL_MODE=='sandbox') ? '.sandbox' : '';


				$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';

				header('Location: '.$paypalurl);
			}
			else{
				$_SESSION['s_error'] = "An error occured";
				header("location:../checkout");
			}
		}


		function DoExpressCheckoutPayment(){

			if(!empty(_SESSION('ppl_products'))&&!empty(_SESSION('ppl_charges'))){

				$products=_SESSION('ppl_products');

				$charges=_SESSION('ppl_charges');

				$padata  = 	'&TOKEN='.urlencode(_GET('token'));
				$padata .= 	'&PAYERID='.urlencode(_GET('PayerID'));
				$padata .= 	'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE");

				foreach($products as $p => $item){

					$padata .=	'&L_PAYMENTREQUEST_0_NAME'.$p.'='.urlencode($item['ItemName']);
					$padata .=	'&L_PAYMENTREQUEST_0_NUMBER'.$p.'='.urlencode($item['ItemNumber']);
					$padata .=	'&L_PAYMENTREQUEST_0_DESC'.$p.'='.urlencode($item['ItemDesc']);
					$padata .=	'&L_PAYMENTREQUEST_0_AMT'.$p.'='.urlencode($item['ItemPrice']);
					$padata .=	'&L_PAYMENTREQUEST_0_QTY'.$p.'='. urlencode($item['ItemQty']);
				}

				$padata .= 	'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($this -> GetProductsTotalAmount($products));
				$padata .= 	'&PAYMENTREQUEST_0_TAXAMT='.urlencode($charges['TotalTaxAmount']);
				$padata .= 	'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($charges['ShippinCost']);
				$padata .= 	'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($charges['HandalingCost']);
				$padata .= 	'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($charges['ShippinDiscount']);
				$padata .= 	'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($charges['InsuranceCost']);
				$padata .= 	'&PAYMENTREQUEST_0_AMT='.urlencode($this->GetGrandTotal($products, $charges));
				$padata .= 	'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode(PPL_CURRENCY_CODE);


				$httpParsedResponseAr = $this->PPHttpPost('DoExpressCheckoutPayment', $padata);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){

					$_SESSION['tid'] = urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]);

					if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]){

					}
					elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"]){

					}

					$this->GetTransactionDetails();
				}
				else{
					$_SESSION['s_error'] = "An error occured";
					header("location:../checkout");
				}
			}
			else{

				$this->GetTransactionDetails();
			}
		}

		function GetTransactionDetails(){

			$padata = 	'&TOKEN='.urlencode(_GET('token'));

			$httpParsedResponseAr = $this->PPHttpPost('GetExpressCheckoutDetails', $padata, PPL_API_USER, PPL_API_PASSWORD, PPL_API_SIGNATURE, PPL_MODE);

			if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])){


				require('../db/config.php');
				require_once('../const/web-info.php');
				require_once('../const/check_session.php');

				try {
				$conn = new PDO('mysql:host='.DBHost.';dbname='.DBName.';charset='.DBCharset.';collation='.DBCollation.';prefix='.DBPrefix.'', DBUser, DBPass);
			  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$stmt = $conn->prepare("SELECT * FROM tbl_transactions WHERE trans_id = ?");
				$stmt->execute([$_SESSION['tid']]);
				$result = $stmt->fetchAll();

				if (count($result) < 1) {

					$payment_id = $_SESSION['tid'];

					$plan_name = $_SESSION['new_plan'];
					$plancost = $_SESSION['plan_cost'];
					$plan_due = $_SESSION['plan_due'];
					$plan_curr = strtoupper($_SESSION['st_currency']);
					$purchase_date = date('d M Y');
					$red_link = ''.$_SESSION['domain'].'/img/'.AppLogo.'';
					$cont_link = ''.$_SESSION['domain'].'/contact/';
					$profile_page = ''.$_SESSION['domain'].'/user/';
					$vid_size = $_SESSION['max_vid_size'];

					$stmt = $conn->prepare("DELETE FROM tbl_user_plans WHERE user = ?");
					$stmt->execute([$user_id]);

					$stmt = $conn->prepare("INSERT INTO tbl_user_plans (user, plan_name, purchase_date, expire_date, max_size) VALUES (?,?,?,?,?)");
				  $stmt->execute([$user_id, $plan_name, $purchase_date, $plan_due, $vid_size]);

					$stmt = $conn->prepare("INSERT INTO tbl_transactions (trans_id, user, description, ammount, currency, purchase_date) VALUES (?,?,?,?,?,?)");
					$stmt->execute([$payment_id, $user_id, $plan_name, $plancost, $plan_curr, $purchase_date]);

					if ($_SESSION['discounted'] == "1") {
						$stmt = $conn->prepare("INSERT INTO tbl_used_coupons (coupon, user) VALUES (?,?)");
						$stmt->execute([$_SESSION['discount_code'], $user_id]);

						$stmt = $conn->prepare("UPDATE tbl_coupons SET usage_c = usage_c + 1 WHERE id = ?");
						$stmt->execute([$_SESSION['discount_code_id']]);
					}

					if ($_SESSION['discounted'] == "1") {
					unset($_SESSION['discount_code_id']);
					unset($_SESSION['discount_code']);
					}

					header("location:receipt");

				}else{
					$_SESSION['s_error'] = "An error occured";
					header("location:../checkout");
				}

				}catch(PDOException $e)
		    {
		    echo "Connection failed: " . $e->getMessage();
		    }


			}
			else  {

				$_SESSION['s_error'] = "An error occured";
				header("location:../checkout");

			}
		}

		function PPHttpPost($methodName_, $nvpStr_) {

				// Set up your API credentials, PayPal end point, and API version.
				$API_UserName = urlencode(PPL_API_USER);
				$API_Password = urlencode(PPL_API_PASSWORD);
				$API_Signature = urlencode(PPL_API_SIGNATURE);

				$paypalmode = (PPL_MODE=='sandbox') ? '.sandbox' : '';

				$API_Endpoint = "https://api-3t".$paypalmode.".paypal.com/nvp";
				$version = urlencode('109.0');

				// Set the curl parameters.
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $API_Endpoint);
				curl_setopt($ch, CURLOPT_VERBOSE, 1);
				//curl_setopt($ch, CURLOPT_SSL_CIPHER_LIST, 'TLSv1');

				// Turn off the server and peer verification (TrustManager Concept).
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);

				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch, CURLOPT_POST, 1);

				// Set the API operation, version, and API signature in the request.
				$nvpreq = "METHOD=$methodName_&VERSION=$version&PWD=$API_Password&USER=$API_UserName&SIGNATURE=$API_Signature$nvpStr_";

				// Set the request as a POST FIELD for curl.
				curl_setopt($ch, CURLOPT_POSTFIELDS, $nvpreq);

				// Get response from the server.
				$httpResponse = curl_exec($ch);

				if(!$httpResponse) {
					exit("$methodName_ failed: ".curl_error($ch).'('.curl_errno($ch).')');
				}

				// Extract the response details.
				$httpResponseAr = explode("&", $httpResponse);

				$httpParsedResponseAr = array();
				foreach ($httpResponseAr as $i => $value) {

					$tmpAr = explode("=", $value);

					if(sizeof($tmpAr) > 1) {

						$httpParsedResponseAr[$tmpAr[0]] = $tmpAr[1];
					}
				}

				if((0 == sizeof($httpParsedResponseAr)) || !array_key_exists('ACK', $httpParsedResponseAr)) {

					exit("Invalid HTTP Response for POST request($nvpreq) to $API_Endpoint.");
				}

			return $httpParsedResponseAr;
		}
	}
