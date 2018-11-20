<?php
/**
 * Description of DaoCategoria
 *
 * @author izahR
 */
class DaoCategoria {

    public function excluir($u) {
        $sql = "delete FROM categoria where id=:ID";
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
        $sql = "SELECT * from categoria where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $c = $sth->fetchObject("categoria");
        return $c;
    }

    public function listarTodos() {
       $sql = "SELECT * FROM categoria";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arC = array();
        while ($c = $sth->fetchObject("categoria")) {

            $arC[] = $c;
        }
        return $arC;
    }

    public function salvar($u) {
        $codigo = $u->getCodigo();
        $descricao = $u->getDescricao(); 
        $id = 0;
        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update categoria set codigo=:codigo, descricao=:descricao where id=:id";
        } else {
            $sql = "insert into categoria(id, codigo, descricao) values (:id, :codigo, :descricao)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("codigo", $codigo);
        $sth->bindParam("descricao", $descricao);
       
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }
}
