<?php

/**
 * Description of Componente
 *
 * @author drink
 */
abstract class Componente {

    private $tagName;
    private $classList;
    private $id;

    public function __construct($tagname) {
        $this->tagName = $tagname;
        $this->classList = [];
    }

    function getTagName() {
        return $this->tagName;
    }

    function setTagName($tagName) {
        $this->tagName = $tagName;
    }

    function getClassList() {
        return $this->classList;
    }

    function getId() {
        return $this->id;
    }

    function setClassList(array $classList) {
        $this->classList = $classList;
    }

    function addClass($class) {
        if (!$this->classExists($class)) {
            $this->classList[] = $class;
        }
    }

    function removeClass($class) {
        if ($this->classExists($class)) {
            array_splice($this->classList, array_search($class, $this->classList), 1);
        }
    }

    function classExists($class) {
        return in_array($class, $this->classList);
    }

    function setId($id) {
        $this->id = $id;
    }

    abstract function getHtmlComponent();

    function getOpenTag() {
        return "<!-- Componente Inicia Aqui --> <" . $this->tagName . $this->getClassStr() . $this->getIdStr() . ">";
    }

    function getCloseTag() {
        return "</" . $this->tagName . "> <!-- Adriano -->";
    }

    private function getClassStr() {
        if (count($this->classList) > 0) {
            return ' class="' . implode(" ", $this->classList) . '" ';
        }
    }

    private function getIdStr() {
        if ($this->id != null) {
            return ' id="' . $this->id . '" ';
        }
    }

}
