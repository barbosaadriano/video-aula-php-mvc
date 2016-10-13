<h4>Deseja excluir o usuário <?php
    $usu = $this->getDados("usuario");
    if ($usu instanceof Usuario) {
        echo $usu->getNome();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-usuario/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($usu instanceof Usuario) {
        echo $usu->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-usuario/lista-de-usuario" >Não</a>
