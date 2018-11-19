<?php

/**
 * Description of Imagem
 *
 * @author drink
 */
class Imagem extends Simples {

    public function __construct($nome) {
        parent::__construct('i');
        parent::addClass('glyphicon');
        parent::addClass('glyphicon-' . $nome);
    }

    public function getHtmlComponent() {
        return "&nbsp;" . $this->getOpenTag() . $this->getCloseTag() . "&nbsp;";
    }

}
