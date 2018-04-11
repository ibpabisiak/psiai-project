<?php

class Application {
    private $url_controller = null;
    private $url_page = null;
	private $url_params = array();

    public function __construct() {
        $this->splitUrl();
		
		if(!Functions::checkLogin()) {
			
            require './application/controller/login.php';
            $login_page = new Login();
			
			if($this->url_page == null) {
				$login_page->index();
			} else {
				$login_page->{$this->url_page}();
			}
			
		} elseif($this->url_controller == null && Functions::checkLogin()) { 
			
			//default homepage
			require './application/controller/attendance.php';
            $home = new Attendance();
			$home->index();		
		
		} elseif (file_exists('./application/controller/'.$this->url_controller.'.php') && Functions::checkLogin()) {

            require './application/controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

			//pages
            if (method_exists($this->url_controller, $this->url_page)) {
                    $this->url_controller->{$this->url_page}();
            } else {
                $this->url_controller->index();
            }
			
        } else {
			
			//TODO strona ktora nie istnieje
			echo "nie istnieje";
        }
    }

    private function splitUrl() {
        if (isset($_GET['module'])) {
			$this->url_controller = $_GET['module'];
        }
		
		if(isset($_GET['page'])) {
			$this->url_page = $_GET['page'];
		}
    }
}
