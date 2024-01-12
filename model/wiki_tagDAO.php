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
        foreach($tag_id as $tag){
            $stmt = $this->db->prepare("INSERT INTO wiki_tags (wiki_id,tag_id) VALUES (:wiki_id,:tag_id)");
            $stmt->bindParam(":wiki_id",$wiki_id);
            $stmt->bindParam(":tag_id",$tag);
            $stmt->execute();
        }
    }

    
}