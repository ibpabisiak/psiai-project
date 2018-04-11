<?php

class Login extends Controller {

	public function index() {
        require 'application/views/login/login_index.tpl.php';
	}
	
	public function login_submit() {

		if(isset($_POST['email']) && isset($_POST['password'])) {
			$login_model = $this->loadModuleModel('login_model');
			
			if($login_model->login($_POST['email'], $_POST['password']))
				header("Location: index.php");
			else
				header("Location: index.php");
			
			require 'application/views/_common/header.tpl.php';
			require 'application/views/login/login_submit.tpl.php';
			require 'application/views/_common/footer.tpl.php';						
		}

	}
	
	public function logout_submit() {
		$login_model = $this->loadModuleModel('login_model');
		$login_model->logout();
	}
	
}
