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
//getting user submitted CSRF Token value
$userCSRF = $_POST['MyToken'];
//getting user submitted CSRF token cookie
$cookieCSRF = $_POST['CSRFcookie'];
$cookieValue = $_COOKIE[$cookieCSRF];

//compare user submitted CSRF token with  user submitted cookie's value
if ($userCSRF == $cookieValue){
  $_SESSION['status'] = "Details submitted!!! ";
  setcookie("Details",$_POST['u_name'].",".$_POST['p_number']);
}else{
  $_SESSION['status'] = "Invalid Token!!!";
  setcookie("Details","".","."");
}
header('Location: /Data_Receiving_End_Point.php');
?>
