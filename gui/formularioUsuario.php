<div class="container">
    <?php
    $id = "";
    $nome = "";
    $login = "";
    $senha = "";
    $status = "";

    $usuario = $this->getDados("usuario");
    if ($usuario) {
        $usuario instanceof Usuario;
        $id = $usuario->getId();
        $nome = $usuario->getNome();
        $login = $usuario->getLogin();
        $senha = $usuario->getSenha();
        $status = $usuario->getStatus();
    }
    ?>

    <form method="post" action="<?php echo URL; ?>controle-usuario/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php
        echo $id; ?>" name="id"><br>
        <label>Nome</label><br>
        <input class="form-control" type="text" value="<?php echo $nome; ?>" name="nome"><br>
        <label>Login</label><br>
        <input  class="form-control" type="text" value="<?php echo $login; ?>" name="login"><br>
        <label>Senha</label><br>
        <input class="form-control" type="password" value="<?php echo $senha; ?>" name="senha"><br>
        <label>status</label><br>
        <select class="form-control" name="status">
            <option value="A" <?php
            if ($status == 'A') {
                echo 'selected="true"';
            }
            ?>>Ativo</option>
            <option value="I" <?php
            if ($status == 'I') {
                echo 'selected="true"';
            }
            ?>>Inativo</option>
        </select>

        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-usuario/lista-de-usuario">voltar</a><br>
    </form>
</div>