<?php
class Project_Service_ProjectApi
{
    const ERROR_UNKNOWN_PROJECT = 'errorInvalidDataName';
    const ERROR_UPROJECTS_LIST   = 'errorInvalidDataList';

    private $projectMapper;
    private $lastException;
    
    /**
     * 
     * @return Project_Model_Mapper_Project()
     */
    public function getProjectMapper()
    {
        if (NULL === $this->projectMapper) {
            $this->projectMapper = new Project_Model_Mapper_Project();
        }
        return $this->projectMapper;
    }
    
    /**
     * 
     * @param Project_Model_Mapper_Project $projectMapper
     * @return Project_Model_Mapper_Project
     */
    public function setProjectMapper($projectMapper)
    {
        $this->projectMapper = $projectMapper;
        return $this;
    }

    public function findById($id)
    {
        $project = $this->getProjectMapper()->find((int) $id);
           
        if (!$project) {
            return self::ERROR_UNKNOWN_PROJECT;
            
        }
        return $this->getProjectMapper()->objectToRow($project);
    }
    
    public function fetchProjects($count=100, $offset=0)
    {
        $projects = $this->getProjectMapper()
                      ->fetchAll(null, null, $count, $offset);
        if(!$projects) {
            return self::ERROR_USERS_LIST;
        }            
        return $projects;
        // @TODO: objectToRow for "collection"
        //return $this->getProjectMapper()->objectToRow($projects);

    }

}