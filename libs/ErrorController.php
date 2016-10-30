<?php

/**
 * Description of ErrorController
 *
 * @author abarbosa
 */
class ErrorController {

    private $visao;

    public function __construct(Exception $exc) {
        $this->visao = new TGui("erro");
        $this->visao->addDados("mensagem", $exc->getMessage());
        $this->visao->addDados("stringTrace", $exc->getTraceAsString());
        $this->visao->addDados("codigo", $exc->getCode());
    }

    public function exibir() {
        $this->visao->renderizar();
    }

}
