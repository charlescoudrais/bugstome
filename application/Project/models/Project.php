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
    private $projectName;
    /**
     *
     * @var string 
     */
    private $projectManager;
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
     * @return type
     */
    public function getProjectId() {
        return $this->projectId;
    }
    

    public function setProjectId($projectId) {
        $this->projectId = $projectId;
        return $this;
    }

    public function getProjectName() {
        return $this->projectName;
    }

    public function setProjectName($projectName) {
        $this->projectName = $projectName;
        return $this;
    }

    public function getProjectManager() {
        return $this->projectManager;
    }

    public function setProjectManager($projectManager) {
        $this->projectManager = $projectManager;
        return $this;
    }

    public function getProjectDescription() {
        return $this->projectDescription;
    }

    public function setProjectDescription($projectDescription) {
        $this->projectDescription = $projectDescription;
        return $this;
    }
    
    public function getProjectMapper() {
        $this->projectMapper = new Project_Model_Mapper_Project();
        return $this->projectMapper;
    }

    public function setProjectMapper($projectMapper) {
        $this->projectMapper = new Project_Model_Mapper_Project();
        return $this;
    }


}
