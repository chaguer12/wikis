<?php
require_once('../config/database.php');
require_once('class/wiki.php');
class WikiDAO{
    private $db;
    private Wiki $wiki;
    
    public function __construct(){
        $this->db = Database::getInstance();
    }

    public function insertWiki($title,$content,$image,$user_id,$cat_id){
        $stmt = $this->db->prepare("INSERT INTO wikis (titre,contenu,image,user_id,cat_id,wiki_date) VALUES(:titre,:contenu,:image,:userid,:catid,CURRENT_TIMESTAMP())");
        $stmt->bindParam(":titre",$title);
        $stmt->bindParam(":contenu",$content);
        $stmt->bindParam(":image",$image);
        $stmt->bindParam(":userid",$user_id);
        $stmt->bindParam(":catid",$cat_id);
        $stmt->execute();

    }
    public function CountWikis(){
        $stmt = $this->db->query("SELECT count(wiki_id) as count FROM `wikis`;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }
    public function getWikis(){
        $stmt = $this->db->query("SELECT * FROM wikis join categories where wikis.cat_id = categories.cat_id and wikis.status = 0 ORDER by wiki_date DESC;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function get3Wikis(){
        $stmt = $this->db->query("SELECT * FROM wikis join categories where wikis.cat_id = categories.cat_id and wikis.status = 0 ORDER by wiki_date DESC LIMIT 3;");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function getArchWikis(){
        $stmt = $this->db->query("SELECT * FROM wikis WHERE status = 1");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
   
}