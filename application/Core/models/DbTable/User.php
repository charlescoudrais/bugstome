<?php
class Core_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name' => 'users',
            'primary' => 'user_id', 
        );
        
        parent::__construct($options);
    }
}