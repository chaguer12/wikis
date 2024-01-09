<?php
require_once('../model/CategoryDAO.php');
$categoriesOBJ = new CategoryDAO();
$categories = $categoriesOBJ->get_cats();