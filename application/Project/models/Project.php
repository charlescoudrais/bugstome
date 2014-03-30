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
     * @var Zend_Date 
     */
    private $projectStart;
    /**
     *
     * @var Zend_Date
     */
    private $projectEnd;
    /**
     *
     * @var Core_Model_User 
     */
    private $projectUser;
    /**
     *
     * @var int 
     */
    private $projectUserId;
    /**
     *
     * @var Core_Model_Priority 
     */
    private $projectPriority;
    /**
     *
     * @var int 
     */
    private $projectPriorityId;
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
     * @return String
     */
    public function getProjectTitle()
    {
        return $this->projectTitle;
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
     * @return string
     */
    public function getProjectEnd() {
        return $this->projectEnd;
    }

    /**
     * 
     * @return String
     */
    public function getProjectUser()
    {
        return $this->projectUser;
    }
    
    public function getProjectUserId() {
        return $this->projectUserId;
    }

    /**
     * 
     * @return Core_Model_Priority
     */
    public function getProjectPriority() {
        return $this->projectPriority;
    }

    public function getProjectPriorityId() {
        return $this->projectPriorityId;
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
     * @param String $projectStart
     * @return Project_Model_Project
     */
    public function setProjectStart($projectStart) {
        $this->projectStart = new Zend_Date($projectStart);
        return $this;
    }
    
    /**
     * 
     * @param string
     * @return Project_Model_Project
     */
    public function setProjectEnd($projectEnd) {
        $this->projectEnd = new Zend_Date($projectEnd);
        return $this;
    }
    
    /**
     * 
     * @param Core_Model_User
     * @return Project_Model_Project
     */
    public function setProjectUser($projectUser)
    {
        $this->projectUser = $projectUser;
        return $this;
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

    public function setProjectUserId($projectUserId) {
        $this->projectUserId = $projectUserId;
        return $this;
    }

    public function setProjectPriority(Core_Model_Priority $projectPriority) {
        $this->projectPriority = $projectPriority;
        return $this;
    }

    public function setProjectPriorityId($projectPriorityId) {
        $this->projectPriorityId = $projectPriorityId;
        return $this;
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