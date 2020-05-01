<?php


class Category extends DbObject
{
    /*general variables*/
    protected static $db_table = "categories";
    protected static $db_fields = array('name');


    /**object variabelen**/
    public $id;
    public $name;


    /**METHODES**/
    /**set file is de controle = gaat dit wel over een bestand! afbeelding!**/


}