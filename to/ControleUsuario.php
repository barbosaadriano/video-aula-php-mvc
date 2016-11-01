<?php

/**
 * Description of ControleUsuario
 *
 * @author Administrador
 */
class ControleUsuario implements IPrivateTO {

    public function listaDeUsuario() {
        $du = new DaoUsuario();
        $usuarios = $du->listarTodos();
        $v = new TGui("listaDeUsuarios");
        $v->addDados("usuarios", $usuarios);
        $v->renderizar();
    }

    public function editar($id) {
        $p1 = $id[2];
        $du = new DaoUsuario();
        $u = $du->listar($p1);
        $v = new TGui("formularioUsuario");
        $v->addDados("usuario", $u);
        $v->renderizar();
    }

    public function novo() {
        $u = new Usuario();
        $v = new TGui("formularioUsuario");
        $v->addDados("usuario", $u);
        $v->renderizar();
    }

    public function salvar() {
        $uploadfile = null;
        if (isset($_FILES['fileUpload']) && trim($_FILES['fileUpload']['name']) != '') {
            try {
                $uploaddir = PATH_UPLOADS;
                $uploadfile = $uploaddir . md5(basename($_FILES['fileUpload']['name']) . time());
                if (!move_uploaded_file($_FILES['fileUpload']['tmp_name'], $uploadfile)) {
                    throw new Exception("Não foi possível fazer o upload do arquivo!");
                }
            } catch (Exception $exc) {
                throw $exc;
            }
        } else {
            $uploadfile = isset($_POST['path_thumb']) ? $_POST['path_thumb'] : null;
        }
        $u = new Usuario();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") {
            $u->setId($id);
        }
        $nome = isset($_POST['nome']) ? $_POST['nome'] : FALSE;
        if (!$nome || trim($nome) == "") {
            throw new Exception("O campo nome é obrigatório!");
        }
        $login = isset($_POST['login']) ? $_POST['login'] : FALSE;
        if (!$login || trim($login) == "") {
            throw new Exception("O campo login é obrigatório!");
        }
        $senha = isset($_POST['senha']) ? $_POST['senha'] : FALSE;
        if (!$senha || trim($senha) == "") {
            throw new Exception("O campo senha é obrigatório!");
        }
        $status = isset($_POST['status']) ? $_POST['status'] : FALSE;
        if (!$status || trim($status) == "") {
            throw new Exception("O campo status é obrigatório!");
        }
        $u->setNome($nome);
        $u->setLogin($login);
        $u->setSenha($senha);
        $u->setStatus($status);
        $u->setThumbnail_path($uploadfile);

        $du = new DaoUsuario();
        $usu = $du->salvar($u);

        if ($usu instanceof Usuario) {
            header("location: " . URL . "controle-usuario/lista-de-usuario");
        } else {
            echo "Não foi possivel salvar o usuário";
        }
    }

    public function excluir($id) {
        $p1 = $id[2];
        $du = new DaoUsuario();
        $u = $du->listar($p1);
        $v = new TGui("confirmaExclusaoUsuario");
        $v->addDados("usuario", $u);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $du = new DaoUsuario();
            $u = $du->listar($id);
            if ($du->excluir($u)) {
                header("location: " . URL . "controle-usuario/lista-de-usuario");
            } else {
                echo "Não foi possível excluir o registro!";
            }
        } else {
            header("location: " . URL . "controle-usuario/lista-de-usuario");
        }
    }

}
