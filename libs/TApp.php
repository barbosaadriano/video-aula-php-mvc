<?php

/**
 * Description of TApp
 *
 * @author adriano
 */
class TApp {

    private $to;
    private $method;
    private $params;

    public function __construct() {

        $url = isset($_GET['url']) ? $_GET['url'] : false;
        $url = rtrim($url, "/");

        if ($url) {
            $arr = explode("/", $url);
            if (isset($arr[0])) {
                $to = strtolower($arr[0]);
                $to = explode("-", $to);
                $strTo = '';
                foreach ($to as $k => $v) {
                    $strTo.= strtoupper(substr($v, 0, 1)) . substr($v, 1);
                }
                $this->to = $strTo;
            }

            if (isset($arr[1])) {
                $mt = strtolower($arr[1]);
                $mt = explode("-", $mt);
                $strMt = '';
                foreach ($mt as $k => $v) {
                    if ($k === 0) {
                        $strMt.= $v;
                    } else {
                        $strMt.= strtoupper(substr($v, 0, 1)) . substr($v, 1);
                    }
                }
                $this->method = $strMt;
            }
            unset($arr[0]);
            unset($arr[1]);
            $this->params = $arr;
        } else {
            $this->to = "ControleUsuario";
            $this->method = "listaDeUsuario";
            $this->params = null;
        }
    }

    public function executar() {
        if (class_exists($this->to)) {
            try {
                $c = new $this->to();
                if ($c instanceof IPrivateTO) {
                    session_start();
                    if (!$_SESSION['usuario']) {
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
                    // tratar erro
                    throw new Exception("Metodo {$this->method} não existe para {$this->to}!");
                }
            } catch (Exception $exc) {
                throw new Exception($exc->getTraceAsString());
            }
        } else {
            // tratar error 
            throw new Exception("Classe {$this->to} não encontrada!");
        }
    }

}