<?php

/**
 * Description of DaoUsuario
 *
 * @author Administrador
 */
class DaoUsuario implements IDao {

    public function excluir($u) {
        $sql = "delete FROM usuario where id=:ID";
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

    /**
     * 
     * @param int $p1
     * @return Usuario
     */
    public function listar($p1) {

        $sql = "SELECT id, nome, login, senha, status, thumbnail_path, idempresa FROM usuario where id=:ID";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("ID", $p1);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $usu = $sth->fetchObject("Usuario");
        $demp = new DaoEmpresa();
        if ($usu->idempresa) {
           $emp = $demp->listar($usu->idempresa);
           $usu->setEmpresa($emp);
        }
        return $usu;
    }

    /**
     * 
     * @param int $p1
     * @return ArrayObject
     */
    public function getPath($login) {

        $sql = "SELECT thumbnail_path FROM usuario where login=:login";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        $sth->bindParam("login", $login);
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
        $sql = "SELECT id, nome, login, senha, status, thumbnail_path FROM usuario";
        $conexao = Conexao::getConexao();
        $sth = $conexao->prepare($sql);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            echo $exc->getMessage();
        }
        $arUsu = array();
        while ($usu = $sth->fetchObject("Usuario")) {

            $arUsu[] = $usu;
        }
        return $arUsu;
    }

    public function salvar($u) {
        $nome = $u->getNome();
        $login = $u->getLogin();
        $senha = $u->getSenha();
        $status = $u->getStatus();
        $thumb = $u->getThumbnail_path();
        $idemp = null;
        $empresa = $u->getEmpresa();
        if ($empresa instanceof Empresa) {
            $idemp = $empresa->getId();
        }

        if ($u->getId()) {
            $id = $u->getId();
            $sql = "update usuario set nome=:nome, login=:login, senha=:senha, "
                    . "status=:status, thumbnail_path=:thumbnail_path,"
                    . " idempresa = :idempresa where id=:id";
        } else {
            $id = $this->generateID();
            $u->setId($id);
            $sql = "insert into usuario(id,nome,login,senha,status, thumbnail_path, "
                    . " idempresa ) values "
                    . "(:id,:nome, :login,:senha,:status, :thumbnail_path,"
                    . " :idempresa )";
        }
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("id", $id);
        $sth->bindParam("nome", $nome);
        $sth->bindParam("login", $login);
        $sth->bindParam("senha", $senha);
        $sth->bindParam("status", $status);
        $sth->bindParam("thumbnail_path", $thumb);
        $sth->bindParam("idempresa", $idemp);
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
        $sql = "select (coalesce(max(id),0)+1) as ID from usuario";
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

    public function autenticar($login, $senha) {
        $sql = "select * from usuario where login=:LOGIN and senha=:SENHA";
        $cnx = Conexao::getConexao();
        $sth = $cnx->prepare($sql);
        $sth->bindParam("LOGIN", $login);
        $sth->bindParam("SENHA", $senha);
        try {
            $sth->execute();
        } catch (Exception $exc) {
            return $exc->getMessage();
        }
        $res = $sth->fetchObject("Usuario");
        return $res;
    }

}
