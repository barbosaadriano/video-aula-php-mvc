<div class="container">
    <?php
    $id = "";
    $nome = "";
    $situacao = "";

    $empresa = $this->getDados("empresa");
    if ($empresa) {
        $empresa instanceof Empresa;
        $id = $empresa->getId();
        $nome = $empresa->getNome();
        $situacao = $empresa->getSituacao();
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-empresa/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Nome</label><br>
        <input class="form-control" type="text" value="<?php echo $nome; ?>" name="nome"><br>     
        <label>Situação</label><br>
        <select class="form-control" name="situacao">
            <option value="A" <?php
            if ($situacao == 'A') {
                echo 'selected="true"';
            }
            ?>>Ativo</option>
            <option value="I" <?php
            if ($situacao == 'I') {
                echo 'selected="true"';
            }
            ?>>Inativo</option>
        </select>
      
        <hr/>
        <input type="submit" class="btn btn-success btn-lg" value="Salvar">
        <a class="btn btn-default" href="<?php echo URL; ?>controle-empresa/lista-de-empresa">voltar</a><br>
    </form>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
<script type="text/javascript">

</script>