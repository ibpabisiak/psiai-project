<?php

class Invoices extends Controller {

	public function index() {
        
		require 'application/views/_common/header.tpl.php';
        require 'application/views/invoices/invoices_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';		
	}
	
	public function first_page() {
		echo "hehe";
	}
	
	public function second_page() {
		echo "hehe";
	}
	
}
