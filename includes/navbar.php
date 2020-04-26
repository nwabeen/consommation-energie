<nav class="navbar navbar-expand-lg navbar-toggleable-md navbar-dark bg-red fixed-top" role="navigation">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if (!$_SESSION['loggedIn']): ?>

        <a class="navbar-brand" href="<?php echo SITE_URL ?>" title="">Dépenses d’énergie</a>
        <?php else: ?>
        <a class="navbar-brand" href="./admin.php" title="">Administration</a>

        <?php endif; ?>
        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="nav navbar-nav mr-auto">
                <?php if ($_SESSION['loggedIn']): ?>

                <li class="nav-item">
                    <a href="?cat=depenses" class="<?php if ($_GET["cat"] == "depenses") {
    echo "active ";
} ?>nav-link" title="">Dépenses</a>
                </li>
                <li class="nav-item">
                    <a href="?cat=energies" class="<?php if ($_GET["cat"] == "energies") {
    echo "active ";
} ?>nav-link" title="">Énergies</a>
                </li>

                <?php endif; ?>
            </ul>
            <?php if ($_SESSION['loggedIn']): ?>

            <span class="dropdown">
                <a class="dropdown-toggle" href="" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    aria-label="modifier mes identifiants">
                    <span class="white">
                        <?php echo $_SESSION["name"]; ?> </span>
                    <i style="vertical-align:middle;" class="ml-2 white fa fa-2x fa-user-circle" aria-hidden="true"></i>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                    <form class="container mt-4 mx-2" id="form" action="feedback.php" method="post">
                        <h4>Modifier mes identifiants</h4>

                        <label>Nom</label>
                        <input class="form-control" type="text" placeholder="<?php echo $_SESSION["name"]; ?>" name="newName">
                        <label>Nom d'utilisateur</label>
                        <input class="form-control" placeholder="<?php echo $_SESSION["username"]; ?>" type="text" name="newUsername">
                        <label>Ancien mot de passe</label>
                        <input class="form-control" type="password" name="oldPassword">
                        <label>Nouveau mot de passe</label>
                        <input class="form-control" type="password" name="newPassword">
                        <br>
                        <input type="submit" value="Modifier" class="mb-4 btn btn-primary">
                    </form>
                </div>
            </span>
            <a href="../index.php" aria-label="se déconnecter" role="button" class="ml-4">
                <i style="vertical-align:middle;" aria-hidden="true" class="fa fa-2x white fa-sign-out"></i>
            </a>
            <?php else: ?>

            <form class="mt-3 mt-md-0 form-inline" method="post" action="<?php echo SITE_URL . "admin/admin.php"?>"role="form">
                <div class="form-row">
                    <div class="col">
                        <input id="usernameInput" name="username" placeholder="Nom d'utilisateur" class="form-control" type="text" required>
                    </div>
                    <div class="col">
                        <input id="passwordInput" name="password" placeholder="Mot de passe" class="form-control" type="password" required>
                    </div>
                </div>
                <div class="form-group">
                    <button class="pull-right btn btn-outline-light mt-3 mt-md-0 ml-md-3" type="submit">
                        <i class="fa fa-sign-in"></i> Connexion</button>
                </div>
            </form>

            <?php endif;?>


        </div>
    </div>
</nav>
