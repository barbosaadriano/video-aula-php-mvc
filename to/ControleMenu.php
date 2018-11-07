<?php

/**
 * Description of ControleMenu
 *
 * @author drink
 */
class ControleMenu implements IPrivateTO {
    
    public function inicio() {
        $v = new TGui("inicio");
        $v->renderizar();
    }
    
}
