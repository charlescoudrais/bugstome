<?php
class Core_Model_DbTable_Priority extends Zend_Db_Table_Abstract
{
    public function __construct()
    {
        $options = array(
            'name' => 'priorities',
            'primary' => 'priority_id', 
            'referenceMap' => array(),
            'dependentTable' => array(
                //'Task_Model_DbTable_Task'
            )
        );
        
        parent::__construct($options);
    }
}
