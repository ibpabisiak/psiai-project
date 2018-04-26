<?php
      $metoda = $_POST['metoda'];
      $wyrazenie = $_POST['wyrazenie'];
      $wyrazenie = trim($wyrazenie);
      if (!$metoda || !$wyrazenie)
      {
        echo 'Brak parametrów wyszukiwania, wróć do poprzednej strony i spóbuj ponownie!';
        exit;
      }
      if (!get_magic_quotes_gpc())
      {
        $metoda = addslashes($metoda);
        $wyrazenie = addslashes($wyrazenie);
      }
      @ $db = new mysqli('localhost','psiai','0987654321','psiai_db');
      
      if (mysqli_connect_errno())
      {
        echo 'Połączenie z bazą nie powiodło się. Spóbuj ponownie';
        exit;
      }
      $db->query('SET NAMES utf8');
      $db->query('SET CHARACTER_SET utf8_unicode_ci');
      $zapytanie = "select * from invoices where ".$metoda. " like '%".$wyrazenie."%'";
      $wynik = $db->query($zapytanie);
      $ile_znaleziono = $wynik->num_rows;
      echo '<p> Liczba znalezionych faktur: '.$ile_znaleziono.'</p>';
      for ($i=0;$i<$ile_znaleziono;$i++)
      {
        $wiersz = $wynik->fetch_assoc();
        echo '<p><b>'.($i+1).'. invoice_id: '.stripslashes($wiersz['invoice_id']).'</b><br />';
        echo 'contractor_id: '.stripslashes($wiersz['contractor_id']).'<br />';
        echo 'file_id: '.stripslashes($wiersz['file_id']).'<br />';
		echo 'tax_id: '.stripslashes($wiersz['tax_id']).'<br />';
		echo 'type:'.stripslashes($wiersz['type']).'<br />';
		echo 'title: '.stripslashes($wiersz['title']).'<br />';
        echo 'tax_id: '.stripslashes($wiersz['tax_id']).'</p><br />';
      }
      $wynik->free();
      $db->close();
    ?> 
