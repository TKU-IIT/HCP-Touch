<?php

session_start();

echo $_SESSION['message'];

//清除session
$_SESSION = array();
session_destroy();

?>