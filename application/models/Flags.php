<?php

/**
 * This is a "CMS" model for table Flags.
 *
 * @author fred
 */
class Flags extends MY_Model {
    public function __construct()
    {
        parent::__construct('flags', 'id');
    }
}
