<div class="card ">
    <div class="card-body">
        <h1 class="card-title">Information document  <a href="?page=document<?= $_SESSION['user']->type == "membre"?" membre":"" ?>" class="btn btn-outline-primary btn-sm btn-rounded"><i class="fa-arrow-left"></i> Retour</a></h1>

        <table class="table container mt-5 col-md-6">
            <tr>
                <th>Code : </th>
                <td><?= $doc->codeDoc ?></td>
            </tr>
            <tr>
                <th>Titre : </th>
                <td><?= $doc->titre ?></td>
            </tr>
            <tr>
                <th>Auteur : </th>
                <td><?= $doc->auteur ?></td>
            </tr>
            <tr>
                <th>Année publication : </th>
                <td><?= $doc->anneePub ?></td>
            </tr>
            <tr>
                <th>Catégorie : </th>
                <td><?= $doc->categorie ?></td>
            </tr>
            <tr>
                <th>Type : </th>
                <td><?= $doc->type ?></td>
            </tr>
            <tr>
                <th>Genre : </th>
                <td><?= $doc->genre ?></td>
            </tr>
            <tr>
                <th>Description : </th>
                <td><?= $doc->description ?></td>
            </tr>
            <tr>
                <th>ISBN : </th>
                <td><?= $doc->isbn ?></td>
            </tr>
        </table>

    </div>
</div>