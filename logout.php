<?php
session_start();
if (!isset($_SESSION['userRoleID'])) {
    header("location:login.php");
    exit();
}else{
    $_SESSION = array();
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time()-42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]);
    if (session_status() == PHP_SESSION_ACTIVE) {
        session_destroy(); } // Destroy the session itself
    header("location:login.php");
}
