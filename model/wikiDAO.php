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
    
    public function updateWiki($title, $content, $image, $user_id, $cat_id, $wiki_id) {
        $stmt = $this->db->prepare("UPDATE wikis SET titre = :titre, contenu = :contenu, image = :image, user_id = :userid, cat_id = :catid WHERE wiki_id = :wiki_id");
        $stmt->bindParam(":titre", $title);
        $stmt->bindParam(":contenu", $content);
        $stmt->bindParam(":image", $image);
        $stmt->bindParam(":userid", $user_id);
        $stmt->bindParam(":catid", $cat_id);  
        $stmt->bindParam(":wiki_id", $wiki_id);
        $stmt->execute();
    }
    public function Delet_wiki($wiki_id) {
        $stmt = $this->db->prepare("DELETE FROM wikis WHERE wiki_id = :wiki_id");
        $stmt->bindParam(":wiki_id", $wiki_id);
        $stmt->execute();
    }
    public function Search($keyword){
        $stmt = $this->db->prepare(
        "SELECT DISTINCT w.*, c.*
        FROM wikis w
        JOIN categories c ON w.cat_id = c.cat_id
        JOIN wiki_tags wt ON wt.wiki_id = w.wiki_id
        JOIN tags t ON t.tag_id = wt.tag_id
        WHERE
        w.titre LIKE CONCAT('%', :keyword, '%') OR
        c.cat_name LIKE CONCAT('%', :keyword, '%') OR
        t.tag_name LIKE CONCAT('%', :keyword, '%')");

        $stmt->bindParam(":keyword",$keyword);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        
        return $result;
    }
    public function CountWikis(){
        $stmt = $this->db->query("SELECT count(wiki_id) as count FROM `wikis`;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ?? 'count'; 
    }
    public function Get_wiki($wiki_id){
        $stmt = $this->db->prepare("SELECT *  FROM wikis INNER JOIN categories ON wikis.cat_id = categories.cat_id WHERE wikis.wiki_id = :wiki_id ");
        $stmt->bindParam(":wiki_id",$wiki_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function Get_wiki_cat($cat_id){
        $stmt = $this->db->prepare("SELECT *  FROM wikis INNER JOIN categories ON wikis.cat_id = categories.cat_id WHERE wikis.cat_id = :cat_id AND wikis.status = 0 ORDER BY wikis.wiki_date DESC;");
        $stmt->bindParam(":cat_id",$cat_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    public function getID($title){
        $stmt = $this->db->prepare("SELECT * FROM wikis WHERE titre = :title");
        $stmt->bindParam(":title",$title);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['wiki_id'];

    }
    public function ArchiveWikis($wiki_id){
        $stmt = $this->db->prepare("UPDATE wikis SET status = 1 WHERE wiki_id = :wiki_id");
        $stmt->bindParam(":wiki_id",$wiki_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function getWiki($wiki_id){
        $stmt = $this->db->prepare("SELECT * FROM wikis WHERE  wiki_id = :wiki_id AND status = 0");
        $stmt->bindParam(":wiki_id",$wiki_id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        

    }
   
}