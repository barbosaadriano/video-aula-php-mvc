<?php
/**
 * Description of Categoria
 *
 * @author izahR
 */
class Categoria {
    
    private $id; 
    private $codigo; 
    private $descricao; 
    
    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }


    
}
