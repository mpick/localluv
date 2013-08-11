<? class fundingRedirect{


function post(){

global $user;
global $dbh;
//var_dump($_POST);
$uuid = $_POST['goalUUID'];

$sth = $dbh->prepare("SELECT id FROM goals where uuid='$uuid' limit 1");
$sth->execute();
$result = $sth->fetch(PDO::FETCH_ASSOC);
$goal = new Goal($result['id']);

$project = new Project($goal->projectID);

$rewardUUID = 0;
var_dump($_POST);
if(!empty($_POST['rewardUUID'])) $rewardUUID = $_POST['rewardUUID'];


$amount = $_POST['amount'];
$appFee = $amount * .04;
//var_dump($project);
$recipientID = $project->wePayAccountID;
$short_description = "Funding For Openfire Goal: " . $goal->name . " (Project: ". $project->title . ")";
$type = "DONATION";
$mode = "regular";
$redirect_uri = "http://" . $_SERVER['SERVER_NAME'] . "/fundingComplete/" . $goal->uuid . "/" . $user->uuid . "/" . $rewardUUID . "/" . $amount;

//     // change to useProduction for live environments
// global $server;

// if (strstr($server, 'dev')) {
// WePay::useStaging(WEPAY_CLIENT_ID, WEPAY_CLIENT_SECRET);
// }else{
// WePay::useProduction(WEPAY_CLIENT_ID, WEPAY_CLIENT_SECRET);
// }

    $stripe = new Stripe($project->wePayAccessToken);
    var_dump($wepay);
    // create the checkout
    echo "<hr>";
    var_dump($project->wePayAccountID,$amount,  $short_description, $type, $mode, $appFee, $redirect_uri);
    $response = $wepay->request('checkout/create', array(
        'account_id'        => $project->wePayAccountID,
        'amount'            => $amount,
        'short_description' => $short_description,
        'type'              => $type,
        'auto_capture'      => FALSE,
        'mode'              => $mode,
        'app_fee'           => $appFee,
        'fee_payer'         => "Payee",
        'redirect_uri'      => $redirect_uri
    ));
    var_dump($response);
    header("Location: " . $response->checkout_uri);


}


} ?>