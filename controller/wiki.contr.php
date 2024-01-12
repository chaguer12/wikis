<?php
require_once('../model/WikiDAO.php');
require_once('../model/UserDAO.php');
require_once('../model/wiki_tagDAO.php');


if(isset($_POST['add']) && $_SESSION['role'] = 'auteur'){
    
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $tags = $_POST['tags'];
    $image = $_FILES['image'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $image = file_get_contents($tmp_name);
    session_start();
    $userEmail = $_SESSION['email'];
    $user = new UserDAO();
    $userid = $user->Get_user_id($userEmail);
    $wiki = new WikiDAO();
    $tagOBJ = new wiki_tagDAO();
    if (isset($_SESSION['email'])){
        $article = $wiki->insertWiki($title,$content,$image,$userid,$category);
        $wiki_id = $wiki->getID($title);
       
    
        foreach($tags as $tag){
            $tagOBJ->insertTags($wiki_id,$tag);
        }
        header("location: ../view/feed.php");

}else{
    header('location:../view/login.php');
}
    
}
if(isset($_GET)){
    $wiki_id = $_GET['wiki_id']; 
    
if(isset($_POST['edit'])){
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
    if (isset($_SESSION['email'])){
        $article = $wiki->updateWiki($title,$content,$image,$userid,$category,$wiki_id);
        $wiki_id = $wiki->getID($title);
        $tagOBJ->DeleteTags($wiki_id);
       
    
        foreach($tags as $tag){
            $tagOBJ->insertTags($wiki_id,$tag);
        }
        header("location: ../view/feed.php");

}else{
    header('location:../view/login.php');
}
}
}

