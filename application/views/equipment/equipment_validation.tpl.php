


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="padding-top: 20px;">
    <div id="accordion" style="margin-top: 50px;">

        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    Dodaj nowy sprzęt
                </h5>
            </div>
            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body" style="width: 50%; margin: auto auto auto auto;">




                    <form method="POST" action="index.php?module=equipment&page=add_equipment" enctype="multipart/form-data">



                        <div class="form-group">

                            <label for="formGroupExampleInput2">Numer inwentarzowy:</label>
                            <input name="inventary_number" type="text" class="form-control" />
                            <?php
                            if ($inventary_number==1) {
                                echo "Brak numeru";
                            }
                            ?>
                        </div>


                        <div class="form-group">

                            <label for="formGroupExampleInput2">Nazwa sprzętu:</label>
                            <input name="description" type="text" class="form-control" />
                            <?php
                            if ($description==1) {
                                echo "Brak nazwy sprzętu";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Numer seryjny:</label>
                            <input name="serial_number" type="text" class="form-control" id="formGroupExampleInput2" />
                            <?php
                            if ($serial_number==1) {
                                echo "Brak numeru seryjnego";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Data zakupu:</label>
                            <input name="date" type="text" class="form-control" id="formGroupExampleInput2" />
                            <?php
                            if ($date==1) {
                                echo "Brak daty zakupu";
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="formGroupExampleInput2">Gwarancja:</label>
                            <input name="warranty" type="text" class="form-control" id="formGroupExampleInput2" />
                            <?php
                            if ($warranty==1) {
                            echo "Brak gwarancji";
                            }
                            ?>
                        </div>



                        <div class="form-group">
                            <label for="formGroupExampleInput2">Kwota netto:</label>
                            <input name="netto_value" type="text" class="form-control" id="formGroupExampleInput2" />
                            <?php
                            if ($netto_value==1) {
                                echo "Brak kwoty netto";
                            }
                            ?>
                        </div>





                        <div class="form-group">
                            <label for="formGroupExampleInput2">Notatki:</label>
                            <input name="another_note" type="text" class="form-control" id="formGroupExampleInput2" />

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