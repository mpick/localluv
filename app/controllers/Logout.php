<? class Logout{

function get(){

global $user;
/*
setcookie ("user[username]", "", time() - 3600,"/","openfi.re");
setcookie ("user[key]", "", time() - 3600,"/","openfi.re");
*/
	setcookie ("user[username]", "", time() - 3600,"/", $_SERVER['SERVER_NAME']);
	setcookie ("user[key]", "", time() - 3600,"/", $_SERVER['SERVER_NAME']);
	addActivity("$user->username ($user->email) logged out");
	header("Location: " . "http://" . $_SERVER['SERVER_NAME']);

}

}
