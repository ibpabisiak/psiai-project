<?php

class Functions {
	public static function checkLogin() {
		$result = false;
		if(isset($_SESSION['is_logged'])) {
			$result = $_SESSION['is_logged'];
		}
		return $result;
	}
}