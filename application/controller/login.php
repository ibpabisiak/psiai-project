<?php

class Login extends Controller {

	public function index() {
        
		require 'application/views/_common/header.php';
        require 'application/views/login/login_index.php';
        require 'application/views/_common/footer.php';		
	}
	
	public function first_page() {
		echo "hehe";
	}
	
	public function second_page() {
		echo "hehe";
	}
	
}
