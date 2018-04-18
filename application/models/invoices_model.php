<?php

class InvoicesModel { 
	
	private $db;
	private $files;
	
	
	public function __construct($db) {
		$this->db = $db;
		$this->files = new Files($db);
	}
	
	public function AddInvoice($file) {
		$this->files->AddFile($file, 1);
		//TODO other options like description about invoice etc.
	}
}
