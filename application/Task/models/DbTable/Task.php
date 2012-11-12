<?php
class Task_Model_DbTable_Task extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name' => 'tasks',
            'primary' => 'task_id', 
            'referenceMap' => array(
                'User' => array(
                    'columns'       => array('user_id'),
                    'refTableClass' => 'Core_Model_DbTable_User',
                    'refColumns'    => array('user_id'),
                    'onDelete'      => self::RESTRICT,
                    'onUpdate'      => self::CASCADE
                 ),
                'Priority' => array(
                    'columns'       => array('priority_id'),
                    'refTableClass' => 'Core_Model_DbTable_Priority',
                    'refColumns'    => array('user_id'),
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
