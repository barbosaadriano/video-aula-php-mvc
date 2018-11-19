<?php

/**
 * Description of Link
 *
 * @author drink
 */
class Link extends Composto {

    private $rota;

    public function __construct(Rota $rota) {
        parent::__construct('a');
        $this->rota = $rota;
    }

    public function getOpenTag() {
        $taga = parent::getOpenTag();
        return str_replace("<a", '<a href="' . $this->rota->getUrl() . '" ', $taga);
    }

}
