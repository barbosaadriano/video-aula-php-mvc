<?php

/**
 * Description of DaoUsuario
 *
 * @author Administrador
 */
class DaoProduto implements IDao {

    public function excluir($u) {
        $sql = "delete FROM produto where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $pl = $u->getId();
        $sth->bindParam("ID", $pl);
        try {
            $sth->execute();
            return true;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    /**
     * 
     * @param int $pl
     * @return Produto
     */
    public function listar($pl) {

        $sql = "SELECT * FROM produto where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $pl);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $pro = $sth->fetchObject("produto");
        $dp = new DaoCategoria();
        if ($pro->idcategoria) {
        $p = $dp->listar($pro->idcategoria);
        $pro->setCategoria($p); 
        }
        return $pro;
    }

    /**
     * 
     * @param int $pl
     * @return ArrayObject
     */
    public function getPath($descricao) {

        $sql = "SELECT thumbnail_path FROM produto where descricao=:descricao";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("descricao", $descricao);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $res = $sth->fetch();
        if ($res) {
            return $res['thumbnail_path'];
        } else {
            return null;
        }
    }

    public function listarTodos() {
        $sql = "SELECT id, codigo, descricao, valor, status, thumbnail_path FROM produto";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arUsu = array();
        while ($usu = $sth->fetchObject("Produto")) {

            $arUsu[] = $usu;
        }
        return $arUsu;
    }

    public function salvar($u) {
        $codigo = $u->getCodigo();
        $descricao = $u->getDescricao();
        $valor = $u->getValor();
        $status = $u->getStatus();
        $thumb = $u->getThumbnail_path();

        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update produto set codigo=:codigo, descricao=:descricao, valor=:valor, "
                    . "status=:status, thumbnail_path=:thumbnail_path where id=:id";
        } else {
            $id = $this->generateID();
            $u->setId($id);
            $sql = "insert into produto(id,codigo,descricao,valor,status, thumbnail_path) values "
                    . "(:id,:codigo, :descricao,:valor,:status, :thumbnail_path)";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("codigo", $codigo);
        $sth->bindParam("descricao", $descricao);
        $sth->bindParam("valor", $valor);
        $sth->bindParam("status", $status);
        $sth->bindParam("thumbnail_path", $thumb);
        try {
            $sth->execute();
            return $u;
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
    }

    /**
     * 
     * @return int
     */
    private function generateID() {
        $sql = "select (coalesce(max(id),0)+1) as ID from produto";
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        $res = $sth->fetch();
        $id = $res['ID'];
        return $id;
    }

    
}
