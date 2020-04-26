<div class="row">
    <div class="col-md-4">

        <div class="card card-danger">
            <h3 class="card-header">Modifier les énergies</h3>
            <div class="my-4 ard-block">
                <?php  displayTableHTML("NOM", "type_energie", "idTYPE_ENERGIE"); ?>
                </p>
            </div>
        </div>

    </div>
    <div class="col-md-4">
        <div class="card card-danger">
            <h3 class="card-header">Ajouter une énergie</h3>
            <div class="my-4 mx-4 card-block">
                <form class="container" id="formEnergy" action="feedback.php" method="post">
                    <label>Nom</label>
                    <input class="form-control" type="text" name="NomEnergie">
                    <br>
                    <input type="submit" value="Ajouter" class="float-right btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>