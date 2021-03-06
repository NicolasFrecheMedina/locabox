<?php
session_start();
include '../connect.php';

if (isset($_GET['id'])){
    $id = intval($_GET['id']);
    if ($id > 0){
        $sql = 'SELECT * FROM actualite WHERE id='.$id;
        $req = $bdd->prepare($sql);
        $req->execute();
        $actualite = $req->fetch(PDO::FETCH_ASSOC);
    }
}

?>

    <div class="container">
        <h1 class="text-center mt-4">Fiche actualite</h1>

        <form>
            <input type="hidden" name="id" value="<?= $actualite['id'] ?>">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="titre">Titre :</label>
                        <input type="text" class="form-control" id="titre" name="titre" value="<?= $actualite['titre'] ?>" readonly>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="slug">Slug :</label>
                        <input type="text" class="form-control" id="slug" name="slug" value="<?= $actualite['slug'] ?>" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="miniature">Miniature :</label>
                        <a href="<?= '../administration/actualites/pages/img/illustration/'. $actualite['illustration'] ?>"><img src="<?= '../administration/actualites/pages/img/illustration/miniature/'. $actualite['illustration_miniature'] ?>" alt="miniature"></a>
                    </div>
                </div>         
                <div class="col-6">
                    <div class="form-group">
                        <label for="contenu">Contenu :</label>
                        <textarea name="contenu" id="contenu" cols="30" rows="10" readonly><?= $actualite['contenu'] ?></textarea>
                        <script>
                            CKEDITOR.replace( 'contenu' );
                        </script>
                    </div>
                </div>
            </div>
                <a href="actualites.php"> retour</a>
        </form>
    </div>
