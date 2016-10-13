<?php

/**
 * Description of TGui
 *
 * @author adriano
 */
class TGui {

    private $nome;
    private $dados;

    function __construct($nome) {
        $this->nome = $nome;
        $this->dados = array();
    }

    public function renderizar() {
        include_once '../gui/layoutTOpo.php';
        if (file_exists("../gui/" . $this->nome . ".php")) {
            include_once "../gui/" . $this->nome . ".php";
        } else {
            //erro
            throw new Exception("View {$this->nome} não encontrada!");
        }
        include_once '../gui/layoutRodape.php';
    }

    public function getDados($objeto = false) {
        if (!$objeto) {
            return $this->dados;
        } else {
            return isset($this->dados[$objeto]) ? $this->dados[$objeto] : FALSE;
        }
    }

    public function addDados($nome, $dado) {
        $this->dados[$nome] = $dado;
    }
}
