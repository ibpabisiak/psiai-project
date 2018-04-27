<?php

class LicensesModel { 
	
	 private $db;
    private $files;

    function __construct($db)
    {
        $this->db = $db;
        $this->files = new Files($db);
    }



	public function AddLicense($file, $description, $serial_number, $technical_support, $licenses_till, $whos_is_licenses, $another_note ) {
		
		$file_id = $this->files->AddFile($file, 4);
		
		$query = "INSERT INTO `licenses`(`inventary_number`, `file_id`, `description`, `serial_number`, `id_invoice`, `technical_support`, `licenses_till`, `whos_is_licenses`, `another_note`) 
		VALUES (1, '".$file_id."', '".$description."', '".$serial_number."', '1', '".$technical_support."', '".$licenses_till."', '".$whos_is_licenses."', '".$another_note."')";
		echo $query;
		$dbh = $this->db->prepare($query);
		$dbh->execute();
			
		
	}

	public function DeleteLicense($license_id, $invoice_type) {
		$query = "SELECT * FROM `licenses` WHERE `license_id` = ".$license_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		$row = $dbh->fetch(PDO::FETCH_ASSOC);
		$this->files->DeleteFile($row['file_id']);
		

		$query = "DELETE FROM `licenses` WHERE `license_id` = ".$license_id." LIMIT 1";
		$dbh = $this->db->prepare($query);
		$dbh->execute();
		
	}	
	
    public function listAll()
    {
        $query = "
				SELECT * FROM licenses 
										JOIN files ON licenses.file_id = files.id  
							
		";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = "";
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {

            $result .= "
                <tr>
                  <td>" . $row['license_id'] . "</td>
                  <td>" . $row['serial_number'] . "</td>
                  <td>" . $row['description'] . "</td>
                  <td>" . $row['id_invoice'] . "</td>
                  <td>" . $row['technical_support'] . "</td>
                  <td>" . $row['licenses_till'] . "</td>
                  <td>" . $row['another_note'] . "</td>
                  <td>" . $row['whos_is_licenses'] . "</td>
                  <td><a href=\" ".FILES_TARGET_DIR.$row['unique_filename']."\" target=\"_blank\">".$row['original_filename']."</a></td>
                  <td><a href=\"index.php?module=licenses&page=delete_license&license_id=".$row['license_id']."  \">Usuń fakturę</a></td>
                  <td><a href=\"index.php?module=licenses&page=edit_license&license_id=".$row['license_id']." \">Edytuj fakturę</a></td>
                </tr>			
			";

        }

        return $result;
    }
}



