<?php

/**
 * Description of Usuario
 *
 * @author Administrador
 */
class Usuario {

    /**
     *
     * @var int identificador do regitro
     */
    private $id;

    /**
     *
     * @var String nome do usuario
     */
    private $nome;

    /**
     *
     * @var String login do usuário
     */
    private $login;

    /**
     *
     * @var String senha do usuário
     */
    private $senha;

    /**
     *
     * @var String status do usuário
     */
    private $status;
    private $thumbnail_path;
    /**
     *
     * @var Empresa
     */
    private $empresa;

    public function __construct() {
//        $this->id = null;
    }

    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    function getThumbnail_path() {
        return $this->thumbnail_path;
    }

    function setThumbnail_path($thumbnail_path) {
        $this->thumbnail_path = $thumbnail_path;
    }

    function getEmpresa() {
        return $this->empresa;
    }

    function setEmpresa(Empresa $empresa) {
        $this->empresa = $empresa;
    }


}
