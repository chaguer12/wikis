<?php
   if(!isset($_SESSION)) 
   { 
       session_start(); 
       if($_SESSION['role'] != 'admin'){
        header('location:./404.php');
    }
   }
