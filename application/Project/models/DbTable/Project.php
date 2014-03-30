<?php
class Project_Model_DbTable_Project extends Zend_Db_Table_Abstract
{

    public function __construct()
    {
        $options = array(
            'name'           => 'projects',
            'primary'        => 'project_id',
            'referenceMap'   => array(
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
                    'refColumns'    => array('priority_id'),
                    'onDelete'      => self::RESTRICT,
                    'onUpdate'      => self::CASCADE
                 )
            ), 
            'dependentTable' => array()
        );
        
        parent::__construct($options);
    }
}
