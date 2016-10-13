<?php

/**
 * Classe para abastração de conexão com o banco mysql
 *
 * @author adriano
 */
class Conexao {

    private static $cnx;

    /**
     * 
     * @return PDO
     */
    public static function getConexao() {
        if (!self::$cnx) {
            self::open();
        }
        return self::$cnx;
    }

    private static function open() {
        $host = HOST;
        $port = PORT;
        $dbName = DB_NAME;
        $userName = USER_NAME;
        $pass = PASSWORD;
        self::$cnx =
                new PDO("mysql:host={$host}; port={$port}; dbname={$dbName}", $userName, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    }

}