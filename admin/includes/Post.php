<?php

class Post extends DbObject
{

    /*general variabelen*/
    protected static $db_table = "posts";
    protected static $db_fields = array('title', 'description', 'short_description','category_id');
    public $id;
    public $title;
    public $description;
    public $short_description;
    public $category_id;
    /**methodes**/




}