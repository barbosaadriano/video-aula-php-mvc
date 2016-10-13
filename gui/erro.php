<?php
    $dados = $this->getDados();
?>
<div class="container">
    <div class="page-header">
        <h1>:( Aaah não! <small>Infelizmente algo saiu errado!</small></h1>
        <a href="<?php echo URL; ?>" class="btn btn-info">Volte ao início clicando aqui!</a>
    </div>
    <div class="row">
        <div class="alert alert-danger">
            <h1>Código do erro: <?php echo $dados['codigo']; ?></h1>
            <h3>Mensagem:</h3>
            <p><?php echo $dados['mensagem']; ?></p>
        </div>
    </div>
    <div class="row">
        <h3>Detalhes técnicos do erro!</h3>
        <p><?php echo $dados['stringTrace']; ?></p>        
    </div>
</div>