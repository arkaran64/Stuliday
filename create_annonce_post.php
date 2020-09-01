<?php 
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');
   

    if(isset($_POST['submit']) ){
      
      
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $city = htmlspecialchars($_POST['city']);
        $category = htmlspecialchars($_POST['category']);
        $file = $_FILES['img_url'];
        $address = htmlspecialchars($_POST['address']); 
        $price = htmlspecialchars($_POST['price']);
        $user_id = $_SESSION['id'];
        $start_date = ($_POST['start_date']);
        $end_date = ($_POST['end_date']);

        if($file['size'] <= 1000000){

            $valid_ext = array('jpg','jpeg','png','gif');
            $check_ext = strtolower(substr(strrchr($file['name'], '.'),1));
           

            if(in_array($check_ext,$valid_ext)){

                $imgname      = uniqid() . '_' . $file['name'];
                $upload_dir   = "./assets/uploads/";
                $upload_name  = $upload_dir . $imgname;
                $move_result  = move_uploaded_file($file['tmp_name'], $upload_name);  
               


                if($move_result){
            
                    $sth = $db->prepare(" INSERT INTO annonces(title, description, city, category, image_url, address_article, price, author_article, start_date, end_date) 
                    VALUES (:title, :description, :city, :category, :image_url, :address_article, :price, :author_article, :start_date, :end_date)
                    ");

                    $sth->bindValue(':title', $title);    
                    $sth->bindValue(':description',$description);           
                    $sth->bindValue(':city',$city);
                    $sth->bindValue(':category',$category);
                    $sth->bindValue(':image_url',$imgname);
                    $sth->bindValue(':address_article',$address);
                    $sth->bindValue(':price',$price);
                    $sth->bindValue(':author_article',$user_id);
                    $sth->bindValue(':start_date',$start_date);
                    $sth->bindValue(':end_date',$end_date);
                
                
                    $sth->execute();
                    echo "<div class ='col-12 alert alert-success text-center'> Annonce enregistrée :)</div><br>";
                    
                }
            }
        }
    }else{
        echo "<div class ='col-10 alert alert-alert text-center'> une erreur s'est produite, veuillez recommencer la saisie.  </div>" ;
    }

  require ('assets/footer.php');
  
  ?>