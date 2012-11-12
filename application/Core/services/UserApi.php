<?php
class Core_Service_UserApi
{
    private $userMapper;
    private $roleMapper;
    private $authAdapter;
    
    private $lastException;
    
    public function auth()
    {
        
    }
    
    public function getUserMapper()
    {
        return $this->userMapper;
    }

    public function setUserMapper($userMapper)
    {
        $this->userMapper = $userMapper;
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
        return $this->authAdapter;
    }

    public function setAuthAdapter($authAdapter)
    {
        $this->authAdapter = $authAdapter;
    }
    


}