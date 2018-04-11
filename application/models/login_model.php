<?php

class LoginModel { 
	
	private $db;

	function __construct($db) {
		$this->db = $db;
	}

	function login($user_email, $user_password) {
		$query = "SELECT * FROM `users` WHERE `email` = '".$user_email."' AND `password` = '".hash(PASSWORDS_HASH, $user_password)."' LIMIT 1;";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		$_SESSION['is_logged'] = (1 == $dbh->rowCount());
		
		return $_SESSION['is_logged'];
	}
	
	function logout() {
		$_SESSION['is_logged'] = false;
	}

}
