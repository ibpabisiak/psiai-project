<!-- KOPIA ZAPASOWA STAREGO KODU WIDOKU
<div style="height: 400px; width: 100%;">
				<h1>invoices index page</h1>
				
			<form action="index.php?module=invoices&page=add_purchase_invoice" method="post" enctype="multipart/form-data">
				Select image to upload:
				<input type="file" name="fileToUpload" id="fileToUpload">
				<input type="submit" value="Upload Image" name="submit">
			</form>	
				
			</div> 
			
			-->



        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 20px;">
			<div id="accordion" style="margin-top: 50px;">
			  <div class="card">
				<div class="card-header" id="headingOne">
				  <h5 class="mb-0">
					<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					  Dodaj nowego kontrahenta
					</button>
				  </h5>
				</div>

				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
				  <div class="card-body" style="width: 50%; margin: auto auto auto auto;">
					<form method="POST" action="index.php?module=invoices&page=add_new_contractor">
					  <div class="form-group">
						<label for="formGroupExampleInput">Skrócona nazwa kontrahenta (wymagane):</label>
						<input name="contractor_name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Nazwa">
					  </div>
					  <div class="form-group">
						<label for="formGroupExampleInput2">NIP kontrahenta (opcjonalnie):</label>
						<input name="contracotr_nip" type="text" class="form-control" id="formGroupExampleInput2" placeholder="NIP">
					  </div>
					  <div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Zapisz w bazie danych</button>
					  </div>
					</form>
				  </div>
				</div>
			  </div>
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h5 class="mb-0">
					<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					  Dodaj nową fakturę
					</button>
				  </h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
				  <div class="card-body" style="width: 50%; margin: auto auto auto auto;">

					<form method="POST" action="index.php?module=invoices&page=add_invoice" enctype="multipart/form-data">

					  <div class="form-group">
						<label for="formGroupExampleInput2">Skan faktury na twoim dysku (tylko .pdf):</label>
						  <div class="custom-file">
							<input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile01">
							<label class="custom-file-label" for="inputGroupFile01">Wybierz plik..</label>
						  </div>
					  </div>
					  <div class="form-group">
						<label for="formGroupExampleInput2">Kontrahent:</label>
						  <select name="contractor_id" id="inputState" class="form-control">
							<option value="0" selected>Wybierz..</option>
							<?php echo $contractors_list; ?>
						  </select>
					  </div>
					  <div class="form-group">
						<label for="formGroupExampleInput2">Typ faktury:</label>
						  <select name="invoice_type" id="inputState" class="form-control">
							<option value="0" selected>Wybierz..</option>
							<option value="purchase">Sprzedaży</option>
							<option value="sales">Zakupu</option>
						  </select>
					  </div>
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Nazwa faktury:</label>
						<input name="invoice_name" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Numer faktury:</label>
						<input name="invoice_number" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Kwota netto:</label>
						<input name="amount_netto" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź kwotę netto..">
					  </div>
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Kwota brutto:</label>
						<input name="amount_brutto" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź kwotę brutto..">
					  </div>
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Podatek:</label>
						  <select name="tax_id" id="inputState" class="form-control">
							<option value="0" selected>Wybierz..</option>
							<?php echo $taxes_list; ?>
						  </select>
					  </div>
					  <div class="form-group">
						<button type="submit" class="btn btn-primary btn-lg btn-block">Zapisz w bazie danych</button>
					  </div>
					</form>				  
				  
				  
				  </div>
				</div>
			  </div>
			</div>
       
        </main>