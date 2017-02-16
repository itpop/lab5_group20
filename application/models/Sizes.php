<?php

/**
 * This is a "CMS" model for table Sizes.
 *
 * @author fred
 */
class Sizes extends MY_Model {
    public function __construct()
    {
        parent::__construct('sizes', 'id');
    }
}
