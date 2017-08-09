

<head>
  <title>Soundcloud registration callback</title>
 <head> 
 <html>

<?php
require 'Soundcloud.php';
require 'register.php';
$soundcloud = new Services_Soundcloud('64fe4d2b2385953099064d15fb277101','8a0f50f3ffb82c629f435d3931caa186','http://abrar.site88.net/index.php');
//boolean for false
$isAuthorized = 0;

if($isAuthorized === 0){
$authURL = $soundcloud->getAuthorizeUrl();


echo "<a href = '$authURL'> <img src=\"http://connect.soundcloud.com/2/btn-connect-sc-l.png\"</img></a><br>";
echo "<br><br><br>";
}

try {
   $accessToken = $soundcloud->accessToken($_GET['code']);
   //print_r($accessToken);
   $token = json_encode($accessToken);
   $aToken = $accessToken['access_token'];
   //print_r($token);
  
   echo '<br>';
  // print_r($accessToken);
} catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
    exit($e->getMessage());
}

try {
    $me = json_decode($soundcloud->get('me'), true);
    $userID = $me['id'];
  
 if($accessToken){
    //echo $aToken;
    $isAuthorized = 1;
?>

    <form name="SITEURL" action="startApp()">
    <input type="button" value="Let's get started" onClick="startApp()" />
    </form>
    <script type="text/javascript">
      function startApp() {
          var a = "<?php echo (string)$aToken ?>";
         Android.launchMPlayer(a);
         window.onload = function(){
         document.forms('submit').SITEURL();
        }
      }
    </script>
    
  <?php
   }

    //print_r($me);

     	$registerDetails = new Register();
     	//enter UserID and see if the user is currently registered in the database
     	//if user isn't in db, then enter their userID and authToken
     	//$regDetails = $registerDetails->userExists($userID);

     //	if(!$regDetails){
	     	$registerDetails->regUser($userID);	
        //$registerDetails->createUserTable($userID);
         
      //}
	} 
	catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
    exit($e->getMessage());
	}
?>
</html>
