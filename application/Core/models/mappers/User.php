<?php 

class Core_Model_Mapper_User
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
    
    public function save($user)
    {
        $row = $this->objectToRow($user);
        
        if (0 === (int) $user->getId()) {
            unset($row['user_id']);
            $this->getDbTable()->insert($row);
            return $this->getDbTable()->getAdapter()->lastInsertId();
        } else {
            $this->getDbTable()
                  ->update(
                      $row, 
                      array( 'user_id = ?' => $user->getId())
                  );
            return $user->getId();
        }
    }
    
    public function delete($user)
    {
        return $this->getDbTable()->delete(array('user_id = ?' => $user->getId()));
    }
    
    public function objectToRow($user)
    {
        return array( 
            'user_id'            => $user->getId(),
            'user_name'          => $user->getName(),
            'user_mail'          => $user->getMail(),
            'role_id'            => $user->getRole()->getId(),
            'user_password'      => $user->getPassword(),
            'user_function'      => $user->getFunction(),
            'user_active'		 => (int) $user->getActive()
        );
    }
    
    public function rowToObject($row)
    {
         $roleRow    = $row->findParentRow('Core_Model_DbTable_Role', 'Role');
         $roleMapper = new Core_Model_Mapper_Role();
         $role       = $roleMapper->rowToObject($roleRow);
         
         $user = new Core_Model_User();
         $user->setId($row->user_id)
              ->setName($row->user_name)
              ->setMail($row->user_mail)
              ->setRole($role)
              ->setActive($row->user_active)
              ->setPassword($row->user_password)
              ->setFunction($row->user_function);
         return $user;
    }
    
    public function getDbTable()
    {
        if (null === $this->dbTable) {
            $this->dbTable = new Core_Model_DbTable_User();
        }
        return $this->dbTable;
    }
    
    public function setDbTable($dbTable)
    {
        $this->dbTable = $dbTable;
        return $this;
    }
    
}