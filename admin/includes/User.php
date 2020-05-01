<?php
class User extends DbObject
{
    /*general variabelen*/
    protected static $db_table = "users";
    protected static $db_fields = array('username', 'password', 'first_name', 'last_name','user_image');
    /**object variabelen**/
    public $id;

    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $type;
    public $size;
    public $tmp_path;
    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "Er is geen error, upload gelukt!",
        UPLOAD_ERR_INI_SIZE => "Uw bestand  is groter dan de toegelaten upload filesize in het bestand PHP.INI!",
        UPLOAD_ERR_FORM_SIZE => "Zelf als ini maar gaat de max file size voorbij van het html formulier",
        UPLOAD_ERR_PARTIAL => "Het bestand is gedeeltelijk opgeladen",
        UPLOAD_ERR_NO_TMP_DIR => "Tijdelijke folder niet beschikbaar, raadpleeg hosting",
        UPLOAD_ERR_CANT_WRITE => "Kan niet naar de schijf schrijven",
        UPLOAD_ERR_EXTENSION => "Verkeerd bestandstype, upload gestopt",
        UPLOAD_ERR_NO_FILE => "Gelieve een bestand te selecteren alvorens op te laden"
    );
    public $upload_directory = 'img'.DS.'users';
    public $image_placeholder = 'http://place-hold.it/400x400&text=image';

    /**methodes**/
    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT* FROM ". self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array): false;
    }
    public function image_path_and_placeholder(){
        return empty($this->user_image) ?
            $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }
    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "Geen file opgeladen";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->user_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
    public function save_user_and_image(){
        $target_path = SITE_ROOT.DS.'admin'.DS.$this->upload_directory.DS.$this->user_image;
        if($this->id){
            move_uploaded_file($this->tmp_path, $target_path);
            $this->update();
            unset($this->tmp_path);
            return true;
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[] = "Bestand niet beschikbaar";
                return false;
            }

            if(file_exists($target_path)){
                $this->errors[] = "File {$this->user_image} exists";
                return false;
            }
            if(move_uploaded_file($this->tmp_path, $target_path)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }else{
                $this->errors[]= "Deze folder heeft geen schrijfrechten";
                return false;
            }
        }
    }
}