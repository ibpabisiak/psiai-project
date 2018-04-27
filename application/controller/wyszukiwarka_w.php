<h1>Wyszukiwanie faktur</h1>
    <form action="application/controller/wyszukiwarka.php" method="post">
      Wyszukaj według:
      <select name="metoda">
       <option value="invoice_id" />invoice_id
       <option value="contractor_id" />contractor_id
       <option value="file_id" />file_id
      </select>
      <br /><br />
      Szukane wyrażenie:
      <input type="text" name="wyrazenie" />
      <input type="submit" name="wyszukaj" />
    </form>
