<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 20px;">
    <div id="accordion" style="margin-top: 50px;">

        <div class="card">
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body" style="width: 50%; margin: auto auto auto auto;">

                    <form method="POST" action="index.php?modules=invoice&page=SaveEdit_invoice"
                          enctype="multipart/form-data">



                        <div class="form-group">

                            <label for="formGroupExampleInput2">Identyfikator własny:</label>
                            <input name="document_user_id" type="text" class="form-control"
                                <?php echo "value='" . $a['document_user_id'] . "'"; ?> >
                        </div>


                        <div class="form-group">

                            <label for="formGroupExampleInput2">Notatki:</label>
                            <input name="notes" type="text" class="form-control"
                                <?php echo "value='" . $a['notes'] . "'"; ?> >
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Data:</label>
                            <input name=" date" type="text" class="form-control" id="formGroupExampleInput2"
                                <?php echo "value='" . $a['date'] . "'"; ?> >

                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Dokument:</label>
                            <div class="custom-file">
                                <input type="file" name="document_id" class="custom-file-input" id="inputGroupFile01">
                                <label class="custom-file-label" for="inputGroupFile01">Wybierz plik..</label>
                            </div>
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