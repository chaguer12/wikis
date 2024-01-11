<?php
class Wiki_tag{
    private Wiki $wiki;
    private Tag $tag;

    public function __construct(){
        $this->wiki = new Wiki();
        $this->tag = new Tag();
        
    }

    public function get_wiki(){
        return $this->wiki;

    }

    public function get_Tag(){
        return $this->tag;
    }

}