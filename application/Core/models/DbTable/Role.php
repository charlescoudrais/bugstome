<?php
class Core_Model_DbTable_Role extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name'            => 'roles',
            'primary'         => 'role_id',
            'referenceMap'    => array(),
            'dependentTables' => array(
                'Core_Model_DbTable_User'
            )
        );
        
        parent::__construct($options);
    }
}