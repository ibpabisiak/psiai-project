<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">


    </div>


    <h2>Katalog sprzetu</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Numer inwenatrzowy</th>
                <th>Pelna nazwa/opis</th>
                <th>numer seryjny</th>
                <th>Data zakupu</th>
                <th>Numer faktury</th>
                <th>Gwarancja do</th>
                <th>Wartosc netto</th>
                <th>Na czyim stanie jest sprzet</th>
                <th>Pole notatek</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php echo $invoices_list; ?>
            </tbody>
        </table>
    </div>
    
    <h1>Wyszukiwanie sprzetu</h1>
    <form action="application/controller/wyszukiwarkaEquipment.php" method="post">
        Wyszukaj według:
        <select name="metoda">
            <option value="inventary_number" />inventary_number
            <option value="serial_number" />serial_number
            <option value="invoice_id" />invoice_id
        </select>
        <br /><br />
        Szukane wyrażenie:
        <input type="text" name="wyrazenie" />
        <input type="submit" name="wyszukaj" />
    
</main>
