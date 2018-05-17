<?php

class Equipment extends Controller {



	public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('equipment')) {

		require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/equipment_index.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }

	public function add_equipment() {
		$model = $this->loadModuleModel('equipment_model');

		$inventary_number =0;
        $description=0;
        $serial_number=0;
        $date=0;
		$warranty=0;
		$netto_value=0;


        if (empty($_POST['inventary_number'])) {
            $inventary_number = 1;
        } else {
            $inventary_number = 0;
        }

        if (empty($_POST['description'])) {
            $description = 1;
        } else {
            $description = 0;
        }

        if (empty($_POST['serial_number'])) {
            $serial_number = 1;
        } else {
            $serial_number = 0;
        }

        if (empty($_POST['date'])) {
            $date= 1;
        } else {
            $date = 0;
        }

        if (empty($_POST['warranty'])) {
            $warranty= 1;
        } else {
            $warranty = 0;
        }

        if (empty($_POST['netto_value'])) {
            $netto_value= 1;
        } else {
            $netto_value = 0;
        }

        if( ($inventary_number ==0) && ($description==0) && ($serial_number==0) && ($date==0) && ($warranty==0) && ($netto_value==0) ) {
            $model->add_equipment($_POST['inventary_number'], $_POST['description'], $_POST['serial_number'], $_POST['date'], $_POST['warranty'], $_POST['netto_value'], $_POST['another_note']);
            header("Location: index.php?module=equipment&page=equipment_catalog");
        }else{
            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/equipment_validation.tpl.php';
            require 'application/views/_common/footer.tpl.php';

        }




	}

	public function delete_equipment() {
		$model = $this->loadModuleModel('equipment_model');
		$model->delete_equipment($_GET['eq_id']);
		header("Location: index.php?module=equipment&page=equipment_catalog");
	}

    public function edit_equipment()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('equipment')) {

            $invoices_model = $this->loadModuleModel('equipment_model');
            $a = $invoices_model->GetEquipmentData($_GET['invoice_id']);

            var_dump($invoices_model->GetequipmentData($_GET['invoice_id']));


            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/edit_equipment.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }

    public function SaveEdit_equipment()
    {
        if (Functions::GetUserSession()->IsEntitledToWrite('equipment')) {

            $invoices_model = $this->loadModuleModel('equipment_model');
            /*if (isset($_POST['buttonsave'])) {*/


            $invoices_model->UpdateInvoice($invoices_model->GetequipmentData($_GET['invoice_id'] ) ,
                $_POST['inventary_number'],
                $_POST['description'],
                $_POST['serial_number'],
                $_POST['date_of_purschure'],
                $_POST['invoice_id'],
                $_POST['warranty'],
                $_POST['amount_netto'],
                $_POST['whos_is_equipment'],
                $_POST['netto_value']
        );

            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/edit_equipment.tpl.php';
            require 'application/views/_common/footer.tpl.php';

            /* }*/
        } else {
            exit("Nie masz do tego uprawnień");
        }


    }

	
	public function equipment_catalog() {
		
		
            $invoices_model = $this->loadModuleModel('equipment_model');
            $invoices_list = $invoices_model->listAll();
            require 'application/views/_common/header.tpl.php';
            require 'application/views/equipment/equipment_catalog.tpl.php';
            require 'application/views/_common/footer.tpl.php';		
	}
	

}


