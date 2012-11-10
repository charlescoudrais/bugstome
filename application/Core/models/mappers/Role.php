<?php 
class Core_Model_Mapper_Role
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
            'role_id'            => $obj->getId(),
            'role_name'          => $obj->getName(),
        );
    }
    
    public function rowToObject($row)
    {        
         $obj = new Core_Model_Role();
         
         $obj->setId($row->role_id)
             ->setName($row->role_name);
         return $obj;
    }
    
    public function getDbTable()
    {
        if (null === $this->dbTable) {
            $this->dbTable = new Core_Model_DbTable_Role();
        }
        return $this->dbTable;
    }
    
    public function setDbTable($dbTable)
    {
        $this->dbTable = $dbTable;
        return $this;
    }
    
}