<?php
require_once('../config/database.php');
require_once('class/wiki_tag.php');
class wiki_tagDAO{
    private $db;
    private Wiki_tag $wiki_tag;

    public function __construct(){
        $this->db = Database::getInstance();
        
    }
    public function insertTags($wiki_id,$tag_id){
       
            $stmt = $this->db->prepare("INSERT INTO wiki_tags (wiki_id,tag_id) VALUES (:wiki_id,:tag_id)");
            $stmt->bindParam(":wiki_id",$wiki_id);
            $stmt->bindParam(":tag_id",$tag_id);
            $stmt->execute();
      
    }
    public function DeleteTags($wiki_id){
        $stmt = $this->db->prepare("DELETE FROM wiki_tags WHERE wiki_id = :wiki_id");
        $stmt->bindParam(":wiki_id",$wiki_id);
        $stmt->execute();
    }
    

    
}