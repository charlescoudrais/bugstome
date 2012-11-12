<?php 

class Core_Model_Role
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
     * @var Core_Model_Mapper_User
     */
    private $roleMapper;
    
    
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
     * @return Core_Model_Role
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
     * @return Core_Model_Role
     */
    public function setName ($name)
    {
        $this->name = (string) $name;
        return $this;
    }
    
    /**
     * 
     * @return Core_Model_Mapper_Role
     */
	public function getMapper()
    {
        if (null === $this->roleMapper) {
            $this->roleMapper = new Core_Model_Mapper_Role();
        }
        return $this->roleMapper;
    }
    
    /**
     * 
     * @param Core_Model_Mapper_Role $mapper
     * @return Core_Model_Role
     */
    public function setMapper($mapper)
    {
        $this->roleMapper = $mapper;
        return $this;
    }
}








