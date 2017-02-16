<?php

/**
 * This is a "CMS" model for table Priorities.
 *
 * @author fred
 */
class Priorities extends MY_Model {
    public function __construct()
    {
        parent::__construct('priorities', 'id');
    }
}
