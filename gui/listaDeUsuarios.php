

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

                    <?php
                    if ($this->getDados('usuarios')) {
                        $ar = $this->getDados('usuarios');

                        foreach ($ar as $usuario) {
                            $usuario instanceof Usuario;
                            echo "<tr><td>{$usuario->getId()}</td>";
                            echo "<td>{$usuario->getNome()}</td>";
                            echo "<td><img class=\"thumbnail thumb\" src=\"".URL."{$usuario->getThumbnail_path()}\"/></td>";
                            echo "<td>"
                            . "<a class=\"btn btn-default\" href=\"" . URL .
                            "controle-usuario/excluir/{$usuario->getId()}\">excluir</a> &nbsp;"
                            . "<a  class=\"btn btn-default\" href=\"" . URL .
                            "controle-usuario/editar/{$usuario->getId()}\">editar</a>"
                            . "</td></tr>";
                        }
                    }
                    ?>

                </tbody>
                </thead>    
            </table>

        </div>
