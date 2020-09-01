<?php 
    $page='annonce';
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');
    $id = $_GET['id'];
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">    
                <div class="row">
                    <?php
                        displayAnnonce($id);                
                    ?>
               </div>
            </div>
        </div>        
    </div>
</section>
<?php require ('assets/footer.php'); ?>