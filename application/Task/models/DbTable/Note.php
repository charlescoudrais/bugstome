<?php
class Task_Model_DbTable_Note extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name' => 'notes',
            'primary' => 'note_id', 
            'referenceMap' => array(
                'Task' => array(
                    'columns'       => array('task_id'),
                    'refTableClass' => 'Core_Model_DbTable_Task',
                    'refColumns'    => array('task_id'),
                    'onDelete'      => self::RESTRICT,
                    'onUpdate'      => self::CASCADE
                 ),
                'User' => array(
                    'columns'       => array('user_id'),
                    'refTableClass' => 'Core_Model_DbTable_User',
                    'refColumns'    => array('user_id'),
                    'onDelete'      => self::RESTRICT,
                    'onUpdate'      => self::CASCADE
                 )
            )
        );
        
        parent::__construct($options);
    }
}
