<?
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

function dump ($arg = false) {
  echo "<pre>" . print_r($arg, 1) . "</pre>";
}

function collect_classes ($dir, $mask = ".php") {
    foreach (scandir($dir) as $file) {
        if ($file === "." || $file === "..") {
            continue;
        }
        if (is_dir($dir . $file)) {
            collect_classes ($dir . $file . '/');
        } elseif (strpos($file, $mask) !== false) {
            require_once($dir . $file);
        }
    }
}
?>