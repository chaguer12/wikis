<?php
include '../model/tagDAO.php';
$tagOBJ = new TagDAO();
$tags = $tagOBJ->getTags();
if(isset($_POST['add'])){
    $tag_name = $_POST['tagName'];
    $tagOBJ->insertTag($tag_name);
    header('location: ../view/dashboard.php');

}
if(isset($_POST['update'])){
    $tag_name = $_POST['tag_name'];
    $tag_id = $_POST['tag_id'];
    $tagOBJ->update_tag($tag_id,$tag_name);
    header('location: ../view/dashboard.php');
}
if(isset($_POST['delete'])){
    $tag_id = $_POST['tag_id'];
    $tagOBJ->Delete_tag($tag_id);
    header('location: ../view/dashboard.php');
}
