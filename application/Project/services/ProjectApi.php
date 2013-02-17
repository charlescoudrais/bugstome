<?php
class Project_Service_ProjectApi
{
    const ERROR_UNKNOWN_PROJECT   = 'errorInvalidDataName';
    const ERROR_PROJECTS_LIST     = 'errorInvalidDataList';
    const SUCCESS_PROJECT_CREATED = 'Success, a new project has been created';

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
    
    /**
     * 
     * @param type $id
     * @return array $project
     */
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
            return self::ERROR_PROJECTS_LIST;
        }            
        return $projects;
        // @TODO: objectToRow for "collection"
        //return $this->getProjectMapper()->objectToRow($projects);

    }
    
    public function createProject(array $projectDatas)
    {
        if (isset($projectDatas['inp_project_name']) 
                && isset($projectDatas['inp_project_name'])
                && isset($projectDatas['sel_project_manager'])
                && isset($projectDatas['inp_project_start_datepicker'])
                && isset($projectDatas['inp_project_end_datepicker'])
                && isset($projectDatas['sel_project_priority'])
                && isset($projectDatas['tarea_project_description'])) {
            
            $project = new Project_Model_Project();
            $project->setProjectTitle(
                        $projectDatas['inp_project_name']
                    );
            $project->setProjectUser(
                        $projectDatas['inp_project_manager']
                    );
            $project->setProjectStart(
                        $projectDatas['inp_project_start_datepicker']
                    );
            $project->setProjectEnd(
                        $projectDatas['inp_project_end_datepicker']
                    );
            $project->setProjectDescription(
                        $projectDatas['sel_project_priority']
                    );
            $project->setProjectDescription(
                        $projectDatas['tarea_project_description']
                    );
            try {
                $this->getProjectMapper()->save($project);
            } catch (Exceprion $e) {
                $this->lastException = $e;
                return self::ERROR_PROJECTS_LIST;
            }
            
            return self::SUCCESS_PROJECT_CREATED;
        }
        
    }
    
}