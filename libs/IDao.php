<?php

/**
 *
 * @author Administrador
 */
interface IDao {

    public function listar($p1);

    public function listarTodos();

    public function salvar(Usuario $u);

    public function excluir(Usuario $u);
}
