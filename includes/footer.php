<footer class="bg-dark text-muted">
  <div class="container">
  <div class="row">
    <div class="col-md-1">
    <a  class="mr-sm-4 mr-xs-4 text-muted" href="https://www.bfs.admin.ch/bfs/fr/home/statistiques/energie.html"><img width="40px" src="<?php echo SITE_URL . 'img/logo-ch.png'?>"></a>
</div>
<div class="col-md-11">
  <br>&copy; <?php echo date("Y"); ?> <a target="_blank" class="text-muted" href="https://www.bfs.admin.ch/bfs/fr/home/statistiques/energie.html">OFS - Encyclopédie statistique de la Suisse.</a><br>Récupéré en février 2018 depuis l'enquête « Dépenses des consommateurs finaux d'énergie » pour une utilisation non commerciale.<br>Tous droits réservés.
 </p>
</div>
</div>
</div>
</div>
  </div>
</footer>
<script src="<?php echo SITE_URL . 'js/vendors/jquery-3.2.1.min.js' ?>"></script>

<script src="<?php echo SITE_URL . 'js/vendors/popper.min.js'?>"></script>
<script src="<?php echo SITE_URL . 'js/vendors/bootstrap.min.js'?>"></script>
<script src="<?php echo SITE_URL . 'js/vendors/bootstrap.min.js'?>"></script>
<script src="<?php echo SITE_URL . 'js/vendors/Chart.min.js'?>"></script>
<script src="<?php echo SITE_URL . 'js/graph.js'?>"></script>
<script src="<?php echo SITE_URL . 'js/main.js'?>"></script>
<script id="prefill" type="text/javascript">
    <?php include __DIR__ . "/../js/prefill-credentials.php"; ?>;
</script>

    </body>

    </html>
    <?php

exit();
?>
