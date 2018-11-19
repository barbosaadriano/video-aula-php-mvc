<?php

/**
 * Description of MenuFactory
 *
 * @author drink
 */
class MenuFactory {

    public static function getMenu() {
        return self::createFromArray([
                    'menu' => [
                        'itens' => [
                            'home' => [
                                'rota' => '',
                                'titulo' => 'Início',
                                'image' => 'home',
                            ],
                            'empresa' => [
                                'rota' => 'controle-empresa/lista-de-empresa',
                                'titulo' => 'Empresa',
                                'image' => 'briefcase',
                            ],
                            'usuario' => [
                                'rota' => 'controle-usuario/lista-de-usuario',
                                'titulo' => 'Usuário',
                                'image' => 'user',
                            ],
                            'sair' => [
                                'rota' => 'login/logout',
                                'titulo' => 'sair',
                                'image' => 'log-out',
                            ],
                        ],
                    ],
        ]);
    }

    public static function createFromArray(array$array) {
        $nav = new Menu();
        foreach ($array as $k => $v) {
            $menu = new MenuItem();
            if (isset($v['itens'])) {
                foreach ($v['itens'] as $it) {
                    $item = null;
                    if (isset($it['rota'])) {
                        $item = new Link(new Rota($it['rota']));
                    }
                    if ($item == null) {
                        $item = new SubmenuItem();
                    }
                    if (isset($it['titulo'])) {
                        $item->addFilho(new Rotulo($it['titulo']));
                    }
                    if (isset($it['image'])) {
                        $item->addFilho(new Imagem($it['image']));
                    }
                    $sm = new SubmenuItem();
                    $sm->addFilho($item);
                    $menu->addFilho($sm);
                }
            }
            $nav->addFilho($menu);
        }
        return $nav;
    }

    public static function createManual() {
        $nav = new Menu();
        $nav->setId("nvAdriano");
        $menu = new MenuItem();
        $lkEmpresa = new Link(new Rota("controle-empresa/lista-de-empresa/"));
        $lkEmpresa->addFilho(new Imagem("briefcase"));
        $lkEmpresa->addFilho(new Rotulo("Empresas"));
        $lkUsuario = new Link(new Rota("controle-usuario/lista-de-usuario/"));
        $lkUsuario->addFilho(new Imagem("user"));
        $lkUsuario->addFilho(new Rotulo("Usuarios"));
        $empresa = new SubmenuItem();
        $empresa->addFilho($lkEmpresa);
        $usuario = new SubmenuItem();
        $usuario->addFilho($lkUsuario);
        $menu->addFilho($empresa);
        $menu->addFilho($usuario);
        $nav->addFilho($menu);
        return $nav;
    }

}
