<?php
require_once('../model/UserDAO.php');

$user = new UserDAO();
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $errors = array();
    $patternEmail = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $patternPassword = '/^.{4,}$/';
    if (!preg_match($patternEmail, $email)) {
        array_push($errors, "Email is not valid.");
    }
    if (!preg_match($patternPassword, $pass)) {
        array_push($errors, "Please use at least 4 characters");
    }
    if (count($errors) > 0) {

        foreach ($errors as $error) {
            echo '<div class="bg-red-500 rounded-xl text-white p-2 my-2">' . $error . '</div>';
       
        }
        
}else{
    $login = $user->verifyUser($email,$pass);
    $role = $user->Get_user_role($email);
    $user_id = $user->Get_user_id($email);
    session_start();

    if($login == true && $role == 'auteur'){
        
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user_id; 
        
        header("location:../view/feed.php");
    }elseif($login == true && $role == 'admin'){
        
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;
        $_SESSION['user_logged_in'] = true;
        $_SESSION['user_id'] = $user_id;
        // var_dump($_SESSION['role']);
        // die("here");
        header("location:../view/dashboard.php");
        
    }else{
        header("location:../view/login.php");
}

}


    
    
}