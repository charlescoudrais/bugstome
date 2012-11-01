<?php
class Task_Model_DbTable_Task extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name' => 'tasks',
            'primary' => 't_id', 
        );
        
        parent::__construct($options);
    }
}
