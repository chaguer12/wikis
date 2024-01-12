<?php
require_once('../config/database.php');
require_once('class/wiki_tag.php');
class wiki_tagDAO{
    private $db;
    private Wiki_tag $wiki_tag;

    public function __construct(){
        $this->db = Database::getInstance();
        
    }

    
}