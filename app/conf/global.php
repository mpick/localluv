<? 

date_default_timezone_set('America/Los_Angeles');

include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/password.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/randomString.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/slugify.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/trimtowcount.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/trimtopcount.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/imageToPNG.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/get_enum_values.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/addActivity.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/relativeTime.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/fixFilesArray.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/app/functions/checkCSRF.php');


		function my_autoloader($class) {

			switch(true){

				case(file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/models/' . $class . '.php')):
				include $_SERVER['DOCUMENT_ROOT'] . '/app/models/' . $class . '.php';
				break;

				case(file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/controllers/' . $class . '.php')):
				include $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/' . $class . '.php';
				break;

				// case(file_exists($_SERVER['DOCUMENT_ROOT'] . '/app/api/' . $class . '.php')):
				// include $_SERVER['DOCUMENT_ROOT'] . '/app/api/' . $class . '.php';
				// break;




						}

		}



		spl_autoload_register('my_autoloader');



		define("SALT","MyDearSw33tBrotherNums3y666");
		define("OUTGOINGEMAIL","sendgrid@importantmedia.org");
		define("OUTGOINGEMAILPASS","s3ndgr1d99");
		define("OUTGOINGEMAILNAME","BandAid");

//$server = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : 'www.openfi.re';
$server = (isset($_SERVER['SERVER_NAME'])) ? $_SERVER['SERVER_NAME'] : 'beabandaid.co';
define ('HOSTNAME', $server);

$dsn = "mysql:dbname=production;host=localhost";
$dbuser = "root";
$dbpass = "Welcome-09";

define("EMBEDLYKEY", "92dd1679846943baa1f1a2c9611d36e0");
define("FILEPICKER_KEY", "APmnFWcYWT5G1Zv4GImDoz");


define('TWITTER_CONSUMER_KEY','JtCd38gGOkDOTvuCE2ZT1A');
define('TWITTER_CONSUMER_SECRET','Aq7cfqENTsPDEtxNAMxhhfX8kFRpX9kabu4BdT6b4g');

define('TWITTER_ACCESS_TOKEN', '565925798-uDufFnFbp4N4138EjRzg0BGbxdWCvfrwyCvD0nuZ');
define('TWITTER_ACCESS_TOKEN_SECRET', 'cVmemhawjWOGER7INjQZ5VWVQa1yTXaNDhPNgI2nEg');

define('FACEBOOK_APP_ID','557418470960477');
define('FACEBOOK_KEY', '468309289847671');
define('FACEBOOK_SECRET','b7322ab04431676963091084c15735d6');
define('WEPAY_CLIENT_ID','114857');
define('WEPAY_CLIENT_SECRET', '68b0c3f879');
define('WEPAY_ACCOUNT_ID', '1254906500');	

if (strstr($server, 'stage')) {


		define('WEPAY_ACCESS_TOKEN', 'STAGE_2dec79a8bb0c8ddf2ccc78d51ceb689221640a30a687b13beff695d7dbc50c9a');
		WePay::useStaging(WEPAY_CLIENT_ID, WEPAY_CLIENT_SECRET);

		// Production. Commented out for now.
		// define('WEPAY_CLIENT_ID','147593');
		// define('WEPAY_CLIENT_SECRET', '1e91d1ddc1');
		// define('WEPAY_ACCESS_TOKEN', '590b005d46dbbd3610e488898e778ac1f43b100dcf3ef2b6930ecd46a640cda4');
		// define('WEPAY_ACCOUNT_ID', '240546');


	define('WEPAYAPIURL', 'https://stage.wepay.com/v2/oauth2/authorize?client_id=' . WEPAY_CLIENT_ID . '&redirect_uri=http://' . $_SERVER['SERVER_NAME'] .'/wePayProjectAccountHandler/');

}else{


		// This is for dev, switch to other for prod, will handle with server check

		define('WEPAY_ACCESS_TOKEN', 'PRODUCTION_2dec79a8bb0c8ddf2ccc78d51ceb689221640a30a687b13beff695d7dbc50c9a');
		WePay::useProduction(WEPAY_CLIENT_ID, WEPAY_CLIENT_SECRET);

	define('WEPAYAPIURL', 'https://www.wepay.com/v2/oauth2/authorize?client_id=' . WEPAY_CLIENT_ID . '&redirect_uri=http://' . $_SERVER['SERVER_NAME'] .'/wePayProjectAccountHandler/');
	
}

		try {
		$dbh = new PDO($dsn, $dbuser, $dbpass);
		} catch (PDOException $e) {
		    echo 'Connection failed: ' . $e->getMessage();
		}



		function dbclean($data) {
			global $dbh;
		    return $dbh->quote(trim($data));
		}




		$embedly = new Embedly(array(
								'key' => EMBEDLYKEY,
								'user_agent' => $_SERVER['HTTP_USER_AGENT']
								));


include_once($_SERVER['DOCUMENT_ROOT'] . '/auth/OpauthStrategy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/auth/Strategy/TwitterStrategy.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/auth/Strategy/FacebookStrategy.php');

global $dbh;



?>
