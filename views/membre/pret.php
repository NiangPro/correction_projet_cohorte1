<?php if(isset($_GET['info'])): ?>
    <?php require_once('views/infos/infoPret.php'); ?>
<?php else: ?>
<div class="row">
   <!-- liste des reservations -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Liste des prêts</h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Titre du Document</th>
                            <th>Auteur</th>
                            <th>Date Pret</th>
                            <th>Date Retour</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach($prets as $p): ?>
                                <tr>
                                    <td><?= $p->titre ?></td>
                                    <td><?= $p->auteur ?></td>
                                    <td> <?= date('d/m/Y', strtotime($p->datePret))  ?></td>
                                    <td> <?= date('d/m/Y', strtotime($p->dateRetour))  ?></td>
                                    <td>
                                    <?= $p->retour == 0 ?'<pan class="text-danger">Non retourné</span>': '<pan class="text-success">Retourné</span>' ?>
                                    </td>
                                    <td>
                                        <a href="?page=pret membre&id=<?= $p->id ?>&info=pret" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
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