<?php
session_start();
$_SESSION['usuario']=NULL;
require_once( 'Facebook/FacebookSession.php' );
require_once( 'Facebook/FacebookRedirectLoginHelper.php' );
require_once( 'Facebook/FacebookRequest.php' );
require_once( 'Facebook/FacebookResponse.php' );
require_once( 'Facebook/FacebookSDKException.php' );
require_once( 'Facebook/FacebookRequestException.php' );
require_once( 'Facebook/FacebookAuthorizationException.php' );
require_once( 'Facebook/GraphObject.php' );
require_once( 'Facebook/GraphUser.php' );
require_once( 'Facebook/Entities/AccessToken.php' );
require_once( 'Facebook/HttpClients/FacebookHttpable.php' );
require_once( 'Facebook/HttpClients/FacebookCurlHttpClient.php' );
require_once( 'Facebook/HttpClients/FacebookCurl.php' ); 

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookRequestException;
use Facebook\FacebookAuthorizationException;
use Facebook\GraphObject;
use Facebook\GraphUser;
use Facebook\Entities\AccessToken;
use Facebook\HttpClients\FacebookHttpable;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Facebook\HttpClients\FacebookCurl; 

// init app with app id (APPID) and secret (SECRET)
FacebookSession::setDefaultApplication('774701729271489', '01870b9b6f19ae71b847f25120f35d07');

// login helper with redirect_uri
$helper = new FacebookRedirectLoginHelper( 'http://localhost/vistaFacebook/facebook.php' );

try {

  $session = $helper->getSessionFromRedirect();
} catch( FacebookRequestException $ex ) {
  // When Facebook returns an error
} catch( Exception $ex ) {
  // When validation fails or other local issues
}

// see if we have a session
if ( isset( $session ) ) {
try {

    $user_profile = (new FacebookRequest(
      $session, 'GET', '/me'
    ))->execute()->getGraphObject(GraphUser::className());
include_once '../modelo/ModeloLog.php';
include_once '../modelo/connect.php';

$objeto=new ModeloLog();
$objconnect = new Connect();

$user=$objeto->consultarUsuarioglobal($user_profile->getName());
if($user==NULL){	
$objeto->insertarUsuarioglobal($user_profile->getName(),$user_profile->getName(),$user_profile->getName(),$user_profile->getName(), $user_profile->getName());
$_SESSION['usuario']=$user_profile->getName();	 
echo '<script language="javascript" type="text/javascript">

location.href="../vistas/informatica.php";
</script>';
}  else {
   $_SESSION['usuario']=$user_profile->getName();	 
echo '<script language="javascript" type="text/javascript">

location.href="../vistas/informatica.php";
</script>'; 
}

  } catch(FacebookRequestException $e) {

    echo "Exception occured, code: " . $e->getCode();
    echo " with message: " . $e->getMessage();

  }}   
 else {
  // show login url
  echo '<a href="' . $helper->getLoginUrl() . '">Login</a>';
}
?>