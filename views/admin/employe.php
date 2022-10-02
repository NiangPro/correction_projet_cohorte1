<?php if(isset($_GET['info'])): ?>
<!-- information employe  -->
<?php require_once('views/infos/infoEmploye.php'); ?>
<?php else: ?>
    <?php if(isset($_GET['edit']) || isset($_GET['add'])): ?>

<!-- insertion d'un employe -->
    <?php require_once('views/ajouts/addEmploye.php'); ?>
    <?php else: ?>

        <!-- liste des employes -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4 class="card-title col-md-10">Liste des employes et admins</h4>
                <a href="?page=employes&add=employe" class="btn btn-outline-success col-md-2 btn-sm btn-rounded"><i class="fa-plus"></i> Ajouter</a>
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
                        <th>Type</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($employes as $em): ?>
                            <tr>
                                <td><?= $em->code ?></td>
                                <td><?= $em->prenom ?></td>
                                <td><?= $em->nom ?></td>
                                <td><?= $em->tel ?></td>
                                <td><?= $em->adresse ?></td>
                                <td><?= $em->type ?></td>
                                <td>
                                    <a href="?page=employes&code=<?= $em->code ?>&info=employe" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
                                    <a href="?page=employes&code=<?= $em->code ?>&edit=employe" class="btn btn-outline-warning btn-sm btn-rounded"><i class="fa fa-edit"></i></a>
                                    <a href="?page=employes&code=<?= $doc->code ?>&delete=employe" class="btn btn-outline-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></a>
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

