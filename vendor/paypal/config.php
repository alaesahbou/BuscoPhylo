<?php

  //start session in all pages
  if (session_status() == PHP_SESSION_NONE) { session_start(); } //PHP >= 5.4.0
  //if(session_id() == '') { session_start(); } //uncomment this line if PHP < 5.4.0 and comment out line above

	// sandbox or live
  switch($_SESSION['paypal_trans']) {
    case 'Test';
    $pp_mode = "sandbox";
    break;

    case 'Live';
    $pp_mode = "live";
    break;
  }
  $logo = ''.$_SESSION['domain'].'images/airxend_logo.png';
	define('PPL_MODE', $pp_mode);

	if(PPL_MODE=='sandbox'){

		define('PPL_API_USER', $_SESSION['paypal_api_user']);
		define('PPL_API_PASSWORD', $_SESSION['paypal_api_pass']);
		define('PPL_API_SIGNATURE', $_SESSION['paypal_api_sign']);
	}
	else{

    define('PPL_API_USER', $_SESSION['paypal_api_user']);
		define('PPL_API_PASSWORD', $_SESSION['paypal_api_pass']);
		define('PPL_API_SIGNATURE', $_SESSION['paypal_api_sign']);
	}

	define('PPL_LANG', 'EN');

	define('PPL_LOGO_IMG', $logo);

	define('PPL_RETURN_URL', ''.$_SESSION['domain'].'/core/paypal_process');
	define('PPL_CANCEL_URL', ''.$_SESSION['domain'].'/checkout');

	define('PPL_CURRENCY_CODE', strtoupper($_SESSION['st_currency']));
