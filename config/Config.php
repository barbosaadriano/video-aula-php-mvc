<?php

/**
 * Description of Config class
 *
 * @author abarbosa
 */
class Config {

    private static $instance = null;
    private $confs;

    private function __construct() {
        $this->confs = self::getConfFile();
    }

    /**
     * 
     * @return Config
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Config();
        }
        return self::$instance;
    }

    function getConfs($name = null) {
        if ($name && isset($this->confs[$name])) {
            return $this->confs[$name];
        }
        return $this->confs;
    }

    function setConfs($confs, $merge = false) {
        if ($merge) {
            $this->confs = array_merge($confs, $this->confs);
        } else {
            $this->confs = $confs;
        }
    }

    private static function getConfFile() {
        include_once '../config/config.conf.php';
        return $conf;
    }

}
