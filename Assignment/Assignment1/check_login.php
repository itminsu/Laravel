<?php
require_once("check_login.php");
session_start();
if(!isset($_SESSION["userName"])) {
    echo '<script language="javascript">';
    echo 'alert("This service is available an authorized user only");';
    echo 'window.location.href="index.html";';
    echo '</script>';
}
?>
