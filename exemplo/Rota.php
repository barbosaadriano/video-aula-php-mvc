<?php

/**
 * Description of Rota
 *
 * @author drink
 */
class Rota {

    private $nome;

    public function __construct($nome) {
        $this->nome = $nome;
    }

    public function getUrl() {
        return URL . $this->nome;
    }

}
