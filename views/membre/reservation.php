<div class="row">
    <!-- formulaire d'ajout  -->
   <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Faire une reservation</h6>
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
                        <label for="">Date reservation</label>
                        <input type="date" name="dateReserv" value="<?= get_input('dateReserv')?>"  class="form-control" placeholder="" required>
                    </div>
                    
                    <button type="submit" class="btn btn-success btm-sm btn-rounded" name="addReservation">Ajouter</button>
                </form>
            </div>
        </div>
   </div>
   <!-- liste des reservations -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste des reservations</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>code Document</th>
                            <th>Code Membre</th>
                            <th>Date de Reservation</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reservations as $r): ?>
                                <tr>
                                    <td><?= $r->codeDoc ?></td>
                                    <td><?= $r->codeMembre ?></td>
                                    <td> <?= date('d/m/Y', strtotime($r->dateReserv))  ?></td>
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