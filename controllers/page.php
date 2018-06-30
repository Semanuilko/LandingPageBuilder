<?

class PageController {
    static function render($page_name, $params = []) {
        require_once (__DIR__ . "/../view/pages/" . $page_name . ".php");
    }
}

?>