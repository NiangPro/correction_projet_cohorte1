<?php if(isset($_GET['info'])): ?>
<!-- information membre  -->
<?php require_once('views/infos/infoMembre.php'); ?>
<?php else: ?>
    <?php if(isset($_GET['edit']) || isset($_GET['add'])): ?>
<!-- insertion d'un membre -->
    <?php require_once('views/ajouts/addMembre.php'); ?>
    <?php else: ?>

        <!-- liste des membres -->

    <div class="card">
        <div class="card-body">
            <div class="row">
                    <h4 class="card-title col-md-10">Liste des employes et admins</h4>
                    <a href="?page=membres&add=membre" class="btn btn-outline-success col-md-2 btn-sm btn-rounded"><i class="fa-plus"></i> Ajouter</a>
                </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>code</th>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Telephone</th>
                        <th>Adresse</th>
                        <th>Courriel</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($membres as $em): ?>
                            <tr>
                                <td><?= $em->code ?></td>
                                <td><?= $em->prenom ?></td>
                                <td><?= $em->nom ?></td>
                                <td><?= $em->tel ?></td>
                                <td><?= $em->adresse ?></td>
                                <td><?= $em->courriel ?></td>
                                <td>
                                    <a href="?page=membres&code=<?= $em->code ?>&info=membre" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
                                    <a href="?page=membres&code=<?= $em->code ?>&edit=membre" class="btn btn-outline-warning btn-sm btn-rounded"><i class="fa fa-edit"></i></a>
                                    <a href="?page=membres&code=<?= $em->code ?>&delete=membre" class="btn btn-outline-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></a>
                                </td>
                                
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php endif; ?>
 


