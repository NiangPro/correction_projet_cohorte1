<div class="card ">
    <div class="card-body">
        <h1 class="card-title">Information Employe  <a href="?page=membres" class="btn btn-outline-primary btn-sm btn-rounded"><i class="fa-arrow-left"></i> Retour</a></h1>

        <table class="table container mt-5 col-md-6">
            <tr>
                <th>Prenom : </th>
                <td><?= $em->prenom ?></td>
            </tr>
            <tr>
                <th>Nom : </th>
                <td><?= $em->nom ?></td>
            </tr>
            <tr>
                <th>Adresse : </th>
                <td><?= $em->adresse ?></td>
            </tr>
            <tr>
                <th>Adresse : </th>
                <td><?= $em->adresse ?></td>
            </tr>
            <tr>
                <th>Téléphone : </th>
                <td><?= $em->tel ?></td>
            </tr>
            <tr>
                <th>Ville : </th>
                <td><?= $em->ville ?></td>
            </tr>
            <tr>
                <th>Email : </th>
                <td><?= $em->courriel ?></td>
            </tr>
            <tr>
                <th>Type : </th>
                <td><?= $em->type ?></td>
            </tr>
        </table>

    </div>
</div>