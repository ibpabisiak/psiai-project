<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 20px;">
    <div id="accordion" style="margin-top: 50px;">

        <div class="card">
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body" style="width: 50%; margin: auto auto auto auto;">

                    <form method="POST" action="index.php?modules=invoice&page=SaveEdit_invoice"
                          enctype="multipart/form-data">

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
                                <option value="0"
                                <?php if (contractor_id == $a['contractor_id'])
                                { "<option selected>" ;} else {"<option>";}; ?>




                                <?php echo $_POST['contractor_id']; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Typ faktury:</label>
                            <select name="invoice_type" id="inputState" class="form-control">
                                <option value="0" selected>Wybierz..</option>
                                <?php echo $_POST['invoice_type']; ?>
                                <option value="purchase">Sprzedaży</option>
                                <option value="sales">Zakupu</option>
                            </select>
                        </div>

                        <div class="form-group">

                            <label for="formGroupExampleInput2">Nazwa faktury:</label>
                            <input name="invoice_name" type="text" class="form-control"
                                <?php echo "value='" . $a['title'] . "'"; ?> >


                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Numer faktury:</label>
                            <input name="invoice_number" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['invoice_number'] . "'"; ?> >

                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kwota netto:</label>
                            <input name="amount_netto" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['amount_netto'] . "'"; ?> >

                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kwota brutto:</label>
                            <input name="amount_brutto" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['amount_brutto'] . "'"; ?> >

                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Podatek:</label>
                            <select name="tax_id" id="inputState" class="form-control">
                                <option value="0" selected>Wybierz..</option>
                                <?php echo "value='" . $a['tax_id'] . "'"; ?> >
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" name='buttonsave' class="btn btn-primary btn-lg btn-block">Zapisz w bazie danych
                            </button>
                        </div>
                        <div>
                            <input type="hidden" value = <?php echo $_GET['invoice_id']; ?> name="ukryty" >
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

</main>