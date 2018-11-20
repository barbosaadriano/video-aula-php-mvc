<?php

/**
 * Description of ControleUsuario
 *
 * @author Administrador
 */
class ControleProduto implements IPrivateTO {

    public function listaDeProduto() {
        $dp = new DaoProduto();
        $produtos = $dp->listarTodos();
        $v = new TGui("listaDeProdutos");
        $v->addDados("produtos", $produtos);
        $v->renderizar();
    }

    public function editar($id) {
        $pl = $id[2];
        $dp = new DaoProduto();
        $p = $dp->listar($pl);
        $v = new TGui("formularioProduto");
        $v->addDados("produto", $p);
        $v->addDados("categorias", $this->getCategorias());
        $v->renderizar();
    }

    private function getCategorias(){
        $dc = new DaoCategoria();
        return $dc->listarTodos(); 
    }
    
    public function novo() {
        $p = new Produto();
        $v = new TGui("formularioProduto");
        $v->addDados("produto", $p);
        $v->addDados("categorias", $this->getCategorias());
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
        $p = new Produto();
        $id = isset($_POST['id']) ? $_POST['id'] : FALSE;
        if (trim($id) != "") {
            $p->setId($id);
        }
        $codigo = isset($_POST['codigo']) ? $_POST['codigo'] : FALSE;
        if (!$codigo || trim($codigo) == "") {
            throw new Exception("O campo codigo é obrigatório!");
        }
        $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : FALSE;
        if (!$descricao || trim($descricao) == "") {
            throw new Exception("O campo descricao é obrigatório!");
        }
        $valor = isset($_POST['valor']) ? $_POST['valor'] : FALSE;
        if (!$valor || trim($valor) == "") {
            throw new Exception("O campo valor é obrigatório!");
        }
        $status = isset($_POST['status']) ? $_POST['status'] : FALSE;
        if (!$status || trim($status) == "") {
            throw new Exception("O campo status é obrigatório!");
        }
        $p->setCodigo($codigo);
        $p->setDescricao($descricao);
        $p->setValor($valor);
        $p->setStatus($status);
        $p->setThumbnail_path($uploadfile);

        $dp = new DaoProduto();
        $pro = $dp->salvar($p);

        if ($pro instanceof Produto) {
            header("location: " . URL . "controle-produto/lista-de-produto");
        } else {
            echo "Não foi possivel salvar o produto";
        }
    }

    public function excluir($id) {
        $pl = $id[2];
        $dp = new DaoProduto();
        $p = $dp->listar($pl);
        $v = new TGui("confirmaExclusaoProduto");
        $v->addDados("produto", $p);
        $v->renderizar();
    }

    public function confirmaExclusao() {
        $id = isset($_POST['id']) ? $_POST['id'] : false;
        if ($id) {
            $dp = new DaoProduto();
            $p = $dp->listar($id);
            if ($dp->excluir($p)) {
                header("location: " . URL . "controle-produto/lista-de-produto");
            } else {
                echo "Não foi possível excluir o registro!";
            }
        } else {
            header("location: " . URL . "controle-produto/lista-de-produto");
        }
    }

}
