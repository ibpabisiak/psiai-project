<?php

class InvoicesModel { 
	
	private $db;
	private $files;
	
	
	public function __construct($db) {
		$this->db = $db;
		$this->files = new Files($db);
	}
	
	public function AddInvoice($file) {
		$file_id = $this->files->AddFile($file, 1);
		$query = "INSERT INTO `purchase_invoices`(`file_id`, `title`) VALUES (".$file_id.", 'jakaś faktura')";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
		//TODO other options like description about invoice etc.
	}
	
	public function DeleteInvoice($invoice_id, $invoice_type) {
		$query = "SELECT * FROM `".$invoice_type."_invoices` WHERE `id` = ".$invoice_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		$this->files->DeleteFile($row['file_id']);
		

		$query = "DELETE FROM `".$invoice_type."_invoices` WHERE `id` = ".$invoice_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
	}
}
