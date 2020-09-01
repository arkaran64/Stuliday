<?php 
    $page='annonces';
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');
?>
<section class="list">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">   
                    <h1>Liste des annonces :</h1>
            </div>
            </div>
            <div class="row">
                <br>
                <?php
                displayAllAnnonces();                
                ?>
            </div>
    </div>
</section>
<?php require('assets/footer.php'); ?>