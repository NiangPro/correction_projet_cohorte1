
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Liste des documents</h4>
        <hr>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>code</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Année</th>
                    <th>Catégorie</th>
                    <th>Type</th>
                    <th>Genre</th>
                    <th>Description</th>
                    <th>ISBN</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($documents as $doc): ?>
                        <tr>
                            <td><?= $doc->codeDoc ?></td>
                            <td><?= $doc->titre ?></td>
                            <td><?= $doc->auteur ?></td>
                            <td><?= $doc->anneePub ?></td>
                            <td><?= $doc->categorie ?></td>
                            <td><?= $doc->type ?></td>
                            <td><?= $doc->genre ?></td>
                            <td><?= $doc->description ?></td>
                            <td><?= $doc->isbn ?></td>
                            
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>