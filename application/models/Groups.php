<?php

/**
 * This is a "CMS" model for table Groups.
 *
 * @author fred
 */
class Groups extends MY_Model {
    public function __construct()
    {
        parent::__construct('groups', 'id');
    }
}
