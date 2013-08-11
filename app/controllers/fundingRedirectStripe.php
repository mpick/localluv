<?php

	class fundingRedirectStripe {


		function get() {
			echo "Hi";

		}

		function post() {
			global $user;
			global $dbh;
			$uuid = $_POST['goalUUID'];
			echo "hi";
			$sth = $dbh->prepare("SELECT id FROM goals where uuid='$uuid' limit 1");
			var_dump($uuid, $sth);
			var_dump($_POST);
			require_once("/var/www/live/app/libraries/Stripe.php");
			Stripe::setApiKey('sk_test_6rQeOqjtoqvDMCFdQyGYrK0b');
	$myCard = array('number' => '4242424242424242', 'exp_month' => 5, 'exp_year' => 2015);
	$charge = Stripe_Charge::create(array('card' => $myCard, 'amount' => 2000, 'currency' => 'usd'));
	echo $charge;
		}

	}
?>