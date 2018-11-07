<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary btn-lg" href="<?= URL ?>controle-usuario/novo/">Novo Usuário</a>    
        </div>
        <div class="col-md-6 text-right">
            <a class="btn btn-danger" href="<?= URL ?>Login/logout/">
                <i class="glyphicon glyphicon-log-out"></i> Logout</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>Image</th>
                        <th>controles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($this->getDados('usuarios')):
                        $ar = $this->getDados('usuarios');
                        foreach ($ar as $empresa):
                            $empresa instanceof Usuario;
                            ?>
                            <tr>
                                <td><?= $empresa->getId() ?></td>
                                <td><?= $empresa->getNome() ?></td>
                                <td><img class="thumbnail thumb" src="<?= URL . $empresa->getThumbnail_path() ?>"/></td>
                                <td>
                                    <a class="btn btn-danger" 
                                       href="<?= URL ?>controle-usuario/excluir/<?= $empresa->getId() ?>">
                                        <i class="glyphicon glyphicon-trash"></i>&nbsp;excluir
                                    </a> &nbsp;
                                    <a class="btn btn-info" href="<?= URL ?>controle-usuario/editar/<?= $empresa->getId() ?>">
                                        <i class="glyphicon glyphicon-edit"></i> &nbsp; editar
                                    </a>
                                </td>
                            </tr>
                            <?php
                        endforeach;
                    endif;
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
