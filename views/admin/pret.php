<?php if(isset($_GET['info'])): ?>
    <?php require_once('views/infos/infoPret.php'); ?>
<?php else: ?>
<div class="row">
    <!-- formulaire d'ajout  -->
   <div class="col-md-3">
        <?php require_once('views/ajouts/addPret.php'); ?>
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
                                    <td> <?= date('d/m/Y', strtotime($p->dateRetour))  ?></td>
                                    <td>
                                        <a href="?page=pret&id=<?= $p->id ?>&info=pret" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
                                        <a href="?page=pret&id=<?= $p->id ?>&edit=pret" class="btn btn-outline-warning btn-sm btn-rounded"><i class="fa fa-edit"></i></a>
                                        <a href="?page=pret&id=<?= $p->id ?>&delete=pret" class="btn btn-outline-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></a>
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