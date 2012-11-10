<?php
class Project_Model_DbTable_Project extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name' => 'projects',
            'primary' => 'project_id', 
        );
        
        parent::__construct($options);
    }
}
