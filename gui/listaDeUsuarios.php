

        <div class="container">

            <a class="btn btn-danger" href="<?php echo URL; ?>Login/logout/">
                <i class="glyphicon glyphicon-remove"></i> Logout</a>
            <a class="btn btn-primary" href="<?php echo URL; ?>controle-usuario/novo/">Novo Usuário</a>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOME</th>
                        <th>Image</th>
                        <th>controles</th>
                    </tr>
                <tbody>

                    <?php if ($this->getDados('usuarios')): ?>
                        <?php $ar = $this->getDados('usuarios'); ?>

                     <?php foreach ($ar as $usuario): ?>
                           <?php $usuario instanceof Usuario; ?>
                                 
                            <tr><td><?= $usuario->getId() ?></td>
                            <td><?= $usuario->getNome() ?></td>
                            <td><img class="thumbnail thumb" src="<?= URL.$usuario->getThumbnail_path() ?>"/></td>
                            <td>
                            <a class="btn btn-default" 
                               href="<?= URL ?>controle-usuario/excluir/<?= $usuario->getId() ?>">
                                    excluir
                            </a> &nbsp;
                            <a class="btn btn-default" href="<?= URL ?>controle-usuario/editar/<?= $usuario->getId() ?>">
                                    editar
                            </a>
                            </td></tr>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </tbody>
                </thead>    
            </table>

        </div>
