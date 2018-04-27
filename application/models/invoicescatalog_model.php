<?php
 
class InvoicesCatalogModel
{

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
                  <td>" . $row['number'] . "</td>
                  <td>" . $row['title'] . "</td>
                  <td>" . $row['name'] . "</td>
                  <td>" . $row['type'] . "</td>
                  <td>" . $row['amount_netto'] . "zł</td>
                  <td>" . $row['amount_brutto'] . "zł</td>
                  <td>" . $row['tax_value'] . "%</td>
                  <td><a href=\" " . FILES_TARGET_DIR . $row['unique_filename'] . "\" target=\"_blank\">" . $row['original_filename'] . "</a></td>
                  <td><a href=\"index.php?module=invoicescatalog&page=delete_invoice&invoice_id=" . $row['invoice_id'] . "  \">Usuń fakturę</a></td>
                  <td><a href=\"index.php?module=invoicescatalog&page=edit_invoice&invoice_id=" . $row['invoice_id'] . "  \">Edytuj fakturę</a></td>

                </tr>			
			";

        }

        return $result;
    }

    public function DeleteInvoice($invoice_id, $invoice_type)
    {
        $query = "SELECT * FROM `invoices` WHERE `invoice_id` = " . $invoice_id . " LIMIT 1";
        $dbh = $this->db->prepare($query);
        $dbh->execute();
        $row = $dbh->fetch(PDO::FETCH_ASSOC);
        $this->files->DeleteFile($row['file_id']);


        $query = "DELETE FROM `invoices` WHERE `invoice_id` = " . $invoice_id . " LIMIT 1";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

    }


    public function GetInvoiceData($invoice_id)
    {
        $query = "SELECT * FROM `invoices` WHERE `invoice_id` = " . $invoice_id . " ";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = array();
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
            $result['contractor_id'] = $row['contractor_id'];
            $result['file_id'] = $row['file_id'];
            $result['tax_id'] = $row['tax_id'];
            $result['type'] = $row['type'];
            $result['invoice_number'] = $row['number'];
            $result['title'] = $row['title'];
            $result['amount_netto'] = $row['amount_netto'];
            $result['amount_brutto'] = $row['amount_brutto'];
        }
        return $result;
    }


    public function UpdateInvoice($dbh, $file_id, $id, $contractor_id, $type, $title, $amount_netto, $amount_brutto, $tax_id, $number)
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


        $dbh = $this->db->prepare("UPDATE `invoices` SET `contractor_id` = :?,`file_id` = :? ,`tax_id` = ?,`type` = :?,
                                  `title` = :?,`number` =:?,`amount_netto` =:? , `amount_brutto` = :? WHERE `invoice_id`=9 ");

        bindValue(':contractor_id', $contractor_id, PDO::PARAM_STR);
        bindValue(':file_id', $file_id, PDO::PARAM_STR);
        bindValue(':tax_id', $tax_id, PDO::PARAM_STR);
        bindValue(':type', $type, PDO::PARAM_STR);
        bindValue(':title', $title, PDO::PARAM_STR);
        bindValue(':numer', $number, PDO::PARAM_STR);
        bindValue(':amount_netto', $amount_netto, PDO::PARAM_STR);
        bindValue(':amount_brutto', $amount_brutto, PDO::PARAM_STR);



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