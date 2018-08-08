<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
session_start();

function dump ($arg = false) {    
    $output = print_r($arg, true);
    echo PHP_SAPI === 'cli'
        ? $output . "\n"
        : "<pre>$output</pre>";  
}

function collect_classes ($dir, $mask = ".php") {
    foreach (scandir($dir) as $file) {
        if ($file === "." || $file === "..") {
            continue;
        }
        if (is_dir($dir . $file)) {
            collect_classes ($dir . $file . '/', $mask);
        } elseif (strpos($file, $mask) !== false) {
            require_once($dir . $file);
        }
    }
}
?>