<?php
require_once('../config/database.php');
require_once('class/user.php');
class UserDAO{
    private $db;
    private User $user;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    public function Signup($firstname, $lastname, $email, $pass){
        $stmt = $this->db->prepare("INSERT INTO users (nom, prenom, email, pass) VALUES (:nom, :prenom, :email, :pass)");
        $stmt->bindParam(":nom", $firstname);
        $stmt->bindParam(":prenom", $lastname);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":pass", $pass);
        $stmt->execute();
    }
    public function verifyUser($email,$pass){
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam('!email',$email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($pass, $result['pass'])){
            return true;

        }else{
            return false;
        }
    }
    
}