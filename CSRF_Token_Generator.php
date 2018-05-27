<?php
//Kaveendra S.P.D
//uncomment *** marked comments if you want to see the flow of process

//session creation
session_start();
//set session variable for check user loging status
$_SESSION['LoginState'] = 'SET';

//setting a cookie for current session
$sessionID = session_id();
//***echo "Session ID->".$sessionID;
$SessionExpiry = time()+60*60*24;
setcookie('Session', $sessionID, $SessionExpiry, '', '', '', FALSE);

//CSRF Token generating process
$CSRF_TOKEN = hash('sha256', $sessionID.rand(1000,10000));

//setting a cookie for CSRF Token
//sessionID use as cookie name for csrf token for map the session id and csrf token
//**echo "session id".$sessionID;
$TokenExpiry = time()+60*60*24;
setcookie($sessionID, $CSRF_TOKEN, $TokenExpiry, '', '', '', FALSE);

header('Location: /Home.php');
?>
