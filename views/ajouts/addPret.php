<div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajout prêt</h4>
                <hr>
                <form action="" method="POST">
                    
                    <div class="form-group">
                        <label for="">Code document</label>
                        <select class="form-control" name="codeDoc" required>
                            <?php foreach($documents as $doc): ?>
                                <option value="<?= $doc->codeDoc ?>"><?= $doc->codeDoc ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Code membre</label>
                        <select class="form-control" name="codeMembre" required>
                            <?php foreach($membres as $m): ?>
                                <option value="<?= $m->code ?>"><?= $m->code ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date pret</label>
                        <input type="date" name="datePret" value="<?= get_input('datePret')?>"  class="form-control" placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label for="">Date retour</label>
                        <input type="date" name="dateRetour" value="<?= get_input('dateRetour')?>"  class="form-control" placeholder="" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success btm-sm btn-rounded" name="addPret">Ajouter</button>

                </form>
            </div>
        </div>