<?php

class Attendance extends Controller {

	public function index() {
        if(Functions::GetUserSession()->IsEntitledToWrite('attendance')) {
            $invoices_model = $this->loadModuleModel('attendance_model');
            $invoices_list = $invoices_model->listAll();
            require 'application/views/_common/header.tpl.php';
            require 'application/views/attendance/attendance_index.tpl.php';
            require 'application/views/_common/footer.tpl.php';
        } else {
            exit("Nie masz do tego uprawnień");
        }
    }
	
}


