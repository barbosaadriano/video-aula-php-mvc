<?php

header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
error_reporting(E_ALL);

/**
 * Método de carregamento automático de classes
 * @param class $c classe que será instaciada
 */
function __autoload($c) {
    $diretorios = array(
        '../',
        '../to/',
        '../config/',
        '../model/',
        '../libs/',
        '../gui/',
        '../dao/',
        '../exemplo/'
    );

    foreach ($diretorios as $dir) {
        if (file_exists($dir . $c . '.php')) {
            require_once $dir . $c . ".php";
        }
    }
}

foreach (Config::getInstance()->getConfs() as $nome => $valor) {
    define($nome, $valor);
}

$app = new TApp();
try {
    $app->executar();
} catch (Exception $exc) {
    $erro = new ErrorController($exc);
    $erro->exibir();
}


