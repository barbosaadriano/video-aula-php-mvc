<div class="container">
    <div class="row jumbotron">
        <h2>Exclusão de usuário, confirmação!</h2>
        <div class="alert alert-danger">
            <h2>Deseja excluir o usuário <?php
                $usu = $this->getDados("usuario");
                if ($usu instanceof Usuario) {
                    echo $usu->getNome();
                }
                ?>?</h2>
            <form method="post" action="<?= URL ?>controle-usuario/confirma-exclusao">
                <input type="hidden" name="id" value="<?php
                if ($usu instanceof Usuario) {
                    echo $usu->getId();
                }
                ?>">
                <input type="submit" class="btn btn-lg btn-danger" value="Sim">
                <a href="<?= URL ?>controle-usuario/lista-de-usuario" class="btn btn-success">Não</a>
            </form>
        </div>
    </div>
</div>