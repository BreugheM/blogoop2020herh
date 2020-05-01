<?php


class Role extends DbObject
{
    /*general variabelen*/
    protected static $db_table = "roles";
    protected static $db_fields = array('role');
    /**object variabelen**/
    public $id;
    public $role;

}