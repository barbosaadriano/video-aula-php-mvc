<?php

/**
 * Description of MenuItem
 *
 * @author drink
 */
class MenuItem extends Composto {

    public function __construct($tagname = null) {
        if (!$tagname) {
            parent::__construct("ul");
        } else {
            parent::__construct($tagname);
        }
    }

}
