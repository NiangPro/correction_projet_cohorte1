<div class="card">
    <div class="card-body">
        <h4 class="card-title">Formulaire d'ajout membre</h4>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Prenom</label>
                        <input type="text" name="prenom" value="<?= get_input('prenom')?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" value="<?= get_input('nom')?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Telephone</label>
                        <input type="text" name="tel" value="<?= get_input('tel')?>"  class="form-control" placeholder="" required pattern="^[0-9]+$">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Adresse</label>
                        <input type="text" name="adresse" value="<?= get_input('adresse', $m->adresse)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Ville</label>
                        <input type="text" name="ville" value="<?= get_input('ville', $m->ville)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Code Postal</label>
                        <input type="text" name="codePostal" value="<?= get_input('codePostal', $m->codePostal)?>"  class="form-control" placeholder="" required pattern="^[0-9]{5}$">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Province</label>
                        <input type="text" name="province" value="<?= get_input('province', $m->province)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Type</label>
                        <input type="text" name="type" value="membre" readonly="readonly"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Code Employé</label>
                        <input type="text" name="code" value="<?= get_input('code', $m->code)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Courriel</label>
                        <input type="email" name="courriel" value="<?= get_input('courriel', $m->courriel)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Mot de passe</label>
                        <input type="password" name="mdp" value="<?= get_input('mdp', $m->mdp)?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
                
            <button type="submit" class="btn btn-success btm-sm btn-rounded" name="addMembre">Ajouter</button>
            <button type="reset" class="btn btn-danger btm-sm btn-rounded"> Supprimer</button>

        </form>
    </div>
</div>