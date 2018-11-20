<div class="container">
    <?php
    $id = "";
    $codigo = "";
    $descricao = "";
    $valor = "";
    $status = "";

    $produto = $this->getDados("produto");
    $categoria = $this->getDados("categorias");
    
    if ($produto) {
        $produto instanceof Produto;
        $id = $produto->getId();
        $codigo = $produto->getCodigo();
        $descricao = $produto->getDescricao();
        $valor = $produto->getValor();
        $status = $produto->getStatus();
        $thumbPath = $produto->getThumbnail_path();
        if ($thumbPath == null || trim($thumbPath) == '') {
            $thumbPath = './img/noimage.png';
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-produto/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
        <label>Código</label><br>
        <input class="form-control" type="text" value="<?php echo $codigo; ?>" name="codigo"><br>
        <label>Descrição</label><br>
        <input  class="form-control" type="text" value="<?php echo $descricao; ?>" name="descricao"><br>
        <label>Valor</label><br>
        <input class="form-control" type="float" value="<?php echo $valor; ?>" name="valor"><br>
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
        </select><br>
        <label>Categoria</label><br>
        <select class="form-control" name="categoria">
            <?php foreach($categoria as $c) :
                $c instanceof Categoria;
                ?> 
            <option value="<?=$c->getId()?>"><?=$c->getDescricao()?></option>
            <?php
            endforeach; 
            ?>
        </select>
        <hr/>
        <div class="container">
            <div class="row">
                <h2>Imagem do Produto</h2>
                <div class="col-md-3">
                    <div id="image-holder">
                        <img class="thumbnail" src="<?= URL . $thumbPath ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <input id="fileUpload" name="fileUpload" type="file">
                    <input type="hidden" name="path_thumb" value="<?= $thumbPath ?>">
                </div>

            </div>
        </div>
        <hr/>
        <input type="submit" class="btn btn-success" value="Salvar"><br>
        <a class="btn btn-default" href="<?php echo URL; ?>controle-produto/lista-de-produto">voltar</a><br>
    </form>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript" src="<?= URL ?>/js/bootstrap.min.js"></script>
<script type="text/javascript">

    $(document).ready(function () {
        $("#fileUpload").on('change', function () {
            if (typeof (FileReader) != "undefined") {
                var image_holder = $("#image-holder");
                image_holder.empty();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img />", {
                        "src": e.target.result,
                        "class": "thumbnail"
                    }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                alert("Este navegador nao suporta FileReader.");
            }
        });
    });

</script>