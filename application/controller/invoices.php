<?php

class Invoices extends Controller {

	private $invoice_type = 'sales'; //TODO jakies lepsze rozwiazanie do tego albo rozbic to na 2 moduly;

	public function index() {

		$invoices_model = $this->loadModuleModel('invoices_model');
		$contractors_list = $invoices_model->LoadContractorsList();
		$taxes_list = $invoices_model->LoadTaxesList();

		require 'application/views/_common/header.tpl.php';
        require 'application/views/invoices/invoices_index.tpl.php';
        require 'application/views/_common/footer.tpl.php';
	}

	public function add_invoice() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoices')) {
            $invoices_model = $this->loadModuleModel('invoices_model');
            //if(isset($_POST['invoice_name']) && isset($_POST['amount_netto']) && isset($_POST['amount_brutto'])) {

            $a_file = 0;
            $a_type = 0;
            $a_name = 0;
            $a_netto = 0;
            $a_brutto = 0;
            $a_tax = 0;
            $a_number = 0;



            if (empty($_POST['fileToUpload'])) {
                $aa_file = 1;
            } else {
                $aa_file = 0;
            }

            if (empty($_POST['invoice_type'])) {
                $aa_type = 1;
            } else {
                $aa_type = 0;
            }

            if (empty($_POST['contractor_id'])) {
                $aa_contractor = 1;
            } else {
                $aa_contractor = 0;
            }


            if (empty($_POST['invoice_name'])) {
                $name = $_POST['invoice_name'];
                $a_name = preg_match('/^([a-z|A-Z|0-9]{3,20))&/', $name);
                $aa_name = 1;
            } else {
                $aa_name = 0;
            }


            if(empty($_POST['invoice_number'])) {
                $number = $_POST['invoice_number'];

                if (preg_match('/^([0-9]{1,15})&/', $number)) {
                    $aa_number = 0;
                } else {
                    $aa_number = 1;
                }
            } else{
                $aa_number = 1;
            }

            if(empty($_POST['amount_netto'])) {
                $netto = $_POST['amount_netto'];
                if (preg_match('/^([0-9]{0,5}\\,([0-9]{0-2}))&/', $netto)) {
                    $aa_netto = 0;
                } else {
                    $aa_netto = 1;
                }
            }else{ $aa_netto = 1;
            }

            if(empty($_POST['amount_brutto'])) {
                $brutto = $_POST['amount_brutto'];
                if (preg_match('/^([0-9]{0,5}\\,([0-9]{0-2}))&/', $brutto)) {
                    $aa_brutto = 0;
                } else {
                    $aa_brutto = 1;
                }
            }else{
                $aa_brutto = 1;
            }


            if(empty($_POST['tax_id'])) {
                $aa_tax = 0;
            } else { $aa_tax = 1; }


            if (  ($aa_type == 0) && ($aa_name ==0) && ($aa_netto==0) && ($aa_brutto==0) && ($aa_tax==0) && ($aa_number ==0) && ($aa_contractor ==0)){
				$invoices_model->AddInvoice(
					$_FILES["fileToUpload"],
					$_POST['contractor_id'],
					$_POST['invoice_type'],
					$_POST['invoice_name'],
					$_POST['amount_netto'],
					$_POST['amount_brutto'],
					$_POST['tax_id'],
					$_POST['invoice_number']
				);
			} else {
                require 'application/views/_common/header.tpl.php';
                require 'application/views/invoices/invoices_validation.tpl.php';
                require 'application/views/_common/footer.tpl.php';
            }


		} else {
			exit("Nie masz do tego uprawnień");
		}

	}


	public function add_new_contractor() {
		if(Functions::GetUserSession()->IsEntitledToWrite('invoices')) {
			if(isset($_POST['contracotr_nip']) && isset($_POST['contractor_name'])) {
				$invoices_model = $this->loadModuleModel('invoices_model');
				$invoices_model->AddContractor($_POST['contractor_name'], $_POST['contracotr_nip']);
				header("Location: index.php?module=invoices");
			} else {
				
			}
		} else {
			exit("Nie masz do tego uprawnień");
		}
		
	}
	
}
