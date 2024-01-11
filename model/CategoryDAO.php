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
    public function get_4cats(){
        $stmt = $this->db->query("SELECT * FROM categories LIMIT 4;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function insertCat($name,$image){
       $stmt = $this->db->prepare("INSERT INTO categories (cat_name,image) VALUE (:name,:img)");
       $stmt->bindParam(":name",$name);
       $stmt->bindParam(":img",$image);
       $stmt->execute(); 
    }

    public function countCategories(){
        $stmt = $this->db->query("SELECT count(cat_id) as count FROM `categories`;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }
    public function update_category($cat_id,$cat_name,$img){
        $stmt = $this->db->prepare("UPDATE categories SET cat_name = :cat_name ,image = :img WHERE cat_id = :cat_id");
        $stmt->bindParam(":cat_id",$cat_id);
        $stmt->bindParam(":cat_name",$cat_name);
        $stmt->bindParam(":img",$img);
        $stmt->execute();
        
    }
    public function Delete_cat($cat_id){
        $stmt = $this->db->prepare("DELETE FROM categories WHERE cat_id = :id");
        $stmt->bindParam(":id",$cat_id);
        $stmt->execute();
    }


}