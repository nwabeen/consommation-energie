<div class="row">
    <div class="col-md-7">
    <div class="card card-danger">
    <div class="card-header">
    <div class="row">
    <div class="col-md-7">
    <h3 >Modifier les dépenses de :</h3>
</div>
       <div class="col-md-5">
       <?php displayOptionHTML("energies", "NOM", "type_energie", false); ?>
</div>
</div>
</div>
      <div id="expense" class="my-4 card-block">

     <?php require(__DIR__ . "/../admin/display-expenses-table.php"); ?>
      </div>
    </div>
  </div>
<div class="col-md-5">
    <div class="card card-danger">
      <h3 class="card-header">Ajouter une dépense</h3>
      <div class="my-4 card-block">
      <form class="container" id="formExpense" action="feedback.php" method="post">
      <div class="row">
      <div class="col-md-8">
                    <label>Montant</label>
                    <input class="form-control" type="number" name="addAmountExpense">
                   </div>
                   <div class="col-md-4">
                   <label>Année</label>
                    <input class="form-control" type="number" min='1800' max='3000' name="addYearExpense">
                  </div>
                  </div>
<br>
                    <?php displayOptionHTML("addEnergyExpense", "NOM", "type_energie"); ?>

                    <input type="submit" value="Ajouter" class="float-right btn btn-primary">
               
                </form>
    </div>
  </div>
</div>
</div>