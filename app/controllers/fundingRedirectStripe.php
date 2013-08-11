<?php

	class fundingRedirectStripe {


		function get() {
			global $user;
			global $dbh;
			//var_dump($user);
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
			if(!empty($_POST['rewardUUID'])) $rewardUUID = $_POST['rewardUUID'];
			$amount = $_POST['amount'] * 100; // using amounts as pennies
			require_once("/var/www/live/app/libraries/Stripe.php");
			Stripe::setApiKey('sk_test_6rQeOqjtoqvDMCFdQyGYrK0b');
			$myCard = array('number' => $_POST['cardnumber'], 'exp_month' =>  $_POST['exp-month'], 'exp_year' =>   $_POST['exp-year']);
			$charge = Stripe_Charge::create(array('card' => $myCard, 'amount' => $amount, 'currency' => 'usd'));
			$redirect_uri = "http://" . $_SERVER['SERVER_NAME'] . "/fundingComplete/" . $uuid . "/" . $user->uuid . "/" . $rewardUUID . "/" . $_POST['amount'] ;
			$redirect_uri;
			header("Location: " . $redirect_uri);
		}

	}
?>