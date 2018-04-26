<?php

class LicensesModel { 
	
	 private $db;
    private $files;

    function __construct($db)
    {
        $this->db = $db;
        $this->files = new Files($db);
    }

    public function listAll()
    {
        $query = "
				SELECT * FROM licenses 
							
		";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = "";
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {

            $result .= "
                <tr>
                  <td>" . $row['inventary_number'] . "</td>
                  <td>" . $row['serial_number'] . "</td>
                  <td>" . $row['description'] . "</td>
                  <td>" . $row['id_invoice'] . "</td>
                  <td>" . $row['technical_support'] . "</td>
                  <td>" . $row['licenses_till'] . "</td>
                  <td>" . $row['another_note'] . "</td>
                  <td>" . $row['whos_is_licenses'] . "</td>
                </tr>			
			";

        }

        return $result;
    }
}



