<?php

	class fundingRedirectStripe {


		function get() {
			global $user;
			global $dbh;
			$uuid = $_GET['goalUUID'];
			$sth = $dbh->prepare("SELECT id FROM goals where uuid='$uuid' limit 1");
			$sth->execute();
			$result = $sth->fetch(PDO::FETCH_ASSOC);
			$template = new Templater();
			$project = new Project($result['id']);
			$template->load('header');
			$template->title = $project->title;
			$template->breadcrumbs = array("/projects" => "Projects", "/projects/" . $project->slug => $project->title);
			$template->name = $user->firstName . ' ' . $user->lastName;
			$template->email = $user->email;
			$template->publish();
			$template->load('stripeform');
			$template->publish();
			$template->load('footer');
			$template->publish();


		}

		function post() {
			global $user;
			global $dbh;
			$uuid = $_POST['goalUUID'];
			$sth = $dbh->prepare("SELECT id FROM goals where uuid='$uuid' limit 1");
			$rewardUUID = 0;
			$email = $user->email;
			$userid = $user->id;
			if(!empty($_POST['rewardUUID'])) $rewardUUID = $_POST['rewardUUID'];
			$amount = $_POST['amount'] * 100; // using amounts as pennies
			require_once("/var/www/live/app/libraries/Stripe.php");
			//Production key
			Stripe::setApiKey('sk_live_60HJUnfkWIr20wxDntt8P1kk');
			//Testing Key
			//Stripe::setApiKey('sk_test_6rQeOqjtoqvDMCFdQyGYrK0b');
			$myCard = array('number' => $_POST['cardnumber'], 'exp_month' =>  $_POST['exp-month'], 'exp_year' =>   $_POST['exp-year']);
			$charge = Stripe_Charge::create(array('card' => $myCard, 'amount' => $amount, 'currency' => 'usd', 'description' => $email));
			/*
			https://stripe.com/docs/api#customer_object
				You can also create a Customer in Stripe which stores used credit cards and customer information. That Customer has an Id from Stripe and you could store that into our database.
			*/
			$redirect_uri = "http://" . $_SERVER['SERVER_NAME'] . "/fundingComplete/" . $uuid . "/" . $user->uuid . "/" . $rewardUUID . "/" . $_POST['amount'] . "?checkout_id=" .  $charge->id;
			header("Location: " . $redirect_uri);
		}

	}
?>