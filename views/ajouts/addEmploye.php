<div class="card">
    <div class="card-body">
        <h4 class="card-title">Formulaire d'<?= isset($_GET['edit'])? "édition" : "ajout" ?> employé</h4>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" value="<?= get_input('prenom', $em->prenom)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" value="<?= get_input('nom', $em->nom)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Telephone</label>
                        <input type="text" name="tel" value="<?= get_input('tel', $em->tel)?>"  class="form-control" placeholder="" required pattern="^[0-9]+$">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Adresse</label>
                        <input type="text" name="adresse" value="<?= get_input('adresse', $em->adresse)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ville</label>
                        <input type="text" name="ville" value="<?= get_input('ville', $em->ville)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Code Postal</label>
                        <input type="text" name="codePostal" value="<?= get_input('codePostal', $em->codePostal)?>"  class="form-control" placeholder="" required pattern="^[0-9]{5}$">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Province</label>
                        <input type="text" name="province" value="<?= get_input('province', $em->province)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Type</label>
                        <select class="form-control" name="type" required>
                        <option value="employe" <?= get_input('type', $em->courriel)=="employe"?"selected":"" ?> >employe</option>
                        <option value="admin"  <?= get_input('type', $em->courriel)=="employe"?"selected":"" ?> >admin</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Code Employé</label>
                        <input type="text" name="code" value="<?= get_input('code', $em->code)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Courriel</label>
                        <input type="email" name="courriel" value="<?= get_input('courriel', $em->courriel)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Mot de passe</label>
                        <input type="password" name="mdp" value="<?= get_input('mdp', $em->mdp)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
                
            <button type="submit" class="btn btn-success btm-sm btn-rounded" name="addEmploye"><?= isset($_GET['edit'])? "Modifier" : "Ajouter" ?></button>
            <a href="?page=employes" class="btn btn-info btm-sm btn-rounded"> Retour</a>

        </form>
    </div>
</div>