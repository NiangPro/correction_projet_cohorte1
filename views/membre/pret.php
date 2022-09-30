<div class="row">
    <!-- formulaire d'ajout  -->
   <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Faire un prêt</h4>
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
   </div>
   <!-- liste des reservations -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste des prêts</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>code Document</th>
                            <th>Code Membre</th>
                            <th>Date Pret</th>
                            <th>Date Retour</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($prets as $p): ?>
                                <tr>
                                    <td><?= $p->codeDoc ?></td>
                                    <td><?= $p->codeMembre ?></td>
                                    <td> <?= date('d/m/Y', strtotime($p->datePret))  ?></td>
                                    <td> <?= date('d/m/Y', strtotime($r->dateRetour))  ?></td>
                                    <td></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>