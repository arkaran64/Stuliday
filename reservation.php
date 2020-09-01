<?php 
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');  
   

    $annonce_id = ($_GET['id']);
    $user_id = $_SESSION['id'];


    $sql=$db->query("SELECT author_article FROM annonces WHERE id = $annonce_id");
    $verif = $sql->fetchColumn();

    if($verif != $user_id){
    $sth = $db->prepare("INSERT INTO reservations(id_user, id_annonce) VALUES (:id_user, :id_annonce)");
      
    $sth->bindValue(':id_user', $user_id);
    $sth->bindValue(':id_annonce', $annonce_id);

    $sth->execute();

        echo '<div class="alert alert-success">Réservation bien prise en compte!</div>';                  
    }else{
        echo '<div class="alert alert-warning">Vous ne pouvez faire de reservation sur vos annonces</div>'; 
    }
 




 require ('assets/footer.php'); 
 ?>


