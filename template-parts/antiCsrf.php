<?php
if(isset($_SESSION)) {
	$_SESSION['lastCsrfToken'] = $_SESSION['CsrfToken'];
	$_SESSION['CsrfToken'] = md5(rand(1000000,9999999).time().'mySalt');
}
