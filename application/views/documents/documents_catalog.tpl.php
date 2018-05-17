
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            
            
          </div>

          
          <h2>Katalog dokumentow</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Identyfikator własny</th>
                  <th>Notatki</th>
                  <th>Data</th>
                  <th>Dokument</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
				<?php echo $documents_list; ?>
              </tbody>
            </table>
          </div>
		
		 <h1>Wyszukiwanie Dokumentu</h1>
            <form action="application/controller/wyszukiwarkaDokument.php" method="post">
                Wyszukaj według:
                <select name="metoda">
                    <option value="id" />id
                    <option value="description" />description
                    <option value="file_category_id" />file_category_id
                </select>
                <br /><br />
                Szukane wyrażenie:
                <input type="text" name="wyrazenie" />
                <input type="submit" name="wyszukaj" />
		
        </main>
