
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 20px;">
			<div id="accordion" style="margin-top: 50px;">
			
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h5 class="mb-0">
					  Dodaj nową licencje
				  </h5>
				</div>
				<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
				  <div class="card-body" style="width: 50%; margin: auto auto auto auto;">

					<form method="POST" action="index.php?module=licenses&page=add_license" enctype="multipart/form-data">

					  <div class="form-group">
						<label for="formGroupExampleInput2">Dokument (tylko .pdf):</label>
						  <div class="custom-file">
							<input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile01">
							<label class="custom-file-label" for="inputGroupFile01">Wybierz plik..</label>
						  </div>
					  </div>
					 
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Opis:</label>
						<input name="description" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  <div class="form-group">
						<label for="formGroupExampleInput2">Numer seryjny:</label>
						<input name="serial_number" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  <div class="form-group">
						<label for="formGroupExampleInput2">Data wsparcia:</label>
						<input name="technical_support" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  <div class="form-group">
						<label for="formGroupExampleInput2">Data ważności:</label>
						<input name="licenses_till" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Właściciel licencji:</label>
						<input name="whos_is_licenses" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Inna notatka (wtf):</label>
						<input name="another_note" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
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