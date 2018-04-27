
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 20px;">
			<div id="accordion" style="margin-top: 50px;">
			
			  <div class="card">
				<div class="card-header" id="headingTwo">
				  <h5 class="mb-0">
					  Dodaj nowy dokument
				  </h5>
				</div>
				<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
				  <div class="card-body" style="width: 50%; margin: auto auto auto auto;">

					<form method="POST" action="index.php?module=documents&page=add_document" enctype="multipart/form-data">

					  <div class="form-group">
						<label for="formGroupExampleInput2">Dokument (tylko .doc, .docx, .pdf):</label>
						  <div class="custom-file">
							<input type="file" name="fileToUpload" class="custom-file-input" id="inputGroupFile01">
							<label class="custom-file-label" for="inputGroupFile01">Wybierz plik..</label>
						  </div>
					  </div>
					 
					  
					  <div class="form-group">
						<label for="formGroupExampleInput2">Identyfikator własny:</label>
						<input name="document_id" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
					  </div>
					  <div class="form-group">
						<label for="formGroupExampleInput2">Notatki:</label>
						<input name="document_notes" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Wprowadź nazwę faktury..">
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