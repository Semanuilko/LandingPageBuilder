<?
class MainController {

    private static $settings = [
        "default_controller" => "index",
        "default_action" => "index"
    ];

    static function activate() {
        collect_classes (__DIR__ . "/../model/"); 
        collect_classes (__DIR__ . "/","_controller.php"); 
        
        $action_path = self::get_action_path(self::get_controller_params());        
        include $action_path;

    }

    static function get_controller_params() {
        
        $param = $_GET;
        if ( empty($param['controller']) ) {
            $param['controller'] = self::$settings["default_controller"];
        } 

        if ( empty($param['action']) ) {
            $param['action'] = self::$settings["default_action"];
        }
        
        if ( !file_exists(self::get_action_path($param)) ) {
            $param['controller'] = "not_found";
            $param['action'] = "index";
        }

        return $param;

    }

    static function get_action_path ($param) {
       return __DIR__ . "/actions/" . $param['controller'] . "/" . $param['action'] . ".php";
    }
}

?>