<?php
class User {
    private $fields = [];
    private static $users = [];

    function __construct($fields) {  
        $this->fields = $fields;
    }
    
    function __get ($key) {
        if (!empty($this->fields[$key])) {
            $value = $this->fields[$key];
            return $key==="info" ? json_decode($value, true) : $value;
        } 
    } 

    function __set ($key, $value) {
        if ($key === "info") {            
            $value = json_encode($value);
        } 
        $this->fields[$key] = $value;
    }
  
    function save () {
        if ($this->id) {
            DB::get_instance()->query("UPDATE `users` SET `name`= '" .  $this->name . "' , `login` =  '" .  $this->login  . "' , `password` =  '" . $this->password . "' , `info` =  '" . json_encode($this->info) . "' WHERE `users`.`id` = ". $this->id );                      
        } else {            
            DB::get_instance()->query('INSERT INTO `users` (`name`, `login`, `password`, `info`) VALUES ("' .  $this->name . '","' .  $this->login  . '","' . $this->password  . '","' . json_encode($this->info)  . '")');
        }                
    } 

    static function hash_password ($password) {
        return md5($password);
    }
 
    static function get_users (){
        if (empty(self::$users)) {
            $users = [];
            foreach (DB::get_instance()->query('SELECT * FROM users') as $user) {
                $id = $user['id'];
                $users[$id] = new User($user);
            }
            self::$users = $users;           
        }        
        return self::$users;               
   } 
   
   static function get_user_by_id ($id){
        if (empty(self::$users)) { 
            self::get_users();  
        }
        return self::$users[$id];
    }

    function get_info(){
        return json_decode($this->info, true);
    }

    function set_info($user_info){
        $this->info = json_encode($user_info);
    }

    static function find_user ($search_fields) {        
        foreach (self::get_users() as $user ) {
            $flag = 1;
            foreach ($search_fields as $key => $value) {
                if ( $user->$key !== $value ) {
                    $flag = 0;
                }
            } 
            if ($flag) {
                return $user;
            }
        }        
    }
}

?>