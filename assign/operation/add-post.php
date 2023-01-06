<?php 
    session_start();
    include('../db.php');
    if(isset($_SESSION['user'])){
    $title= $_POST['title'];
    $description = $_POST['description'];
    $id = $_SESSION['user'][0]['id'];
    if($con){  
        $sql = "INSERT INTO post (post_title,post_description,user_id)
        VALUES (:t,:d,:u)";
        $query = $con->prepare($sql);
        $query->bindParam(':t',$title);
        $query->bindParam(':d',$description);
        $query->bindParam(':u',$id);
        $res = $query->execute();
        if($res){
            header('Location:../dashboard.php');
        }   else{
            header("Location:../login.php");
        }
}else{
    header("../login.php");
}
}
?>