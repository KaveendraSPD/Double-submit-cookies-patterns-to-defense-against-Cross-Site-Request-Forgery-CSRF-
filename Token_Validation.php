<?php
//Kaveendra S.P.D
//uncomment *** marked comments if you want to see the flow of process
//***echo "<script> alert('token validation point called '); </script>";
session_start();
//check user login status
if (!isset ($_SESSION['LoginState'])){
    ob_start();
    header('Location: /login.html');
    ob_end_flush();
    die();
}
//getting user submitted CSRF Token
$userCSRF = $_POST['MyToken'];
//getting CSRF token form original cookie
$sessionid = session_id();
$cookieCSRF = $_COOKIE[$sessionid];

//compare user submitted CSRF token with  original CSRF token
if ($userCSRF == $cookieCSRF){
  $_SESSION['status'] = "Details submitted!!! ";
  setcookie("Details",$_POST['u_name'].",".$_POST['p_number']);
}else{
  $_SESSION['status'] = "Invalid Token!!!";
  setcookie("Details","".","."");
}
header('Location: /Data_Receiving_End_Point.php');
?>
