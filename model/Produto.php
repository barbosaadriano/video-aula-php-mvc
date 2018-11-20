<?php

/**
 * Description of Produto
 *
 * @author Administrador
 */
class Produto {

    /**
     *
     * @var int identificador do regitro
     */
    private $id;

    /**
     *
     * @var String código do produto
     */
    private $codigo;

    /**
     *
     * @var String decricao do produto
     */
    private $descricao;

    /**
     *
     * @var int valor do produto
     */
    private $valor;

    /**
     *
     * @var String status do produto
     */
    private $status;
    private $thumbnail_path;
    /**
     *
     * @var Categoria
     */
    private $categoria;

    public function __construct() {
//        $this->id = null;
    }

    function getId() {
        return $this->id;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getValor() {
        return $this->valor;
    }

    function getStatus() {
        return $this->status;
    }

    function getCategoria() {
        return $this->categoria;
    }
    
    function getThumbnail_path() {
        return $this->thumbnail_path;
    }

    function setThumbnail_path($thumbnail_path) {
        $this->thumbnail_path = $thumbnail_path;
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

    function setValor($valor) {
        $this->valor = $valor;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setCategoria(Categoria $categoria) {
        $this->categoria = $categoria;
    }



}
