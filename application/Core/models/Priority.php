<?php
class Core_Model_Priority
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
     * @var Core_Model_Mapper_Priority
     */
    private $mapper;
	
    
    /**
     * 
     * @return integer
     */
    public function getId ()
    {
        return $this->id;
    }
    
    /**
     * 
     * @param integer $id
     * @return Core_Model_Priority
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
     * @return Core_Model_Priority
     */
    public function setName ($name)
    {
        $this->name = (string) $name;
        return $this;
    }
    
    /**
     * 
     * @return Core_Model_Mapper_Priority
     */
	public function getMapper()
    {
        if (null === $this->mapper) {
            $this->mapper = new Core_Model_Mapper_Priority();
        }
        return $this->mapper;
    }
    
    /**
     * 
     * @param Core_Model_Mapper_Priority $mapper
     * @return Core_Model_Priority
     */
    public function setMapper($mapper)
    {
        $this->mapper = $mapper;
        return $this;
    }
}