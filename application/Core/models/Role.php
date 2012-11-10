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

	public function getMapper()
    {
        if (null === $this->mapper) {
            $this->mapper = new Core_Model_Mapper_Role();
        }
        return $this->mapper;
    }
    
    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
}








