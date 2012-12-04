<?php
class Project_Model_Project
{
    /**
     *
     * @var int 
     */
    private $projectId;
    /**
     *
     * @var string 
     */
    private $projectTitle;
    /**
     *
     * @var string 
     */
    private $projectStart;
    /**
     *
     * @var string 
     */
    private $projectEnd;
    /**
     *
     * @var string 
     */
    private $projectUser;
    /**
     *
     * @var string 
     */
    private $projectDescription;
    /**
     *
     * @var Project_Model_Mapper_Project 
     */
    private $projectMapper;


    /**
     * 
     * @return int
     */
    public function getProjectId()
    {
        return $this->projectId;
    }
    
    /**
     * 
     * @param int $projectId
     * @return Project_Model_Project
     */
    public function setProjectId($projectId)
    {
        $this->projectId = $projectId;
        return $this;
    }
    
    /**
     * 
     * @return String
     */
    public function getProjectTitle()
    {
        return $this->projectTitle;
    }
    
    /**
     * 
     * @param String $projectName
     * @return Project_Model_Project
     */
    public function setProjectTitle($projectTitle)
    {
        $this->projectTitle = $projectTitle;
        return $this;
    }
    
    /**
     * 
     * @return string
     */
    public function getProjectStart() {
        return $this->projectStart;
    }

    /**
     * 
     * @param String $projectStart
     * @return Project_Model_Project
     */
    public function setProjectStart($projectStart) {
        $this->projectStart = $projectStart;
        return $this;
    }

    /**
     * 
     * @return string
     */
    public function getProjectEnd() {
        return $this->projectEnd;
    }
    
    /**
     * 
     * @param string
     * @return Project_Model_Project
     */
    public function setProjectEnd($projectEnd) {
        $this->projectEnd = $projectEnd;
        return $this;
    }

        /**
     * 
     * @return String
     */
    public function getProjectUser()
    {
        return $this->projectUser;
    }
    
    /**
     * 
     * @param String $projectUser
     * @return Project_Model_Project
     */
    public function setProjectUser($projectUser)
    {
        $this->projectUser = $projectUser;
        return $this;
    }
    
    /**
     * 
     * @return String
     */
    public function getProjectDescription()
    {
        return $this->projectDescription;
    }
    
    /**
     * 
     * @param String $projectDescription
     * @return Project_Model_Project
     */
    public function setProjectDescription($projectDescription)
    {
        $this->projectDescription = $projectDescription;
        return $this;
    }
    
    /**
     * 
     * @return Project_Model_Mapper_Project
     */
    public function getProjectMapper()
    {
        if (null === $this->projectMapper) {
            $this->projectMapper = new Project_Model_Mapper_Project();
        }
        return $this->projectMapper;
    }

    /**
     * 
     * @param Project_Model_Mapper_Project $projectMapper
     * @return Project_Model_Project
     */
    public function setProjectMapper($projectMapper)
    {
        $this->projectMapper = $projectMapper;
        return $this;
    }
    
}