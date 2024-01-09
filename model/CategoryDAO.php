<?php
require_once('../config/database.php');
require_once('class/category.php');
class CategoryDAO{
    private $db;
    private Category $category;

    public function __construct(){
        $this->db = Database::getInstance();
        
    }

    public function get_cats(){
        $stmt = $this->db->query("SELECT * FROM categories;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    
}