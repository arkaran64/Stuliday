<?php 
    require ('inc/connect.php');
    require ('inc/functions.php');
    require ('assets/head.php');    
    include ('assets/nav.php');   
    $annonce_id = $_POST['annonce_id'];
    $user_id = $_SESSION['id'];
    

    if(isset($_POST['submit_mod'])){
       
       
       $title = htmlspecialchars($_POST['title']);
       $description = htmlspecialchars($_POST['description']);
       $city = htmlspecialchars($_POST['city']);
       $category = htmlspecialchars($_POST['category']);
       $file = $_FILES['img_url'];
       $address = htmlspecialchars($_POST['address']); 
       $price = htmlspecialchars($_POST['price']);
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
           
                   $sth = $db->prepare(" UPDATE annonces 
                   SET title = :title, description = :description, city = :city, category = :category, image_url = :image_url, address_article = :address_article, price = :price, author_article = :author_article, start_date = :start_date, end_date = :end_date 
                   WHERE id = $annonce_id ");

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
           
                   echo "<div class ='col-12 alert alert-success text-center'> Modification enregistrée :)  </div>" ;
               }else{
                   echo "<div  class='col-12 alert alert-warning text-center'> Un problème est survenu !</div>" ;
                   
               }
           }
       }
   }