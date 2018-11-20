<?php

/**
 * Description of ControleMenu
 *
 * @author izahR
 */
class ControleMenu  implements IPrivateTO{
    
    public function inicio(){
        
        $v = new TGui("Inicio");
        $v->renderizar(); 
        
        
    }
    
}
