<?php 
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');   
    $annonce_id = ($_GET['id']);
    $user_id = $_SESSION['id'];
    
    

    // Requete de selection
    $sth = $db->prepare("SELECT * FROM annonces
    WHERE id = $annonce_id
    ");

    $sth->execute();

   
    while($data = $sth->fetch()){

?>
  
<section class="container py-5">
    <div class="row justify-content-center">
        <h1 class='col-12'>Modifier votre annonce :</h1>
        <br>
        <form action="edit_annonce_post.php" method="POST" enctype="multipart/form-data">
            <div class="form-row">               
                <div class="form-group col-md-12">
                    <label for="title_annonce">Titre</label>
                    <input type="text" class="form-control" name="title" id="title_annonce" value="<?=$data['title']?>">
                </div>
                <div class="form-group col-md-6">
                <label for="start_date">Date de début de location</label>
                <input type="date" class="form-control" name="start_date" id="start_date" value="<?=$data['start_date']?>">
                </div>
                <div class="form-group col-md-6">
                <label for="end_date">Date de fin de location</label>
                <input type="date" class="form-control" name="end_date" id="end_date" value="<?=$data['end_date']?>">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="address_annonce">Adresse complète</label>
                    <input type="text" class="form-control" name="address" id="address_annonce" value="<?=$data['address_article']?>" class="col-md-12" >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                        <label for="desc_annonce">Description de l'annonce</label>
                        <textarea class="form-control" name="description" rows="3" placeholder="<?=$data['description']?>" id="desc_annonce" required></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="city_annonce">Ville</label>
                    <input type="text" class="form-control" name="city" id="city_annonce" value="<?=$data['city']?>" class="col-md-12">
                </div>
                <div class="form-group col-md-12">
                    <label for="type_announce">Type du logement</label>
                    <select id="type_announce" class="col-md-12" name="category">
                        <option value=""><?=$data['category']?></option>
                        <option value="Logement Entier">Logement Entier</option>
                        <option value="Chambre privée">Chambre privée</option>
                        <option value="Chambre d'hôtel">Chambre d'hôtel</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                        <label for="price_annonce">Prix/nuit (en €) </label>
                        <input type="number" class="form-control" id="price_annonce" name="price" min ="1" max="5000" required placeholder="<?=$data['price']?>">
                </div>
                <div class="form-group">
                    <label for="img_url">Choisissez une photo de présentation</label>
                    <input type="file" name="img_url" id="img_url" accept=".png,.jpeg,.jpg,.gif" value="<?=$data['image_url']?> ">
                </div>                
            </div>
            <input type="hidden" name="annonce_id" value="<?= $annonce_id; ?>">
            <input type="submit" class="btn btn-primary col-6 offset-md-3" name ="submit_mod" placeholder="Modifier"/>
        </form>
        </div>
</section>


<?php 
    }

    require ('assets/footer.php'); ?>




