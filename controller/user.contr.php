<?php

require_once( '../view/includes/session.php');
require_once( '../model/UserDAO.php');
require_once( '../model/wikiDAO.php');
require_once( '../model/CategoryDAO.php');
require_once( '../model/tagDAO.php');
$userOBJ = new UserDAO();
$countusers = $userOBJ->CountUsers();
$wikiOBJ = new WikiDAO();
$countwikis = $wikiOBJ->CountWikis();
$categoryOBJ = new CategoryDAO();
$countcategories = $categoryOBJ->countcategories();
$tagOBJ = new TagDAO();
$counttags = $tagOBJ->countTags();

if (!isset($_SESSION['role'])) {
    $role = 0;
} else {
    $role = isset($userOBJ) ? $userOBJ->Get_user_role($_SESSION['email']) : 0;
}

if ($role !== 0) {
    if ($role === 'admin') {
        $role = $userOBJ->Get_user_role($_SESSION['email']);
     
} 
}

