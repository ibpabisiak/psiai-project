<?php

class DocumentsModel { 
	
	private $db;

	function __construct($db) {
		$this->db = $db;
	}




    public function GetDocumentsData($invoice_id)
    {
        $query = "SELECT * FROM `documents` WHERE `invoice_id` = " . $invoice_id . " ";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = array();
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
            $result['document_user_id '] = $row['document_user_id '];
            $result['file_id'] = $row['file_id'];
            $result['notes'] = $row['notes'];
            $result['date'] = $row['date'];
        }
        return $result;
    }


    public function UpdateDocuments($dbh, $document_user_id , $file_id , $notes, $date )
    {
        $dbh = $this->db->prepare("UPDATE `invoices` SET `document_user_id ` = :?,`file_id` = :? ,`notes` = ?,`date` = :?,
                                   WHERE `invoice_id`=1 ");

        bindValue(':contractor_id', $document_user_id , PDO::PARAM_STR);
        bindValue(':file_id', $file_id, PDO::PARAM_STR);
        bindValue(':notes', $notes, PDO::PARAM_STR);
        bindValue(':date', $date, PDO::PARAM_STR);




        $dbh->execute();



    }







}



