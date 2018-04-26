<?php

class AttendanceModel { 
	
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
				SELECT * FROM attendance_list 
							
		";
        $dbh = $this->db->prepare($query);
        $dbh->execute();

        $result = "";
        while ($row = $dbh->fetch(PDO::FETCH_ASSOC)) {

            $result .= "
                <tr>
                  <td>" . $row['date'] . "</td>
                  <td>" . $row['entry_hour'] . "</td>
                  <td>" . $row['leave_hour'] . "</td>
                  <td>".  $row[''].  "</td>
                  <td>" . $row['addons'] . "</td>
                </tr>			
			";

        }

        return $result;
    }

}
