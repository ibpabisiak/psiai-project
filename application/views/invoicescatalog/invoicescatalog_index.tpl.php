
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            
          </div>

          
          <h2>Katalog faktur</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">

			  
              <thead>
                <tr>
                  <th>Numer faktury test </th>
                  <th>Nazwa faktury</th>
                  <th>Kontrahent</th>
                  <th>Typ</th>
                  <th>Kwota netto</th>
                  <th>Kwota brutto</th>
                  <th>Podatek</th>
                  <th>Skan (.pdf)</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>			  
			  
              <tbody>
				<?php echo $invoices_list; ?>
              </tbody>
            </table>
          </div>
	   
	      
	      
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
	      
	      
	      
	      
	      
        </main>
