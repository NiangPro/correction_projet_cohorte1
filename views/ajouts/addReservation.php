<div class="card">
            <div class="card-body">
                <h4 class="card-title"> <?= isset($_GET['edit']) ? "Edition" : "Ajout" ?> reservation</h4>
                <hr>
                <form action="" method="POST">
                    
                    <div class="form-group">
                        <label for="">Code document</label>
                        <select class="form-control" name="codeDoc" required>
                        <option value="">Choisissez</option>
                            <?php foreach($documents as $doc): ?>
                                <option value="<?= $doc->codeDoc ?>"  <?= get_input("codeMembre", $r->codeDoc) == $doc->codeDoc ? "selected" : ""  ?> ><?= $doc->titre ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Code membre</label>
                        <select class="form-control" name="codeMembre" required>
                        <option value="">Choisissez</option>
                            <?php foreach($membres as $m): ?>
                                <option value="<?= $m->code ?>" <?= get_input("codeMembre", $r->codeMembre) == $m->code ? "selected" : ""  ?> ><?= $m->code ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Date reservation</label>
                        <input type="date" name="dateReserv" value="<?= get_input('dateReserv', $r->dateReserv)?>"  class="form-control" placeholder="" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success btm-sm btn-rounded" name="addReservation"><?= isset($_GET['edit']) ? "Modifier" : "Ajouter" ?></button>
                </form>
            </div>
        </div>