<?php

require_once('../model/CategoryDAO.php');
$categoriesOBJ = new CategoryDAO();
$categories = $categoriesOBJ->get_cats();
$fourcategories = $categoriesOBJ->get_4cats(); 

if(isset($_POST['add']) ){
    $name = $_POST['catName'];
    $image = $_FILES['catImg'];
    $tmp_name = $_FILES['catImg']['tmp_name'];
    $image = file_get_contents($tmp_name);
    $categoriesOBJ->insertCat($name,$image);
    header('location:../view/dashboard.php');
}
if (isset($_POST['update'])) {
   

    $categoryId = $_POST['cat_id'];
    $editedCatName = $_POST['cat_name'];
    $editedCatImage = $_FILES['cat_image'];
    $tmp_name = $_FILES['cat_image']['tmp_name'];
    $editedCatImage = file_get_contents($tmp_name); 
    $categoriesOBJ->update_category($categoryId,$editedCatName,$editedCatImage);
    header("location: ../view/dashboard.php");


}
if(isset($_POST['delete'])){
    $cat_id =  $_POST['cat_id'];
    $categoriesOBJ->Delete_cat($cat_id);
    header("location: ../view/dashboard.php");
}