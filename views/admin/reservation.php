<?php if(isset($_GET['info'])): ?>
    <?php require_once('views/infos/infoReservation.php'); ?>
<?php else: ?>

<div class="row">

    <!-- formulaire d'ajout  -->
   <div class="col-md-3">
        <?php require_once('views/ajouts/addReservation.php'); ?>
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
                                    <td>
                                        <a href="?page=reservation&id=<?= $r->id ?>&info=reservation" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
                                        <a href="?page=reservation&id=<?= $r->id ?>&edit=reservation" class="btn btn-outline-warning btn-sm btn-rounded"><i class="fa fa-edit"></i></a>
                                        <a href="?page=reservation&id=<?= $r->id ?>&delete=reservation" class="btn btn-outline-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></a>
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
