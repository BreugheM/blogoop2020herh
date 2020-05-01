<?php


class Photo extends DbObject
{
    /*general variables*/
    protected static $db_table = "photos";
    protected static $db_fields = array('title', 'description', 'filename', 'type', 'size', 'alt');
    public $tmp_path;
    public $upload_directory = 'img';
    public $upload_directory_users = 'img/users';
    public $upload_directory_posts = 'img/posts';
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

    /**object variabelen**/
    public $id;
    public $title;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $alt;

    /**METHODES**/
    /**set file is de controle = gaat dit wel over een bestand! afbeelding!**/
    public function set_file($file){

        if(empty($file) || !$file || !is_array($file)){
            $this->errors[] = "Geen file opgeladen";
            return false;
        }elseif($file['error'] != 0){
            $this->errors[] = $this->upload_errors_array($file['error']);
            return false;
        }else{
            $this->filename = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];
        }
    }
    public function save(){
        if($this->id){
            $this->update();
        }else{
            if(!empty($this->errors)){
                return false;
            }
            if(empty($this->filename) || empty($this->tmp_path)){
                $this->errors[] = "Bestand niet beschikbaar";
                return false;
            }
            $target_path = SITE_ROOT .DS. "admin" . DS . $this->upload_directory . DS . $this->filename;

            if(file_exists($target_path)){
                $this->errors[] = "File {$this->filename} exists";
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
    public function picture_path(){
        return $this->upload_directory.DS.$this->filename;
    }

    public function delete_photo(){
        if($this->delete()){
            $target_path = SITE_ROOT.DS. 'admin' . DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        }else{
            return false;
        }
    }
}