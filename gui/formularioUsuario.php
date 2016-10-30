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
        $thumbPath = $usuario->getThumbnail_path();
    }
    ?>

    <form method="post" enctype="multipart/form-data" action="<?php echo URL; ?>controle-usuario/salvar"> 
        <label>Id</label><br>
        <input class="form-control" type="text" readonly="true" value="<?php echo $id; ?>" name="id"><br>
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
        <hr/>
        <div class="container">
            <div class="row">
                <h2>Imagem de perfil</h2>
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
        <a class="btn btn-default" href="<?php echo URL; ?>controle-usuario/lista-de-usuario">voltar</a><br>
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