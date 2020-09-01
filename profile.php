<?php 
    $page ='profile';
    require ('inc/connect.php'); 
    require ('inc/functions.php');
    require ('assets/head.php');
    include ('assets/nav.php');
    $user_id = $_SESSION['id'];

    $sql1 = $db->query("SELECT COUNT(*) FROM annonces WHERE author_article = $user_id");
    $compteur= $sql1->fetchColumn();

    $sql2 = $db->query("SELECT COUNT(*) FROM reservations WHERE id_user = $user_id");
    $compt= $sql2->fetchColumn();

   
    // Requete de selection
    $sth = $db->prepare("SELECT * FROM users WHERE id = $user_id
    ");

    $sth->execute();

    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach ($result as $userData =>$data){   
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="py-4">Mon profil :</h2>
            </div>
            <div class="col-md-8">
                <form action="edit_user.php" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail">Nom</label>
                        <input type="text" class="form-control" name="nom" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="<?= $data['lastName']; ?>" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword">Prénom</label>
                        <input type="text" name="prenom" class="form-control" id="exampleInputPassword"
                            placeholder="<?= $data['firstName']; ?>" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Adresse </label>
                        <input type="text" class="form-control" name="adresse" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="<?= $data['userAddress']; ?>" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="<?= $data['email']; ?>">
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <input type="hidden" name="id" value="<?=$data['id']?>"?>
                            <input type="submit" name="submit_update" class="btn btn-info" value="Mettre à jour">
                        </div>                        
                    </div>
                </form>
<?php
    }
 ?>

            </div>
            <div class="col-md-4">
                <a href="create_annonce.php" class="btn btn-primary mb-3">Publier une nouvelle annonce</a>
                <a href="#" class="btn btn-primary mb-3 <?php  if($compteur < 1){ echo 'disabled'; } ?>"
                    data-toggle="modal" data-target="#listingAnnonces">Voir mes annonces  <span class="badge badge-primary badge-pill"><?= $compteur; ?></span>
                    </a>
                <a href="#" class="btn btn-primary mb-3 <?php  if($compt < 1){ echo 'disabled'; } ?>"
                    data-toggle="modal" data-target="#listingResa">Voir mes réservations <span class="badge badge-primary badge-pill"><?= $compt; ?></span></a>
            </div>
            <div class="col-md-12 text-center pt-5 my-2">
                <a class="btn btn-info back" href="annonces.php">Retour aux annonces</a>
            </div>
        </div>
    </div>
</section>

<!-- modal -->
<div class="modal fade bd-example-modal-xl" id="listingAnnonces" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog listings modal-xl" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Mes annonces</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=displayAllAnnoncesByUser($user_id); ?>
            </div>
        </div>
    </div>
</div>

<!-- modal-->
<div class="modal fade bd-example-modal-xl" id="listingResa" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog listings modal-xl" role="document">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title" id="myExtraLargeModalLabel">Mes réservations</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
           <?= displayAllReservationsByUser($user_id); ?> 
            </div>
        </div>
    </div>
</div>





<?php require ('assets/footer.php'); ?>