<?

class PageController {
    static function render($page_name, $params = []) {

        foreach ($params as $key => $value) {
            $$key = $value;
        }

        require_once (__DIR__ . "/../view/header.php");        
        require_once (__DIR__ . "/../view/pages/" . $page_name . ".php");
        require_once (__DIR__ . "/../view/footer.php");
    }

    static function get_link($controller = "index", $action = "index") {
        return "/?controller=" . $controller . "&action=" . $action;
    }

    static function redirect($controller = "", $action = ""){
        header("Refresh:0; url=" . self::get_link($controller, $action));
        die();
    }
}

?>