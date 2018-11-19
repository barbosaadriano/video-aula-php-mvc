<div class="container">
    <?php
    $nav = MenuFactory::getMenu();
    $nav->setId("nvTop");
    ?>
    <?= $nav->getHtmlComponent() ?>
    <img src="<?= URL ?>img/RevisãoOOP.png"/>
    <?=
    MenuFactory::createManual()->getHtmlComponent();
    ?>
    <nav class="menu-principal">
        <ul>
            <li>
                <div class="item-menu">
                    <a href="<?= URL ?>controle-usuario/lista-de-usuario/">
                        Usuário
                    </a>
                </div>
            </li>
            <li>
                <div class="item-menu">
                    <a href="<?= URL ?>controle-empresa/lista-de-empresa/">
                        Empresa
                    </a>
                </div>
            </li>
        </ul>
    </nav>


    <img src="<?= URL ?>img/AbstracaoMenu.png"/>
    <img src="<?= URL ?>img/sqlAbs.png"/>

</div>