<?php if(isset($_GET['info'])): ?>
    <?php require_once('views/infos/infoReservation.php'); ?>
<?php else: ?>
<div class="row">
    <!-- formulaire d'ajout  -->
   <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Faire une reservation</h6>
                <hr>
                <form action="" method="POST">
                    
                    <div class="form-group">
                        <label for="">Titre du document</label>
                        <select class="form-control" name="codeDoc" required>
                            <option value="">Choisissez</option>
                            <?php foreach($documents as $doc): ?>
                                <option value="<?= $doc->codeDoc ?>"><?= $doc->titre ?></option>
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
                            <th>Titre du Document</th>
                            <th>Auteur</th>
                            <th>Date de Reservation</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($reservations as $r): ?>
                                <tr>
                                    <td><?= $r->titre ?></td>
                                    <td><?= $r->auteur ?></td>
                                    <td> <?= date('d/m/Y', strtotime($r->dateReserv))  ?></td>
                                    <td> 
                                        <?= $r->statut == 0 ?'<pan class="text-danger">En attente</span>': '<pan class="text-success">Validée</span>' ?>
                                    </td>
                                    <td>
                                        <a href="?page=reservation membre&id=<?= $r->id ?>&info=reservation" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>
<?php endif; ?>