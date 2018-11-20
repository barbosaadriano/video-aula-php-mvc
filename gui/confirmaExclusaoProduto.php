<h4>Deseja excluir o produto <?php
    $p = $this->getDados("produto");
    if ($p instanceof Produto) {
        echo $p->getDescricao();
    }
    ?>?</h4>
<form method="post" action="<?php echo URL; ?>controle-produto/confirma-exclusao">
    <input type="hidden" name="id" value="<?php
    if ($p instanceof Produto) {
        echo $p->getId();
    }
    ?>">
    <input type="submit" value="Sim">
</form>
<a href="<?php echo URL; ?>controle-produto/lista-de-produto" >Não</a>
