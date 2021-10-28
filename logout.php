<?php
include("path.php");
include(ROOT . "/app/class/auth.php");
unset($_SESSION);
if (isset($_COOKIE['am_d']) || isset($_COOKIE['am_r']) || isset($_SESSION['id'])) {
	unset($_COOKIE);
	setcookie('am_d', "" ,time()-1, '/');
	setcookie('am_r', "" ,time()-1, '/');
}
session_destroy();
header('location: ' . WEB . 'index');