<div class="card ">
    <div class="card-body">
        <h1 class="card-title">Information de prêt  <a href="?page=pret<?= $_SESSION['user']->type == "membre"?" membre":"" ?>" class="btn btn-outline-primary btn-sm btn-rounded"><i class="fa-arrow-left"></i> Retour</a></h1>

        <table class="table container mt-5 col-md-8">
            <tr>
                <th>Date prêt : </th>
                <td><?= date("d/m/Y", strtotime($p->datePret)) ?></td>
                <th>Statut</th>
                <td><?= $p->retour == 0? "<span class='badge badge-warning'>Non retourné</span>":"<span class='badge badge-success'>Retourné</span>" ?></td>
            </tr>
            <tr>
                <th>Date retour : </th>
                <td><?= date("d/m/Y", strtotime($p->dateRetour)) ?></td>
            </tr>
            <tr>
                <th>Prénom du membre : </th>
                <td><?= $p->prenom ?></td>
            </tr>
            <tr>
                <th>Nom du membre : </th>
                <td><?= $p->nom ?></td>
            </tr>
            <tr>
                <th>Titre du document : </th>
                <td><?= $p->titre ?></td>
            </tr>
            <tr>
                <th>Auteur : </th>
                <td><?= $p->auteur ?></td>
            </tr>
            <tr>
                <th>Année de publication : </th>
                <td><?= $p->anneePub ?></td>
            </tr>
        </table>

    </div>
</div>