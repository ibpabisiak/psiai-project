<?php

class DocumentsModel { 
	
	private $db;
	private $files;
	
	
	public function __construct($db) {
		$this->db = $db;
		$this->files = new Files($db);
	}
    



	public function AddDocument($file, $document_id, $document_notes) {
		$file_id = $this->files->AddFile($file, 3);
		
		$query = "INSERT INTO `documents`(`document_user_id`, `file_id`, `notes`) VALUES ('".$document_id."', '".$file_id."', '".$document_notes."')";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
			
		
	}

	
	
	
	public function DeleteDocument($document_id, $invoice_type) {
		$query = "SELECT * FROM `documents` WHERE `document_id` = ".$document_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		$this->files->DeleteFile($row['file_id']);
		

		$query = "DELETE FROM `documents` WHERE `document_id` = ".$document_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
	}
	
  public function LoadDocumentsList() {
        $query = "
				SELECT * FROM documents 
										JOIN files ON documents.file_id = files.id  
		";
        $dbh = $this->db->prepare($query);
        $dbh->execute();
 
		$result = "";
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
		
			$result .= "
                <tr>
                  <td>".$row['document_user_id']."</td>
                  <td>".$row['notes']."</td>
                  <td>".$row['date']."</td>
                  <td><a href=\" ".FILES_TARGET_DIR.$row['unique_filename']."\" target=\"_blank\">".$row['original_filename']."</a></td>
                  <td><a href=\"index.php?module=documents&page=delete_document&document_id=".$row['document_id']."  \">Usuń fakturę</a></td>
                  <td><a href=\"index.php?module=documents&page=edit_document&docment_id=".$row['document_id']." \">Edytuj fakturę</a></td>

                </tr>			
			";

        }
		
		return $result;
    }
	
}
