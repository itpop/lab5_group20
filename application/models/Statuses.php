<?php

/**
 * This is a "CMS" model for table Statuses.
 *
 * @author fred
 */
class Statuses extends MY_Model {
    public function __construct()
    {
        parent::__construct('statuses', 'id');
    }
}
