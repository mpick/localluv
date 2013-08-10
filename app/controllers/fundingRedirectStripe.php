<?php

	class fundingRedirectStripe {

		function post() {

		var_dump($_POST);
		//require_once("/var/www/live/libraries/Stripe.php");
		/*Stripe::setApiKey('d8e8fca2dc0f896fd7cb4cb0031ba249');
$myCard = array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015);
$charge = Stripe_Charge::create(array('card' => $myCard, 'amount' => 2000, 'currency' => 'usd'));
echo $charge;*/
		}

	}
?>