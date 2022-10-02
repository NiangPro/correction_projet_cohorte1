<div class="card">
    <div class="card-body">
        <h4 class="card-title">Formulaire d'ajout document</h4>
        <hr>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Code du document</label>
                        <input type="text" name="codeDoc" value="<?= get_input('codeDoc', $doc->codeDoc) ?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" name="titre" value="<?= get_input('titre', $doc->titre) ?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Auteur</label>
                        <input type="text" name="auteur" value="<?= get_input('auteur', $doc->auteur) ?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Année de publication</label>
                        <input type="number" min="1900" max="2022" step="1" value="<?= get_input('anneePub', $doc->anneePub) != null ?get_input('anneePub', $doc->anneePub) :2000 ?>" name="anneePub" value="<?= get_input('anneePub')?>"  class="form-control" placeholder="" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Catégorie</label>
                        <select class="form-control" name="categorie" required>
                        <option value="Roman"  <?= get_input('categorie', $doc->categorie) == "Roman"? "selected":"" ?> >Roman</option>
                        <option value="Bande dessinée"  <?= get_input('categorie', $doc->categorie) == "Bande dessinée"? "selected":"" ?> >Bande dessinée</option>
                        <option value="Jeux vidéo"  <?= get_input('categorie', $doc->categorie) == "Jeux vidéo"? "selected":"" ?> >Jeux vidéo</option>
                        <option value="DVD"  <?= get_input('categorie', $doc->categorie) == "DVD"? "selected":"" ?> >DVD</option>
                        <option value="CD"  <?= get_input('categorie', $doc->categorie) == "CD"? "selected":"" ?> >CD</option>
                        <option value="Blu-ray"  <?= get_input('categorie', $doc->categorie) == "Blu-ray"? "selected":"" ?> >Blu-ray</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Type</label>
                        <select class="form-control" name="type" required>
                        <option value="Enfant"  <?= get_input('type', $doc->type) == "Enfant"? "selected":"" ?> >Enfant</option>
                        <option value="Ado"  <?= get_input('type', $doc->type) == "Ado"? "selected":"" ?> >Ado</option>
                        <option value="Adulte"  <?= get_input('type', $doc->type) == "Adulte"? "selected":"" ?> >Adulte</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="">Genre</label>
                        <select class="form-control" name="genre" required>
                            <option value="Comédie" <?= get_input('genre', $doc->genre) == "Comédie"? "selected":"" ?> >Comédie</option>
                            <option value="Drame" <?= get_input('genre', $doc->genre) == "Drame"? "selected":"" ?> >Drame</option>
                            <option value="Horreur"  <?= get_input('genre', $doc->genre) == "Horreur"? "selected":"" ?> >Horreur</option>
                            <option value="Sci-fi"  <?= get_input('genre', $doc->genre) == "Sci-fi"? "selected":"" ?> >Sci-fi</option>
                            <option value="Documentaire"  <?= get_input('genre', $doc->genre) == "Documentaire"? "selected":"" ?> >Documentaire</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="row">
                
                <div class="col-md-8">
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" name="description"  rows="1"><?= nl2br(get_input('description', $doc->description)) ?></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">ISBN (<span class="text-danger">Obligatoire pour Roman</span>)</label>
                        <input type="text" name="isbn" value="<?= get_input('isbn', $doc->isbn)?>"  class="form-control" placeholder="">
                    </div>
                </div>
            </div>
                
            <button type="submit" class="btn <?= isset($_GET['codeDoc'])? "btn-warning" : "btn-success" ?> btm-sm btn-rounded" name="addDocument"> <?= isset($_GET['edit'])? "Modifier" : "Ajouter" ?> </button>
            <a href="?page=document" class="btn btn-primary btm-sm btn-rounded"> Retour</a>
        </form>
    </div>
</div>