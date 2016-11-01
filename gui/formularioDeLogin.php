<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="page-header">
                <h1>Login</h1>
            </div>
            <form action="<?php echo URL; ?>login/confirmar-autenticacao" method="post">
                <label>Login </label>
                <input class="form-control" id="login" type="text" name="login">
                <label>Senha </label>
                <input class="form-control" type="password" name="senha">
                <br/>
                <input class="btn btn-primary" type="submit" value="entrar">
            </form>
            <div id="imgwrap" class="wrap-image text-center">

            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= URL ?>/js/jquery.3.1.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#login').change(function () {
            var login = $(this).val();
            $('#imgwrap').empty();
            $.post('<?= URL ?>login/get-thumb/', {user: login}, function (d) {
                try {
                    var name = './img/noimage.png';
                    if (d.path !== null) {
                        name = d.path;
                    }
                    $("<img />", {
                        "src": '<?= URL ?>' + name,
                        "class": "thumbnail"
                    }).appendTo($('#imgwrap'));
                } catch (e) {
                    console.log(e);
                }
            });
        });
    });
</script>