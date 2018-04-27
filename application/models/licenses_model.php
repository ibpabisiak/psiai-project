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
                  <td><a href=\"index.php?module=licenses&page=edit_licenses&invoice_id=" . $row['id_invoice'] . "  \">Edytuj licencje</a></td>
                </tr>			
			";

        }

        return $result;
    }



    public function GetlicensesData($id_invoice)
    {
        $query = "SELECT * FROM `licenses` WHERE `id_invoice` = " . $id_invoice . " ";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = array();
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
            $result['inventary_number'] = $row['inventary_number'];
            $result['serial_number'] = $row['serial_number'];
            $result['description'] = $row['description'];
            $result['id_invoice'] = $row['id_invoice'];
            $result['technical_support'] = $row['technical_support'];
            $result['licenses_till'] = $row['licenses_till'];
            $result['another_note'] = $row['another_note'];
            $result['whos_is_licenses'] = $row['whos_is_licenses'];
        }
        return $result;
    }


    public function Updatelicenses($dbh, $inventary_number, $serial_number, $description, $id_invoice, $technical_support, $licenses_till, $another_note, $whos_is_licenses)
    {

        /*
                $dbh = $this->db->query("UPDATE `invoices` SET

        `contractor_id` = $contractor_id,
        `file_id` =  $file_id ,
        `tax_id` = $tax_id,
        `type` = $type,
        `title` = $title,
        `number` = $number,
        `amount_netto` = $amount_netto ,
        `amount_brutto` = $amount_brutto WHERE `invoice_id`= `9` ");*/


        $dbh = $this->db->prepare("UPDATE `invoices` SET `inventary_number` = :?,`serial_number` = :? ,`description` = ?,`id_invoice` = :?,
                                  `technical_support` = :?,`licenses_till` =:?,`amount_netto` =:? , `another_note` = :?, `whos_is_licenses` = :? WHERE `invoice_id`=120 ");

        bindValue(':inventary_number', $inventary_number, PDO::PARAM_STR);
        bindValue(':serial_number', $serial_number, PDO::PARAM_STR);
        bindValue(':description', $description, PDO::PARAM_STR);
        bindValue(':id_invoice', $id_invoice, PDO::PARAM_STR);
        bindValue(':technical_support', $technical_support, PDO::PARAM_STR);
        bindValue(':licenses_till', $licenses_till, PDO::PARAM_STR);
        bindValue(':another_note', $another_note, PDO::PARAM_STR);
        bindValue(':whos_is_licenses', $whos_is_licenses, PDO::PARAM_STR);



        $dbh->execute();




        /*
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
        }
        $result = "UPDATE DB_NAME SET
        " . $row['contractor_id'] . " = $contractor_id,
        " . $row['file_id'] . " = $file_id,
        " . $row['tax_id'] . " = $tax_id,
        " . $row['type'] . " = $type,
        " . $row['title'] . " = $title,
        " . $row['number'] . " = $number,
        " . $row['amount_netto'] . " = $amount_netto,
        " . $row['amount_brutto'] . " = &amount_brutto,
        ";

    }
    */


    }













}



