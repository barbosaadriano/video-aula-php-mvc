<?php

/**
 * Description of Composto
 *
 * @author drink
 */
abstract class Composto extends Componente {

    private $filhos;

    public function __construct($tagname) {
        parent::__construct($tagname);
        $this->filhos = [];
    }

    public function getHtmlComponent() {
        $tmpHtml = $this->getOpenTag();
        foreach ($this->filhos as $ch) {
            if ($ch instanceof Componente) {
                $tmpHtml .= $ch->getHtmlComponent();
            }
        }
        $tmpHtml .= $this->getCloseTag();
        return $tmpHtml;
    }

    function getFilhos() {
        return $this->filhos;
    }

    function setFilhos($filhos) {
        $this->filhos = $filhos;
    }

    function addFilho(Componente $ch) {
        $this->filhos[] = $ch;
    }

}
