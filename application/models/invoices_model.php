<?php

class InvoicesModel { 
	
	private $db;
	private $files;
	
	
	public function __construct($db) {
		$this->db = $db;
		$this->files = new Files($db);
	}

	public function AddInvoice($file, $contractor_id, $invoice_type, $invoice_name, $amount_netto, $amount_brutto, $tax_id, $invoice_number) {
		$file_id = $this->files->AddFile($file, 1);
		
		$query = "INSERT INTO `invoices`(`contractor_id`, `file_id`, `tax_id`, `type`, `title`, `number`, `amount_netto`, `amount_brutto`) 
		VALUES (".$contractor_id.", ".$file_id.", ".$tax_id.", '".$invoice_type."', '".$invoice_name."', ".$invoice_number.", 
		".$amount_netto.", ".$amount_brutto.")";

		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
		
	}
	
	public function AddContractor($contractor_name, $contractor_nip) {
		echo "xD";
		$query = "INSERT INTO `contractors`(`name`, `nip`) VALUES ('".$contractor_name."', ".$contractor_nip.")";
		$dbh = $this->db->prepare($query);
		$dbh->execute();		
	}
	
	public function LoadContractorsList() {
		$query = "SELECT * FROM `contractors`";
		$dbh = $this->db->prepare($query);
		$dbh->execute();

		$result = "";
		while($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
			
			$result .= "<option value=\"".$row['id']."\">".$row['name']." (NIP: ".$row['nip'].")</option>";
		}
		
		return $result;
	}
	
	public function LoadTaxesList() {
		$query = "SELECT * FROM `taxes`";
		$dbh = $this->db->prepare($query);
		$dbh->execute();

		$result = "";
		while($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
			
			$result .= "<option value=\"".$row['id']."\">".$row['tax_value']."%</option>";
		}
		
		return $result;
	}
}
