<?php
class Model{
    public $db;
    public function __construct(){
       try{
           $this->db = new PDO('mysql:host=localhost;dbname=exchanges',
		'root' , '');
           $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           $this->db->exec('SET NAMES "utf8"');
        }catch(Exception $e){
            echo 'Не удалось подключиться к бд';
            die();
        }
    }
    
}