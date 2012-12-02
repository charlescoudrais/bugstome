<?php
class Core_Service_UserApi
{
    const ERROR_UNKNOWN_USER = 'errorInvalidDataName';
    const ERROR_USERS_LIST   = 'errorInvalidDataList';

    private $userMapper;
    private $roleMapper;
    private $authAdapter;
    private $lastException;
    
    public function authenticate($uName, $uPassword)
    {
        $authAdapter = $this->getAuthAdapter();
        $authAdapter->setIdentity($uName);
        $authAdapter->setCredential($uPassword);
        
        $auth       = Zend_Auth::getInstance();
        $authResult = $auth->authenticate($authAdapter);
        
        if (Zend_Auth_Result::SUCCESS === $authResult->getCode()) {
            $userRow = $authAdapter->getResultRowObject();
            $user = new Core_Model_User();
            $user = $this->getUserMapper()->find($userRow->user_id);
            $auth->getStorage()->write($user);
            return true;
        }
        
        return false;
        
    }
    
    public function hasIdentity()
    {
        return Zend_Auth::getInstance()->hasIdentity();
    }
    
    public function clearIdentity()
    {
        return Zend_Auth::getInstance()->clearIdentity();
    }
    
    public function getIdentity()
    {
        return Zend_Auth::getInstance()->getIdentity();
    }
    
    /**
     * 
     * @return Core_Model_Mapper_User()
     */
    public function getUserMapper()
    {
        if (NULL === $this->userMapper) {
            $this->userMapper = new Core_Model_Mapper_User();
        }
        return $this->userMapper;
    }
    
    /**
     * 
     * @param Core_Model_Mapper_User $userMapper
     * @return Core_Model_Mapper_User
     */
    public function setUserMapper($userMapper)
    {
        $this->userMapper = $userMapper;
        return $this;
    }

    public function getRoleMapper()
    {
        return $this->roleMapper;
    }

    public function setRoleMapper($roleMapper)
    {
        $this->roleMapper = $roleMapper;
    }

    public function getAuthAdapter()
    {
        if (null === $this->authAdapter) {
            $this->authAdapter = new Zend_Auth_Adapter_DbTable();  
        }
        
        $this->authAdapter->setTableName('users');
        $this->authAdapter->setIdentityColumn('user_mail');
        $this->authAdapter->setCredentialColumn('user_password');
        $this->authAdapter->setCredentialTreatment('SHA1(?) AND user_active = 1');
        return $this->authAdapter;
    }

    public function setAuthAdapter($authAdapter)
    {
        $this->authAdapter = $authAdapter;
        return $this;
    }
    
    public function findById($id)
    {
        $user = $this->getUserMapper()->find((int) $id);
           
        if (!$user) {
            return self::ERROR_UNKNOWN_USER;
            
        }
        return $this->getUserMapper()->objectToRow($user);
    }
    
    public function fetchUsers($count=100, $offset=0)
    {
        $users = $this->getUserMapper()
                      ->fetchAll(null, null, $count, $offset);
        if(!$users) {
            return self::ERROR_USERS_LIST;
        }            
        return $users;
        // @TODO: objectToRow for "collection"
        //return $this->getUserMapper()->objectToRow($users);

    }

}