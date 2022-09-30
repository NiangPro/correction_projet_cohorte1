<?php if(isset($_GET['info'])): ?>
<!-- information employe  -->
<?php require_once('views/infos/infoMembre.php'); ?>
<?php else: ?>
<!-- insertion d'un employe -->
<?php require_once('views/ajouts/addMembre.php'); ?>
    <!-- liste des employes -->

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Liste des employes et admins</h4>
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
                                <a href="?page=document&codeDoc=<?= $doc->codeDoc ?>" class="btn btn-outline-warning btn-sm btn-rounded"><i class="fa fa-edit"></i></a>
                                <a href="?page=document&codeDoc=<?= $doc->codeDoc ?>?page=document&codeDoc=<?= $doc->codeDoc ?>" class="btn btn-outline-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></a>
                            </td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>
 


