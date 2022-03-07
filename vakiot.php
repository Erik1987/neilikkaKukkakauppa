<?php
$projekti = "autentikointi";
$http = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https://" : "http://";   
$local = in_array($_SERVER['REMOTE_ADDR'],array('127.0.0.1','REMOTE_ADDR' => '::1'));  
$polku = ($local) ? "http://localhost" : $http.$_SERVER['HTTP_HOST'];
$polku.= "/$projekti";
define('PATH',$polku);
?>