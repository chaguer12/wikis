<?php
require_once('../model/WikiDAO.php');
require_once('../model/UserDAO.php');
require_once('../model/wiki_tagDAO.php');

$wiki = new WikiDAO();
if(isset($_POST['add'])){
    session_start();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image = file_get_contents($tmp_name);

    $userEmail = $_SESSION['email'];
    $user = new UserDAO();
    $userid = $user->Get_user_id($userEmail);
    $wiki = new WikiDAO();
    $tagOBJ = new wiki_tagDAO();
    if (isset($_SESSION['email']) && $_SESSION['role'] !== 'admin'){
        $article = $wiki->insertWiki($title,$content,$image,$userid,$category);
        $wiki_id = $wiki->getID($title);
       
    
        foreach($tags as $tag){
            $tagOBJ->insertTags($wiki_id,$tag);
        }
        header("location: ../view/feed.php");
        exit;
        

}else{
    header('location:../view/login.php');
}
    
}

    
if(isset($_POST['edit'])){
        session_start();
        $wiki_id = $_POST['wiki_id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $tags = $_POST['tags'];
        $image2 = $_FILES['image'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $image2 = file_get_contents($tmp_name);
        $userEmail = $_SESSION['email'];
        $user = new UserDAO();
        $userid = $user->Get_user_id($userEmail);
        $wiki = new WikiDAO();
        $tagOBJ = new wiki_tagDAO();
        
        if (isset($_SESSION['email'])){
            $article = $wiki->updateWiki($title,$content,$image2,$userid,$category,$wiki_id);
            $wiki_id = $wiki->getID($title);
            $tagOBJ->DeleteTags($wiki_id);
        
        
            foreach($tags as $tag){
                $tagOBJ->insertTags($wiki_id,$tag);
            }
            header("location: ../view/feed.php");
            exit;
            

    }else{
        header('location:../view/login.php');
    }
    
            
        }

if(isset($_POST['delete'])){

    $wiki_id = $_POST['id_wiki'];    

    $wiki = new WikiDAO();
    
   
    $wiki->Delet_wiki($wiki_id);
    header("location: ../view/feed.php");
    exit;
}
if(isset($_POST['archive'])){
    $wiki_id = $_POST['wiki'];
    $wiki = new WikiDAO;
    $wiki->ArchiveWikis($wiki_id);
    header("location: ../view/feed.php");
}
        

