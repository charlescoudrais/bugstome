<?php 

class Core_Model_User
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $password;
    /**
     * @var boolean
     */
    private $active;
    /**
     * @var Core_Model_Role
     */
    private $role;
    /**
     * @var Core_Model_Mapper_User
     */
    private $userMapper;
    
    
	/**
     * 
     * @return int
     */
    public function getId ()
    {
        return $this->id;
    }

	/**
     * 
     * @param integer $id
     * @return Core_Model_User
     */
    public function setId ($id)
    {
        $this->id = (int) $id;
        return $this;
    }

	/**
     * 
     * @return String
     */
    public function getName ()
    {
        return $this->name;
    }

	/**
     * 
     * @param string $name
     * @return Core_Model_User
     */
    public function setName ($name)
    {
        $this->name = (string) $name;
        return $this;
    }

	/**
     * 
     * @return String
     */
    public function getPassword ()
    {
        return $this->password;
    }

	/**
     * 
     * @param string $password
     */
    public function setPassword ($password)
    {
        $this->password = (string) $password;
        return $this;
    }

    /**
     * 
     * @return boolean
     */
    public function getActive ()
    {
        return $this->active;
    }

	/**
     * 
     * @param boolean $active
     * @return Core_Model_User
     */
    public function setActive ($active)
    {
        $this->active = (bool) $active;
        return $this;
    }

	/**
     * 
     * @return Core_Model_Role
     */
    public function getRole ()
    {
        return $this->role;
    }

	/**
     * 
     * @param Core_Model_Role $role
     * @return Core_Model_User
     */
    public function setRole (Core_Model_Role $role)
    {
        $this->role = $role;
        return $this;
    }
    
    /**
     * 
     * @return Core_Model_Mapper_User
     */
	public function getMapper()
    {
        if (null === $this->userMapper) {
            $this->userMapper = new Core_Model_Mapper_User();
        }
        return $this->userMapper;
    }
    
    public function setMapper($mapper)
    {
        $this->userMapper = $mapper;
        return $this;
    }
}