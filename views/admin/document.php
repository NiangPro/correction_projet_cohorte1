<?php if(isset($_GET['info'])): ?>
<!-- information document  -->
<?php require_once('views/infos/infoDocument.php'); ?>
<?php else: ?>
<!-- insertion d'un employe -->
    <?php if(isset($_GET['edit']) || isset($_GET['add'])): ?>

    <?php require_once('views/ajouts/addDocument.php'); ?>
    <!-- liste des employes -->
    <?php else: ?>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <h4 class="card-title col-md-10">Liste des documents</h4>
                <a href="?page=document&add=doc" class="btn btn-outline-success col-md-2 btn-sm btn-rounded"><i class="fa-plus"></i> Ajouter</a>
            </div>
            <hr>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>code</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Année</th>
                        <th>Genre</th>
                        <th>ISBN</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach($documents as $doc): ?>
                            <tr>
                                <td><?= $doc->codeDoc ?></td>
                                <td><?= $doc->titre ?></td>
                                <td><?= $doc->auteur ?></td>
                                <td><?= $doc->anneePub ?></td>
                                <td><?= $doc->genre ?></td>
                                <td><?= $doc->isbn ?></td>
                                <td>
                                    <a href="?page=document&codeDoc=<?= $doc->codeDoc ?>&info=doc" class="btn btn-outline-info btn-sm btn-rounded"><i class="fa fa-eye"></i></a>
                                    <a href="?page=document&codeDoc=<?= $doc->codeDoc ?>&edit=doc" class="btn btn-outline-warning btn-sm btn-rounded"><i class="fa fa-edit"></i></a>
                                    <a href="?page=document&codeDoc=<?= $doc->codeDoc ?>&delete=doc" class="btn btn-outline-danger btn-sm btn-rounded"><i class="fa fa-trash"></i></a>
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
    
