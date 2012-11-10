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
    private $mapper;
	/**
     * @return the $id
     */
    public function getId ()
    {
        return $this->id;
    }

	/**
     * @param integer $id
     */
    public function setId ($id)
    {
        $this->id = (int) $id;
        return $this;
    }

	/**
     * @return the $name
     */
    public function getName ()
    {
        return $this->name;
    }

	/**
     * @param string $name
     */
    public function setName ($name)
    {
        $this->name = (string) $name;
        return $this;
    }

	/**
     * @return the $password
     */
    public function getPassword ()
    {
        return $this->password;
    }

	/**
     * @param string $password
     */
    public function setPassword ($password)
    {
        $this->password = (string) $password;
        return $this;
    }

    /**
     * @return the $active
     */
    public function getActive ()
    {
        return $this->active;
    }

	/**
     * @param boolean $active
     */
    public function setActive ($active)
    {
        $this->active = (bool) $active;
        return $this;
    }

	/**
     * @return the $role
     */
    public function getRole ()
    {
        return $this->role;
    }

	/**
     * @param Core_Model_Role $role
     */
    public function setRole (Core_Model_Role $role)
    {
        $this->role = $role;
        return $this;
    }

	public function getMapper()
    {
        if (null === $this->mapper) {
            $this->mapper = new Core_Model_Mapper_User();
        }
        return $this->mapper;
    }
    
    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
}