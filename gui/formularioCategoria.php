<div class="container">
    <?php
    $id = "";
    $codigo = "";
    $descricao = "";

    $categoria = $this->getDados("c");
    if ($categoria) {
        $categoria instanceof Categoria;
        $id = $categoria->getId();
        $codigo = $categoria->getCodigo();
        $descricao = $categoria->getDescricao();
       
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-categoria/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Código</label><br>
        <input class="form-control" type="text" value="<?php echo $codigo; ?>" name="codigo"><br>
        <label>Descrição</label><br>
        <input  class="form-control" type="text" value="<?php echo $descricao; ?>" name="descricao"><br>
        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-categoria/lista-de-categoria">voltar</a><br>
    </form>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>