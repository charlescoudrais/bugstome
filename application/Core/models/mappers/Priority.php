<?php
class Core_Model_Mapper_Pririty
{
    private $dbTable;
    
    public function find($id)
    {
        $rowSet = $this->getDbTable()->find($id);
        $row = $rowSet->current();
        if (0 === count($row)) {
            return false;
        }
        return $this->rowToObject($row);
    }
    
    public function fetchAll()
    {
        $rowSet = $this->getDbTable()->fetchAll();
        if (0 === count($rowSet)) {
            return false;
        }
        $users = array();
        foreach ($rowSet as $row) {
             $users[] = $this->rowToObject($row);
        }
        return $users;
    }    
    
 
    
    public function objectToRow($obj)
    {
        return array( 
            'priority_id'            => $obj->getId(),
            'priority_name'          => $obj->getName(),
        );
    }
    
    public function rowToObject($row)
    {        
         $obj = new Core_Model_Priority();
         
         $obj->setId($row->priority_id)
             ->setName($row->priority_name);
         return $obj;
    }
    
    public function getDbTable()
    {
        if (null === $this->dbTable) {
            $this->dbTable = new Core_Model_DbTable_Priority();
        }
        return $this->dbTable;
    }
    
    public function setDbTable($dbTable)
    {
        $this->dbTable = $dbTable;
        return $this;
    }
    
}
