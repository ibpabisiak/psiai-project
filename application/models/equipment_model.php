<?php

class EquipmentModel { 
	
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
				SELECT * FROM equipment 
							
		";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = "";
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {

            $result .= "
                <tr>
                  <td>" . $row['inventary_number'] . "</td>
                  <td>" . $row['description'] . "</td>
                  <td>" . $row['serial_number'] . "</td>
                  <td>" . $row['date_of_purschure'] . "</td>
                  <td>" . $row['invoice_id'] . "</td>
                  <td>" . $row['warranty'] . "</td>
                  <td>" . $row['another_note'] . "</td>
                  <td>" . $row['whos_is_equipment'] . "</td>
                  <td>" . $row['netto_value'] . "zl</td>
                </tr>			
			";

        }

        return $result;
    }
}
