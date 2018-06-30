<?
class MainController {
    static function activate() {
        collect_classes (__DIR__ . "/../model/");   
        dump(DB::get_instance()->query("SHOW TABLES"));    
    }
}

?>