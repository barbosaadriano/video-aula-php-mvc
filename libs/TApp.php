<?php

/**
 * Description of TApp
 *
 * @author adriano
 */
class TApp {

    const SLUG_CLASS = 'class';
    const SLUG_METHOD = 'method';

    private $to;
    private $method;
    private $params;

    public function __construct() {
        $url = isset($_REQUEST['url']) ? rtrim($_REQUEST['url'], "/") : false;
        if ($url) {
            $arr = explode("/", $url);
            if (isset($arr[0])) {
                $this->to = $this->getNameFromSlug($arr[0]);
            }
            if (isset($arr[1])) {
                $this->method = $this->getNameFromSlug($arr[1], self::SLUG_METHOD);
            }
            unset($arr[0]);
            unset($arr[1]);
            $this->params = $arr;
        } else {
            $this->to = DEFAULT_CONTROLLER;
            $this->method = DEFAULT_METHOD;
            $this->params = null;
        }
    }

    /**
     * 
     * @param String $slug um slug qualquer
     * @param String $tipo um tipo que vem das constantes da classe TApp
     * @return String  minha-classe
     */
    private function getNameFromSlug($slug, $tipo = self::SLUG_CLASS) {
        $tmp = str_replace(" ", "", ucwords(implode(" ", explode("-", strtolower($slug)))));
        if ($tipo == self::SLUG_CLASS) {
            return $tmp;
        }
        return lcfirst($tmp);
    }

    public function executar() {
        if (class_exists($this->to)) {
            try {
                $c = new $this->to();
                if ($c instanceof IPrivateTO) {
                    session_start();
                    if (!isset($_SESSION['usuario'])) {
                        header("location: " . URL . "login/autenticar");
                    }
                }
                if (method_exists($c, $this->method)) {
                    if ($this->params !== null) {
                        $c->{$this->method}($this->params);
                    } else {
                        $c->{$this->method}();
                    }
                } else {
                    throw new Exception("Metodo {$this->method} não existe para {$this->to}!");
                }
            } catch (Exception $exc) {
                throw $exc;
            }
        } else {
            throw new Exception("Classe {$this->to} não encontrada!");
        }
    }

}
