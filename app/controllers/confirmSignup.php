<? class confirmSignup{

function get($key){



	global $dbh;
$sth = $dbh->prepare("SELECT id FROM users where uuid='$key' limit 1");
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
if(!empty($result['id'])){

$user = new User($result['id']);
$params = array(
	"active" => "1"
	);
$user->update($params);

$msg = "<div class=\"alert-success\" style=\"text-align:center\"><br/><br /><h2 style=\"text-align:center;\">Thanks! Your account is confirmed.</h2><br /><br /><a href='/createProject' class='btn text-align-center'>Register Your Band</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href='/bands' class='btn text-align-center'>Explore Tours</a><br/><br /></div>";


}else{

$msg = "Sorry, that account could not be confirmed.";

}

$template = new Templater();
$template->load('header');
$template->title = "Confirm Signup";
$template->publish();

echo $msg;


$template = new Templater();
$template->load('footer');
$template->publish();

}

function post(){




	}

} 

?>
