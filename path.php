<?php
require 'app/helpers/validation.php';
define("ROOT", realpath(dirname(__FILE__)));
define("WEB", 'http://localhost/'.explode("/",Err::url("a"))[3].'/');
?>