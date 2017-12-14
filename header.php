<?php

require_once 'config.php';
require_once 'lib/Google_Client.php';
require_once 'lib/Google_Oauth2Service.php';
include 'dbconfig.php';

$client = new Google_Client();
$client->setApplicationName("Google UserInfo PHP Starter Application");

$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URI);
$client->setApprovalPrompt(APPROVAL_PROMPT);
$client->setAccessType(ACCESS_TYPE);

$oauth2 = new Google_Oauth2Service($client);

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['token'] = $client->getAccessToken();
  echo '<script type="text/javascript">window.close();</script>'; exit;
}

if (isset($_SESSION['token'])) {
 $client->setAccessToken($_SESSION['token']);
}

if (isset($_REQUEST['error'])) {
 echo '<script type="text/javascript">window.close();</script>'; exit;
}

if ($client->getAccessToken()) {
  $user = $oauth2->userinfo->get();

  // These fields are currently filtered through the PHP sanitize filters.

  $email = filter_var($user['email'], FILTER_SANITIZE_EMAIL);
  $img = filter_var($user['picture'], FILTER_VALIDATE_URL);
  $name=$user['name'];
  $personMarkup = "$email<div><img src='$img?sz=50'></div>";

  // The access token may have been updated lazily.
  $_SESSION['token'] = $client->getAccessToken();

} else {
  $authUrl = $client->createAuthUrl();
}
?>


<!DOCTYPE html>
<html>
<head>
<title>VITLIB</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
  
<style>
.button12 {
    background-color: #e71313;
    border: none;
    color: white;
    padding: 20px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;


    border-radius: 12px;
}
</style>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/oauthpopup.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	
	 $('a.login').oauthpopup({
            path: '<?php if(isset($authUrl)){echo $authUrl;}else{ echo '';}?>',
			width:650,
			height:350,
        });
		$('a.logout').googlelogout({
			redirect_url:'<?php echo $base_url; ?>logout.php'
		});

});
</script>
</head>
<body>


<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
  <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
  <div class="w3-container">
    <h3 class="w3-padding-64"><b>VITLIB</b></h3>
  </div>
  <div class="w3-bar-block">
    <a href="index.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a> 
    <a href="materials.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Materials</a> 
    <a href="qp.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Previous questionpapers</a> 
    <a href="books.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Books</a> 
    <a href="upload.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Upload</a> 
    <a href="#request" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Request</a> 

<?if(isset($email)){
echo '<a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover white">Logout</a> 
';
}
 if(isset($authUrl)) {
  
echo '<a href="javascript:void(0)" class="w3-bar-item w3-button w3-hover white login">Login</a> '
;
}
?>
   
  </div>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
  <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>


  <span>VITLIB</span>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:340px;margin-right:40px">
