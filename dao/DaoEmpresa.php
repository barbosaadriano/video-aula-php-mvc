<?php

/**
 * Description of DaoEmpresa
 *
 * @author izahR
 */
class DaoEmpresa implements IDao{

        
    
    public function excluir($u) {
        $sql = "delete FROM empresa where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $p1 = $u->getId();
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    public function listar($p1) {
         $sql = "SELECT * from empresa where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $usu = $sth->fetchObject("Empresa");
        return $usu;
    }

    public function listarTodos() {
       $sql = "SELECT * FROM empresa";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arUsu = array();
        while ($usu = $sth->fetchObject("Empresa")) {

            $arUsu[] = $usu;
        }
        return $arUsu;
    }

    public function salvar($u) {
        $nome = $u->getNome();
        $situacao = $u->getSituacao(); 
        $id = 0;

        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update empresa set nome=:nome, situacao=:situacao where id=:id";
        } else {
            $sql = "insert into empresa(id, nome, situacao) values "
                    . "(:id, :nome, :situacao)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("situacao", $situacao);
       
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

}
