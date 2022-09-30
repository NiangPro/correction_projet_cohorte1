<?php require_once("views/includes/_flash.php") ?>
<div class="container col-md-3 mt-5 pt-5">
    <div class="card">
        <div class="card-body">
            <h3 class="text-center pb-3">Connexion</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="">Code</label>
                    <input type="text" name="code" value="<?= get_input('code')?>" class="form-control" placeholder="Entrer le code" required>
                </div>
                <div class="form-group">
                    <label for="">Mot de passe</label>
                    <input type="password" name="mdp" id="" class="form-control" placeholder="Entrer le mot de passe" required>
                </div>
                <button name="login" class="btn btn-outline-success btn-sm btn-rounded">Se connecter</button>
            </form>
        </div>
    </div>
    
</div>