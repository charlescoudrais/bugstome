<?php
class Core_Model_DbTable_User extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name' => 'users',
            'primary' => 'user_id', 
            'referenceMap' => array(
                'Role' => array(
                    'columns'       => array('role_id'),
                    'refTableClass' => 'Core_Model_DbTable_Role',
                    'refColumns'    => array('role_id'),
                    'onDelete'      => self::RESTRICT,
                    'onUpdate'      => self::CASCADE
                 )
            ), 
            'dependentTable' => array(
                'Task_Model_DbTable_Task',
                'Task_Model_DbTable_Note'
            )
        );
        
        parent::__construct($options);
    }
}