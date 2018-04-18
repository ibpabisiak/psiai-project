<?php

class Application {
    private $url_controller = null;
    private $url_page = null;
	private $url_params = array();

    public function __construct() {
        $this->splitUrl();
		
		if(!Functions::IsLogged()) {
			
            $login_page = new Login();
			
			if($this->url_page == null) {
				$login_page->index();
			} else {
				$login_page->{$this->url_page}();
			}
			
		} elseif (file_exists('./application/controller/'.$this->url_controller.'.php') 
					&& Functions::GetUserSession()->IsEntitledToRead($this->url_controller)) {

            require_once './application/controller/' . $this->url_controller . '.php';
            $this->url_controller = new $this->url_controller();

			//pages
            if (method_exists($this->url_controller, $this->url_page)) {
                    $this->url_controller->{$this->url_page}();
            } else {
                $this->url_controller->index();
            }
			
        } else {
			
			//TODO strona ktora nie istnieje
			echo "Ta strona nie istnieje lub nie masz uprawnień głąbie";
        }
    }

    private function splitUrl() {
        if (isset($_GET['module'])) {
			$this->url_controller = $_GET['module'];
        } 

		if(null == $this->url_controller) {
			$this->url_controller = HOMEPAGE_MODULE;
		}
		
		if(isset($_GET['page'])) {
			$this->url_page = $_GET['page'];
		}
    }
}
