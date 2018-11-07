<div class="container">
    <div class="row jumbotron">
        <h2>Exclusão de Empresa, confirmação!</h2>
        <div class="alert alert-danger">
            <h2>Deseja excluir a empresa <?php
                $usu = $this->getDados("empresa");
                if ($usu instanceof Empresa) {
                    echo $usu->getNome();
                }
                ?>?</h2>
            <form method="post" action="<?= URL ?>controle-empresa/confirma-exclusao">
                <input type="hidden" name="id" value="<?php
                if ($usu instanceof Empresa) {
                    echo $usu->getId();
                }
                ?>">
                <input type="submit" class="btn btn-lg btn-danger" value="Sim">
                <a href="<?= URL ?>controle-empresa/lista-de-empresa" class="btn btn-success">Não</a>
            </form>
        </div>
    </div>
</div>