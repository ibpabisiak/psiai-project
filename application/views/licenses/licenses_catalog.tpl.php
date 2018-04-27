<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


    </div>


    <h2>Katalog licencji</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Numer inwentarza</th>
                <th>Klucz seryjny</th>
                <th>Opis</th>
                <th>Id faktury</th>
                <th>Wsparcie techniczne</th>
                <th>Licencja wazna do</th>
                <th>Pole notatek</th>
                <th>Gdzie jest licencja</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php echo $invoices_list; ?>
            </tbody>
        </table>
    </div>
</main>
