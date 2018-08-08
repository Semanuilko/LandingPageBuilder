<?

class AuthController {
    private function __construct (){
    }

    static function authorize($user_data){        
        if (!empty($user_data['id'])) {
            $user = User::get_user_by_id($user_data['id']);
            self::set_current_user($user);
            return true;
        } else {
            $user = User::find_user($user_data); 
        }

        if ( !$user ) {
            return false;
        }

        $hash = md5(rand(1,999999)."tmp");
        DB::get_instance()->query('INSERT INTO `auth` (`user_id`, `hash`) VALUES ("' .  $user->id . '","' . $hash  . '")');
        setcookie ("auth_hash",  $hash);        
        self::set_current_user($user);
        PageController::redirect();        
        return true;        
    }

    static function check_cookie() {
        if (!empty($_COOKIE["auth_hash"])) {
           $select = DB::get_instance()->query('SELECT * FROM auth WHERE `hash` = "' . $_COOKIE["auth_hash"] . '"');
           if ($select[0]) {
            self::set_current_user(User::get_user_by_id($select[0]['user_id']));
           }
        }
    }

    static function set_current_user($user) {
        $GLOBALS['current_user'] = $user;        
    }

    static function get_current_user() {
        if (empty( $GLOBALS['current_user'])) {            
            return NULL;
        } 
        return  $GLOBALS['current_user'];
    }

    static function logout() {
        setcookie ("auth_hash",  NULL, -1);
        $user = self::get_current_user();
        DB::get_instance()->query('DELETE FROM auth WHERE `user_id` = "' . $user->id . '" AND `hash` = "' . $_COOKIE["auth_hash"] . '"');
        PageController::redirect(); 
    }
}

?>