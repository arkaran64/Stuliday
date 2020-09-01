<?php 
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');  
    $user_id = $_SESSION['id'];
    $resa_id = ($_GET['id']);


    //requete de suppression
            $sth =$db->prepare("DELETE FROM reservations WHERE id =  $resa_id");
            $sth->execute(); 

        echo 'Reservation supprimée!';
        
          
    ?>
   <br>
    <button class="btn btn-secondary btn-lg"><a href="profile.php">Retour</a></button>

    <?= require ('assets/footer.php'); ?>
