<?php

/**
 * Description of Rotulo
 *
 * @author drink
 */
class Rotulo extends Simples {

    private $title;

    public function __construct($title) {
        $this->title = $title;
    }

    public function getHtmlComponent() {
        return $this->title;
    }

}
