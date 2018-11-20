<h4>Deseja excluir a categoria? <?php
    $c = $this->getDados("categoria");
    if ($c instanceof Categoria) {
        echo $c->getCodigo();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-categoria/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($c instanceof Categoria) {
        echo $c->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-categoria/lista-de-categoria" >Não</a>
