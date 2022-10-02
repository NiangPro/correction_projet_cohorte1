<div class="card">
            <div class="card-body">
                <h4 class="card-title"><?= isset($_GET['edit'])? "Édition" : "Ajout" ?> prêt</h4>
                <hr>
                <form action="" method="POST">
                    
                    <div class="form-group">
                        <label for="">Titre du document</label>
                        <select class="form-control" name="codeDoc" required>
                        <option value="">Choisissez</option>
                            <?php foreach($documents as $doc): ?>
                                <option value="<?= $doc->codeDoc ?>"   <?= get_input("codeDoc", $p->codeDoc) == $doc->codeDoc ? "selected" : ""  ?> ><?= $doc->titre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Code membre</label>
                        <select class="form-control" name="codeMembre" required>
                        <option value="">Choisissez</option>
                            <?php foreach($membres as $m): ?>
                                <option value="<?= $m->code ?>" <?= get_input("codeMembre", $p->codeMembre) == $m->code ? "selected" : ""  ?> ><?= $m->code ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date pret</label>
                        <input type="date" name="datePret" value="<?= get_input('datePret', $p->datePret)?>"  class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Date retour</label>
                        <input type="date" name="dateRetour" value="<?= get_input('dateRetour', $p->dateRetour)?>"  class="form-control" placeholder="" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success btm-sm btn-rounded" name="addPret"><?= isset($_GET['edit'])? "Modifier" : "Ajouter" ?></button>

                </form>
            </div>
        </div>