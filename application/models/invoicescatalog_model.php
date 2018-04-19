<?php
 
class InvoicesCatalogModel {
   
    private $db;
    private $files;
 
    function __construct($db) {
        $this->db = $db;
        $this->files=new Files($db)
    }
 
    public function listAll() {
        $query = "SELECT * FROM 'purchase_invoices'";
        $dbh = $this->db->prepare($query);
        $dbh->execute();
 
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {
            $tableList[] = $row[0];
        }
        print_r($tableList);
 
 
 
    }
 
}
