<div class="card ">
    <div class="card-body">
        <h1 class="card-title">Information de réservation  <a href="?page=reservation<?= $_SESSION['user']->type == "membre"?" membre":"" ?>" class="btn btn-outline-primary btn-sm btn-rounded"><i class="fa-arrow-left"></i> Retour</a></h1>

        <table class="table container mt-5 col-md-6">
            <tr>
                <th>Date réservation : </th>
                <td><?= date("d/m/Y", strtotime($r->dateReserv)) ?></td>
            </tr>
            <tr>
                <th>Prénom du membre : </th>
                <td><?= $r->prenom ?></td>
            </tr>
            <tr>
                <th>Nom du membre : </th>
                <td><?= $r->nom ?></td>
            </tr>
            <tr>
                <th>Titre du document : </th>
                <td><?= $r->titre ?></td>
            </tr>
            <tr>
                <th>Auteur : </th>
                <td><?= $r->auteur ?></td>
            </tr>
            <tr>
                <th>Année de publication : </th>
                <td><?= $r->anneePub ?></td>
            </tr>
        </table>

    </div>
</div>