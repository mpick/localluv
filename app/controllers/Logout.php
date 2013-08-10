<? class Logout{

function get(){

global $user;
/*
setcookie ("user[username]", "", time() - 3600,"/","openfi.re");
setcookie ("user[key]", "", time() - 3600,"/","openfi.re");
*/
setcookie ("user[username]", "", time() - 3600,"/", HOSTNAME);
setcookie ("user[key]", "", time() - 3600,"/", HOSTNAME);

				addActivity("$user->username ($user->email) logged out");

				header("Location: " . $_SERVER['HTTP_REFERER']);

}

}
