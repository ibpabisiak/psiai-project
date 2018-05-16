<?php

class EquipmentModel { 
	
	 private $db;
    private $files;

    function __construct($db)
    {
        $this->db = $db;
        $this->files = new Files($db);
    }


	public function add_equipment($inventary_number,$description,$serial_number,$date,$warranty,$netto_value,$another_note) {
		$query = "INSERT INTO `equipment`(`inventary_number`, `description`, `serial_number`, `date_of_purschure`, `invoice_id`, `warranty`, `whos_is_equipment`, `another_note`, `netto_value`) 
		VALUES ('".$inventary_number."','".$description."','".$serial_number."','".$date."','0','".$warranty."','0','".$another_note."','".$netto_value."')";
		$this->db->query($query);
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
                  <td>" . $row['netto_value'] . "zl</td>
                  <td>" . $row['whos_is_equipment'] . "</td>
                  <td>" . $row['another_note'] . "</td>
                  <td><a href=\"index.php?module=equipment&page=delete_equipment&eq_id=" . $row['eq_id'] . "  \">Usuń</a></td>
                  <td><a href=\"index.php?module=equipment&page=edit_equipment&invoice_id=" . $row['invoice_id'] . "  \">Edytuj</a></td>
                </tr>			
			";

        }

        return $result;
    }



    public function GetEquipmentData($invoice_id)
    {
        $query = "SELECT * FROM `equipment` WHERE `invoice_id` = " . $invoice_id . " ";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = array();
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
            $result['inventary_number'] = $row['inventary_number'];
            $result['description'] = $row['description'];
            $result['serial_number'] = $row['serial_number'];
            $result['date_of_purschure'] = $row['date_of_purschure'];
            $result['nvoice_id'] = $row['invoice_id'];
            $result['warranty'] = $row['warranty'];
            $result['another_note'] = $row['another_note'];
            $result['whos_is_equipment'] = $row['whos_is_equipment'];
            $result['netto_value'] = $row['netto_value'];
        }
        return $result;
    }


    public function UpdateEquipment($dbh, $inventary_number, $description, $serial_number,
                                    $date_of_purschure, $invoice_id, $warranty, $another_netto, $whos_is_equipment, $netto_value)
    {


        $dbh = $this->db->prepare("UPDATE `invoices` SET `inventary_number` = :?,`description = :? ,`serial_number` = ?,`date_of_purschure` = :?,
                                  `invoice_id` = :?,`number` =:?,`warranty` =:? , `another_netto` = :?, `whos_is_equipment` = :?, `netto_value` = :? WHERE `invoice_id`=9 ");

        bindValue(':inventary_number', $inventary_number, PDO::PARAM_STR);
        bindValue(':description', $description, PDO::PARAM_STR);
        bindValue(':serial_number',  $serial_number, PDO::PARAM_STR);
        bindValue(':date_of_purschure', $date_of_purschure, PDO::PARAM_STR);
        bindValue(':invoice_id', $invoice_id, PDO::PARAM_STR);
        bindValue(':warranty', $warranty, PDO::PARAM_STR);
        bindValue(':amount_netto',  $another_netto, PDO::PARAM_STR);
        bindValue(':whos_is_equipment',$whos_is_equipment, PDO::PARAM_STR);
        bindValue(':netto_value',$netto_value, PDO::PARAM_STR);



        $dbh->execute();





    }









}
