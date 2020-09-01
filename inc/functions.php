<?php

function random_images($h,$w){
    echo "https://loremflickr.com/$h/$w/house,cottage";
}

function shorten_text($text, $max = 120, $append = '&hellip;'){
    if(strlen($text)<=$max) return $text;
    $return = substr($text, 0, $max);
    if(strpos($text,' ')===false) return $return . $append;
    return $return.$append;
    return preg_replace('\w+$/', ' ', $return).$append;
}

function displayAllUsers(){
    global $db;
    $sql = $db->query("SELECT * FROM users");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){
        ?>
        <div class="col-4">
            <div class="card p-3">
                <h2>User n°<?= $row['id'] ; ?></h2>
                <p><?= $row['email'] ; ?></p>
            </div>
        </div>
        <?php
        }

}

function displayAllAnnonces(){
    global $db;
    $sql = $db->query("SELECT * FROM annonces");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){
        ?>
            
        <div class="card" style="width: 16rem;">
            <img class="card-img-top" src="assets/uploads/<?= $row['image_url'];?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Annonce n° <?=$row['id'];?></h5>
            </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><h2><?= $row['title'];?></h2></li>
                    <li class="list-group-item">Lieu: <h3><?= $row['city'];?></h3></li>
                    <li class="list-group-item"><p><?= $row['price'];?> €/nuit </p></li>
                </ul>
            <div class="card-body">
                <a class="btn btn-success" href="annonce.php?id=<?= $row['id'] ?>" class="card-link">Voir l'annonce</a>
            </div>
        </div>
        <?php
        }
}

function displayAnnonce($id){
    global $db;
    $sql = $db->query("SELECT * FROM annonces WHERE id = $id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

        while($row = $sql->fetch()){
        ?>
        <div class="col-12">
            <div class="card" style="width: 18rem;">
                <h2>Annonce n°<?= $row['id'] ; ?></h2>
                <h3><?= $row['title'] ; ?></h3>
                <img class="card-img-top" src="assets/uploads/<?= $row['image_url'] ; ?>" alt="img">
                <p>Lieu : <?= $row['city'] ; ?></p>
                <p>Addresse :<?= $row['address_article'] ; ?></p>
                <p>Type : <?= $row['category'] ; ?></p>
                <p>Prix par nuit: <?= $row['price'] ; ?></p>
                <p>Debut de location:<?= $row['start_date'] ; ?></p>
                <p>Fin de location:<?= $row['end_date'] ; ?></p>
                <div class='row'>
                <a href="reservation.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-lg">Reserver</a>
                                 
                </div>
            </div>
        </div> 
        <?php
        }
}

function displayAllAnnoncesByUser($user_id){
    global $db;
    $sql = $db->query("SELECT * FROM annonces WHERE annonces.author_article = $user_id");
    $sql->setFetchMode(PDO::FETCH_ASSOC);

        ?>        
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Titre</th>
                    <th scope="col">lieu</th>
                    <th scope="col">Addresse</th>
                    <th scope="col">Type</th>
                    <th scope="col">Prix/Nuit</th>            
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>            
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
        <tbody>
            <?php
            while($row = $sql->fetch()){
            ?>
                <tr id="row-<?php echo $row['id']; ?>" ></tr>
                    <th scope="row"><?php echo $row['id'] ; ?></th>
                    <td><?php echo $row['title'] ; ?></td>
                    <td><?php echo $row['city'] ; ?></td>
                    <td><?php echo $row['address_article'] ; ?></td>
                    <td><?php echo $row['category'] ; ?></td>
                    <td><?php echo $row['price'] ; ?> €</td>
                    <td><?php echo $row['start_date'] ; ?></td>
                    <td><?php echo $row['end_date'] ; ?> </td>
                   
                    <td><a href="edit_annonce.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-lg">Modifier</a></td>
                    <td><a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-secondary btn-lg">Supprimer</a></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
        <?php
    }

function displayAllReservationsByUser($user_id){

        global $db;
        $sqlRes = $db->query("SELECT * FROM annonces AS a LEFT JOIN reservations AS r ON r.id_annonce = a.id WHERE id_user = $user_id");
        $sqlRes->setFetchMode(PDO::FETCH_ASSOC);

        ?>        
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">N°</th>
                    <th scope="col">Titre</th>
                    <th scope="col">lieu</th>
                    <th scope="col">Addresse</th>
                    <th scope="col">Type</th>
                    <th scope="col">Prix/Nuit</th>            
                    <th scope="col">Date de début</th>
                    <th scope="col">Date de fin</th>            
                    <th scope="col"></th>
                </tr>
            </thead>
        <tbody>
        <?php
            while($row = $sqlRes->fetch()){
            ?>
                <tr id="row-<?php echo $row['id']; ?>" ></tr>
                    <th scope="row"><?php echo $row['id'] ; ?></th>
                    <td><?php echo $row['title'] ; ?></td>
                    <td><?php echo $row['city'] ; ?></td>
                    <td><?php echo $row['address_article'] ; ?></td>
                    <td><?php echo $row['category'] ; ?></td>
                    <td><?php echo $row['price'] ; ?> €</td>
                    <td><?php echo $row['start_date'] ; ?></td>
                    <td><?php echo $row['end_date'] ; ?> </td>                   
                    <td><a href="delete_resa.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-lg">Annuler</a></td>
                    </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
        <?php
    }
   