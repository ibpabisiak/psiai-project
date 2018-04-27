<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 20px;">
    <div id="accordion" style="margin-top: 50px;">

        <div class="card">
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body" style="width: 50%; margin: auto auto auto auto;">

                    <form method="POST" action="index.php?modules=licenses&page=SaveEdit_licenses"
                          enctype="multipart/form-data">


                        <div class="form-group">
                            <label for="formGroupExampleInput2">Numer inwentarza:</label>
                            <input name="inventary_number" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['inventary_number'] . "'"; ?> >
                        </div>


                        <div class="form-group">
                            <label for="formGroupExampleInput2">Klucz seryjny:</label>
                            <input name="serial_number" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['serial_number'] . "'"; ?> >
                        </div>


                        <div class="form-group">
                            <label for="formGroupExampleInput2">Opis:</label>
                            <input name="description" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['description'] . "'"; ?> >
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Wsparcie techniczne:</label>
                            <input name="technical_support" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['technical_support'] . "'"; ?> >
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Licencja ważna do:</label>
                            <input name="licenses_till" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['licenses_till'] . "'"; ?> >
                        </div>



                        <div class="form-group">
                            <label for="formGroupExampleInput2">Notatki:</label>
                            <input name="another_note" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['another_note'] . "'"; ?> >
                        </div>



                        <div class="form-group">
                            <label for="formGroupExampleInput2">Gdzie jest licencja:</label>
                            <input name="whos_is_licenses" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['whos_is_licenses'] . "'"; ?> >
                        </div>






                        <div class="form-group">
                            <button type="submit" name='buttonsave' class="btn btn-primary btn-lg btn-block">Zapisz w bazie danych
                            </button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>

</main>