<?php
 
class InvoicesCatalogModel {
   
    private $db;
    private $files;
 
    function __construct($db) {
        $this->db = $db;
        $this->files=new Files($db);
    }
 
    public function listAll() {
        $query = "
				SELECT * FROM invoices 
										JOIN files ON invoices.file_id = files.id  
										JOIN contractors ON invoices.contractor_id = contractors.id 
										JOIN taxes ON invoices.tax_id = taxes.id  			
		";
        $dbh = $this->db->prepare($query);
        $dbh->execute();
 
		$result = "";
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
		
			$result .= "
                <tr>
                  <td>".$row['number']."</td>
                  <td>".$row['title']."</td>
                  <td>".$row['name']."</td>
                  <td>".$row['type']."</td>
                  <td>".$row['amount_netto']."zł</td>
                  <td>".$row['amount_brutto']."zł</td>
                  <td>".$row['tax_value']."%</td>
                  <td><a href=\" ".FILES_TARGET_DIR.$row['unique_filename']."\" target=\"_blank\">".$row['original_filename']."</a></td>
                  <td><a href=\"index.php?module=invoicescatalog&page=delete_invoice&invoice_id=".$row['invoice_id']."  \">Usuń fakturę</a></td>
                  <td><a href=\"index.php?module=invoicescatalog&page=edit_invoice&invoice_id=".$row['invoice_id']."  \">Edytuj fakturę</a></td>

                </tr>			
			";

        }
		
		return $result;
    }
	
	public function DeleteInvoice($invoice_id, $invoice_type) {
		$query = "SELECT * FROM `invoices` WHERE `invoice_id` = ".$invoice_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		$this->files->DeleteFile($row['file_id']);
		

		$query = "DELETE FROM `invoices` WHERE `invoice_id` = ".$invoice_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
	}
 
}
