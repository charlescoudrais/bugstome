<?php
class Note_Model_DbTable_Note extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name' => 'notes',
            'primary' => 't_id', 
        );
        
        parent::__construct($options);
    }
}
