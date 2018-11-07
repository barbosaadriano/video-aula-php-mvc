<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary btn-lg" href="<?= URL ?>controle-empresa/novo/">Nova Empresa</a>    
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
                        <th>Situação</th>
                        <th>controles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($this->getDados('empresas')):
                        $ar = $this->getDados('empresas');
                        $dsSit = ["A" => "Ativo", "I" => "Inativo"];
                        foreach ($ar as $empresa):
                            $empresa instanceof Empresa;
                            ?>
                            <tr>
                                <td><?= $empresa->getId() ?></td>
                                <td><?= $empresa->getNome() ?></td>
                                <td><?= $dsSit[$empresa->getSituacao()] ?></td>
                                <td>
                                    <a class="btn btn-danger" 
                                       href="<?= URL ?>controle-empresa/excluir/<?= $empresa->getId() ?>">
                                        <i class="glyphicon glyphicon-trash"></i>&nbsp;excluir
                                    </a> &nbsp;
                                    <a class="btn btn-info" href="<?= URL ?>controle-empresa/editar/<?= $empresa->getId() ?>">
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
