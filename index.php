<?php
//load application modules
require_once 'application/core/autoload.php';

/*
if(null == $_SESSION[USER_SESSION]) 
	echo "SESSION IS NULL <br /> <br /> <br />";
else
	echo "SESSION IS NOT NULL <br /> <br /> <br />";
*/
//start application
$app = new Application();
