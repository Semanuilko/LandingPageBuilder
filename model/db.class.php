<?
class DB {
    static private $instance;
    private $connection;
    private function __construct () {
    }

    static public function get_instance () {
        if (!self::$instance){
            self::$instance = new self();           
            self::$instance->connect([
                "host" => "127.0.0.1",
                'user' => "root",
                'password' => "root",
                'db' => "mydb",
                'port' => "8890"
            ]);
        }
        return self::$instance;
    }

    public function connect ($settings) {
        $this->connection = new mysqli($settings['host'], $settings['user'], $settings['password'], $settings['db'], $settings['port']);
    }

    public function query ($query) {
        $rows = [];
        if ($result = $this->connection->query($query)) {
            if (is_object($result)) {
                while ($row = $result->fetch_assoc()) {
                    array_push ($rows, $row);
                }
            }
        } else {
            die("Connection failed!");
        }
        return $rows;        
    }
}

?>