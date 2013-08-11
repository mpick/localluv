<?php

	class Payment {

		function get() {

			echo "Hi";
			$template = new Templater();
			$template->load('header');
			$template->breadcrumbs = array("/payment" => "Payment");

			$template->title = "Make a Payment";
			$template->publish();
			$template->load('payment');
			$template->publish();
			$template->load('footer');
			$template->publish();

		}

		function post()
		{
			echo "Hi";
			var_dump($_POST);
		}


	}
?>