<?php 
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');
    $user_id = $_SESSION['id'];
   


    if(isset($_POST['submit_update'])){
        $update_email = ($_POST['email']);
        $update_firstname =($_POST['prenom']);
        $update_lastname = ($_POST['nom']);
        $update_address =($_POST['adresse']);        

        $sth = $db->prepare("UPDATE users SET email = :email, firstName = :firstName, lastName = :lastName, userAddress = :userAddress  WHERE id = $user_id");
        $sth->bindValue(':email',$update_email);
        $sth->bindValue(':firstName',$update_firstname);
        $sth->bindValue(':lastName',$update_lastname);
        $sth->bindValue(':userAddress',$update_address);
       

        $sth->execute();
       
        echo '<div class="alert alert-success">Votre compte a bien été mis à jour!</div>';
    }else{
        echo '<div class="alert alert-warning">Erreur de mise à jour!</div>';
    }

  require ('assets/footer.php'); 
  
  ?>