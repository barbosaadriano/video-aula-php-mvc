<?php

/**
 * Description of ControleEmpresa
 *
 * @author Administrador
 */
class ControleCategoria implements IPrivateTO {

    public function listaDeCategoria() {
        $dc = new DaoCategoria();
        $categoria = $dc->listarTodos();
        $v = new TGui("listaDeCategoria");
        $v->addDados("categoria", $categoria);
        $v->renderizar();
    }

    public function editar($id) {
        $p1 = $id[2];
        $dc = new DaoCategoria();
        $ca = $dc->listar($p1);
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $ca);
        $v->renderizar();
    }

    public function novo() {
        $ca = new Categoria();
        $v = new TGui("formularioCategoria");
        $v->addDados("categoria", $ca);
        $v->renderizar();
    }

    public function salvar() {
        $ca = new Categoria();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") {
            $ca->setId($id);
        }
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : FALSE;
        if (!$codigo || trim($codigo) == "") {
            throw new Exception("O campo codigo é obrigatório!");
        }
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : FALSE;
        if (!$descricao || trim($descricao) == "") {
            throw new Exception("O campo descricao é obrigatório!");
        }
        $ca->setCodigo($codigo);
        $ca->setDescricao($descricao);

        $dc = new DaoCategoria();
        $dc->salvar($ca);

        header("location: " . URL . "controle-categoria/lista-de-categoria");
    }

    public function excluir($id) {
        $p1 = $id[2];
        $dc = new DaoCategoria();
        $ca = $dc->listar($p1);
        $v = new TGui("confirmaExclusaoCategoria");
        $v->addDados("categoria", $ca);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $dc = new DaoCategoria();
            $ca = $dc->listar($id);
            if ($dc->excluir($ca)) {
                header("location: " . URL . "controle-categoria/lista-de-categoria");
            } else {
                throw new Exception("Não foi possível excluir o registro!");
            }
        } else {
            header("location: " . URL . "controle-categoria/lista-de-categoria");
        }
    }

}
